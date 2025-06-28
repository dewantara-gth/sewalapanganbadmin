<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Booking;

class AddBookingController extends Controller
{
    public function index()
    {
        return view('pages.add_booking'); // Tampilkan dashboard jika sudah login
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'court'          => 'required|string',
        'customer_name'  => 'required|string',
        'phone_number'   => 'required|string',
        'startTime'      => 'required|date',
        'endTime'        => 'required|date|after:startTime',
        'status'         => 'required|string',
        'price'          => 'required|numeric',
    ]);

    Booking::create([
        'booking_code' => 'BK-' . now()->format('Ymd') . '-' . strtoupper(Str::random(4)),// ⬅️ Generated otomatis
        'court'         => $validated['court'],
        'customer_name' => $validated['customer_name'],
        'phone_number'  => $validated['phone_number'],
        'start_time'    => $validated['startTime'],
        'end_time'      => $validated['endTime'],
        'status'        => $validated['status'],
        'price'         => $validated['price'], 
    ]);

    return redirect()->route('admin.booking.index')->with('success', 'Booking berhasil ditambahkan');
}   
    
}
