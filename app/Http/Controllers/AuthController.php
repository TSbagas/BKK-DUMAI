<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $path = $request->file('profile_image') ? $request->file('profile_image')->store('profile_images', 'public') : null;

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'profile_image' => $path,
    ]);

    Auth::login($user);

    return redirect()->route('home');
}

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
    // Validasi input
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    // Cek apakah email ada di dalam database
    $user = \App\Models\User::where('email', $request->email)->first();

    if ($user) {
        // Coba untuk login dengan opsi "remember"
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Regenerate session
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        // Jika password salah
        return back()->withErrors([
            'password' => 'The provided password is incorrect.',
        ])->withInput();
    }

    // Jika email tidak ada di dalam database
    return back()->withErrors([
        'email' => 'The provided email does not match our records.',
    ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

