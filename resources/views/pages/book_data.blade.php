@extends('layout.adm')

@section('title', 'Booking Data')

@section('content')
<div class="flex-1 p-4 md:p-10 flex flex-col">
    <div class="flex justify-between items-center mb-6">
        <div class="mobile-menu">
            <button id="menu-button" class="text-gray-700 focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
        <div class="flex items-center ml-auto">
            <span class="mr-2 md:mr-4 text-gray-700 whitespace-nowrap">{{ Auth::user()->username }}</span>
            <div class="h-8 w-8 md:h-10 md:w-10 rounded-full flex items-center justify-center bg-gray-300 text-white font-bold">
                {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
            </div>
            <a class="ml-2 md:ml-4 text-gray-700 hover:text-blue-900" href="{{ route('logout') }}">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>

    <main class="flex-1 overflow-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 md:gap-0">
            <div>
                <h2 class="text-lg font-bold text-gray-900 uppercase">BOOKING DATA</h2>
                <p class="text-xs text-gray-600 mt-1 max-w-xs md:max-w-none">
                    Here is a list of all Booking Data
                </p>
            </div>
            <a href="{{ route('add_booking') }}"
               class="bg-blue-600 text-white text-xs font-semibold px-4 py-2 rounded shadow hover:bg-blue-700 focus:outline-none whitespace-nowrap">
                Add Booking Data
            </a>
        </div>

        <div class="overflow-x-auto rounded-md shadow-sm">
            <table class="w-full text-xs text-left border-collapse min-w-[700px] md:min-w-full">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="py-2 px-3 font-normal border-b border-gray-200">No</th>
                        <th class="py-2 px-3 font-normal border-b border-gray-200">Name</th>
                        <th class="py-2 px-3 font-normal border-b border-gray-200">Phone Number</th>
                        <th class="py-2 px-3 font-normal border-b border-gray-200">Court</th>
                        <th class="py-2 px-3 font-normal border-b border-gray-200">Start Time</th>
                        <th class="py-2 px-3 font-normal border-b border-gray-200">End Time</th>
                        <th class="py-2 px-3 font-normal border-b border-gray-200">Status</th>
                        <th class="py-2 px-3 font-normal border-b border-gray-200">Total Payment</th>
                        <th class="py-2 px-3 font-normal border-b border-gray-200">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-800">
                    @foreach($bookings as $booking)
                    <tr>
                        <td class="py-2 px-3 border-b border-gray-100">{{ $loop->iteration }}</td>
                        <td class="py-2 px-3 border-b border-gray-100">{{ $booking->customer_name }}</td>
                        <td class="py-2 px-3 border-b border-gray-100">{{ $booking->phone_number }}</td>
                        <td class="py-2 px-3 border-b border-gray-100">{{ $booking->court }}</td>
                        <td class="py-2 px-3 border-b border-gray-100">{{ \Carbon\Carbon::parse($booking->start_time)->format('d/m/Y | H:i') }}</td>
                        <td class="py-2 px-3 border-b border-gray-100">{{ \Carbon\Carbon::parse($booking->end_time)->format('d/m/Y | H:i') }}</td>
                        <td class="py-2 px-3 border-b border-gray-100">{{ $booking->status }}</td>
                        <td class="py-2 px-3 border-b border-gray-100">Rp {{ number_format($booking->price ?? 0, 0, ',', '.') }}</td>
                        <td class="py-2 px-3 border-b border-gray-100 flex gap-2">
                            <form method="POST" action="{{ route('admin.bookings.verify', $booking->id) }}">
                                @csrf
                                <button type="submit" class="text-green-600 hover:text-green-800" title="Verifikasi">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>
                            <form method="POST" action="{{ route('booking.destroy', $booking->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex flex-col sm:flex-row gap-4">
            <a href="#" class="bg-purple-600 text-white text-xs font-semibold px-5 py-2 rounded shadow hover:bg-purple-700">
                Download PDF
            </a>
            <a href="#" class="bg-purple-600 text-white text-xs font-semibold px-5 py-2 rounded shadow hover:bg-purple-700">
                Download Excel
            </a>
        </div>
    </main>
</div>
@endsection
