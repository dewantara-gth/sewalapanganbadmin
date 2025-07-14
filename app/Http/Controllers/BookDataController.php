<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class BookDataController extends Controller
{
    public function index(Request $request)
    {
        // Ambil query pencarian dan filter dari input
        $search = $request->input('search');
        $status = $request->input('status');
        
        // Query builder untuk booking dengan relasi court
        $query = Booking::with('court');
        
        // Filter berdasarkan pencarian booking_code
        if ($search) {
            $query->where('booking_code', 'LIKE', '%' . $search . '%');
        }
        
        // Filter berdasarkan status
        if ($status) {
            $query->where('status', $status);
        }
        
        // Gunakan pagination untuk tampilan - DIPERBAIKI: ubah ke ASC agar konsisten dengan keinginan
        $bookings = $query->orderBy('created_at', 'asc')->paginate(10);

        return view('pages.book_data', compact('bookings', 'search', 'status'));
    }

    // Method baru untuk export - mengembalikan semua data dalam format JSON
    public function getAllBookingsForExport(Request $request)
    {
        // Ambil query pencarian dan filter dari input (sama seperti di index)
        $search = $request->input('search');
        $status = $request->input('status');
        
        // Query builder untuk booking dengan relasi court
        $query = Booking::with('court');
        
        // Filter berdasarkan pencarian booking_code
        if ($search) {
            $query->where('booking_code', 'LIKE', '%' . $search . '%');
        }
        
        // Filter berdasarkan status
        if ($status) {
            $query->where('status', $status);
        }
        
        // Ambil SEMUA data tanpa pagination - DIPERBAIKI: ubah ke ASC agar konsisten dengan view
        $bookings = $query->orderBy('created_at', 'asc')->get();
        
        // Inisialisasi variabel untuk summary
        $totalRevenue = 0;
        $totalDuration = 0; // dalam menit
        $totalBookings = $bookings->count();
        $acceptedBookings = 0;
        $pendingBookings = 0;
        
        // Format data untuk export
        $exportData = [];
        foreach ($bookings as $index => $booking) {
            // Hitung durasi booking dalam menit - PERBAIKAN: urutan parameter diperbaiki
            $startTime = Carbon::parse($booking->start_time);
            $endTime = Carbon::parse($booking->end_time);
            $duration = $startTime->diffInMinutes($endTime); // BENAR: start_time ke end_time
            
            // Tambahkan ke total
            $totalDuration += $duration;
            
            // Hitung revenue hanya untuk booking yang Accepted
            if ($booking->status === 'Accepted') {
                $totalRevenue += $booking->price ?? 0;
                $acceptedBookings++;
            } elseif ($booking->status === 'Pending') {
                $pendingBookings++;
            }
            
            $exportData[] = [
                'no' => $index + 1,
                'booking_code' => $booking->booking_code,
                'customer_name' => $booking->customer_name,
                'phone_number' => $booking->phone_number,
                'court_name' => $booking->court->court_name ?? '-',
                'start_time' => $startTime->format('d/m/Y | H:i'),
                'end_time' => $endTime->format('d/m/Y | H:i'),
                'duration' => $this->formatDuration($duration),
                'status' => $booking->status,
                'total_payment' => 'Rp ' . number_format($booking->price ?? 0, 0, ',', '.'),
                'raw_price' => $booking->price ?? 0,
                'raw_duration' => $duration
            ];
        }
        
        // Hitung rata-rata durasi booking
        $averageDuration = $totalBookings > 0 ? $totalDuration / $totalBookings : 0;
        
        // Hitung rata-rata revenue per booking
        $averageRevenue = $acceptedBookings > 0 ? $totalRevenue / $acceptedBookings : 0;
        
        // Konversi total durasi ke format yang lebih readable
        $totalDurationFormatted = $this->formatTotalDuration($totalDuration);
        
        // Data summary
        $summary = [
            'total_bookings' => $totalBookings,
            'accepted_bookings' => $acceptedBookings,
            'pending_bookings' => $pendingBookings,
            'total_revenue' => $totalRevenue,
            'total_revenue_formatted' => 'Rp ' . number_format($totalRevenue, 0, ',', '.'),
            'total_duration' => $totalDuration,
            'total_duration_formatted' => $totalDurationFormatted,
            'export_date' => Carbon::now()->format('d/m/Y H:i:s'),
            'filter_search' => $search ?? '',
            'filter_status' => $status ?? 'All'
        ];
        
        return response()->json([
            'data' => $exportData,
            'summary' => $summary
        ]);
    }
    
    // Helper function untuk format durasi - PERBAIKAN: tambahkan validasi untuk nilai negatif
    private function formatDuration($minutes)
    {
        // Pastikan durasi tidak negatif
        $minutes = abs($minutes);
        
        if ($minutes < 60) {
            return $minutes . ' menit';
        }
        
        $hours = floor($minutes / 60);
        $remainingMinutes = $minutes % 60;
        
        if ($remainingMinutes == 0) {
            return $hours . ' jam';
        }
        
        return $hours . ' jam ' . $remainingMinutes . ' menit';
    }
    
    // Helper function untuk format total durasi - PERBAIKAN: hanya gunakan format jam, tidak konversi ke hari
    private function formatTotalDuration($totalMinutes)
    {
        // Pastikan durasi tidak negatif
        $totalMinutes = abs($totalMinutes);
        
        if ($totalMinutes < 60) {
            return $totalMinutes . ' menit';
        }
        
        $hours = floor($totalMinutes / 60);
        $remainingMinutes = $totalMinutes % 60;
        
        if ($remainingMinutes == 0) {
            return $hours . ' jam';
        }
        
        return $hours . ' jam ' . $remainingMinutes . ' menit';
    }
}