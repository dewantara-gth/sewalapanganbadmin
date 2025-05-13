<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>

    {{-- Tailwind CSS & fonts  --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>


    {{-- Tambahan favicon dan meta --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <meta name="description" content="@yield('meta_description', 'Aplikasi Laravel')">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
<script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: {
          inter: ['Inter', 'sans-serif'],
        }
      }
    }
  }
</script>

    <style>
        /* Custom styles for the mobile menu */
        .mobile-menu {
            display: none;
        }
        @media (max-width: 768px) {
            .mobile-menu {
                display: block;
            }
            .sidebar {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="flex min-h-screen flex-col md:flex-row">
            {{-- Menu Navigasi --}}
            @include('components.sidebar')

            {{-- Konten Utama --}}
            <main class="flex-1 bg-gray-100 p-6">
                <div class="bg-white shadow-md rounded-lg p-6 h-full">
                    @yield('content')
                </div>
            </main>
    </div>
    

    <script>
        const menuButton = document.getElementById("menu-button");
        const mobileMenu = document.getElementById("mobile-menu");
        const closeMenu = document.getElementById("close-menu");

        menuButton.addEventListener("click", () => {
            mobileMenu.classList.remove("hidden");
        });

        closeMenu.addEventListener("click", () => {
            mobileMenu.classList.add("hidden");
        });
    </script>

</body>
</html>



