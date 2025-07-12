@extends('layout.app')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-xl font-bold mb-4">Cek Status Booking</h1>

    @if(session('error'))
        <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('booking.cek') }}" method="POST">
        @csrf
        <label for="booking_code" class="block mb-2">Kode Booking</label>
        <input type="text" name="booking_code" id="booking_code" required class="border p-2 w-full mb-4">

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Cek Status</button>
    </form>
</div>
@endsection
