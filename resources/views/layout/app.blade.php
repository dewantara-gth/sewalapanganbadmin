<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>

    {{-- Tailwind CSS & fonts  --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>


    {{-- Tambahan favicon dan meta --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <meta name="description" content="@yield('meta_description', 'Aplikasi Laravel')">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        /* Custom styles for the mobile menu */
        .mobile-menu {
            display: none;
        }
        @media (max-width: 768px) {
            .mobile-menu {
                display: block;
            }
            .navbar {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    {{-- Menu Navigasi --}}
    @include('components.header')

    {{-- Konten Utama --}}
    <main class="container mx-auto mt-10 px-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            @yield('content')
        </div>
    </main>

    <script>
        document.getElementById('menu-button').addEventListener('click', function () {
            var menu = document.getElementById('mobile-menu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });

        
    </script>

</body>
</html>



