<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionConfirmation;

class SubscriptionController extends Controller
{
    public function showForm()
    {
        return view('subscribe');
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        $token = Str::random(32);

        Subscriber::create([
            'email' => $request->email,
            'confirmation_token' => $token
        ]);

        Mail::to($request->email)->send(new SubscriptionConfirmation($token));

        return redirect()->back()->with('success', 'Please check your email to confirm your subscription.');
    }

    public function confirmSubscription($token)
    {
        $subscriber = Subscriber::where('confirmation_token', $token)->firstOrFail();

        $subscriber->confirmed = true;
        $subscriber->confirmation_token = null;
        $subscriber->save();

        return redirect('/')->with('success', 'Subscription confirmed successfully!');
    }
}
