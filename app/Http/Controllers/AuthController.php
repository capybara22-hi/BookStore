<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function hienthiuser()
    {
        $users = User::all();

        return view('user.hienthiuser', compact('users'));
    }

    public function register()
    {
        return view('user.dangky');
    }

    public function postRegister(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role_id' => 3, // mặc định khi tạo tài khoản là khách hàng
        ]);

        Mail::to($user->email)->send(new WelcomeMail($user));

        // return back()->with('message', 'Đăng ký thành công!');
        return redirect()->route('dangnhap')->with('message', 'Đăng ký thành công! Vui lòng đăng nhập tài khoản!');
    }

    public function login()
    {
        return view('user.dangnhap');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // Debug: Kiểm tra xem user đã login chưa
            Log::info('Login successful', [
                'user_id' => Auth::id(),
                'user_name' => Auth::user()->name,
                'role_id' => Auth::user()->role_id,
                'session_id' => session()->getId()
            ]);

            // Chuyển hướng dựa trên role_id
            if (Auth::user()->role_id == 1) {
                return redirect()->route('indexadmin');
            }

            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'password' => 'Mật khẩu không chính xác',
        ])->withInput($request->only('email'));
    }

    public function Logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('dangnhap');
    }

    public function postForgot(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => 'Link đặt lại mật khẩu đã được gửi đến email của bạn!'])
            : back()->withErrors(['status' => 'Không tìm thấy tài khoản với email này.']);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required|',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('dangnhap')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
