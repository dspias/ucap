<?php

namespace App\Http\Controllers\SuperAdmin\Settings\Offer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function __construct(){
        // Constructors
    }
    
    /**
     * Display a listing of the resource.
     *
     * Offers
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin.settings.offer.index');
    }
}
