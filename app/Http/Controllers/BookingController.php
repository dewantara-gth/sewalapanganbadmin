<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Court;

class BookingController extends Controller
{
    public function index()
{
    $courts = Court::all();
    return view('pages.booking', compact('courts'));
}
    
}

