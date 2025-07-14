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
                {{-- Input tersembunyi --}}
                <input type="hidden" name="court_id" value="{{ $court->id }}">

                {{-- Tampilkan nama court tapi disable --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Court</label>
                    <input type="text" value="{{ $court->court_name }}" disabled ...
                        class="w-full px-3 py-2 border rounded shadow-sm bg-gray-100 cursor-not-allowed">
                </div>


                {{-- Customer Name --}}
                <div class="mb-4">
                    <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-1">Customer
                        Name</label>
                    <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}"
                        required
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
                    <input type="number" name="price" id="price" value="{{ old('price') }}" readonly
                        class="w-full px-3 py-2 border rounded shadow-sm bg-gray-100 cursor-not-allowed"
                        placeholder="Harga akan dihitung otomatis">

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
    document.addEventListener('DOMContentLoaded', function () {
        const hargaPerJam = {{ $court-> price
    }};

    function hitungHarga() {
        const startInput = document.getElementById("start_time").value;
        const endInput = document.getElementById("end_time").value;

        if (startInput && endInput) {
            const start = new Date(startInput);
            const end = new Date(endInput);

            if (end > start) {
                const durationInMs = end - start;
                const durationInHours = durationInMs / (1000 * 60 * 60);
                const totalHours = Math.ceil(durationInHours);
                const totalPrice = totalHours * hargaPerJam;

                document.getElementById("price").value = totalPrice;
            } else {
                document.getElementById("price").value = 0;
            }
        }
    }

    function setupFlatpickr(selector, defaultHour) {
        flatpickr(selector, {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true,
            minuteIncrement: 60,
            minTime: "08:00",
            maxTime: "22:00",
            defaultHour: defaultHour,
            onValueUpdate: function (selectedDates, dateStr, instance) {
                // paksa menit ke 00
                if (selectedDates.length > 0) {
                    const selected = selectedDates[0];
                    if (selected.getMinutes() !== 0) {
                        selected.setMinutes(0);
                        selected.setSeconds(0);
                        instance.setDate(selected, true); // true = trigger onChange lagi
                    }
                }
            },
            onChange: hitungHarga
        });
    }

    setupFlatpickr("#start_time", 8);
    setupFlatpickr("#end_time", 9);

    hitungHarga();

    document.getElementById("start_time").addEventListener("change", hitungHarga);
    document.getElementById("end_time").addEventListener("change", hitungHarga);
    });



    const hargaPerJam = {{ $court-> price }}; // Harga per jam dari database

    function hitungHarga() {
        const startInput = document.getElementById("start_time").value;
        const endInput = document.getElementById("end_time").value;

        if (startInput && endInput) {
            const start = new Date(startInput);
            const end = new Date(endInput);

            if (end > start) {
                const durationInMs = end - start;
                const durationInHours = durationInMs / (1000 * 60 * 60);
                const totalHours = Math.ceil(durationInHours); // pembulatan ke atas
                const totalPrice = totalHours * hargaPerJam;

                document.getElementById("price").value = totalPrice;
            } else {
                document.getElementById("price").value = 0;
            }
        }
    }

    // Hitung ulang saat halaman pertama kali dimuat
    window.addEventListener("load", hitungHarga);

    // Event listener tambahan kalau flatpickr tidak trigger otomatis
    document.getElementById("start_time").addEventListener("change", hitungHarga);
    document.getElementById("end_time").addEventListener("change", hitungHarga);
</script>