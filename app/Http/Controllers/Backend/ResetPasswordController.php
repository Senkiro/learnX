<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
    return view('backend.auth.resetPassword', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6',
            're_password' => 'required|string|same:password',
        ]);

        $user = User::where('email', $request->email)
        ->where('verification_token', $request->token)
        ->first();

        if (!$user) {
        return back()->withErrors(['email' => 'Invalid token or email!']);
        }

        $user->password = Hash::make($request->password);
        $user->verification_token = null;
        $user->save();

        return redirect()->route('auth.admin')->with('success', 'Password has been reset!');
    }
}
