<?php

namespace App\Http\Controllers\Guest\Subscribe;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function index()
    {
        $subscribers = Subscribe::all();

        return view('superadmin.subscribe.index', compact(['subscribers']));
    }
    
    

    /**
     * Store Subscriber
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'email' => ['required', 'unique:subscribes', 'string' , 'email'],
        ]);

        $subscriber = new Subscribe();
        $subscriber->email = $request->email;
        
        if ($subscriber->save()) {
            toast('You have been subscribed succefully.', 'success')->autoClose(3000)->timerProgressBar();
            return redirect()->back();
        } else {
            toast('Please try again.', 'error')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        }
    }
}
