@extends('layout.adm')

@section('title', 'Booking Data')

@section('content')
@if (session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif
<div class="flex-1 p-4 md:p-10 flex flex-col">
    <div class="flex justify-between items-center mb-6">
        <div class="mobile-menu">
            <button id="menu-button" class="text-gray-700 focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
        <div class="flex items-center ml-auto">
            <span class="mr-2 md:mr-4 text-gray-700 whitespace-nowrap">{{ Auth::user()->username }}</span>
            <div
                class="h-8 w-8 md:h-10 md:w-10 rounded-full flex items-center justify-center bg-gray-300 text-white font-bold">
                {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
            </div>
            <a class="ml-2 md:ml-4 text-gray-700 hover:text-blue-900" href="{{ route('logout') }}">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>

    <main class="flex-1 overflow-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 md:gap-0">
            <div>
                <h2 class="text-lg font-bold text-gray-900 uppercase">Booking Data</h2>
                <p class="text-xs text-gray-600 mt-1 max-w-xs md:max-w-none">
                    Here is a list of all Booking Data
                </p>
            </div>
            <a href="{{ route('add_booking') }} "
                class="bg-blue-600 text-white text-xs font-semibold px-4 py-2 rounded shadow hover:bg-blue-700 focus:outline-none whitespace-nowrap">
                Add Booking Data
            </a>
        </div>

        <!-- Filter Form -->
        <div class="mb-6">
            <form method="GET" action="{{ route('book_data') }}" class="flex flex-wrap gap-3" id="filterForm">
                <input type="text" name="search" value="{{ request('search') }}"
                    class="w-full sm:w-auto px-3 py-2 border rounded-md" placeholder="Search by Booking Code">

                <select name="status" class="w-full sm:w-auto px-3 py-2 border rounded-md">
                    <option value="">All Status</option>
                    <option value="Pending" {{ request('status')=='Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Accepted" {{ request('status')=='Accepted' ? 'selected' : '' }}>Accepted</option>
                </select>

                <button type="submit" class="w-full sm:w-auto bg-blue-600 text-white px-4 py-2 rounded">
                    Filter
                </button>
            </form>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto border border-gray-200 rounded-md shadow-sm">
            <table class="min-w-[800px] w-full text-xs text-left border-collapse">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="py-2 px-3 border-b">No</th>
                        <th class="py-2 px-3 border-b">Booking Code</th>
                        <th class="py-2 px-3 border-b">Name</th>
                        <th class="py-2 px-3 border-b">Phone Number</th>
                        <th class="py-2 px-3 border-b">Court</th>
                        <th class="py-2 px-3 border-b">Start Time</th>
                        <th class="py-2 px-3 border-b">End Time</th>
                        <th class="py-2 px-3 border-b">Duration</th>
                        <th class="py-2 px-3 border-b">Status</th>
                        <th class="py-2 px-3 border-b">Total Payment</th>
                        <th class="py-2 px-3 border-b">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-800">
                    @forelse($bookings as $booking)
                    <tr>
                        <td class="py-2 px-3 border-b">{{ $loop->iteration + ($bookings->currentPage() - 1) *
                            $bookings->perPage() }}</td>
                        <td class="py-2 px-3 border-b">{{ $booking->booking_code }}</td>
                        <td class="py-2 px-3 border-b">{{ $booking->customer_name }}</td>
                        <td class="py-2 px-3 border-b">{{ $booking->phone_number }}</td>
                        <td class="py-2 px-3 border-b">{{ $booking->court->court_name ?? '-' }}</td>
                        <td class="py-2 px-3 border-b">{{ \Carbon\Carbon::parse($booking->start_time)->format('d/m/Y |
                            H:i') }}</td>
                        <td class="py-2 px-3 border-b">{{ \Carbon\Carbon::parse($booking->end_time)->format('d/m/Y |
                            H:i') }}</td>
                        <td class="py-2 px-3 border-b">
                            @php
                            $startTime = \Carbon\Carbon::parse($booking->start_time);
                            $endTime = \Carbon\Carbon::parse($booking->end_time);
                            $duration = $startTime->diffInMinutes($endTime); // BENAR: urutan parameter diperbaiki
                            $hours = floor($duration / 60);
                            $minutes = $duration % 60;

                            if ($duration < 60) { echo $duration . ' menit' ; } elseif ($minutes==0) { echo $hours
                                . ' jam' ; } else { echo $hours . ' jam ' . $minutes . ' menit' ; } @endphp </td>
                        <td class="py-2 px-3 border-b">
                            <span
                                class="px-2 py-1 text-xs rounded-full
                                {{ $booking->status === 'Accepted' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $booking->status }}
                            </span>
                        </td>
                        <td class="py-2 px-3 border-b">Rp {{ number_format($booking->price ?? 0, 0, ',', '.') }}</td>
                        <td class="py-2 px-3 border-b">
                            <div class="flex flex-wrap gap-2">
                                <form method="POST" action="{{ route('admin.bookings.verify', $booking->id) }}">
                                    @csrf
                                    <button type="submit" class="text-green-600 hover:text-green-800"
                                        title="Verifikasi">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('booking.destroy', $booking->id) }}"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus booking ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                                <button class="copyButton text-blue-600 hover:text-blue-800" data-link="

🏸 *JAYA BADMINTON HALL* 🏸

Halo! Terima kasih telah melakukan pemesanan lapangan badminton di tempat kami.

📋 *INVOICE PEMESANAN ANDA*
Silakan klik link di bawah ini untuk melihat detail booking dan melakukan pembayaran:

🔗 {{ route('booking.invoice', ['id' => $booking->id]) }}?plain=1

📝 *PETUNJUK PEMBAYARAN*
• Klik link invoice di atas
• Lihat detail pemesanan Anda
• Ikuti instruksi pembayaran yang tertera
• Simpan bukti pembayaran

⚠️ *PENTING - SAAT CHECK IN*
Tunjukkan invoice ini kepada petugas kami saat melakukan Check In Lapangan.

❓ *BUTUH BANTUAN?*
Jika ada pertanyaan atau membutuhkan bantuan, jangan ragu untuk menghubungi kami.

Terima kasih dan selamat bermain! 🏸

*Admin Jaya Badminton Hall*" title="Salin Link Invoice">
                                    <i class="fas fa-link"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="11" class="text-center text-gray-500 py-4">No data found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $bookings->withQueryString()->links() }}
        </div>

        <!-- Export Buttons -->
        <div class="mt-6 flex flex-col sm:flex-row gap-4">
            <button id="downloadPdf"
                class="bg-purple-600 text-white text-xs font-semibold px-5 py-2 rounded shadow hover:bg-purple-700">
                <i class="fas fa-file-pdf mr-2"></i>Download PDF Report
            </button>
            <button id="downloadExcel"
                class="bg-purple-600 text-white text-xs font-semibold px-5 py-2 rounded shadow hover:bg-purple-700">
                <i class="fas fa-file-excel mr-2"></i>Download Excel Report
            </button>
        </div>
    </main>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.24/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

<script>
    // Function to get current filter parameters
    function getCurrentFilters() {
        const form = document.getElementById('filterForm');
        const formData = new FormData(form);
        const params = new URLSearchParams();

        for (let [key, value] of formData.entries()) {
            if (value.trim() !== '') {
                params.append(key, value);
            }
        }

        return params.toString();
    }

    // Function to fetch all booking data for export
    async function fetchAllBookingData() {
        try {
            const filterParams = getCurrentFilters();
            const url = `{{ route('book_data.export') }}?${filterParams}`;
            const response = await fetch(url);

            if (!response.ok) {
                throw new Error('Failed to fetch data');
            }

            return await response.json();
        } catch (error) {
            console.error('Error fetching booking data:', error);
            alert('Error fetching data. Please try again.');
            return null;
        }
    }

    // Function to download PDF
    document.getElementById('downloadPdf').addEventListener('click', async function () {
        // Show loading state
        const button = this;
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Generating PDF...';
        button.disabled = true;

        try {
            const response = await fetchAllBookingData();

            if (!response || !response.data || response.data.length === 0) {
                alert('No data available to export.');
                return;
            }

            const bookingData = response.data;
            const summary = response.summary;

            const { jsPDF } = window.jspdf;
            const doc = new jsPDF('landscape', 'pt', 'a4');

            // Add title
            doc.setFontSize(20);
            doc.setFont(undefined, 'bold');
            doc.text('BOOKING DATA REPORT', 50, 40);

            // Add company info
            doc.setFontSize(12);
            doc.setFont(undefined, 'normal');
            doc.text('Jaya Badminton Hall', 50, 60);

            // Add summary section
            doc.setFontSize(14);
            doc.setFont(undefined, 'bold');
            doc.text('SUMMARY REPORT', 50, 90);

            doc.setFontSize(10);
            doc.setFont(undefined, 'normal');
            let yPosition = 110;

            // Left column summary
            doc.text(`Export Date: ${summary.export_date}`, 50, yPosition);
            doc.text(`Filter Applied: ${summary.filter_search ? 'Search: ' + summary.filter_search : 'None'}, Status: ${summary.filter_status}`, 50, yPosition + 15);
            doc.text(`Total Bookings: ${summary.total_bookings}`, 50, yPosition + 30);
            doc.text(`Accepted Bookings: ${summary.accepted_bookings}`, 50, yPosition + 45);
            doc.text(`Pending Bookings: ${summary.pending_bookings}`, 50, yPosition + 60);

            // Right column summary
            doc.text(`Total Revenue: ${summary.total_revenue_formatted}`, 400, yPosition);
            doc.text(`Total Duration: ${summary.total_duration_formatted}`, 400, yPosition + 15);

            // Add line separator
            doc.setLineWidth(1);
            doc.line(50, yPosition + 80, 780, yPosition + 80);

            // Prepare table data
            const header = ['No', 'Booking Code', 'Name', 'Phone', 'Court', 'Start Time', 'End Time', 'Duration', 'Status', 'Payment'];
            const tableData = bookingData.map(booking => [
                booking.no,
                booking.booking_code,
                booking.customer_name,
                booking.phone_number,
                booking.court_name,
                booking.start_time,
                booking.end_time,
                booking.duration,
                booking.status,
                booking.total_payment
            ]);

            doc.autoTable({
                head: [header],
                body: tableData,
                startY: yPosition + 100,
                styles: {
                    fontSize: 8,
                    cellPadding: 3,
                    halign: 'center',
                    valign: 'middle',
                },
                headStyles: {
                    fillColor: [22, 163, 74],
                    textColor: [255, 255, 255],
                    fontSize: 9,
                    fontStyle: 'bold'
                },
                alternateRowStyles: {
                    fillColor: [245, 245, 245],
                },
                columnStyles: {
                    0: { cellWidth: 30 },
                    1: { cellWidth: 80 },
                    2: { cellWidth: 80 },
                    3: { cellWidth: 80 },
                    4: { cellWidth: 60 },
                    5: { cellWidth: 90 },
                    6: { cellWidth: 90 },
                    7: { cellWidth: 70 },
                    8: { cellWidth: 60 },
                    9: { cellWidth: 80 }
                },
                margin: { top: 40 },
                didDrawPage: function (data) {
                    // Add page numbers
                    doc.setFontSize(8);
                    doc.text('Page ' + doc.internal.getNumberOfPages(), data.settings.margin.left, doc.internal.pageSize.height - 10);
                }
            });

            // Add footer summary on last page
            const finalY = doc.lastAutoTable.finalY || yPosition + 100;
            doc.setFontSize(10);
            doc.setFont(undefined, 'bold');
            doc.text('FINANCIAL SUMMARY', 50, finalY + 30);

            doc.setFont(undefined, 'normal');
            doc.text(`Total Revenue from Accepted Bookings: ${summary.total_revenue_formatted}`, 50, finalY + 45);
            doc.text(`Total Court Time Booked: ${summary.total_duration_formatted}`, 50, finalY + 60);


            doc.save(`booking_report_${new Date().toISOString().split('T')[0]}.pdf`);

        } catch (error) {
            console.error('Error generating PDF:', error);
            alert('Error generating PDF. Please try again.');
        } finally {
            // Reset button state
            button.innerHTML = originalText;
            button.disabled = false;
        }
    });

    // Function to download Excel
    document.getElementById('downloadExcel').addEventListener('click', async function () {
        // Show loading state
        const button = this;
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Generating Excel...';
        button.disabled = true;

        try {
            const response = await fetchAllBookingData();

            if (!response || !response.data || response.data.length === 0) {
                alert('No data available to export.');
                return;
            }

            const bookingData = response.data;
            const summary = response.summary;

            // Create workbook
            const wb = XLSX.utils.book_new();

            // Summary Sheet
            const summaryData = [
                ['BOOKING DATA SUMMARY REPORT'],
                ['Jaya Badminton Hall'],
                [''],
                ['Export Information'],
                ['Export Date', summary.export_date],
                ['Filter Applied - Search', summary.filter_search || 'None'],
                ['Filter Applied - Status', summary.filter_status],
                [''],
                ['Booking Statistics'],
                ['Total Bookings', summary.total_bookings],
                ['Accepted Bookings', summary.accepted_bookings],
                ['Pending Bookings', summary.pending_bookings],
                [''],
                ['Financial Summary'],
                ['Total Revenue (Accepted)', summary.total_revenue_formatted],
                [''],
                ['Time Statistics'],
                ['Total Duration Booked', summary.total_duration_formatted],
                [''],
                ['Analysis'],
                ['Revenue per Hour', summary.total_duration > 0 ? 'Rp ' + Math.round(summary.total_revenue / (summary.total_duration / 60)).toLocaleString('id-ID') : 'N/A'],
                ['Booking Success Rate', summary.total_bookings > 0 ? Math.round((summary.accepted_bookings / summary.total_bookings) * 100) + '%' : 'N/A']
            ];

            const summaryWs = XLSX.utils.aoa_to_sheet(summaryData);
            XLSX.utils.book_append_sheet(wb, summaryWs, "Summary");

            // Detailed Data Sheet
            const detailedData = [
                ['DETAILED BOOKING DATA'],
                [''],
                ['No', 'Booking Code', 'Customer Name', 'Phone Number', 'Court Name', 'Start Time', 'End Time', 'Duration', 'Status', 'Total Payment']
            ];

            // Add booking data
            bookingData.forEach(booking => {
                detailedData.push([
                    booking.no,
                    booking.booking_code,
                    booking.customer_name,
                    booking.phone_number,
                    booking.court_name,
                    booking.start_time,
                    booking.end_time,
                    booking.duration,
                    booking.status,
                    booking.total_payment
                ]);
            });

            const detailedWs = XLSX.utils.aoa_to_sheet(detailedData);
            XLSX.utils.book_append_sheet(wb, detailedWs, "Detailed Data");

            // Revenue Analysis Sheet (Only Accepted Bookings)
            const revenueData = [
                ['REVENUE ANALYSIS'],
                [''],
                ['Date', 'Booking Code', 'Customer', 'Court', 'Duration', 'Revenue']
            ];

            bookingData.forEach(booking => {
                if (booking.status === 'Accepted') {
                    revenueData.push([
                        booking.start_time.split(' | ')[0], // Extract date
                        booking.booking_code,
                        booking.customer_name,
                        booking.court_name,
                        booking.duration,
                        booking.total_payment
                    ]);
                }
            });

            // Add totals
            revenueData.push(['']);
            revenueData.push(['TOTAL REVENUE', '', '', '', '', summary.total_revenue_formatted]);
            revenueData.push(['TOTAL ACCEPTED BOOKINGS', summary.accepted_bookings]);

            const revenueWs = XLSX.utils.aoa_to_sheet(revenueData);
            XLSX.utils.book_append_sheet(wb, revenueWs, "Revenue Analysis");

            XLSX.writeFile(wb, `booking_report_${new Date().toISOString().split('T')[0]}.xlsx`);

        } catch (error) {
            console.error('Error generating Excel:', error);
            alert('Error generating Excel. Please try again.');
        } finally {
            // Reset button state
            button.innerHTML = originalText;
            button.disabled = false;
        }
    });

    // Copy button functionality
    document.querySelectorAll('.copyButton').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const link = btn.getAttribute('data-link');
            navigator.clipboard.writeText(link);
            alert('Link berhasil disalin!');
        });
    });
</script>

@endsection