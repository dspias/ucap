<?php

namespace App\Http\Controllers\Guest\Program;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Facades\Cart;
use App\Models\Country;
use App\Models\Faculty;
use App\Models\ProgramSession;
use App\Models\State;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $faculties = Faculty::whereStatus(true)
        //             ->with(['programs' => function($builder){
        //                 $builder->whereStatus(true);
        //             }])
        //             ->whereHas('university', function($builder){
        //                 $builder->whereStatus(true);
        //             })
        //             ->get();

        $provinces = State::whereHas('country', function($builder){
                        $builder->whereSlug('CA');
                    })->whereStatus(true)->get();
        $programs = $this->makeQuery($request);
        $selected = array(
            'title' => $request->title,
            'province' => isset($request->province) ? $request->province : array(),
            // 'faculty' => isset($request->faculty) ? $request->faculty : array(),
            'tution_fee' => isset($request->tution_fee) ? $request->tution_fee : array(),
            'degree' => isset($request->degree) ? $request->degree : array(),
            'order_by' => isset($request->order_by) ? $request->order_by : 'low_to_high',
            'program_duration' => isset($request->program_duration) ? $request->program_duration : array(),
            'scholarship' => isset($request->scholarship) ? $request->scholarship : array(),
            'attendance_type' => isset($request->attendance_type) ? $request->attendance_type : array(),
            'start_date' => isset($request->start_date) ? $request->start_date : null,
            'end_date' => isset($request->end_date) ? $request->end_date : null,
        );
        return view('guest.program.index', compact(['programs', 'provinces', 'selected']));
    }

    private function makeQuery($request){
        $builder = Program::whereStatus(true)->whereHas('faculty', function($query){
            $query->whereStatus(true)
                    ->whereHas('university', function($nested){
                        $nested->whereStatus(true);
                    });
            });
        if(!is_null($request->title)){
            $builder->where("name", "LIKE", "%$request->title%");
        }
        $provinces = $this->filterRequest($request->province);
        if(!is_null($provinces)){
            $builder->whereHas('faculty.university.university.city.state', function($nested)use($provinces){
                $nested->whereIn('id',$provinces);
            });
        }
        // if(!is_null($request->faculty)){
        //     $faculties = $request->faculty;
        //     $builder->whereHas('faculty', function($nested)use($faculties){
        //         $nested->whereIn('id',$faculties);
        //     });
        // }
        if(!is_null($request->tution_fee)){
            foreach($request->tution_fee as $value){
                $list = explode('-', $value);
                $min = (int)$list[0];
                $max = $list[1];
                $max = ($max == 'more') ?  999999999999 : (int) $max;
                $builder->whereBetween('yearly_fee', [$min, $max]);
            }
        }

        $degree = $this->filterRequest($request->degree);
        if(!is_null($degree)){
            $builder->whereIn('level', $degree);
        }

        if(!is_null($request->program_duration)){
            foreach($request->program_duration as $value){
                if ($value == '0-1') {
                    $builder->whereBetween('program_duration', [0, 11]);
                } elseif ($value == '1-2') {
                    $builder->whereBetween('program_duration', [12, 24]);
                } else {
                    $builder->whereBetween('program_duration', [25, 120]);
                }
            }
        }

        $scholarship = $this->filterRequest($request->scholarship);
        if(!is_null($scholarship)){
            $builder->whereIn('scholarship', $scholarship);
        }

        $attendance_type = $this->filterRequest($request->attendance_type);
        if(!is_null($attendance_type)){
            $builder->whereIn('attendance_type', $attendance_type);
        }

        if(!is_null($request->start_date) || !is_null($request->end_date)){
            if(!is_null($request->start_date) && !is_null($request->end_date)){
                $start = $request->start_date;
                $end = $request->end_date;
                $builder->whereHas('sessions', function($nested) use ($start, $end){
                    $nested->whereBetween('session_start', array($start, $end));
                });
            } elseif(!is_null($request->start_date)){
                $start = $request->start_date;
                $builder->whereHas('sessions', function($nested) use ($start){
                    $nested->where('session_start', '>=', $start);
                });
            } elseif(!is_null($request->end_date)){
                $end = $request->end_date;
                $builder->whereHas('sessions', function($nested) use ($end){
                    $nested->where('session_start', '<=', $end);
                });
            }
        }

        if(!is_null($request->order_by)){
            if($request->order_by == 'high_to_low')
                $builder->orderBy('yearly_fee', 'DESC');
            // elseif($request->order_by == 'start_date')
            //     $builder->orderBy('start_date', 'ASC');
            else
                $builder->orderBy('yearly_fee', 'ASC');
        }
        return $builder->paginate(20);
    }


    /**
     * Display details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($program_id, $program_title)
    {
        $program_id = bindec($program_id);
        $program = Program::whereId($program_id)->whereStatus(true)->firstOrFail();
        $is_cart = Cart::match($program->id);
        return view('guest.program.show', compact(['program', 'is_cart']));
    }

    /**
     * Display details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request, $program_id)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        } elseif(Auth::check() && Auth::user()->role->slug != 'student'){
            alert()->warning('Alert','You are not able to apply with this user!');
            return redirect()->back();
        }
        if(!isset($request->accept)){
            alert()->warning('Alert','Please confirm you have been checked all the requirements');
            return redirect()->back();
        }
        $request->validate(array(
            'session' => 'required | integer'
        ));
        $program_id = bindec($program_id);
        $program = Program::whereId($program_id)->whereStatus(true)->firstOrFail();
        $session = ProgramSession::findOrFail($request->session);
        $cart = Cart::get();
        $count = count($cart['programs']);
        $limit = ucap_get('cart_limit') ?? 3;
        if($count < $limit){
            Cart::add($program, $session);
        } else {
            alert()->warning('Alert','Cart limit will be cross if you want to add this program then at first, remove any other program from the cart');
            return redirect()->back();
        }
        return redirect()->route('student.cart.index');
    }

    /**
     * Display details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeWishlist($program_id)
    {
        $program_id = bindec($program_id);
        if(!Auth::check()){
            return redirect()->route('login');
        } elseif(Auth::check() && Auth::user()->role->slug != 'student'){
            alert()->warning('Alert','You are not able to add with this user!');
            return redirect()->back();
        }
        $program = Program::whereId($program_id)->whereStatus(true)->firstOrFail();

        $wishlist = Wishlist::whereUser_id(auth()->user()->id)->whereProgram_id($program_id)->first();
        if(is_null($wishlist)){
            $wishlist = new Wishlist();
            $wishlist->user_id = auth()->user()->id;
            $wishlist->program_id = $program->id;
            $wishlist->save();
            toast(ucfirst($program->name). ' Added to your wishlist', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            $wishlist->delete();
            toast(ucfirst($program->name). ' removed to your wishlist', 'success')->autoClose(2000)->timerProgressBar();
        }

        return redirect()->back();
    }

    private function filterRequest($data){
        if(is_null($data)) return null;
        $data = array_filter($data, function($v) { return !is_null($v); });
        if(empty($data)) $data = null;
        return $data;
    }
}
