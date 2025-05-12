<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>@yield('title', 'Sign Up')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"
  />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Inter&display=swap");
    body {
      font-family: "Inter", sans-serif;
    }
  </style>
</head>
<body class="bg-[#f3f5f8] min-h-screen flex items-center justify-center p-4">
  <main class="w-full max-w-5xl">
    @yield('content')
  </main>
</body>
</html>