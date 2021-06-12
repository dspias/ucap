<?php

namespace App\Http\Controllers\Guest\Contact;

use App\Http\Controllers\Controller;
use App\Mail\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
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
        return view('guest.contact.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendmail(Request $request)
    {
        $request->validate(array(
            'name'  =>  'required | string',
            'email'  =>  'required | string | email',
            'number'  =>  'required |min:11 | max:14',
            'subject'  =>  'required | string',
            'message'  =>  'required | string',
            'g-recaptcha-response' => 'required|captcha',
        ));
        try {
            Mail::to(env('MAIL_TO'))->send(new Contact($request));
        } catch (Exception $e) {
            toast('Does not sent Your Mail, please try again.', 'warning')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }
        toast('Sent Your Mail', 'success')->autoClose(2000)->timerProgressBar();
        return redirect()->back();
    }
}
