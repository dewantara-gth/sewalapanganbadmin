@extends('layout.acc')

@section('title', 'Register')


@section('content')
<div
    class="bg-white rounded-lg shadow-md max-w-4xl w-full flex flex-col md:flex-row overflow-hidden mx-auto"
  >
    <div class="p-8 md:w-1/2 flex flex-col justify-center">
      <h2 class="font-semibold text-gray-900 text-lg mb-6 text-center md:text-left">
        Get Started Now
      </h2>
      <form class="space-y-4 text-xs text-gray-600">
        <div>
          <label class="block font-semibold mb-1" for="name">Name</label>
          <input
            class="w-full border border-gray-300 rounded px-2 py-1 text-xs text-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-600"
            id="name"
            placeholder="Enter your name"
            type="text"
          />
        </div>
        <div>
          <label class="block font-semibold mb-1" for="email">Email address</label>
          <input
            class="w-full border border-gray-300 rounded px-2 py-1 text-xs text-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-600"
            id="email"
            placeholder="Enter your email"
            type="email"
          />
        </div>
        <div>
          <label class="block font-semibold mb-1" for="password">Password</label>
          <input
            class="w-full border border-gray-300 rounded px-2 py-1 text-xs text-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-600"
            id="password"
            placeholder="Enter your password"
            type="password"
          />
        </div>
        <button
          class="bg-blue-600 text-white text-xs font-semibold px-4 py-1 rounded"
          type="submit"
        >
          Sign up
        </button>
      </form>
      <div class="text-center text-gray-500 text-[9px] mt-3">
        Or
        <div class="mt-1">
          Have an account?
          <a class="text-blue-600" href="{{ url('/login') }}">Sign in</a>
        </div>
      </div>
    </div>

    <div class="md:w-1/2 flex items-center justify-center">
      <img
        alt="Badminton racket and shuttlecock on a bright blue background"
        class="w-full h-full object-cover"
        height="400"
        src="https://storage.googleapis.com/a1aa/image/651c4aa7-ccf0-4daf-654f-28546bd2c590.jpg"
        width="600"
      />
    </div>
  </div>
  @endsection




