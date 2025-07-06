@extends('layout.app')

@section('title', 'About Us')

@section('content')
    <main class="flex flex-col md:flex-row">
        <div class="md:w-1/2">
            <img alt="Modern house with a pool and outdoor furniture" class="w-full h-auto object-cover rounded-lg" height="500"
                src="{{ asset('images/badmin.jpeg') }}"
                width="650" />
        </div>
        <div class="md:w-1/2 p-8 bg-gray-50">
            <h1 class="text-3xl font-bold mb-4">
                Discover our History
            </h1>
            <p class="mb-4">
                Welcome to Jaya Badminton Hall – Your premier destination for booking badminton courts effortlessly and efficiently. We are dedicated to providing a seamless and user-friendly experience for badminton enthusiasts, whether you're a beginner or a seasoned player, ensuring that your booking process is hassle-free and convenient.
            </p>
            <p>
                At Jaya Badminton Hall, we aim to become the most trusted platform for badminton court reservations. We strive to continuously grow and meet the needs of our users while fostering an active community that supports and promotes badminton.

Thank you for choosing Jaya Badminton Hall as your go-to place for all your badminton needs. We hope you enjoy your experience with us!
            </p>
        </div>
    </main>
@endsection
