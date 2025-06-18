@extends('layout.adm')

@section('title', 'Dashboard Admin')

@section('content')

    <div class="flex-1 p-4 md:p-10">
        <div class="flex justify-between items-center">
            <div class="mobile-menu">
                <button id="menu-button" class="text-gray-700 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
            <div class="flex items-center ml-auto">
                <!-- Mengambil nama pengguna dari sesi -->
                <span class="mr-2 md:mr-4 text-gray-700 whitespace-nowrap">{{ session('user_name', 'User') }}</span>
                <img alt="User Avatar" class="h-8 w-8 md:h-10 md:w-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/8bhRABXN6qfAH_O5DWhIrN9rgGhUj-t8JMTbbKIYhMc.jpg" width="40"/>
                <a class="ml-2 md:ml-4 text-gray-700 hover:text-blue-900" href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>
        <div class="mt-10 md:mt-20">
            <h1 class="text-3xl md:text-5xl font-bold">Welcome,</h1>
            <!-- Menampilkan nama pengguna dari sesi -->
            <h1 class="text-3xl md:text-5xl font-bold">{{ session('user_name', 'User') }}</h1>
            <p class="mt-2 md:mt-4 text-lg md:text-xl text-gray-600">Admin Jaya Badminton Hall</p>
        </div>
    </div>

@endsection
