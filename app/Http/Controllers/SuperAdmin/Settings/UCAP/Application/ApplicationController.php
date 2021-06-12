<?php

namespace App\Http\Controllers\SuperAdmin\Settings\UCAP\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function __construct()
    {
        // Constructors
    }

    /**
     * Display a listing of the resource.
     *
     * UCAP Setting Page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin.settings.ucap.applicaton.index');
    }

    /**
     * Display a listing of the resource.
     *
     * UCAP Setting Page
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // App cart_limit store and update
        if ($request->cart_limit != null) {
            $this->validate($request, array(
                'cart_limit' => 'required | integer | min:1',
            ));
            ucap_set('cart_limit', 'integer', $request->cart_limit);
        }

        // App tax store and update
        if ($request->tax != null) {
            $this->validate($request, array(
                'tax' => 'required | numeric',
            ));
            ucap_set('tax', 'double', $request->tax);
        }

        toast('Updated System Information Successfully.', 'success')->autoClose(3000)->timerProgressBar();
        return redirect()->back();
    }
}
