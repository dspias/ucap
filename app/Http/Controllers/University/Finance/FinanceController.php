<?php

namespace App\Http\Controllers\University\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('university.finance.index');
    }
    
    /**
     * Display a history of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        return view('university.finance.history');
    }
    
    /**
     * Display a details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($invoice_id)
    {
        return view('university.finance.details');
    }
    
    /**
     * Display a paymentRequest of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentRequest()
    {
        return view('university.finance.request');
    }
    
    /**
     * Display a setting of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setting()
    {
        return view('university.finance.setting');
    }
}
