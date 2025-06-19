@extends('layout.adm')

@section('title', 'Schedule')


@section('content')

    <div class="flex-1 p-4 md:p-10 flex flex-col">
            <div class="flex justify-between items-center mb-6">
                <div class="mobile-menu">
                    <button id="menu-button" class="text-gray-700 focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
                <div class="flex items-center ml-auto">
                    <!-- Mengambil nama pengguna dari sesi -->
                <span class="mr-2 md:mr-4 text-gray-700 whitespace-nowrap">{{ Auth::user()->username }}</span>
                
                <!-- Menampilkan gambar avatar pengguna yang sedang login atau inisial sebagai fallback -->
                <div class="h-8 w-8 md:h-10 md:w-10 rounded-full flex items-center justify-center bg-gray-300 text-white font-bold">
                <!-- Menggunakan inisial huruf pertama sebagai fallback avatar -->
                {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
                </div>

                <!-- Tombol logout -->
                <a class="ml-2 md:ml-4 text-gray-700 hover:text-blue-900" href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                
                </div>
            </div>

            <!-- Content -->
            <main class="flex-1 overflow-auto">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 md:gap-0">
                    <div>
                        <h2 class="text-lg font-bold text-gray-900 uppercase">SCHEDULE DATA</h2>
                        <p class="text-xs text-gray-600 mt-1 max-w-xs md:max-w-none">
                            Here is all Booking Schedule
                        </p>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto mt-8">
                    <div class="bg-blue-600 text-white text-center py-4">
                        <h1 class="text-xl font-bold">BOOKING SCHEDULE</h1>
                    </div>
                    <div class="flex justify-between items-center mt-4 px-4">
                        <button id="prevMonth" class="bg-blue-200 rounded-full p-2">
                            <i class="fas fa-chevron-left text-blue-600"></i>
                        </button>
                        <h2 id="monthYear" class="text-xl font-bold"></h2>
                        <button id="nextMonth" class="bg-blue-200 rounded-full p-2">
                            <i class="fas fa-chevron-right text-blue-600"></i>
                        </button>
                    </div>
                    <div id="calendarBody" class="grid grid-cols-7 gap-2 mt-4 text-center text-sm">
                        <!-- Calendar will be rendered here by JavaScript -->
                    </div>
                </div>

            </main>
        </div>

        <script>

            document.addEventListener('DOMContentLoaded', function () {
                const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                const dayNames = ["SUN", "MON", "TUE", "WED", "THUR", "FRI", "SAT"];
                let currentDate = new Date();

                function renderCalendar() {
                    const month = currentDate.getMonth();
                    const year = currentDate.getFullYear();
                    const firstDay = new Date(year, month, 1).getDay();
                    const lastDate = new Date(year, month + 1, 0).getDate();

                    document.getElementById('monthYear').innerText = `${monthNames[month]}, ${year}`;
                    const calendarBody = document.getElementById('calendarBody');
                    calendarBody.innerHTML = '';

                    for (let i = 0; i < dayNames.length; i++) {
                        const dayCell = document.createElement('div');
                        dayCell.className = 'font-bold';
                        dayCell.innerText = dayNames[i];
                        calendarBody.appendChild(dayCell);
                    }

                    for (let i = 0; i < firstDay; i++) {
                        const emptyCell = document.createElement('div');
                        emptyCell.className = 'bg-gray-200 py-4';
                        calendarBody.appendChild(emptyCell);
                    }

                    for (let i = 1; i <= lastDate; i++) {
                        const dateCell = document.createElement('div');
                        dateCell.className = 'bg-gray-100 py-4';
                        dateCell.innerHTML = `${i}<br>
                            <button class="mt-2 bg-blue-500 text-white text-xs px-2 py-1 rounded" onclick="addSession(this)">Add Session</button>
                            <div class="sessions mt-2"></div>`;
                        calendarBody.appendChild(dateCell);
                    }
                }

                window.addSession = function (button) {
                    const sessionContainer = button.nextElementSibling;
                    const sessionForm = document.createElement('form');
                    sessionForm.className = 'mt-2';
                    sessionForm.innerHTML = `
                        <input type="time" class="border rounded p-1 text-xs w-full" placeholder="Start Time">
                        <input type="time" class="border rounded p-1 text-xs w-full mt-1" placeholder="End Time">
                        <button type="button" class="mt-1 bg-red-500 text-white text-xs px-2 py-1 rounded" onclick="removeSession(this)">Remove</button>
                    `;
                    sessionContainer.appendChild(sessionForm);
                }

                window.removeSession = function (button) {
                    button.parentElement.remove();
                }

                document.getElementById('prevMonth').addEventListener('click', function () {
                    currentDate.setMonth(currentDate.getMonth() - 1);
                    renderCalendar();
                });

                document.getElementById('nextMonth').addEventListener('click', function () {
                    currentDate.setMonth(currentDate.getMonth() + 1);
                    renderCalendar();
                });

                renderCalendar();
            });
        </script>

@endsection


