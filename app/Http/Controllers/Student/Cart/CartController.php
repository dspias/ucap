<?php

namespace App\Http\Controllers\Student\Cart;

use App\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationProgram;
use App\Models\PaymentGateway;
use App\Models\Program;
use App\Models\ProgramSession;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Stripe;

class CartController extends Controller
{

    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.cart.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function remove($program_id)
    {
        $program_id = bindec($program_id);
        Cart::remove($program_id);
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment()
    {
        $cart = Cart::get();
        $programs = (array)$cart['programs'];
        $number = count($programs);
        if($number < 1) {
            alert()->warning('Alert','Please add your program first!');
            return redirect()->back();
        }

        $stripe = PaymentGateway::whereName('stripe')->whereStatus(true)->first();
        // store the cart programs against the student
        return view('student.cart.pay', compact(['stripe']));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        $cart = Cart::get();
        $programs = (array)$cart['programs'];
        $number = count($programs);
        if($number < 1) {
            alert()->warning('Alert','Please add your program first!');
            return redirect()->back();
        }

        $amount = $this->getAmount($programs);
        $discount = $this->getDiscount($programs);
        $tax = $this->getTax($programs);


        $result = $this->makePayment($amount, $request->stripeToken);
        // store the cart programs against the students
        if(optional($result)->status == 'succeeded'){
            // cart store here
            $is_done = $this->cartStore($programs, $result, $number, $amount, $discount, $tax);
            if($is_done){
                Cart::clear();
                toast('Application has been completed!', 'success')->autoClose(2000)->timerProgressBar();
                return redirect()->route('student.application.index');
            }
            alert()->error('Error','Something Wrong, Please Try again!');
            return redirect()->back();
        } else {
            alert()->warning('Alert','Your payment not completed, please try again!');
            return redirect()->back();
        }

    }

    private function getDiscount($programs){
        return 0.00;
    }

    private function getTax(){
        return ucap_get('tax') ?? 0.00;
    }

    private function getAmount($programs){
        $total_amount = 0.00;
        $tax = $this->getTax();
        $discount = $this->getDiscount($programs);

        foreach ($programs as $temp){
            $program = Program::findOrFail($temp['program']);
            $total_amount += $program->application_fee;
        }

        return (double)(($total_amount - $discount) + ((($total_amount - $discount) * $tax)/100));
    }

    private function makePayment($amount, $token){
        $stripe = PaymentGateway::whereName('stripe')->whereStatus(true)->first();
        $currency = optional($stripe)->currency ?? ucap_get('currency_name');
        $currency = $currency ?? 'usd';
        $secret = optional($stripe)->secret ?? env('STRIPE_SECRET');
        if($amount < 1.00) {
            return null;
        }
        $payment = array(
            "amount" => $amount * 100,
            "currency" => strtolower($currency),
            "source" => $token,
            "description" => auth()->user()->name."'s application payment",
        );

        Stripe\Stripe::setApiKey($secret);
        $result = Stripe\Charge::create($payment);
        return $result;
    }

    private function makeRefund($charge_id){
        $gateway = PaymentGateway::whereName('stripe')->whereStatus(true)->first();
        $key = optional($gateway)->key ?? env('STRIPE_KEY');

        $stripe = new \Stripe\StripeClient($key);

        $refund = $stripe->refunds->create([
            'charge' => $charge_id,
          ]);

        return $refund;
    }

    private function cartStore($programs, $result, $number, $amount, $discount, $tax){
        $user = auth()->user();

        if (is_null($user->student) || is_null(optional($user->student)->dob) || is_null(optional($user->student)->gender || is_null(optional($user->student)->city))) {
            $message = '<h4>You have to update your valid information and documents first</h4>';

            return false;
        }

        $native_lang = optional($user->student)->language;
        $aid = 'UCAP_'.$user->id . strtotime(now()) .'_'. strtoupper($native_lang);

        $application = Application::create(array(
            'native_lang' => $native_lang,
            'aid' => $aid,
            'student_id' => $user->id,
            'payment_status' => $result->status,
            'payment_id' => $result->id,
            'amount' => $amount,
            'discount' => $discount,
            'tax' => $tax,
            'total_program' => $number,
        ));

        if(!is_null($application)){
            foreach($programs as $temp){
                $program = Program::findOrFail($temp['program']);
                $session = ProgramSession::findOrFail($temp['session']);
                $university_id = $program->faculty->university_id;
                $approm = ApplicationProgram::create(array(
                    'application_id' => $application->id,
                    'program_id' => $program->id,
                    'session_id' => $session->id,
                    'university_id' => $university_id,
                    'original_fee' => $program->application_fee,
                    'discount_fee' => ($program->application_fee - ($discount/$number)),
                ));
                if(is_null($approm)){
                    $application->programs()->forceDelete();
                    $this->makeRefund($application->payment_id);
                    $application->forceDelete();
                    return false;
                }
            }
        }
        return true;
    }
}
