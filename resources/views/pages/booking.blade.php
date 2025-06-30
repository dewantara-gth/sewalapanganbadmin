@extends('layout.app')

@section('title', 'Booking')

@section('content')
<main class="p-4 max-w-7xl mx-auto">
  <!-- Card Court -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($courts as $court)
    <div class="border rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
      <img alt="Court image" class="w-full h-48 object-cover" src="{{ asset('uploads/' . $court->picture) }}" />
      <div class="p-4">
        <h2 class="text-lg font-bold">{{ $court->court_name }}</h2>
        <p class="text-green-600 text-xl font-bold">
          {{ $court->price }}
          <span class="text-gray-600 text-sm">/2 Hours</span>
        </p>
        <a href="{{ route('form', ['court_id' => $court->id]) }}"
          class="mt-3 block w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded text-center transition">
          Book Now
        </a>
      </div>
    </div>
    @endforeach
  </div>

  <!-- Schedule Section -->
  <section class="max-w-4xl mx-auto mt-12">
    <div class="max-w-5xl mx-auto p-4">
      <h1 class="bg-green-600 text-white font-bold text-center py-3 rounded-md select-none">BOOKING SCHEDULE</h1>
      <div class="flex items-center justify-between mt-4">
        <button id="prevDayBtn" class="bg-green-100 text-green-600 rounded-full p-2 flex items-center justify-center cursor-pointer select-none">
          <i class="fas fa-chevron-left"></i>
        </button>
        <div id="currentDayLabel" class="font-semibold text-gray-700 select-none text-center flex-1"></div>
        <button id="nextDayBtn" class="bg-green-100 text-green-600 rounded-full p-2 flex items-center justify-center cursor-pointer select-none">
          <i class="fas fa-chevron-right"></i>
        </button>
      </div>
      <div class="mt-6 bg-gray-100 rounded-md p-4 select-none w-full overflow-x-auto">
        <div class="text-center mb-4">
          <div id="dayNumber" class="text-gray-700 font-semibold text-lg"></div>
          <div id="dayName" class="text-green-700 font-bold text-sm"></div>
        </div>
        <div id="courtsContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
          <!-- Courts will be rendered here -->
        </div>
      </div>
    </div>
  </section>
</main>

<script>
  const dayNames = ["SUN", "MON", "TUE", "WED", "THUR", "FRI", "SAT"];

  let currentDate = new Date();
  const dayNumberEl = document.getElementById("dayNumber");
  const dayNameEl = document.getElementById("dayName");
  const currentDayLabelEl = document.getElementById("currentDayLabel");
  const courtsContainer = document.getElementById("courtsContainer");

  function formatDate(date) {
    const options = { year: "numeric", month: "short", day: "numeric" };
    return date.toLocaleDateString("en-US", options);
  }

  function renderDay(date) {
    const day = date.getDate();
    const dayOfWeek = date.getDay();
    const dayName = dayNames[dayOfWeek];

    dayNumberEl.textContent = day;
    dayNameEl.textContent = dayName;
    currentDayLabelEl.textContent = formatDate(date);

    courtsContainer.innerHTML = "";

    // Data courts & bookings dari server
    const courts = @json($courts);
    const bookings = @json($bookings);
    const currentDateStr = date.toISOString().split('T')[0];

    courts.forEach(court => {
      const courtDiv = document.createElement("div");
      courtDiv.className = "bg-white rounded border border-green-400 p-3 flex flex-col";

      // Court title
      const courtTitle = document.createElement("div");
      courtTitle.className = "font-bold text-green-700 mb-2 text-center";
      courtTitle.textContent = court.court_name;
      courtDiv.appendChild(courtTitle);

      // Filter booking untuk court saat ini dan hari yang dipilih
      // PERHATIKAN: field 'court' di bookings HARUS SAMA dengan 'court_name' di courts!
      const courtBookings = bookings.filter(booking => 
        booking.court === court.court_name &&
        new Date(booking.start_time).toISOString().split('T')[0] === currentDateStr
      );

      if (courtBookings.length === 0) {
        const emptySlot = document.createElement("div");
        emptySlot.className = "border border-green-400 rounded text-gray-400 text-[9px] leading-3 py-1 mb-1 text-center";
        emptySlot.textContent = "No booking today";
        courtDiv.appendChild(emptySlot);
      } else {
        courtBookings.forEach(booking => {
          const timeSlot = document.createElement("div");
          timeSlot.className = "border border-green-400 rounded bg-green-50 text-green-600 text-[9px] leading-3 py-1 mb-1 text-center";
          // Format jam: H:i
          const start = new Date(booking.start_time).toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
          const end = new Date(booking.end_time).toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
          timeSlot.textContent = `${start} - ${end}`;
          courtDiv.appendChild(timeSlot);
        });
      }

      courtsContainer.appendChild(courtDiv);
    });
  }

  renderDay(currentDate);

  document.getElementById("prevDayBtn").addEventListener("click", () => {
    currentDate.setDate(currentDate.getDate() - 1);
    renderDay(currentDate);
  });

  document.getElementById("nextDayBtn").addEventListener("click", () => {
    currentDate.setDate(currentDate.getDate() + 1);
    renderDay(currentDate);
  });
</script>
@endsection
