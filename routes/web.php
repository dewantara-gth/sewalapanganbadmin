<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


  // Home

  Route::get('home', function () {
    return view('pages.home');
});

// About Us

  Route::get('about', function () {
    return view('pages.about');
});

// Booking Now

  Route::get('booking', function () {
    return view('pages.booking');
});

// Contact Us

  Route::get('contact', function () {
    return view('pages.contact');
});

// Dashboard Admin

  Route::get('dash', function () {
    return view('pages.dash');
});

// Court Admin

  Route::get('court', function () {
    return view('pages.court');
});

// Booking Data

  Route::get('book_data', function () {
    return view('pages.book_data');
});

// Schedule

  Route::get('schedule', function () {
    return view('pages.schedule');
});