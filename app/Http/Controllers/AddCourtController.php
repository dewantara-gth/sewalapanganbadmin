<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddCourtController extends Controller
{
    public function index()
    {
        return view('pages.addcourt'); // Tampilkan dashboard jika sudah login
    }
    
}
