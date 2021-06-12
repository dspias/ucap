<?php

namespace App\Http\Controllers\SuperAdmin\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Stripe\Balance;
use Stripe\Stripe;

class FinanceController extends Controller
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
        $stripe = set_stripe();
        Stripe::setApiKey($stripe['secret']);
        $result = Balance::retrieve();
        $balance = array(
            'currency' => $result->available[0]->currency,
            'amount' => $result->available[0]->amount,
        );
        return view('superadmin.finance.index', compact(['balance']) );
    }

    /**
     * Display a allPayment of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allPayment()
    {
        return view('superadmin.finance.all');
    }

    /**
     * Display a details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($invoice_id)
    {
        return view('superadmin.finance.details');
    }

    /**
     * Display a paymentRequest of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentRequest()
    {
        return view('superadmin.finance.request');
    }

    /**
     * Display a makePayment of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function makePayment($invoice_id)
    {
        return view('superadmin.finance.make_payment');
    }

    /**
     * Display a setting of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setting()
    {
        $commission = array(
            'ucap' => ucap_get('ucap_commission') ?? 0.00,
            'university' => ucap_get('university_commission') ?? 0.00,
            'representative' => ucap_get('representative_commission') ?? 0.00,
        );
        $termcondition = ucap_get('termcondition');
        return view('superadmin.finance.setting', compact(['commission', 'termcondition']));
    }



    /**
     * Display a setting of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setCommisions(Request $request)
    {
        $commission = array(
            'ucap' => ucap_get('ucap_commission') ?? 0.00,
            'university' => ucap_get('university_commission') ?? 0.00,
            'representative' => ucap_get('representative_commission') ?? 0.00,
        );

        // App ucap_commission store and update
        if ($request->ucap_commission != null && (double)$request->ucap_commission != (double)$commission['ucap']) {
            $this->validate($request, array(
                'ucap_commission' => 'required | numeric | between:1,100',
            ));

            $total = (double)$request->ucap_commission + (double)$commission['university'] +  (double)$commission['representative'];
            if($total > 100){
                Alert::warning('Invalid Total', 'Total percentage can not more than 100.00');
                return redirect()->back();
            }
            ucap_set('ucap_commission', 'double', $request->ucap_commission);
        }


        // App university_commission store and update
        if ($request->university_commission != null && (double)$request->university_commission != (double)$commission['university']) {
            $this->validate($request, array(
                'university_commission' => 'required | numeric | between:1,100',
            ));

            $total =(double) $commission['ucap'] + (double)$request->university_commission +  (double)$commission['representative'];
            if($total > 100){
                Alert::warning('Invalid Total', 'Total percentage can not more than 100.00');
                return redirect()->back();
            }
            ucap_set('university_commission', 'double', $request->university_commission);
        }


        // App representative_commission store and update
        if ($request->representative_commission != null && (double)$request->representative_commission != (double)$commission['representative']) {
            $this->validate($request, array(
                'representative_commission' => 'required | numeric | between:1,100',
            ));

            $total = (double)$commission['ucap'] + (double)$commission['university'] +  (double)$request->representative_commission;
            if($total > 100){
                Alert::warning('Invalid Total', 'Total percentage can not more than 100.00');
                return redirect()->back();
            }
            ucap_set('representative_commission', 'double', $request->representative_commission);
        }

        toast('Updated Commissions Successfully.', 'success')->autoClose(3000)->timerProgressBar();
        return redirect()->back();
    }







    /**
     * termcondition store
     */
    public function termconditionStore(Request $request)
    {
        $this->validate($request, array(
            'termcondition' => 'required | string | max: 300',
        ));

        $termcondition = (array) ucap_get('termcondition');
        $ques = array(
            'termcondition' => $request->termcondition,
            'created_at' => now(),
            'updated_at' => now(),
        );
        $termcondition[] = $ques;

        ucap_set('termcondition', 'json', $termcondition);

        toast('Stored new term and condition successfully.', 'success')->autoClose(2000)->timerProgressBar();
        return redirect()->back();
    }

    /**
     * termcondition update
     */
    public function termconditionUpdate(Request $request)
    {
        $this->validate($request, array(
            'termcondition' => 'required | string | max: 300',
        ));

        $termcondition = (array) ucap_get('termcondition');

        $ques = $termcondition[$request->key];
        $ques['termcondition'] = $request->termcondition;
        $ques['updated_at'] = now();

        $termcondition[$request->key] = $ques;

        ucap_set('termcondition', 'json', $termcondition);

        toast('Update term and condition successfully.', 'success')->autoClose(2000)->timerProgressBar();
        return redirect()->back();
    }

    /**
     * termcondition delete
     */
    public function termconditionDelete($key)
    {
        $termcondition = (array) ucap_get('termcondition');
        unset($termcondition[$key]);
        ucap_set('termcondition', 'json', $termcondition);
        toast('Delete termcondition successfully.', 'success')->autoClose(2000)->timerProgressBar();
        return redirect()->back();
    }
}
