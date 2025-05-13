@extends('layout.adm')

@section('title', 'Beranda')

@section('content')

<div class="mobile-menu hidden md:block">...</div>
  <div class="sidebar block md:hidden">...</div>
  <body class="font-inter">

<body class="bg-[#f9f9f9] text-[#1a1a1a]">
    <div class="flex min-h-screen flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="w-full md:w-64 bg-white shadow-md sidebar">
            <div class="flex items-center justify-center h-16 border-b">
                <img alt="Logo of Jaya Badminton Hall, a stylized shuttlecock in blue and white colors"
                    class="h-10 w-10 rounded-full" height="40"
                    src="https://storage.googleapis.com/a1aa/image/0Ui5zYOoKDdkhySBh8B-pgCs5dOWKDyBS-lh7jv9eUk.jpg"
                    width="40" />
                <span class="ml-2 text-lg font-semibold hidden md:block">Admin Jaya Badminton Hall</span>
            </div>
            <nav class="mt-10">
                <a class="flex items-center py-2 px-8 text-gray-700 hover:bg-gray-200" href="#">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    <span>Dashboard</span>
                </a>
                <a class="flex items-center py-2 px-8 text-blue-700 hover:bg-gray-200" href="#">
                    <i class="fas fa-table-tennis mr-3"></i>
                    <span>Court</span>
                </a>
                <a class="flex items-center py-2 px-8 text-gray-700 hover:bg-gray-200" href="#">
                    <i class="fas fa-list-alt mr-3"></i>
                    <span>Booking Data</span>
                </a>
                <a class="flex items-center py-2 px-8 text-gray-700 hover:bg-gray-200" href="#">
                    <i class="fas fa-calendar-alt mr-3"></i>
                    <span>Schedule</span>
                </a>
            </nav>
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

        <!-- Main content -->
        <main class="flex-1 p-8">
            <h2 class="font-bold text-sm mb-1">
                ADD COURT
            </h2>
            <p class="text-[10px] mb-6">
                Fill The Data
            </p>
            <form class="max-w-lg space-y-8">
                <div>
                    <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="courtnumber">
                        Court Number
                    </label>
                    <input
                        class="w-full rounded-full border border-[#6b6fcf] px-6 py-3 text-xs text-[#1a1a1a] placeholder:text-[#a0a0a0] focus:outline-none focus:ring-2 focus:ring-[#6b6fcf]"
                        id="courtnumber" placeholder="type court number" type="text" />
                </div>
                <div>
                    <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="price">
                        Price/ 2 Hours
                    </label>
                    <input
                        class="w-full rounded-full border border-[#6b6fcf] px-6 py-3 text-xs text-[#1a1a1a] placeholder:text-[#a0a0a0] focus:outline-none focus:ring-2 focus:ring-[#6b6fcf]"
                        id="price" placeholder="type the price" type="text" />
                </div>
                <div>
                    <label class="block mb-2 text-xs font-normal text-gray-900" for="uploadPicture">
                        Upload Picture
                    </label>
                    <input class="text-xs border border-gray-300 rounded px-2 py-1 cursor-pointer" id="uploadPicture"
                        type="file" />
                </div>
                <div>
                    <button
                        class="bg-blue-600 text-white text-[10px] font-semibold px-6 py-2 rounded shadow-md hover:bg-blue-700 transition-colors"
                        type="submit">
                        Add Court
                    </button>
                </div>
            </form>
        </main>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden" role="dialog" aria-modal="true">
        <div class="flex flex-col items-center justify-center h-full space-y-6" tabindex="-1">
            <a class="flex items-center py-2 px-8 text-white hover:bg-gray-700 rounded" href="#">
                <i class="fas fa-tachometer-alt mr-3"></i>
                <span>Dashboard</span>
            </a>
            <a class="flex items-center py-2 px-8 text-white hover:bg-gray-700 rounded" href="#">
                <i class="fas fa-table-tennis mr-3"></i>
                <span>Court</span>
            </a>
            <a class="flex items-center py-2 px-8 text-white hover:bg-gray-700 rounded" href="#">
                <i class="fas fa-list-alt mr-3"></i>
                <span>Booking Data</span>
            </a>
            <a class="flex items-center py-2 px-8 text-white hover:bg-gray-700 rounded" href="#">
                <i class="fas fa-calendar-alt mr-3"></i>
                <span>Schedule</span>
            </a>
            <button id="close-menu" class="mt-4 text-white focus:outline-none" aria-label="Close menu">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
    </div>

    <script>
        const menuButton = document.getElementById("menu-button");
        const mobileMenu = document.getElementById("mobile-menu");
        const closeMenu = document.getElementById("close-menu");

        menuButton.addEventListener("click", () => {
            mobileMenu.classList.remove("hidden");
        });

        closeMenu.addEventListener("click", () => {
            mobileMenu.classList.add("hidden");
        });
    </script>
    @endsection
