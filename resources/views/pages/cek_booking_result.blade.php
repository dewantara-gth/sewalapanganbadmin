@extends('layout.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold text-gray-800 tracking-wide">INVOICE</h2>
        <div class="text-xs text-gray-400 mt-1">Kode: <span class="font-semibold">{{ $booking->booking_code }}</span></div>
    </div>

    <div class="ml-auto">
    <a href="{{ route('booking.cek.form') }}" class="inline-block px-1 py-1.5 text-sm bg-blue-500 text-white rounded hover:bg-blue-600">
        Cek Booking Lainnya
    </a>
</div>

</div>

<div class="mb-6">
    <dl class="grid grid-cols-2 gap-x-4 gap-y-2 text-sm">
        <dt class="text-gray-500">Nama</dt>
        <dd class="font-medium text-gray-800">{{ $booking->customer_name }}</dd>

        <dt class="text-gray-500">Tanggal</dt>
        <dd class="text-gray-800">{{ \Carbon\Carbon::parse($booking->start_time)->format('d-m-Y') }}</dd>

        <dt class="text-gray-500">Jam</dt>
        <dd class="text-gray-800">
            {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}
        </dd>

        <dt class="text-gray-500">Lapangan</dt>
        <dd class="text-gray-800">{{ $booking->court->court_name ?? '-' }}</dd>

        <dt class="text-gray-500">Status</dt>
        <dd>
            @if ($booking->status === 'Pending')
                <span class="inline-block px-2 py-0.5 rounded bg-red-100 text-red-600 text-xs font-semibold">Belum Bayar</span>
            @elseif (in_array($booking->status, ['Accepted', 'Verified']))
                <span class="inline-block px-2 py-0.5 rounded bg-green-100 text-green-700 text-xs font-semibold">Sudah Bayar</span>
            @else
                <span class="inline-block px-2 py-0.5 rounded bg-gray-100 text-gray-600 text-xs font-semibold">Status Tidak Diketahui</span>
            @endif
        </dd>
    </dl>
</div>

<div class="border-t pt-6 mb-6">
    <div class="flex justify-between text-base font-semibold text-gray-700">
        <span>Total Harga</span>
        <span>Rp {{ number_format($booking->price ?? 0, 0, ',', '.') }}</span>
    </div>
</div>

<!-- QR Code Section -->
<div class="flex flex-col items-center mb-6">
    <!-- Teks "SCAN QRIS" di atas gambar QRIS -->
    <div class="font-bold text-sm text-gray-700 mb-2">
        SCAN QRIS
    </div>

    <!-- QR Image -->
    <img src="{{ asset('images/qris.jpg') }}" alt="QR Code" class="w-48 h-48 mb-4">

    <!-- Rekening Text -->
    <div class="text-center text-xs text-gray-600">
        <strong>Bank Mandiri:</strong>
        <p>02839827387197101</p>
    </div>
</div>

@endsection
