@extends('layout.acc')

@section('content')
<div class="bg-white rounded-lg shadow-md max-w-4xl w-full flex flex-col md:flex-row overflow-hidden mx-auto">
    <form action="{{ route('register.store') }}" method="POST" class="p-6 flex flex-col justify-center w-full md:w-1/2">
        @csrf

        <h2 class="font-bold text-sm mb-4">Register Admin</h2>

        {{-- ✅ Notifikasi Sukses --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-700 text-xs p-2 rounded-sm mb-3">
                {{ session('success') }}
            </div>
        @endif

        {{-- ✅ Error Validasi --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 text-xs p-2 rounded-sm mb-3">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <label for="username" class="text-xs font-semibold mb-1">Username</label>
        <input
            type="text"
            name="username"
            id="username"
            value="{{ old('username') }}"
            placeholder="Enter your username"
            class="border border-gray-300 rounded-sm text-xs px-2 py-1 mb-3"
        />

        <label for="email" class="text-xs font-semibold mb-1">Email</label>
        <input
            type="email"
            name="email"
            id="email"
            value="{{ old('email') }}"
            placeholder="Enter your email"
            class="border border-gray-300 rounded-sm text-xs px-2 py-1 mb-3"
        />

        <label for="password" class="text-xs font-semibold mb-1">Password</label>
        <input
            type="password"
            name="password"
            id="password"
            placeholder="Enter your password"
            class="border border-gray-300 rounded-sm text-xs px-2 py-1 mb-4"
        />

        <button
            type="submit"
            class="bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-sm w-24 mb-4 hover:bg-blue-700"
        >
            Register
        </button>

        <div class="text-center text-xs text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
        </div>
    </form>

    <div class="w-full md:w-1/2">
        <img
            src="https://storage.googleapis.com/a1aa/image/df34fa99-c7fe-4070-706c-5520e005549d.jpg"
            alt="Register image"
            class="object-cover w-full h-full"
        />
    </div>
</div>
@endsection
