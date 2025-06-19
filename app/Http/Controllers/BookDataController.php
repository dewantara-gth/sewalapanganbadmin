<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookDataController extends Controller
{
    public function index()
    {
        return view('pages.book_data'); // Tampilkan dashboard jika sudah login
    }
    
}
