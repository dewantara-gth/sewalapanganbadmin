<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('pages.schedule'); // Tampilkan dashboard jika sudah login
    }
    
}
