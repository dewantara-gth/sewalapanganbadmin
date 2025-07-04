<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Booking;
use App\Models\Court;
use Carbon\Carbon;

class AddBookingController extends Controller
{
    public function index()
    {
        $courts = Court::all();
        return view('pages.add_booking', compact('courts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'court_id'       => 'required|exists:courts,id',
            'customer_name'  => 'required|string',
            'phone_number'   => 'required|string',
            'start_time'     => 'required|date',
            'end_time'       => 'required|date|after:start_time',
            'status'         => 'required|in:Pending,Accepted',
        ]);

        $court = Court::findOrFail($validated['court_id']);

        // Hitung durasi dan total harga
        $start = Carbon::parse($validated['start_time']);
$end = Carbon::parse($validated['end_time']);

// Durasi hanya dalam jam positif
$duration = $start->diffInHours($end);
$price = $duration * $court->price;

        Booking::create([
            'booking_code'  => 'BK-' . now()->format('Ymd') . '-' . strtoupper(Str::random(4)),
            'court_id'      => $validated['court_id'],
            'customer_name' => $validated['customer_name'],
            'phone_number'  => $validated['phone_number'],
            'start_time'    => $validated['start_time'],
            'end_time'      => $validated['end_time'],
            'status'        => $validated['status'],
            'price'         => $price, // ← gunakan variabel $price, bukan dari $validated
        ]);

        return redirect()->route('book_data')->with('success', 'Booking berhasil ditambahkan');
    }
}
