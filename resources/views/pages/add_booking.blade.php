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
        <!-- Main Content -->
        <div class="flex-1 p-4 md:p-10 flex flex-col">
            <div class="flex justify-between items-center mb-6">
                <div class="mobile-menu">
                    <button id="menu-button" class="text-gray-700 focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
                <div class="flex items-center ml-auto">
                    <span class="mr-2 md:mr-4 text-gray-700 whitespace-nowrap">Dewantara Bram</span>
                    <img alt="User avatar of Dewantara Bram, a smiling man with short black hair wearing a blue shirt"
                        class="h-8 w-8 md:h-10 md:w-10 rounded-full" height="40"
                        src="https://storage.googleapis.com/a1aa/image/8bhRABXN6qfAH_O5DWhIrN9rgGhUj-t8JMTbbKIYhMc.jpg"
                        width="40" />
                    <a class="ml-2 md:ml-4 text-gray-700 hover:text-gray-900" href="#">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
            </div>

        <main class="flex-1 px-10 py-8">
            <h2 class="text-sm font-bold mb-1">
                ADD BOOKING DATA
            </h2>
            <p class="text-xs font-normal mb-8">
                Fill The Data
            </p>
            <form class="max-w-xl space-y-6">
                <div>
                    <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="court">
                        Court
                    </label>
                    <input
                        class="w-full rounded-full border border-[#6b6fcf] px-6 py-3 text-xs text-[#1a1a1a] placeholder:text-[#a0a0a0] focus:outline-none focus:ring-2 focus:ring-[#6b6fcf]"
                        id="court" placeholder="" type="text" />
                </div>
                <div>
                    <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="customerName">
                        Customer Name
                    </label>
                    <input
                        class="w-full rounded-full border border-[#6b6fcf] px-6 py-3 text-xs text-[#1a1a1a] placeholder:text-[#a0a0a0] focus:outline-none focus:ring-2 focus:ring-[#6b6fcf]"
                        id="customerName" placeholder="" type="text" />
                </div>
                <div>
                    <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="phoneNumber">
                        Phone Number
                    </label>
                    <input
                        class="w-full rounded-full border border-[#6b6fcf] px-6 py-3 text-xs text-[#1a1a1a] placeholder:text-[#a0a0a0] focus:outline-none focus:ring-2 focus:ring-[#6b6fcf]"
                        id="phoneNumber" placeholder="" type="text" />
                </div>
                <div class="flex space-x-6">
                    <div class="flex-1">
                        <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="startTime">
                            Start Time
                        </label>
                        <div class="relative">
                            <input
                                class="w-full rounded-full border border-[#6b6fcf] px-6 py-3 pr-12 text-xs text-[#a0a0a0] focus:outline-none focus:ring-2 focus:ring-[#6b6fcf]"
                                id="startTime" placeholder="DD/MM/YY | 00.00" type="text" />
                            <i
                                class="fas fa-calendar-alt absolute right-4 top-1/2 -translate-y-1/2 text-[#007bff] text-lg cursor-pointer">
                            </i>
                        </div>
                    </div>
                    <div class="flex-1">
                        <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="endTime">
                            End Time
                        </label>
                        <div class="relative">
                            <input
                                class="w-full rounded-full border border-[#6b6fcf] px-6 py-3 pr-12 text-xs text-[#a0a0a0] focus:outline-none focus:ring-2 focus:ring-[#6b6fcf]"
                                id="endTime" placeholder="DD/MM/YY | 00.00" type="text" />
                            <i
                                class="fas fa-calendar-alt absolute right-4 top-1/2 -translate-y-1/2 text-[#007bff] text-lg cursor-pointer">
                            </i>
                        </div>
                    </div>
                </div>
                <div class="max-w-xs">
                    <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="status">
                        Status
                    </label>
                    <div class="relative">
                        <input
                            class="w-full rounded-full border border-[#6b6fcf] px-6 py-3 pr-10 text-xs text-[#1a1a1a] focus:outline-none focus:ring-2 focus:ring-[#6b6fcf]"
                            id="status" placeholder="" type="text" />
                        <i
                            class="fas fa-chevron-right absolute right-4 top-1/2 -translate-y-1/2 text-[#4a5a82] text-xs cursor-pointer">
                        </i>
                    </div>
                </div>
                <div class="max-w-xs">
                        <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="totalpayment">
                            Total Payment
                        </label>
                        <div class="relative">
                            <input
                                class="w-full rounded-full border border-[#6b6fcf] px-6 py-3 pr-10 text-xs text-[#1a1a1a] focus:outline-none focus:ring-2 focus:ring-[#6b6fcf]"
                                id="totalpayment" placeholder="Rp" type="text" />
                        </div>
                    </div>
                <button
                    class="bg-[#007bff] text-white text-xs font-semibold px-5 py-2 rounded shadow-md hover:bg-[#0069d9] transition"
                    type="submit">
                    Add Booking Data
                </button>
            </form>
        </main>
    </div>

@endsection
