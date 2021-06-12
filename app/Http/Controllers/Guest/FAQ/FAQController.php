<?php

namespace App\Http\Controllers\Guest\FAQ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function __construct(){
        $this->middleware(['web']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guest.faq.index');
    }
}
