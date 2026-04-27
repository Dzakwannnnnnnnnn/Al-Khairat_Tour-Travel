<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show login form.
     */
    public function showLoginForm(Request $request)
    {
        if ($request->has('intended_product')) {
            session(['intended_product' => $request->intended_product]);
        }
        return view('auth.login');
    }

    /**
     * Handle login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            if (Auth::user()->isAdmin()) {
                return redirect()->intended(route('dashboard'))->with('success', 'Login berhasil! Selamat datang kembali.');
            }

            if (session()->has('intended_product')) {
                $productId = session()->pull('intended_product');
                return redirect()->route('home')->with(['success' => 'Login berhasil!', 'open_booking' => $productId]);
            }

            return redirect()->route('home')->with('success', 'Login berhasil! Selamat datang kembali.');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Show register form.
     */
    public function showRegisterForm(Request $request)
    {
        if ($request->has('intended_product')) {
            session(['intended_product' => $request->intended_product]);
        }
        return view('auth.register');
    }

    /**
     * Handle registration.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^(\+62|62|0)8[1-9][0-9]{6,11}$/'],
            'email' => [
                'required', 
                'string', 
                'email', 
                'max:255', 
                'unique:users',
                'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/i' // Enforce Gmail as requested "harus di google"
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'email.regex' => 'Pendaftaran hanya diperbolehkan menggunakan akun Google (Gmail).',
            'phone.regex' => 'Nomor telepon tidak valid. Gunakan nomor WhatsApp aktif (contoh: 08123456789).',
        ]);

        $user = User::create([
            'name' => $request->name,
            'nickname' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);

        if (session()->has('intended_product')) {
            $productId = session()->pull('intended_product');
            return redirect()->route('home')->with(['success' => 'Registrasi berhasil!', 'open_booking' => $productId]);
        }

        return redirect()->route('home')->with('success', 'Registrasi berhasil! Selamat datang di Al-Khairat.');
    }

    /**
     * Handle logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
    }
}
