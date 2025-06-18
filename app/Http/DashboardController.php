<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Cek apakah ada sesi pengguna
        if (!session('user_name')) {
            return redirect()->route('login'); // Arahkan ke halaman login jika belum login
        }

        return view('pages.dash');
    }
}
