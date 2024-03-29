<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>

    <!-- Webicon -->
    <link rel="icon" type="image/ico" href="{{asset('img/tb.ico')}}">

    <!-- Tailwindcss -->
    @vite('resources/css/app.css')

    <!-- Native css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    @include('components.fonts.fonts')

</head>
<body>
      <!-- Container start -->
      <div class="w-full h-screen">

        <!-- Navbar -->
        <nav class="navbar font-Mplus1cus w-full fixed top-0 justify-start gap-24 items-center text-nav-items flex h-24 px-20 bg-white z-10">

            @include('layouts.navbar')

        </nav>

        <!-- Main content -->
        @yield('content')

        <!-- Footer -->
        <footer class="font-Poppins px-20 text-footer py-16" id="footer">

            @include('layouts.footer')

        </footer>

    </div>
    <!-- Container end -->

</body>
</html>