@extends('layout.app')

@section('title', 'Invoice Booking')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-10">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md text-center">
        <h2 class="text-xl font-bold mb-4">Invoice: {{ $booking->booking_code }}</h2>

        <p><strong>Nama:</strong> {{ $booking->customer_name }}</p>
        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($booking->start_time)->format('d-m-Y') }}</p>
        <p>
            <strong>Jam:</strong>
            {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }} -
            {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}
        </p>
        <p><strong>Lapangan:</strong> {{ $booking->court->court_name ?? '-' }}</p>
        <p><strong>Status:</strong>
            @if ($booking->status === 'Pending')
                <span class="text-red-500">Belum Bayar</span>
            @elseif (in_array($booking->status, ['Accepted', 'Verified']))
                <span class="text-green-500">Sudah Bayar</span>
            @else
                <span class="text-gray-500">Status Tidak Diketahui</span>
            @endif
        </p>

        {{-- QRIS --}}
        <div class="my-4">
            <img src="{{ asset('images/qris.jpg') }}" alt="QRIS" class="mx-auto h-24">
        </div>

        {{-- WhatsApp Message --}}
        @php
    $message = "Halo Admin,%0A" .
        "Saya telah melakukan pembayaran booking.%0A" .
        "Kode Booking: {$booking->booking_code}%0A" .
        "Nama: {$booking->customer_name}%0A" .
        "Tanggal: " . \Carbon\Carbon::parse($booking->start_time)->format('d-m-Y') . "%0A" .
        "Jam: " . \Carbon\Carbon::parse($booking->start_time)->format('H:i') . " - " . \Carbon\Carbon::parse($booking->end_time)->format('H:i') . "%0A" .
        "Lapangan: " . ($booking->court->court_name ?? '-');

    // Tidak perlu urlencode lagi
@endphp

<a
  href="https://wa.me/6285135689617?text={{ $message }}"
  target="_blank"
  class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded w-full block text-center mt-4">
  Kirim Bukti Transfer ke WhatsApp
</a>

    </div>
</div>
@endsection
