<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Court;

class BookingController extends Controller
{
    /**
     * Menampilkan halaman booking dengan daftar court.
     */
    public function index()
{
    $courts = Court::all();
    $bookings = Booking::with('court')->orderBy('start_time')->get();
    return view('pages.booking', compact('courts', 'bookings'));
}



    /**
     * Menampilkan form booking.
     */
    public function form($court_id)
{
    $court = Court::findOrFail($court_id);
    return view('pages.form', compact('court'));

}


    /**
     * Menyimpan data booking dan mengarahkan ke halaman invoice.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            
            'court_id' => 'required|exists:courts,id',
            'customer_name' => 'required|string|max:255',
            'phone_number'  => 'required|string|max:15',
            'start_time'    => 'required|date',
            'end_time'      => 'required|date|after_or_equal:start_time',
            'price'         => 'required|numeric|min:0',
        ]);

        $validated['booking_code'] = 'BK-' . now()->format('Ymd') . '-' . strtoupper(substr(uniqid(), -4));
        $validated['status'] = 'Pending';

        $booking = Booking::create($validated);

        return redirect()->route('booking.invoice', ['id' => $booking->id]);
    }

    /**
     * Menampilkan halaman invoice berdasarkan ID booking.
     */
    public function invoice($id)
    {
        $booking = Booking::with('court')->findOrFail($id);
        return view('pages.invoice', compact('booking'));
    }

    /**
     * Upload bukti transfer dan redirect ke WhatsApp admin.
     */
    public function uploadBukti(Request $request, $id)
{
    $request->validate([
        'bukti_transfer' => 'required|image|max:2048',
    ]);

    $booking = Booking::findOrFail($id);

    $fileName = time() . '.' . $request->bukti_transfer->extension();
    $request->bukti_transfer->move(public_path('bukti'), $fileName);

    $link_bukti = asset('bukti/' . $fileName);
    $no_admin = '6285135689617';

    // SUSUN PESAN MULTILINE
    $message = "Halo Admin,\n"
             . "Saya telah melakukan pembayaran booking.\n"
             . "Kode Booking: {$booking->booking_code}\n"
             . "Nama: {$booking->customer_name}\n"
             . "Tanggal: " . \Carbon\Carbon::parse($booking->start_time)->format('d-m-Y') . "\n"
             . "Jam: " . \Carbon\Carbon::parse($booking->start_time)->format('H:i') . " - " . \Carbon\Carbon::parse($booking->end_time)->format('H:i') . "\n"
             . "Lapangan: " . ($booking->court->court_name ?? '-') . "\n"
             . "Bukti transfer: {$link_bukti}";

    // ENCODE SEMUA PESAN
    $link_wa = "https://wa.me/{$no_admin}?text=" . rawurlencode($message);

    return redirect($link_wa);
}


    /**
     * Hapus data booking.
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->back()->with('success', 'Booking berhasil dihapus.');
    }

    /**
     * (Opsional) Verifikasi booking oleh admin.
     */
    public function verify($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'Accepted';
        $booking->save();

        return redirect()->back()->with('success', 'Booking berhasil diverifikasi.');
    }

    /**
     * (Opsional) Menampilkan semua booking ke halaman admin.
     */
    public function adminView(Request $request)
{
    $query = Booking::query();

    // Filter pencarian berdasarkan Booking Code
    if ($request->filled('search')) {
        $query->where('booking_code', 'like', '%' . $request->search . '%');
    }

    // Filter status hanya jika status tidak kosong atau null
    if ($request->filled('status') && in_array($request->status, ['Pending', 'Accepted'])) {
        $query->where('status', $request->status);
    }

    // Ambil data dengan pagination (10 data per halaman)
    $bookings = $query->orderBy('start_time')->paginate(10);

    // Tetap menyertakan query string saat berpindah halaman
    return view('pages.book_data', compact('bookings'));
}

}
    