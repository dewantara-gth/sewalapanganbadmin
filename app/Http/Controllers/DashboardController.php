<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dash'); // Tampilkan dashboard jika sudah login
    }
    
}
