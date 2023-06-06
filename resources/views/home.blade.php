@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <section class="font-Mulish px-20 pt-[120px] pb-20">

        <p class="font-black text-8xl leading-[1]">LET’S CREATE AND SELL SOMETHING UNIQUE</p>

        <div class="flex mt-12 gap-2 items-center">

            <p class="text-subheader text-sm w-[60%]">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>

            <div class="relative flex font-Roboto-Condensed ml-20">
                
                <div class="w-10 h-10 rounded-full bg-cover border-white border-2" style="background-image: url('{{asset('img/gon.png')}}')"></div>
                <div class="w-10 h-10 rounded-full border-white border-2 bg-cover absolute left-7" style="background-image: url('{{asset('img/jun.png')}}')"></div>
                <div class="w-10 h-10 rounded-full border-white border-2 bg-cover absolute left-14" style="background-image: url('{{asset('img/age.png')}}')"></div>

                <div class="flex ml-[3.8rem] items-center gap-1">
                    <p class="font-bold text-2xl">10K+</p>
                    <p class="text-[10px] leading-none w-10">Happy Customer</p>
                </div>

            </div>
        </div>

        <div class="relative mt-14">
            <div class="w-full h-[625px] bg-cover rounded-xl" style="background-image: url({{asset('img/hehe.png')}})" alt="">
                
                <div class="absolute bg-white p-6 pt-1 right-0 rounded-bl-3xl">

                    <button class="bg-gradient-to-tr from-blue-main-200 to-30% to-blue-main-100 rounded-3xl p-7 px-10 justify-center items-center flex flex-col gap-1 shadow-xl hover:scale-95 transition-all ease-in-out duration-300">

                        <div class="w-16 h-16 bg-white flex items-center justify-center rounded-full">
                            <svg width="38" height="37" viewBox="0 0 38 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M28.924 24.6916C28.6853 24.8865 28.3748 24.9934 28.0324 24.9588C27.3706 24.8919 26.8783 24.2888 26.9452 23.627L28.2234 10.9841L15.5805 9.70596C14.9187 9.63905 14.4264 9.03597 14.4933 8.37416C14.5602 7.71235 15.1633 7.22001 15.8251 7.28692L29.6775 8.68737C30.3393 8.75428 30.8316 9.35736 30.7647 10.0192L29.3642 23.8716C29.3296 24.2139 29.1627 24.4967 28.924 24.6916Z" fill="#1D1D1D"/>
                                <path d="M30.1119 11.0125L8.96645 28.2749C8.45132 28.6955 7.6754 28.617 7.25487 28.1019C6.83433 27.5868 6.91278 26.8108 7.42791 26.3903L28.5734 9.12789C29.0885 8.70735 29.8644 8.7858 30.2849 9.30093C30.7055 9.81606 30.627 10.592 30.1119 11.0125Z" fill="#1D1D1D"/>
                            </svg>                            
                        </div>

                        <p class="font-semibold text-white text-sm">Get Started</p>

                    </button>
                </div>

            </div>
        </div>

        <div class="flex mt-8 items-center gap-6">
            <p class="font-Roboto-Condensed w-32 font-medium mr-40 leading-tight">Trusted by top companion</p>

            <img height="42" src="{{asset('img/samsung.png')}}" alt="">  
            <img height="42" src="{{asset('img/binance.png')}}" alt="">  
            <img height="42" src="{{asset('img/telkom.png')}}" alt="">  
            <img height="42" src="{{asset('img/telkom.png')}}" alt="">  
                
        </div>

    </section>

    <section class="font-Mulish px-20 pb-20 pt-12 bg-slate-100">

        <div class="flex items-center gap-10">

            <p class="font-extrabold text-6xl text-header mb-3">About <span class="text-blue-main-200">Us</span></p>

            <div class="h-1 w-64 bg-gradient-to-r from-blue-main-200 to-blue-main-100 rounded-md"></div>

            <p class="text-subheader w-[40%]">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>

        </div>

        <div class="flex gap-20 mt-14">

            <div class="w-[60%] h-[500px] bg-cover rounded-xl" style="background-image: url({{asset('img/chop.png')}})"></div>

            <div class="w-[40%] h-[500px] pt-1 pr-5">

                <p class="font-extrabold font-Roboto text-3xl text-header mb-6">Our Quality Ask be Different</p>

                <p class="text-subheader mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. Ut enim ad minim veniam, quis nostrud exercitation.</p>

                <p class="text-subheader mb-[20%]">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor consectetur adipiscing elit, sed do eiusmod tempor </p>

                <button class="bg-gradient-to-tr from-blue-main-200 to-blue-main-100 rounded-lg p-2 shadow-lg mt-auto hover:scale-95 transition-all ease-in-out duration-300">
                    <svg width="37" height="36" viewBox="0 0 37 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M28.5052 23.5145C28.2848 23.7149 27.9906 23.8342 27.6584 23.8185C27.0161 23.7882 26.5097 23.2315 26.54 22.5892L27.12 10.3191L14.85 9.73917C14.2077 9.70881 13.7013 9.15213 13.7316 8.50983C13.762 7.86754 14.3187 7.36111 14.961 7.39147L28.4048 8.02693C29.0471 8.05729 29.5536 8.61397 29.5232 9.25627L28.8877 22.7002C28.872 23.0324 28.7255 23.314 28.5052 23.5145Z" fill="white"/>
                        <path d="M28.9445 10.2488L9.42585 28.0055C8.95035 28.438 8.19732 28.4024 7.76474 27.9269C7.33217 27.4514 7.36777 26.6984 7.84326 26.2658L27.3619 8.5092C27.8374 8.07663 28.5904 8.11222 29.023 8.58772C29.4556 9.06322 29.42 9.81626 28.9445 10.2488Z" fill="white"/>
                    </svg>                        
                </button>

            </div>

        </div>

    </section>
    
@endsection