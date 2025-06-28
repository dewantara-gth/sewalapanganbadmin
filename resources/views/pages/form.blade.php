@extends('layout.app')

@section('title', 'Form Booking')

@section('content')
<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@php
    use Carbon\Carbon;
@endphp

<div class="min-h-screen flex items-center justify-center bg-gray-100 py-10">
    <div class="w-full max-w-xl bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-green-600 text-white text-center py-4">
            <h1 class="text-xl font-bold uppercase">Booking Court</h1>
        </div>
        <div class="px-8 py-6">
            <h2 class="text-lg font-semibold text-center mb-6 text-gray-700">Isi Data Pemesanan</h2>

            {{-- Error Notification --}}
            @if ($errors->any())
                <div class="mb-4 bg-red-100 text-red-600 p-3 rounded">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Booking Form --}}
            <form method="POST" action="{{ route('booking.store') }}">
                @csrf

                {{-- Court --}}
                <div class="mb-4">
                    <label for="court" class="block text-sm font-medium text-gray-700 mb-1">Court</label>
                    <input type="text" name="court" id="court" value="{{ old('court') }}" required
                        class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>

                {{-- Customer Name --}}
                <div class="mb-4">
                    <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-1">Customer Name</label>
                    <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" required
                        class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>

                {{-- Phone Number --}}
                <div class="mb-4">
                    <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" required
                        class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>

                {{-- Price --}}
                <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" required
                    class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400"
                placeholder="Contoh: 50000">
                </div>

                {{-- Start & End Time --}}
                <div class="flex flex-wrap -mx-2 mb-4">
                    <div class="w-full md:w-1/2 px-2 mb-4 md:mb-0">
                        <label for="start_time" class="block text-sm font-medium text-gray-700 mb-1">Start Time</label>
                        <input type="text" name="start_time" id="start_time"
                            value="{{ old('start_time', Carbon::now()->format('Y-m-d H:i')) }}"
                            class="flatpickr w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400"
                            placeholder="YYYY-MM-DD HH:MM" required>
                    </div>
                    <div class="w-full md:w-1/2 px-2">
                        <label for="end_time" class="block text-sm font-medium text-gray-700 mb-1">End Time</label>
                        <input type="text" name="end_time" id="end_time"
                            value="{{ old('end_time', Carbon::now()->addHour()->format('Y-m-d H:i')) }}"
                            class="flatpickr w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400"
                            placeholder="YYYY-MM-DD HH:MM" required>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="text-center">
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:ring-2 focus:ring-green-400">
                        Booking Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    flatpickr(".flatpickr", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true
    });
</script>
