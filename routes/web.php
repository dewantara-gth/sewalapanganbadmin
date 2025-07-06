    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\CourtController;
    use App\Http\Controllers\BookDataController;
    use App\Http\Controllers\ScheduleController;
    use App\Http\Controllers\AddCourtController;
    use App\Http\Controllers\AddBookingController;
    use App\Http\Controllers\BookingController;
    use App\Http\Controllers\ContactController;




    // Route::get('/', function () {
    //     return view('welcome');
    // });

    Route::get('/admin/booking', [AddBookingController::class, 'index'])->name('admin.booking.index');
    Route::post('/admin/booking/add', [AddBookingController::class, 'store'])->name('admin.booking.store');



      // Home

      Route::get('/', function () {
        return view('pages.home');
    });

    // About Us

      Route::get('about', function () {
        return view('pages.about');
    });

    // Booking Now

      // Hapus route closure di atas, gunakan ini
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');


    // Contact Us

      Route::get('contact', function () {
        return view('pages.contact');
    });

      Route::post('contact', [ContactController::class, 'submit'])->name('contact.submit');

    // Dashboard Admin

    Route::get('/dash', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

    // Court Admin

      Route::get('court', function () {
        return view('pages.court');
    });

    // Booking Data
    Route::get('/admin/bookings', [BookingController::class, 'adminView'])->name('admin.bookings');
    Route::post('/admin/bookings/{id}/verify', [BookingController::class, 'verify'])->name('admin.bookings.verify');
    Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');

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
    Route::get('/courts', [CourtController::class, 'index']);
    Route::get('/courts/create', [CourtController::class, 'create']);
    Route::post('/courts/store', [CourtController::class, 'store']);
    Route::get('/courts/edit/{id}', [CourtController::class, 'edit']);
    Route::put('/courts/update/{id}', [CourtController::class, 'update']);
    Route::delete('/courts/delete/{id}', [CourtController::class, 'destroy']);

    Route::get('/book_data', [BookingController::class, 'adminView'])->middleware('auth')->name('book_data');

    Route::get('/schedule', [ScheduleController::class, 'index'])->middleware('auth')->name('schedule');

    Route::get('/addcourt', [AddCourtController::class, 'index'])->middleware('auth')->name('addcourt');

    Route::get('/add_booking', [AddBookingController::class, 'index'])->middleware('auth')->name('add_booking');

    Route::get('/booking', [BookingController::class, 'index']);

    Route::get('/booking/form/{court_id}', [BookingController::class, 'form'])->name('booking.form');
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/invoice/{id}', [BookingController::class, 'invoice'])->name('booking.invoice');
    Route::post('/booking/upload/{id}', [BookingController::class, 'uploadBukti'])->name('upload.bukti');

    Route::get('/booking/invoice/{id}', [BookingController::class, 'invoice'])->name('booking.invoice');


