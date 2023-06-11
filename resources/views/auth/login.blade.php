<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>

    <!-- Webicon -->
    <link rel="icon" type="image/ico" href="{{asset('img/tb.ico')}}">

    <!-- Tailwindcss -->
    @vite('resources/css/app.css')

    <!-- Native css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    @include('components.fonts.fonts')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <script src="{{asset('js/script.js')}}"></script>

</head>
<body>
    
    <div class="w-full h-screen flex px-20 py-10 font-Mplus1 justify-between">

        <div class="flex flex-col justify-between w-[30%]">

            <p class="font-bold text-[1.125rem] flex items-center gap-[0.375rem]"><span class="text-white w-8 h-8 flex items-center justify-center text-start bg-blue-main rounded-md">R</span> odegree</p>

            <div class="order-2 font-Mulish">

                <p class="font-Serif font-bold text-2xl text-header mb-1">Welcome Back !</p>

                <p class="opacity-90 text-subheader">start managing your finance faster and better.</p>

                <form action="/dashboard" class="flex flex-col mt-11 gap-2">

                    <label for="email" class="flex bg-form-bg w-full py-3 px-3 gap-3 items-center rounded-lg transition-all ease-in-out duration-100 hover:border focus-within:border invalid:border invalid:border-red-600 group/form mb-5">

                        <label for="email" class="p-2 bg-white flex items-center rounded-lg">
                            <svg width="20" height="19" class="stroke-blue-main invalid:stroke-red-600 group-focus-within/form:stroke-blue-main-100 transition-all duration-100 ease-in-out" viewBox="0 0 22 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 18H6C3 18 1 16.5 1 13V6C1 2.5 3 1 6 1H16C19 1 21 2.5 21 6V13C21 16.5 19 18 16 18Z" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16 6.5L12.87 9C11.84 9.82 10.15 9.82 9.12 9L6 6.5" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>                                
                        </label>

                        <input id="email" class="bg-transparent w-full focus:outline-none font-Mulish text-sm placeholder:text-sm text-footer font-medium" type="email" placeholder="you@example.com">

                    </label>

                    <p class="-mt-5 mb-1 text-[10px] text-red-600 ml-1 hidden"><i class="fa-regular fa-circle-xmark mr-1"></i>Please input a valid email</p>

                    <label for="pass" class="flex bg-form-bg w-full py-3 px-3 gap-3 items-center rounded-lg transition-all ease-in-out duration-100 hover:border focus-within:border invalid:border invalid:border-red-600 group/form">

                        <label for="pass" class="p-2 bg-white flex items-center rounded-lg">
                            <svg width="18" height="20" class="fill-blue-main invalid:fill-red-600 group-focus-within/form:fill-blue-main-100 transition-all duration-100 ease-in-out" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.5814 8.83721C15.2 8.83721 14.8837 8.52093 14.8837 8.13953V6.27907C14.8837 3.34884 14.0558 1.39535 10 1.39535C5.9442 1.39535 5.1163 3.34884 5.1163 6.27907V8.13953C5.1163 8.52093 4.80002 8.83721 4.41862 8.83721C4.03723 8.83721 3.72095 8.52093 3.72095 8.13953V6.27907C3.72095 3.5814 4.37211 0 10 0C15.6279 0 16.2791 3.5814 16.2791 6.27907V8.13953C16.2791 8.52093 15.9628 8.83721 15.5814 8.83721Z"/>
                                <path d="M10 16.7442C8.33489 16.7442 6.97675 15.386 6.97675 13.7209C6.97675 12.0558 8.33489 10.6977 10 10.6977C11.6651 10.6977 13.0233 12.0558 13.0233 13.7209C13.0233 15.386 11.6651 16.7442 10 16.7442ZM10 12.093C9.10698 12.093 8.37209 12.8279 8.37209 13.7209C8.37209 14.614 9.10698 15.3488 10 15.3488C10.893 15.3488 11.6279 14.614 11.6279 13.7209C11.6279 12.8279 10.893 12.093 10 12.093Z"/>
                                <path d="M14.6512 20H5.34884C1.24651 20 0 18.7535 0 14.6512V12.7907C0 8.68837 1.24651 7.44186 5.34884 7.44186H14.6512C18.7535 7.44186 20 8.68837 20 12.7907V14.6512C20 18.7535 18.7535 20 14.6512 20ZM5.34884 8.83721C2.0186 8.83721 1.39535 9.46976 1.39535 12.7907V14.6512C1.39535 17.9721 2.0186 18.6046 5.34884 18.6046H14.6512C17.9814 18.6046 18.6047 17.9721 18.6047 14.6512V12.7907C18.6047 9.46976 17.9814 8.83721 14.6512 8.83721H5.34884Z"/>
                            </svg>                                                             
                        </label>

                        <input id="pass" name="password" class="pass-field bg-transparent w-full focus:outline-none font-Mulish text-sm placeholder:text-sm text-footer font-medium" type="password" placeholder="At least 8 character">

                        <span toggle="#pass" class="fa-regular fa-eye text-subheader opacity-60 toggle-password mr-0.5"></span>

                    </label>

                    <div class="flex justify-between items-center mb-5">

                        <p class="text-[10px] text-red-600 ml-1 hidden"><i class="fa-regular fa-circle-xmark mr-1"></i>Password invalid</p>

                        <a href="" class="ml-auto">
                            <span class="font-light text-xs text-blue-main">Forgot password ?</span>
                        </a>

                    </div>
                    

                    <button class="bg-blue-main py-4 rounded-lg shadow-lg hover:scale-[.98] transition-all duration-300 ease-in-out">
                        <span class="font-bold text-white">Sign In</span>
                    </button>

                    <p class="text-xs text-subheader opacity-60 mt-[.28rem]">This information will be security saved as per the <span class="font-semibold cursor-pointer">Terms & Privacy policy</span> </p>

                    <div class="flex items-center gap-6 my-5">
                        <hr class="w-full bg-subheader opacity-30 h-0.5">
                        <span class="text-subheader font-semibold text-sm">or</span>
                        <hr class="w-full bg-subheader opacity-30 h-0.5">
                    </div>

                    <button type="submit" class="flex items-center gap-1 justify-center py-3 rounded-lg shadow-sm hover:scale-[.98] transition-all duration-300 ease-in-out border border-subheader border-opacity-50">
                        <img src="{{asset('img/google.png')}}" width="30" alt="">
                        <span class="font-medium text-sm text-subheader">Sign In with Google</span>
                    </button>

                </form>

            </div>

            <p class="order-3 text-center font-Mulish text-subheader opacity-70 text-xs font-medium">©2023 ALL RIGHT RESERVED</p>
        </div>

        <div class="w-[50%] h-full rounded-xl bg-cover bg-center" style="background-image: url({{asset('img/rendang.jpg')}})">
            <div class="bg-header w-full h-full rounded-xl opacity-25"></div>
        </div>

    </div>

</body>

</html>