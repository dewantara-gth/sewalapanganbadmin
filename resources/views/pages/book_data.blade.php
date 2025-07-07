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
            <div class="h-8 w-8 md:h-10 md:w-10 rounded-full flex items-center justify-center bg-gray-300 text-white font-bold">
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
            <form method="GET" action="{{ route('book_data') }}" class="flex flex-wrap gap-3">
                <input type="text" name="search" value="{{ request('search') }}"
                    class="w-full sm:w-auto px-3 py-2 border rounded-md"
                    placeholder="Search by Booking Code">

                <select name="status" class="w-full sm:w-auto px-3 py-2 border rounded-md">
                    <option value="">All Status</option>
                    <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Accepted" {{ request('status') == 'Accepted' ? 'selected' : '' }}>Accepted</option>
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
                        <th class="py-2 px-3 border-b">Status</th>
                        <th class="py-2 px-3 border-b">Total Payment</th>
                        <th class="py-2 px-3 border-b">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-800">
                    @forelse($bookings as $booking)
                    <tr>
                        <td class="py-2 px-3 border-b">{{ $loop->iteration + ($bookings->currentPage() - 1) * $bookings->perPage() }}</td>
                        <td class="py-2 px-3 border-b">{{ $booking->booking_code }}</td>
                        <td class="py-2 px-3 border-b">{{ $booking->customer_name }}</td>
                        <td class="py-2 px-3 border-b">{{ $booking->phone_number }}</td>
                        <td class="py-2 px-3 border-b">{{ $booking->court->court_name ?? '-' }}</td>
                        <td class="py-2 px-3 border-b">{{ \Carbon\Carbon::parse($booking->start_time)->format('d/m/Y | H:i') }}</td>
                        <td class="py-2 px-3 border-b">{{ \Carbon\Carbon::parse($booking->end_time)->format('d/m/Y | H:i') }}</td>
                        <td class="py-2 px-3 border-b">{{ $booking->status }}</td>
                        <td class="py-2 px-3 border-b">Rp {{ number_format($booking->price ?? 0, 0, ',', '.') }}</td>
                        <td class="py-2 px-3 border-b">
                            <div class="flex flex-wrap gap-2">
                                <form method="POST" action="{{ route('admin.bookings.verify', $booking->id) }}">
                                    @csrf
                                    <button type="submit" class="text-green-600 hover:text-green-800" title="Verifikasi">
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

                                <a href="{{ route('booking.invoice', ['id' => $booking->id]) }}?plain=1" class="text-blue-600 hover:text-blue-800" title="Invoice" >
                                    <i class="fas fa-file-invoice"></i>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center text-gray-500 py-4">No data found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Modal Overlay & Container -->
        <div id="invoiceModal" class="fixed inset-0 z-50 hidden bg-black/60 flex items-center justify-center">
            <div class="bg-white rounded-xl shadow-xl max-w-2xl w-full relative">
                <!-- Tombol Close -->
                <button onclick="closeInvoiceModal()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-700 text-2xl font-bold">&times;</button>
                <!-- Loader & Konten Invoice -->
                <div id="invoiceModalBody" class="p-6 min-h-[200px] flex items-center justify-center">
                    <span class="text-gray-400">Memuat...</span>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $bookings->withQueryString()->links() }}
        </div>

        <!-- Export Buttons -->
        <div class="mt-6 flex flex-col sm:flex-row gap-4">
            <a href="#" id="downloadPdf" class="bg-purple-600 text-white text-xs font-semibold px-5 py-2 rounded shadow hover:bg-purple-700">
                Download PDF
            </a>
            <a href="#" id="downloadExcel" class="bg-purple-600 text-white text-xs font-semibold px-5 py-2 rounded shadow hover:bg-purple-700">
                Download Excel
            </a>
        </div>
    </main>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.24/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

<script>
    // Function to download PDF
    document.getElementById('downloadPdf').addEventListener('click', function () {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        doc.text('Booking Data Report', 10, 10);
        
        const tableData = [];
        const header = ['Booking Code', 'Name', 'Phone Number', 'Court', 'Start Time', 'End Time', 'Status', 'Total Payment'];
        const rows = document.querySelectorAll('table tbody tr');
        
        rows.forEach(row => {
            const rowData = [];
            const cells = row.querySelectorAll('td');
            cells.forEach(cell => {
                rowData.push(cell.innerText);
            });
            tableData.push(rowData);
        });

        doc.autoTable({
            head: [header],
            body: tableData,
            startY: 20,
            styles: {
                fontSize: 6,
                cellPadding: 5,
                halign: 'center',
                valign: 'middle',
            },
            headStyles: {
                fillColor: [0, 0, 0],
                textColor: [255, 255, 255],
            },
            alternateRowStyles: {
                fillColor: [240, 240, 240],
            },
            margin: { top: 30 },
        });

        doc.save('booking_data.pdf');
    });

    // Function to download Excel
    document.getElementById('downloadExcel').addEventListener('click', function () {
        const data = [];
        const table = document.querySelector('table');
        const rows = table.querySelectorAll('tr');

        rows.forEach((row) => {
            const rowData = [];
            const cells = row.querySelectorAll('td, th');
            cells.forEach(cell => {
                rowData.push(cell.innerText);
            });
            data.push(rowData);
        });

        const ws = XLSX.utils.aoa_to_sheet(data);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Booking Data");

        XLSX.writeFile(wb, 'booking_data.xlsx');
    });
</script>

@endsection
