<div class="w-full md:w-64 bg-white shadow-md sidebar">
    <div class="flex items-center justify-center h-16 border-b">
        <img alt="Logo" class="h-10 w-10 rounded-full" src="https://img.freepik.com/premium-vector/vector-flat-badminton-logo-design_1107171-444.jpg?w=360" />
        <span class="ml-2 text-lg font-semibold hidden md:block">Admin Jaya Badminton Hall</span>
    </div>

    <nav class="mt-10">
        <a href="{{ url('dash') }}"
           class="flex items-center py-2 px-8 {{ Request::is('dash') ? 'text-blue-700' : 'text-gray-700 hover:bg-gray-200' }}">
            <i class="fas fa-tachometer-alt mr-3"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ url('court') }}"
           class="flex items-center py-2 px-8 {{ Request::is('court') ? 'text-blue-700' : 'text-gray-700 hover:bg-gray-200' }}">
            <i class="fas fa-table-tennis mr-3"></i>
            <span>Court</span>
        </a>

        <a href="{{ url('book_data') }}"
           class="flex items-center py-2 px-8 {{ Request::is('book_data') ? 'text-blue-700' : 'text-gray-700 hover:bg-gray-200' }}">
            <i class="fas fa-list-alt mr-3"></i>
            <span>Booking Data</span>
        </a>

        <a href="{{ url('schedule') }}"
           class="flex items-center py-2 px-8 {{ Request::is('schedule') ? 'text-blue-700' : 'text-gray-700 hover:bg-gray-200' }}">
            <i class="fas fa-calendar-alt mr-3"></i>
            <span>Schedule</span>
        </a>
    </nav>
</div>

<div id="mobile-menu" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden" role="dialog" aria-modal="true">
    <div class="flex flex-col items-center justify-center h-full space-y-6" tabindex="-1">
        <a href="{{ url('dash') }}"
           class="flex items-center py-2 px-8 text-white rounded {{ Request::is('dash') ?  : 'hover:bg-gray-700' }}">
            <i class="fas fa-tachometer-alt mr-3"></i>
            <span>Dashboard</span>
        </a>
        <a href="{{ url('court') }}"
           class="flex items-center py-2 px-8 text-white rounded {{ Request::is('court') ?  : 'hover:bg-gray-700' }}">
            <i class="fas fa-table-tennis mr-3"></i>
            <span>Court</span>
        </a>
        <a href="{{ url('book_data') }}"
           class="flex items-center py-2 px-8 text-white rounded {{ Request::is('book_data') ?  : 'hover:bg-gray-700' }}">
            <i class="fas fa-list-alt mr-3"></i>
            <span>Booking Data</span>
        </a>
        <a href="{{ url('schedule') }}"
           class="flex items-center py-2 px-8 text-white rounded {{ Request::is('schedule') ?  : 'hover:bg-gray-700' }}">
            <i class="fas fa-calendar-alt mr-3"></i>
            <span>Schedule</span>
        </a>
        <button id="close-menu" class="mt-4 text-white focus:outline-none" aria-label="Close menu">
            <i class="fas fa-times text-2xl"></i>
        </button>
    </div>
</div>

