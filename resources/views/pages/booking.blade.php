@extends('layout.app')

@section('title', 'Booking')


@section('content')

    <main class="p-4 max-w-7xl mx-auto">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    {{-- Replace static cards with dynamic loop --}}
    @foreach($courts as $court)
    <div class="border rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
        <img alt="Court image"
            class="w-full h-48 object-cover"
            src="{{ asset('uploads/' . $court->picture) }}" />
        <div class="p-4">
            <h2 class="text-lg font-bold">
                {{ $court->court_name }}
            </h2>
            <p class="text-green-600 text-xl font-bold">
                {{ $court->price }}
                <span class="text-gray-600 text-sm">
                    /2 Hours
                </span>
            </p>
           <a href="{{ route('form', ['court_id' => $court->id]) }}"
            class="mt-3 block w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded text-center transition">
            Book Now
            </a>
        </div>
    </div>
    @endforeach
</div>


        <section class="max-w-4xl mx-auto mt-12">
            <div class="bg-green-600 text-white text-center py-4 rounded-t">
                <h1 class="text-xl font-bold tracking-wide">
                    BOOKING SCHEDULE
                </h1>
            </div>
            <div class="flex justify-between items-center mt-4 px-4">
                <button aria-label="Previous month" class="bg-green-200 rounded-full p-2 hover:bg-green-300 transition"
                    id="prevMonth">
                    <i class="fas fa-chevron-left text-green-600">
                    </i>
                </button>
                <h2 class="text-xl font-bold" id="monthYear">
                </h2>
                <button aria-label="Next month" class="bg-green-200 rounded-full p-2 hover:bg-green-300 transition"
                    id="nextMonth">
                    <i class="fas fa-chevron-right text-green-600">
                    </i>
                </button>
            </div>
            <div class="grid grid-cols-7 gap-2 mt-4 text-center text-sm select-none" id="calendarBody">
                <!-- Calendar rendered by JS -->
            </div>
        </section>
    </main>

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            const dayNames = ["SUN", "MON", "TUE", "WED", "THUR", "FRI", "SAT"];
            let currentDate = new Date();

            function renderCalendar() {
                const month = currentDate.getMonth();
                const year = currentDate.getFullYear();

                // Get first day of month (0=Sunday, 1=Monday,...)
                let firstDay = new Date(year, month, 1).getDay();

                const lastDate = new Date(year, month + 1, 0).getDate();

                document.getElementById('monthYear').innerText = `${monthNames[month]}, ${year}`;
                const calendarBody = document.getElementById('calendarBody');
                calendarBody.innerHTML = '';

                // Render day names header
                for (let i = 0; i < dayNames.length; i++) {
                    const dayCell = document.createElement('div');
                    dayCell.className = 'font-bold text-green-700';
                    dayCell.innerText = dayNames[i];
                    calendarBody.appendChild(dayCell);
                }

                // Empty cells before first day
                for (let i = 0; i < firstDay; i++) {
                    const emptyCell = document.createElement('div');
                    emptyCell.className = 'bg-gray-200 py-4 rounded';
                    calendarBody.appendChild(emptyCell);
                }

                // Render days with example sessions
                for (let i = 1; i <= lastDate; i++) {
                    const dateCell = document.createElement('div');
                    dateCell.className = 'bg-gray-100 py-4 rounded flex flex-col items-center justify-start text-gray-800';

                    // Highlight today
                    const today = new Date();
                    if (i === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                        dateCell.classList.add('bg-green-100', 'font-semibold');
                    }

                    const dateNumber = document.createElement('div');
                    dateNumber.innerText = i;
                    dateNumber.className = 'text-base mb-2';
                    dateCell.appendChild(dateNumber);

                    const sessions = document.createElement('div');
                    sessions.className = 'w-full flex flex-col space-y-1';

                    // Example sessions - can be replaced with real data
                    const sessionTimes = [
                        "08:00 - 09:00",
                        "10:00 - 11:00",
                        "14:00 - 15:00",
                        "16:00 - 17:00"
                    ];

                    sessionTimes.forEach(time => {
                        const sessionDiv = document.createElement('div');
                        sessionDiv.className = 'border border-green-600 rounded px-1 text-xs text-green-700 bg-green-50';
                        sessionDiv.innerText = time;
                        sessions.appendChild(sessionDiv);
                    });

                    dateCell.appendChild(sessions);
                    calendarBody.appendChild(dateCell);
                }
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