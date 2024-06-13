<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::id() > 0) {
            return redirect()->route('dashboard.index');
        }

        return view('backend.auth.login');
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Log::info('Email verified: ' . Auth::user()->hasVerifiedEmail());

            if (Auth::user()->hasVerifiedEmail()) {
                return redirect()->route('dashboard.index')->with('success', 'Đăng nhập thành công');
            } else {
                Auth::logout();
                return redirect()->route('auth.admin')->with('error', 'Vui lòng xác minh địa chỉ email của bạn trước khi đăng nhập.');
            }
        }

        return redirect()->route('auth.admin')->with('error', 'Email hoặc mật khẩu chưa chính xác');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.admin');
    }

    public function showRegistrationForm()
    {
        return view('backend.auth.register');
    }

    public function register(AuthRequest $request)
    {
        $credentials = $request->validated();
        $credentials = Arr::except($credentials, ['re_password']);

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $credentials['name'],
                'email' => $credentials['email'],
                'password' => Hash::make($credentials['password']),
                'user_catalogue_id' => $credentials['user_catalogue_id'] ?? 2,
            ]);

            $user->generateVerificationToken();
            $user->sendEmailVerificationNotification();



            DB::commit();

            return back()->with('success', 'Please check your email to verify your account.');
        } catch (\Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage());

            return back()->with('error', 'Failed to register. Please try again.');
        }
    }

    public function verifyEmail($token)
    {
        $user = User::where('verification_token', $token)->firstOrFail();
        $user->markEmailAsVerified();

//        Auth::check()
        Auth::login($user);

        return redirect()->route('dashboard.index')->with('success', 'Your email has been verified!');
    }


}
