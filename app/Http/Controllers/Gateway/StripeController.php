<?php

namespace App\Http\Controllers\Gateway;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Stripe;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Facades\Redirect;
use League\Flysystem\Dropbox\DropboxAdapter;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client;
use Dropbox\WriteMode;

class StripeController extends Controller
{
    public function index()
    {
        return view('stripe_check');
    }

    public function makePayment(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => 120 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Make payment and chill."
        ]);

        toast('Payment successfully made.', 'success')->autoClose(5000)->timerProgressBar();

        return back();
    }


    public function dropboxuploadshow()
    {
        $user = auth()->user();
        $avatars = $user->getMedia('file');
        // $avatars->clearMediaCollection();
        // foreach ($avatars as $avatar) {
        //     $avatar->delete();
        // }
        return view('dropboxcheck', compact(['avatars']));
    }

    public function dropboxupload(Request $request)
    {
        // dd($request);
        $user = auth()->user();

        // $user->addMedia($request->image)->toMediaCollection('file');
        $user->addMedia($request->image)->toMediaCollection('file', 'dropbox');
        // $request->file('image')->store(
        //     'avatars/' . $request->user()->id,
        //     'dropbox'
        // );

        return back();
    }
}
