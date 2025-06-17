<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan form register
    public function showRegister()
    {
        return view('pages.register');
    }

    // Proses register
    public function register(Request $request)
    {
        

        $request->validate([
            'username' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Register berhasil! Silakan login.');
    }

    // Tampilkan form login
    public function showLogin()
    {
        return view('pages.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request->name, 'password' => $request->password])) {
            return redirect('/dash');
        }

        return back()->withErrors(['name' => 'Login gagal! Username atau password salah.']);
    }
}
