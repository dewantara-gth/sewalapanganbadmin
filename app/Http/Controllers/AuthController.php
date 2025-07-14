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
            'email' => 'required|email|unique:user,email', // Ganti 'users' dengan 'user'
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
    
        // Mencoba untuk login dengan kredensial yang diberikan
        if (Auth::attempt(['username' => $request->name, 'password' => $request->password])) {
            return redirect('/dash'); // Jika login berhasil, arahkan ke halaman dashboard
        }
    
        // Jika login gagal, kembalikan error
        return back()->withErrors(['name' => 'Login gagal! Username atau password salah.']);
    }
    

    public function logout()
    {
        Auth::logout(); // Logout dari Laravel
        session()->flush(); // Menghapus semua data sesi
    
        return redirect()->route('login'); // Arahkan ke halaman login setelah logout
    }
    
// Session Dash Admin 

public function showDashboard()
{
    if (!session('user_name')) {
        return redirect()->route('login'); // Jika sesi sudah tidak ada, arahkan kembali ke login
    }

    return view('dashboard'); // Tampilkan halaman dashboard
}

// Session Court Admin

public function showCourt()
{
    if (!session('user_name')) {
        return redirect()->route('login'); // Jika sesi sudah tidak ada, arahkan kembali ke login
    }

    return view('court'); // Tampilkan halaman court
}

// Session Book Data

public function showBookData()
{
    if (!session('user_name')) {
        return redirect()->route('login'); // Jika sesi sudah tidak ada, arahkan kembali ke login
    }

    return view('book_data'); // Tampilkan halaman book data
}

// Session Book Data

public function showSchedule()
{
    if (!session('user_name')) {
        return redirect()->route('login'); // Jika sesi sudah tidak ada, arahkan kembali ke login
    }

    return view('schedule'); // Tampilkan halaman schedule
}
}