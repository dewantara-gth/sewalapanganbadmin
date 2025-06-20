<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\BookDataController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AddCourtController;
use App\Http\Controllers\AddBookingController;




// Route::get('/', function () {
//     return view('welcome');
// });


  // Home

  Route::get('/', function () {
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

Route::get('/dash', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

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

/// Auth - Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

// Auth - Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');


// Dashboard setelah login
Route::get('/dash', function () {
    return view('pages.dash');
});

// Form Booking

Route::get('form', function () {
    return view('pages.form');
})->name('form');

// Add Court

  Route::get('addcourt', function () {
    return view('pages.addcourt');
})->name('addcourt');

// Add Booking

Route::get('add_booking', function () {
  return view('pages.add_booking');
})->name('add_booking');


// Logout

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dash', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/court', [CourtController::class, 'index'])->middleware('auth')->name('court');

Route::get('/book_data', [BookDataController::class, 'index'])->middleware('auth')->name('book_data');

Route::get('/schedule', [ScheduleController::class, 'index'])->middleware('auth')->name('schedule');

Route::get('/addcourt', [AddCourtController::class, 'index'])->middleware('auth')->name('addcourt');

Route::get('/add_booking', [AddBookingController::class, 'index'])->middleware('auth')->name('add_booking');