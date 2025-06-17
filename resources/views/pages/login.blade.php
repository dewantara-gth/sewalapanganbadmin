@extends('layout.acc')

@section('content')
<div class="bg-white rounded-lg shadow-md max-w-4xl w-full flex flex-col md:flex-row overflow-hidden mx-auto">
    <form
        action="{{ route('login.post') }}"
        method="POST"
        class="p-6 flex flex-col justify-center w-full md:w-1/2"
    >
        @csrf

        <h2 class="font-bold text-sm mb-4">Admin Login</h2>

        {{-- Tampilkan error jika login gagal --}}
        @if ($errors->any())
            <div class="text-red-500 text-xs mb-3">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Input Username --}}
        <label for="name" class="text-xs font-semibold mb-1">Username</label>
        <input
            type="text"
            id="name"
            name="name"
            placeholder="Enter your username"
            class="border border-gray-300 rounded-sm text-xs px-2 py-1 mb-3"
        />

        {{-- Input Password --}}
        <label for="password" class="text-xs font-semibold mb-1">Password</label>
        <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter your password"
            class="border border-gray-300 rounded-sm text-xs px-2 py-1 mb-4"
        />

        {{-- Tombol Login --}}
        <button
            type="submit"
            class="bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-sm w-20 mb-4 hover:bg-blue-700"
        >
            Login
        </button>

        {{-- Link ke halaman register --}}
        <div class="text-center text-xs text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar di sini</a>
        </div>
    </form>

    {{-- Gambar Samping --}}
    <div class="w-full md:w-1/2">
        <img
            src="https://storage.googleapis.com/a1aa/image/df34fa99-c7fe-4070-706c-5520e005549d.jpg"
            alt="Login image"
            class="object-cover w-full h-full"
        />
    </div>
</div>
@endsection
