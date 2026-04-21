<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register 
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $req)
    {
        $credentials = $req->validate([
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'email', 'unique:users,email'],
            'password'      => ['required', 'string', 'min:6', 'confirmed'],
            'date_of_birth' => ['required', 'date', 'before:today'],
        ]);

        $dob = Carbon::parse($req->date_of_birth);

        if ($dob->age <= 3) {
            return redirect()->back()
                ->with('error', 'Tuổi của bạn chưa đủ điều kiện.');
        }

        // Người dùng đầu tiên là admin
        if (User::count() === 0) {
            $credentials['role'] = 'admin';
        }

        $user = User::create($credentials);
        Auth::login($user);

        session(['isKid' => ($dob->age >= 12 && $dob->age <= 3)]);

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard')
                ->with('success', 'Đăng ký thành công! Chào mừng Admin.');
        }

        return redirect()->route('admin.dashboard')
            ->with('success', 'Đăng ký thành công! Chào mừng bạn.');
    }

    // Login 
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $req)
    {
        $credentials = $req->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();

            if (Auth::user()->isAdmin()) {
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Đăng nhập thành công! Chào mừng Admin.');
            }

            return redirect()->route('admin.dashboard')
                ->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ])->onlyInput('email');
    }

    // Logout 
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Đã đăng xuất thành công.');
    }
}
