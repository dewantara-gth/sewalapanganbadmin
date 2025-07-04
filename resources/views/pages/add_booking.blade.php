@extends('layout.adm')

@section('title', 'Add Booking Data')

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

    <main class="flex-1 px-10 py-8">
        <h2 class="text-sm font-bold mb-1">ADD BOOKING DATA</h2>
        <p class="text-xs font-normal mb-8">Fill The Data</p>

        <form action="{{ route('admin.booking.store') }}" method="POST" class="space-y-6">
    @csrf

    <!-- COURT -->
    <div>
        <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="court_id">Court</label>
        <select name="court_id" id="court_id" required
            class="w-72 rounded-full border border-[#6b6fcf] px-6 py-3 text-xs text-[#1a1a1a]">
            <option value="">-- Select Court --</option>
            @foreach($courts as $court)
                <option value="{{ $court->id }}" data-price="{{ $court->price }}">{{ $court->court_name }}</option>
            @endforeach
        </select>
    </div>

    <!-- CUSTOMER NAME -->
    <div>
        <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="customerName">Customer Name</label>
        <input class="w-72 rounded-full border border-[#6b6fcf] px-6 py-3 text-xs text-[#1a1a1a]"
               id="customerName" name="customer_name" type="text" placeholder="Enter name" />
    </div>

    <!-- PHONE NUMBER -->
    <div>
        <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="phoneNumber">Phone Number</label>
        <input class="w-72 rounded-full border border-[#6b6fcf] px-6 py-3 text-xs text-[#1a1a1a]"
               id="phoneNumber" name="phone_number" type="text" placeholder="08xxxxxxxxxx" />
    </div>

    <!-- START & END TIME -->
    <div class="flex flex-col md:flex-row md:space-x-6">
        <div>
            <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="startTime">Start Time</label>
            <input class="w-72 rounded-full border border-[#6b6fcf] px-6 py-3 text-xs text-[#a0a0a0]"
                   id="startTime" name="start_time" type="text" placeholder="YYYY-MM-DD HH:MM" />
        </div>
        <div>
            <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="endTime">End Time</label>
            <input class="w-72 rounded-full border border-[#6b6fcf] px-6 py-3 text-xs text-[#a0a0a0]"
                   id="endTime" name="end_time" type="text" placeholder="YYYY-MM-DD HH:MM" />
        </div>
    </div>

    <!-- STATUS SELECT -->
    <div>
        <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="status">Status</label>
        <select name="status" id="status"
            class="w-72 rounded-full border border-[#6b6fcf] px-6 py-3 text-xs text-[#1a1a1a]">
            <option value="Pending">Pending</option>
            <option value="Accepted">Accepted</option>
        </select>
    </div>

    <!-- TOTAL PRICE -->
    <div>
        <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="price">Total Payment</label>
        <input id="price" name="price" type="text" readonly
               class="w-72 rounded-full border border-[#6b6fcf] px-6 py-3 text-xs text-[#1a1a1a] bg-gray-100"
               placeholder="Total akan dihitung otomatis" />
    </div>

    <!-- SUBMIT BUTTON -->
    <button class="bg-[#007bff] text-white text-xs font-semibold px-5 py-2 rounded shadow-md hover:bg-[#0069d9] transition"
            type="submit">
        Add Booking Data
    </button>
</form>
    </main>
</div>

@push('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#startTime", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true
    });
    flatpickr("#endTime", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true
    });

    document.addEventListener('DOMContentLoaded', function () {
        const courtSelect = document.getElementById('court_id');
        const startTimeInput = document.getElementById('startTime');
        const endTimeInput = document.getElementById('endTime');
        const priceInput = document.getElementById('price');

        function calculatePrice() {
            const selected = courtSelect.options[courtSelect.selectedIndex];
            const courtPrice = parseFloat(selected.getAttribute('data-price'));
            const start = new Date(startTimeInput.value);
            const end = new Date(endTimeInput.value);

            if (!isNaN(courtPrice) && start && end && end > start) {
                const hours = Math.ceil((end - start) / (1000 * 60 * 60));
                const total = hours * courtPrice;
                priceInput.value = total;
            } else {
                priceInput.value = '';
            }
        }

        courtSelect.addEventListener('change', calculatePrice);
        startTimeInput.addEventListener('change', calculatePrice);
        endTimeInput.addEventListener('change', calculatePrice);
    });
</script>
@endpush

@endsection
