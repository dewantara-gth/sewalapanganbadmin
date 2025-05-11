@extends('layout.app')

@section('title', 'Beranda')


@section('content')

    <section class="relative flex flex-col md:flex-row items-center justify-between p-8">
        <div class="max-w-lg">
            <h1 class="text-5xl font-bold text-black">Your Game Starts with the Right Court.</h1>
            <p class="text-xl text-gray-600 mt-4">Ready for new journy!</p>
            <a class="mt-6 px-6 py-3 bg-green-600 text-white text-lg font-semibold rounded inline-block text-center" href="{{ url('booking') }}">Book Now</a>

        </div>
        <img alt="Indoor Badminton Court" class="w-full md:w-1/2 h-auto rounded-lg shadow-lg mt-8 md:mt-0" height="600"
            src="https://storage.googleapis.com/a1aa/image/UTMepjVB4_4XMaDy6UcaMYHHew1EGzLOiNEYc-1PjmM.jpg"
            width="800" />
    </section>

    <section class="bg-gray-100 py-4">
        <div class="flex flex-col md:flex-row justify-around">
            <div class="flex items-center space-x-2 mb-4 md:mb-0">
                <i class="fas fa-shopping-bag text-red-600 text-2xl"></i>
                <div>
                    <p class="font-semibold">Canteen</p>
                    <p class="text-sm text-gray-600">Indoor Canteen</p>
                </div>
            </div>
            <div class="flex items-center space-x-2 mb-4 md:mb-0">
                <i class="fas fa-clock text-red-600 text-2xl"></i>
                <div>
                    <p class="font-semibold">Open every day</p>
                    <p class="text-sm text-gray-600">Open from 09:00 AM to 10:00 PM</p>
                </div>
            </div>
            <div class="flex items-center space-x-2 mb-4 md:mb-0">
                <i class="fas fa-headset text-red-600 text-2xl"></i>
                <div>
                    <p class="font-semibold">Customer Support 24/7</p>
                    <p class="text-sm text-gray-600">Online booking service available 24/7</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <i class="fas fa-wifi text-red-600 text-2xl"></i>
                <div>
                    <p class="font-semibold">Free Wifi</p>
                    <p class="text-sm text-gray-600">Wi-Fi is available in all areas</p>
                </div>
            </div>
        </div>
    </section>

@endsection


