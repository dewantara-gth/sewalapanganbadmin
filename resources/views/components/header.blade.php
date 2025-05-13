<nav class="flex items-center justify-between p-4 border-b bg-white shadow-sm">
    <div class="flex items-center space-x-2">
        <img alt="Jaya Badminton Hall Logo" class="h-8" height="50"
            src="https://img.freepik.com/premium-vector/vector-flat-badminton-logo-design_1107171-444.jpg?w=360"
            width="45" />
        <span class="font-bold text-lg">JAYA BADMINTON HALL</span>
    </div>

    <div class="hidden md:flex space-x-6">
        <a href="{{ url('/') }}"
           class="{{ Request::is('home') ? 'text-green-600 border-b-2 border-green-600' : 'hover:text-green-600' }}">
            Home
        </a>
        <a href="{{ url('about') }}"
           class="{{ Request::is('about') ? 'text-green-600 border-b-2 border-green-600' : 'hover:text-green-600' }}">
            About Us
        </a>
        <a href="{{ url('booking') }}"
           class="{{ Request::is('booking') ? 'text-green-600 border-b-2 border-green-600' : 'hover:text-green-600' }}">
            Booking Now
        </a>
        <a href="{{ url('contact') }}"
           class="{{ Request::is('contact') ? 'text-green-600 border-b-2 border-green-600' : 'hover:text-green-600' }}">
            Contact Us
        </a>
    </div>

    <div class="hidden md:flex space-x-4">
        <a class="hover:text-green-600" href="#"><i class="fab fa-facebook-f"></i></a>
        <a class="hover:text-green-600" href="#"><i class="fab fa-instagram"></i></a>
    </div>

    <div class="md:hidden">
        <button id="menu-button" class="text-green-600 focus:outline-none">
            <i class="fas fa-bars text-2xl"></i>
        </button>
    </div>
</nav>

<div id="mobile-menu" class="hidden md:hidden bg-white shadow-md z-50">
    <a class="block px-4 py-2 {{ Request::is('home') ? 'text-green-600 border-b-2 border-green-600' : 'hover:text-green-600' }}"
       href="{{ url('home') }}">
        Home
    </a>
    <a class="block px-4 py-2 {{ Request::is('about') ? 'text-green-600 border-b-2 border-green-600' : 'hover:text-green-600' }}"
       href="{{ url('about') }}">
        About Us
    </a>
    <a class="block px-4 py-2 {{ Request::is('booking') ? 'text-green-600 border-b-2 border-green-600' : 'hover:text-green-600' }}"
       href="{{ url('booking') }}">
        Booking Now
    </a>
    <a class="block px-4 py-2 {{ Request::is('contact') ? 'text-green-600 border-b-2 border-green-600' : 'hover:text-green-600' }}"
       href="{{ url('contact') }}">
        Contact Us
    </a>

    <div class="flex justify-center space-x-4 py-2">
        <a class="hover:text-green-600" href="#"><i class="fab fa-facebook-f"></i></a>
        <a class="hover:text-green-600" href="#"><i class="fab fa-instagram"></i></a>
    </div>
</div>
