<?php

namespace App\Http\Controllers\Student\ChatRoom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatRoomController extends Controller
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
        return view('student.chatroom.index');
    }
}
