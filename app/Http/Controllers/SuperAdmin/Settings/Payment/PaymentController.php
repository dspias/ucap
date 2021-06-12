<?php

namespace App\Http\Controllers\SuperAdmin\Settings\Payment;

use App\Http\Controllers\Controller;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Constructors
    }

    /**
     * Display a listing of the resource.
     *
     * Payment Gateways
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gateways = PaymentGateway::all();
        return view('superadmin.settings.payment.index', compact(['gateways']));
    }


    /**
     * Store new country
     *
     * Countries
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, array(
            'name' => 'required',
            'currency' => 'required | string',
            'key' => 'required | string',
            'secret' => 'required | string',
        ));

        $temp = PaymentGateway::whereName($request->name)->first();
        if (!is_null($temp)) {
            toast(ucfirst($temp->name) . ' already exist!', 'warning')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }


        $gateway = new PaymentGateway();
        $gateway->name = $request->name;
        $gateway->currency = $request->currency;
        $gateway->key = $request->key;
        $gateway->secret = $request->secret;
        $gateway->status = true;
        if ($gateway->save()) {
            toast(ucfirst($gateway->name) . ' has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($gateway->name) . ' could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }

    /**
     * Store new country
     *
     * Countries
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $this->validate($request, array(
            'name' => 'required',
            'currency' => 'required | string',
            'key' => 'required | string',
            'secret' => 'required | string',
        ));
        $temp = PaymentGateway::whereName($request->name)->first();
        if (!is_null($temp)) {
            toast(ucfirst($temp->name) . ' already exist!', 'warning')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }

        $gateway = PaymentGateway::findOrFail($request->gateway_id);
        $gateway->name = $request->name;
        $gateway->currency = $request->currency;
        $gateway->key = $request->key;
        $gateway->secret = $request->secret;
        $gateway->status = true;
        if ($gateway->save()) {
            toast(ucfirst($gateway->name) . ' has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($gateway->name) . ' could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }


    /**
     * change status
     *
     * Countries
     *
     * @return \Illuminate\Http\Response
     */
    public function change_status($id)
    {

        $gateway = PaymentGateway::findOrFail($id);
        $gateway->status = ($gateway->status == true) ? false : true;
        if ($gateway->save()) {
            toast(ucfirst($gateway->name) . ' status has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($gateway->name) . ' status could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }
}
