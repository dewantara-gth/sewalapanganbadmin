@extends('layout.acc')

@section('title', 'Login')

@section('content')
<div
    class="bg-white rounded-lg shadow-md max-w-4xl w-full flex flex-col md:flex-row overflow-hidden mx-auto"
  >
      <form
        action="#"
        method="POST"
        class="p-6 flex flex-col justify-center w-full md:w-1/2"
      >
        <h2 class="font-bold text-sm mb-4">Admin Login</h2>
        <label for="name" class="text-xs font-semibold mb-1">Name</label>
        <input
          type="text"
          id="name"
          name="name"
          placeholder="Enter your name"
          class="border border-gray-300 rounded-sm text-xs px-2 py-1 mb-3 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-600"
        />
        <label for="password" class="text-xs font-semibold mb-1">Password</label>
        <input
          type="password"
          id="password"
          name="password"
          placeholder="Enter your password"
          class="border border-gray-300 rounded-sm text-xs px-2 py-1 mb-4 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-600"
        />
        <button
          type="submit"
          class="bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-sm w-20 mb-4 hover:bg-blue-700 transition"
        >
          Login
        </button>
        <div class="text-center text-xs text-gray-600">
          Or
          <div class="mt-1">
            Have an account?
            <a href="{{ url('/register') }}" class="text-blue-600 hover:underline">Sign Up</a>
          </div>
        </div>
      </form>

      <div class="w-full md:w-1/2">
        <img
          src="https://storage.googleapis.com/a1aa/image/df34fa99-c7fe-4070-706c-5520e005549d.jpg"
          alt="Badminton racket and shuttlecock on a bright blue background"
          class="object-cover w-full h-full"
          width="400"
          height="300"
        />
      </div>
    </div>
  @endsection



