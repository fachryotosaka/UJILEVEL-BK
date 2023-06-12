<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    

    <script src="{{asset('js/script.js')}}"></script>

</head>
<body>
    
    <div class="w-full h-screen flex">

        <aside class="w-[17%] flex flex-col pb-10 pl-8 font-Mplus1 mt-3 bg-white border-r border-[#EEF2F6]">
            
            @include('database/layouts/sidebar')

        </aside>

        <div class="w-[83%] h-screen flex flex-col box-content">

            <header class="h-[12%] w-full px-12 py-10 font-Mplus1cus flex">

                @include('database/layouts/header')

            </header>

            @yield('dcontent')

        </div>

        <input type="checkbox" id="tw-modal" class="peer fixed appearance-none opacity-0">

        <label class="z-10 pointer-events-none invisible box-border fixed inset-0 p-20 px-32 py-24 pb-10 flex items-center justify-center overflow-hidden overscroll-contain bg-header/30 opacity-0 transition duration-200 peer-checked:pointer-events-auto peer-checked:visible peer-checked:opacity-100 peer-checked:[&>*]:translate-y-0 peer-checked:[&>*]:scale-100">
                    
            <div id="modal" class="max-h-full min-w-[50%] w-fit h-fit max-w-full ml-[20%] p-11 px-14 bg-white transition relative rounded-3xl font-Mplus1cus">

                

            </div>

        </label>

    </div>

    @stack('script')

</body>
</html>