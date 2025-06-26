<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Tambahkan ini untuk mengambil data booking dari database

class BookDataController extends Controller
{
    public function index()
    {
        $bookings = Booking::all(); // Ambil semua data booking
        return view('pages.book_data', compact('bookings')); // Kirim data ke view
    }
}
