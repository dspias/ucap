<?php

namespace App\Http\Controllers\Representative\LiveChat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LiveChatController extends Controller
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
        return view('representative.live_chat.index');
    }
}
