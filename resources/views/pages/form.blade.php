@extends('layout.app')

@section('title', 'Form Booking')

@section('content')

<div class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-2xl mx-auto">
        <div class="bg-green-600 text-white text-center py-4 rounded-t-lg">
            <h1 class="text-xl font-bold">BOOKING COURT</h1>
        </div>
        <div class="bg-white p-8 rounded-b-lg shadow-lg">
            <h2 class="text-2xl font-bold text-center mb-6">Your Personal Information</h2>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="court">Court</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="court" type="text" placeholder="">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="customer-name">Customer Name</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="customer-name" type="text" placeholder="">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone-number">Phone Number</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone-number" type="text" placeholder="">
                </div>
                <div class="flex flex-wrap mb-4">
                    <div class="w-full md:w-1/2 pr-0 md:pr-2 mb-4 md:mb-0">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="start-time">Start Time</label>
                        <div class="relative">
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline flatpickr" id="start-time" type="text" placeholder="DD/MM/YY | 00.00">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-calendar-alt text-green-600"></i>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 pl-0 md:pl-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="end-time">End Time</label>
                        <div class="relative">
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline flatpickr" id="end-time" type="text" placeholder="DD/MM/YY | 00.00">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-calendar-alt text-green-600"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        Next Step
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        flatpickr(".flatpickr", {
            enableTime: true,
            dateFormat: "d/m/Y H:i",
            time_24hr: true
        });
@endsection