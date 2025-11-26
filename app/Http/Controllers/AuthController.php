<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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
        User::create([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role_id' => 3, // mặc định khi tạo tài khoản là khách hàng
        ]);

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
}
