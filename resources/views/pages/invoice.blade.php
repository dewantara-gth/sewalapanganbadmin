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
        <p><strong>Lapangan:</strong> {{ $booking->court }}</p>
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

        {{-- WhatsApp Link --}}
        @php
            $whatsappMessage = urlencode(
                "Halo Admin,\n" .
                "Saya telah melakukan pembayaran booking.\n" .
                "Kode Booking: {$booking->booking_code}\n" .
                "Nama: {$booking->customer_name}\n" .
                "Tanggal: " . \Carbon\Carbon::parse($booking->start_time)->format('d-m-Y') . "\n" .
                "Jam: " . \Carbon\Carbon::parse($booking->start_time)->format('H:i') . " - " . \Carbon\Carbon::parse($booking->end_time)->format('H:i') . "\n" .
                "Lapangan: {$booking->court}"
            );
        @endphp

        <a href="https://wa.me/6285135689617?text={{ $whatsappMessage }}"
           target="_blank"
           class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded w-full block text-center">
            Kirim Bukti Transfer ke WhatsApp
        </a>
    </div>
</div>
@endsection
