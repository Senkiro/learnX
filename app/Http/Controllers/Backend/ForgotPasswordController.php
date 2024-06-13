<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('backend.auth.forgotPassword');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(60);

        User::where('email', $request->email)->update([
            'verification_token' => $token,
            'updated_at' => now()
        ]);

        Mail::send('backend.email.password', ['token' => $token, 'name' => $request->name], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });

        return back()->with('success', 'We have emailed your password reset link!');
    }
}


