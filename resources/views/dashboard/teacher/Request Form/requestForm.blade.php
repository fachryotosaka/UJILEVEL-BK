@extends('database.layouts.main')

@section('dcontent')

    <div class=" w-full h-full flex flex-col py-10 pt-2 px-12 pr-10 mb-10 overflow-y-auto hide-scroll relative">

        <div class="flex flex-col text-xs leading-none mb-8">
            <div class="flex items-center gap-2 font-medium">
                <p>Dashboard</p>
                <span>
                    <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.07942 0.770967L6.19029 5.1375C6.31597 5.27036 6.37879 5.44086 6.37879 5.6115C6.37879 5.78205 6.31594 5.95249 6.19029 6.0855L2.07942 10.452C1.81743 10.7278 1.38107 10.7393 1.10471 10.4779C0.826401 10.2158 0.816576 9.77752 1.07778 9.50289L4.76635 5.61035L1.07778 1.71782C0.816576 1.44318 0.826343 1.00797 1.10471 0.743963C1.38107 0.482833 1.81743 0.494324 2.07942 0.770967Z" fill="#6B7280"/>
                    </svg>
                </span>
                <p class="text-subheader">Request</p>
            </div>
        </div>

        <div class="w-full h-fit flex justify-between">
    
            <div class="flex flex-col font-Mplus1cus w-[55%]">
                
                <span class="font-bold text-xs text-footer opacity-60">Profile</span>
    
                <div class="flex items-center mt-4 gap-4">
                    @if ($students->isNotEmpty())
                        <div class="w-[60px] h-[60px] rounded-lg bg-cover" style="background-image: url({{ $students[0]->profile_photo_url }})"></div>

                        <div class="flex flex-col gap-[5px]">
                            <p class="font-semibold text-lg text-header leading-none">
                                @foreach ($students as $student)
                                    {{ $student->name }}, 
                                @endforeach
                            </p>
                            <p class="font-medium text-footer opacity-60 text-[13px] leading-none">{{$students[0]->email}}</p>
                            <p class="font-medium text-footer opacity-60 text-xs leading-none">{{ $students[0]->classroom->name }}</p>
                        </div>
                    @else
                        <p>All classes</p>
                    @endif
    
                </div>
    
                <span class="font-bold text-[13px] text-footer opacity-60 mt-8">About</span>
    
                <p class="font-semibold text-xs text-footer mt-3 leading-normal text-left">{{ $consultation->description }}</p>
    
                <span class="font-bold text-[13px] text-footer opacity-60 mt-12">Problem</span>
    
                <p class="font-semibold text-xs text-footer mt-2 leading-normal">{{ $consultation->title }}</p>    

                <div class="flex h-fit gap-6 -mt-1.5">

                    <div class="flex-col flex">
                        <span class="font-bold text-[13px] text-subheader opacity-60 mt-12">Place</span>
    
                        <p class="font-semibold text-xs text-subheader mt-2 leading-normal">{{ $consultation->place }}</p>  
                    </div>

                    <div class="flex-col flex">
                        <span class="font-bold text-[13px] text-subheader opacity-60 mt-12">Date</span>
    
                        <p class="font-semibold text-xs text-subheader mt-2 leading-normal">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $consultation->date)->format('d F Y') }}</p>  
                    </div>

                    <div class="flex-col flex">
                        <span class="font-bold text-[13px] text-subheader opacity-60 mt-12">Time</span>
    
                        <p class="font-semibold text-xs text-subheader mt-2 leading-normal">{{ \Carbon\Carbon::parse($consultation->time)->format('h:i A') }}</p>  
                    </div>

                </div>
    
            </div>
    
            <!-- Calendar -->
            <div class="w-[26%] p-6 py-8 h-fit rounded-lg shadow-gray-200 shadow-xl flex flex-col font-Nunito">
    
                <div id="cale-head" class="flex items-center ml-auto justify-between w-full">
    
                    <span id="prev" class="cursor-pointer">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.1831 4.175L6.35811 8L10.1831 11.825L8.99977 13L3.99977 8L8.99977 3L10.1831 4.175Z" fill="#B5BEC6"/>
                        </svg>                        
                    </span>
    
                    <p id="curr-date" class="font-bold text-calendar"></p>
    
                    <span id="next" class="cursor-pointer">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 11.825L8.825 8L5 4.175L6.18333 3L11.1833 8L6.18333 13L5 11.825Z" fill="#B5BEC6"/>
                        </svg>                        
                    </span>
    
                </div>
    
                <div class="w-full mt-4 calendar">
    
                    <ul class="flex flex-wrap font-semibold text-[11px] text-[#B5BEC6] text-center">
                        <li>SAN</li>
                        <li>MON</li>
                        <li>TUE</li>
                        <li>WED</li>
                        <li>THU</li>
                        <li>FRI</li>
                        <li>SAT</li>
                    </ul>
    
                    <ul class="flex flex-wrap items-center font-bold mt-2 text-xs text-calendar text-center days">
                        
                    </ul>
    
                </div>
    
            </div>
    
        </div>

        <div class="flex items-start h-full gap-8 mt-10 relative">
    
            <a href="javascript:void(0)" id="btn-accept-request" class="w-11 h-11 cursor-pointer flex items-center justify-center rounded-md drop-shadow-xl bg-blue-main hover:scale-95 transition duration-300 ">
                <svg width="20" height="14" class="self-center" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 8.32698L8.32706 13.654L19 3" stroke="white" stroke-width="4.41422" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>        
            </a>

            <a href="javascript:void(0)" id="btn-decline-request" class="w-11 h-11 flex cursor-pointer items-center justify-center rounded-md drop-shadow-xl bg-header hover:scale-95 transition duration-300">
                <svg width="14" height="15" class="self-center" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.67153 16.0055C1.24665 16.0055 0.821801 15.849 0.486372 15.5136C-0.162124 14.8651 -0.162124 13.7917 0.486372 13.1432L13.1433 0.486372C13.7918 -0.162124 14.8651 -0.162124 15.5136 0.486372C16.1621 1.13487 16.1621 2.20824 15.5136 2.85674L2.85671 15.5136C2.54365 15.849 2.09641 16.0055 1.67153 16.0055Z" fill="white"/>
                    <path d="M14.3284 16.0055C13.9036 16.0055 13.4787 15.849 13.1433 15.5136L0.486372 2.85674C-0.162124 2.20824 -0.162124 1.13487 0.486372 0.486372C1.13485 -0.162124 2.20822 -0.162124 2.85671 0.486372L15.5136 13.1432C16.1621 13.7917 16.1621 14.8651 15.5136 15.5136C15.1782 15.849 14.7533 16.0055 14.3284 16.0055Z" fill="white"/>
                </svg>                        
            </a>


            <div id="decline-form" class="w-full mb-10 bg-white z-10 h-0 absolute font-Mplus1cus flex-col flex transition" style="display: none">

                <div class="h-[1.6px] w-full bg-footer/20 rounded-lg my-5"></div>

                <p class="font-bold text-header text-lg">Make a  agreement</p>

                <p class="font-medium text-[10px] text-footer/50">Please tell them why you revised !</p>

                <div class="flex flex-col gap-4 mt-4">

                    <input type="text" id="places" value="{{ $consultation->place }}" class="py-3 px-4 pl-6 font-medium text-footer placeholder:text-footer/30 text-xs rounded-md border border-footer/20 bg-sidebar hover:border-footer/80 focus:border-footer/80 focus:outline-none transition duration-200">
                    <p id="alert-places" class=" d-none -mt-2 mb-1 text-[10px] text-red-600 ml-1 "><i class="fa-regular fa-circle-xmark mr-1"></i></p>

                    <input type="time" id="times" value="{{ $consultation->time }}" class="py-3 px-4 pl-6 font-medium text-footer placeholder:text-footer/30 text-xs rounded-md border border-footer/20 bg-sidebar hover:border-footer/80 focus:border-footer/80 focus:outline-none transition duration-200">
                    <p id="alert-times" class=" d-none -mt-2 mb-1 text-[10px] text-red-600 ml-1 "><i class="fa-regular fa-circle-xmark mr-1"></i></p>

                    <input type="date" id="dates" value="{{ $consultation->date }}" class="py-3 px-4 pl-6 font-medium text-footer placeholder:text-footer/30 text-xs rounded-md border border-footer/20 bg-sidebar hover:border-footer/80 focus:border-footer/80 focus:outline-none transition duration-200">
                    <p id="alert-dates" class=" d-none -mt-2 mb-1 text-[10px] text-red-600 ml-1 "><i class="fa-regular fa-circle-xmark mr-1"></i></p>

                    <textarea id="reason" placeholder="Tell them why you revised !" class="mt-4 w-full h-48 rounded-md bg-sidebar border border-subheader/20 py-3 px-4 font-medium text-xs tracking-wide placeholder:text-footer/50 hover:border-footer/80 focus:border-footer/80 focus:outline-none" style="resize: none"></textarea>
                    <p id="alert-reason" class=" d-none -mt-2 mb-1 text-[10px] text-red-600 ml-1 "><i class="fa-regular fa-circle-xmark mr-1"></i></p>

                </div>

                <button type="button" id="confirm-revised" class="text-white font-semibold text-[13px] px-8 py-[10px] rounded-md bg-blue-main to-[200%] w-fit ml-auto my-5 mb-8 hover:scale-95 transition duration-300">
                    Send
                </button>

                <div class="w-full h-10 bg-white"></div>

            </div>

            <div id="finish-form" class="w-full mb-10 bg-white z-10 h-0 absolute font-Mplus1cus flex-col flex transition" style="display: none">

                <div class="h-[1.6px] w-full bg-footer/20 rounded-lg my-5"></div>

                <p class="font-bold text-header text-lg">Make a  agreement</p>

                <div class="flex flex-col gap-4 mt-4">

                    <textarea id="result" placeholder="Write the result of consultations" class="mt-4 w-full h-48 rounded-md bg-sidebar border border-footer/20 py-3 px-4 font-medium text-xs tracking-wide placeholder:text-footer/50 hover:border-footer/80 focus:outline-none focus:border-subheader/80" style="resize: none"></textarea>

                </div>

                <button id="confirm-finish" class="text-white font-semibold text-[13px] px-8 py-[10px] rounded-md bg-blue-main to-[200%] w-fit ml-auto my-5 mb-8 hover:scale-95 transition duration-300">
                    Send
                </button>

                <div class="w-full h-10 bg-white"></div>

            </div>


        </div>

    </div>
    

    @include('dashboard.teacher.Request Form.requestFormJS')

@endsection