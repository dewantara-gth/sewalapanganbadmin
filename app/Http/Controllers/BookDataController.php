<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Tambahkan ini untuk mengambil data booking dari database

class BookDataController extends Controller
{
    public function index(Request $request)
{
    // Ambil query pencarian dari input
    $search = $request->input('search');
    
    // Jika ada query pencarian, filter berdasarkan booking_code
    if ($search) {
        $bookings = Booking::where('booking_code', 'LIKE', '%' . $search . '%')->get();
    } else {
        // Jika tidak ada pencarian, ambil semua data booking
        $bookings = Booking::all();
    }

    return view('pages.book_data', compact('bookings', 'search'));
}

    
}
