<?php

namespace App\Http\Controllers\SuperAdmin\Settings\UCAP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UCAPController extends Controller
{
    public function __construct()
    {
        // Constructors
    }

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * UCAP Setting Page
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     return view('superadmin.settings.ucap.index');
    // }

    /**
     * Display a listing of the resource.
     *
     * UCAP General Setting Page
     *
     * @return \Illuminate\Http\Response
     */
    public function general()
    {
        return view('superadmin.settings.ucap.general.index');
    }

    /**
     * Display a listing of the resource.
     *
     * UCAP General Setting Page
     *
     * @return \Illuminate\Http\Response
     */
    public function generalStore(Request $request)
    {
        // App main_logo store and update
        if ($request->main_logo != null) {
            $this->validate($request, array(
                // 'main_logo' => 'required | dimensions:min_width=1920,min_height=650,max_width=1920,max_height=650|max:3000',
                'main_logo' => 'required | max:3000',
            ));
            ucap_set('main_logo', 'avatar', $request->main_logo);
        }

        // App small_logo store and update
        if ($request->small_logo != null) {
            $this->validate($request, array(
                // 'small_logo' => 'required | dimensions:min_width=1920,min_height=650,max_width=1920,max_height=650|max:3000',
                'small_logo' => 'required | max:3000',
            ));
            ucap_set('small_logo', 'avatar', $request->small_logo);
        }

        // App name store and update
        if ($request->app_name != null) {
            $this->validate($request, array(
                'app_name' => 'required | string',
            ));
            ucap_set('app_name', 'string', $request->app_name);
        }

        // App name store and update
        if ($request->currency_name != null) {
            $this->validate($request, array(
                'currency_name' => 'required | string',
            ));
            ucap_set('currency_name', 'string', $request->currency_name);
        }

        // App name store and update
        if ($request->currency_sign != null) {
            $this->validate($request, array(
                'currency_sign' => 'required | string',
            ));
            ucap_set('currency_sign', 'string', $request->currency_sign);
        }


        toast('Updated System Information Successfully.', 'success')->autoClose(3000)->timerProgressBar();
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * UCAP contact Setting Page
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('superadmin.settings.ucap.contact.index');
    }


    /**
     * Display a listing of the resource.
     *
     * UCAP General Setting Page
     *
     * @return \Illuminate\Http\Response
     */
    public function contactStore(Request $request)
    {
        // App name store and update
        // if ($request->app_name != null) {
        //     $this->validate($request, array(
        //         'app_name' => 'required | string',
        //     ));
        //     ucap_set('app_name', 'string', $request->app_name);
        // }


        toast('Updated System Information Successfully.', 'success')->autoClose(3000)->timerProgressBar();
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * UCAP email Setting Page
     *
     * @return \Illuminate\Http\Response
     */
    public function email()
    {
        return view('superadmin.settings.ucap.email.index');
    }


    /**
     * Display a listing of the resource.
     *
     * UCAP General Setting Page
     *
     * @return \Illuminate\Http\Response
     */
    public function emailStore(Request $request)
    {
        // App name store and update
        // if ($request->app_name != null) {
        //     $this->validate($request, array(
        //         'app_name' => 'required | string',
        //     ));
        //     ucap_set('app_name', 'string', $request->app_name);
        // }


        toast('Updated System Information Successfully.', 'success')->autoClose(3000)->timerProgressBar();
        return redirect()->back();
    }
}
