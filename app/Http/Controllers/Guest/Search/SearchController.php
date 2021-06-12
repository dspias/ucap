<?php

namespace App\Http\Controllers\Guest\Search;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class SearchController extends Controller
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
        $provinces = State::whereHas('country', function($builder){
            $builder->whereSlug('CA');
        })->whereStatus(true)->get();
        return view('guest.search.index', compact(['provinces', ]));
    }
}
