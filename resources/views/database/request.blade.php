@extends('database.layouts.main')

@section('dcontent')

    <div class=" w-full h-full flex flex-col py-10 pt-8 px-12 pr-10 overflow-y-auto hide-scroll relative">

        <div class="w-full h-fit flex justify-between">
    
            <div class="flex flex-col font-Mplus1cus w-[55%]">
                
                <span class="font-bold text-xs text-footer opacity-60">Profile</span>
    
                <div class="flex items-center mt-4 gap-4">
    
                    <div class="w-[60px] h-[60px] rounded-lg bg-cover" style="background-image: url({{asset('img/chop.png')}})"></div>
    
                    <div class="flex flex-col gap-[5px]">
                        <p class="font-semibold text-lg text-header leading-none">Lexa</p>
                        <p class="font-medium text-footer opacity-60 text-[13px] leading-none">fachrylord0@gmail.com</p>
                        <p class="font-medium text-footer opacity-60 text-xs leading-none">XI PPLG 2</p>
                    </div>
    
                </div>
    
                <span class="font-bold text-[13px] text-footer opacity-60 mt-8">About</span>
    
                <p class="font-semibold text-xs text-footer mt-3 leading-normal text-left">Sedikit tentang gweh , gweh tub orang nya cool abies i mean dingin dan tampan , but gweh tuh gatau kenapa kaya ganteng bgt gitu you know lah ya , jujurly gw tuh kurang suka di keramaian , kaya tch mendokusai watashi ga bisa menghirup oksigen yang sama dengan para alat...</p>
    
                <span class="font-bold text-[13px] text-footer opacity-60 mt-12">Problem</span>
    
                <p class="font-semibold text-xs text-footer mt-2 leading-normal">Masalah Percintaan</p>    
    
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
    
            <label for="accept" class="w-11 h-11 cursor-pointer flex items-center justify-center rounded-md drop-shadow-xl bg-gradient-to-br to-[1%] from-blue-main-200 to-blue-main-100 hover:scale-95 transition duration-300 ">
                <svg width="20" height="14" class="self-center" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 8.32698L8.32706 13.654L19 3" stroke="white" stroke-width="4.41422" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>                        
            </label>

            <label for="reject" class="w-11 h-11 flex cursor-pointer items-center justify-center rounded-md drop-shadow-xl bg-header hover:scale-95 transition duration-300">
                <svg width="14" height="15" class="self-center" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.67153 16.0055C1.24665 16.0055 0.821801 15.849 0.486372 15.5136C-0.162124 14.8651 -0.162124 13.7917 0.486372 13.1432L13.1433 0.486372C13.7918 -0.162124 14.8651 -0.162124 15.5136 0.486372C16.1621 1.13487 16.1621 2.20824 15.5136 2.85674L2.85671 15.5136C2.54365 15.849 2.09641 16.0055 1.67153 16.0055Z" fill="white"/>
                    <path d="M14.3284 16.0055C13.9036 16.0055 13.4787 15.849 13.1433 15.5136L0.486372 2.85674C-0.162124 2.20824 -0.162124 1.13487 0.486372 0.486372C1.13485 -0.162124 2.20822 -0.162124 2.85671 0.486372L15.5136 13.1432C16.1621 13.7917 16.1621 14.8651 15.5136 15.5136C15.1782 15.849 14.7533 16.0055 14.3284 16.0055Z" fill="white"/>
                </svg>                        
            </label>

            <input type="checkbox" id="accept" class="peer/accept fixed appearance-none opacity-0">

            <input type="checkbox" id="reject" class="peer/reject fixed appearance-none opacity-0">


            <div class="w-full bg-white z-10 h-0 peer-checked/accept:h-fit invisible absolute font-Mplus1cus flex-col flex opacity-0 transition peer-checked/accept:visible peer-checked/accept:opacity-100 peer-checked/accept:[&>*]:translate-y-0 peer-checked/accept:[&>*]:scale-100">

                <p class="font-bold text-xs text-footer/50">Change mind?</p>

                <label for="accept" class="bg-header mt-4 px-8 py-[14px] rounded-md w-fit hover:scale-95 transition duration-300 cursor-pointer">
                    <svg width="12" height="13" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.67153 16.0055C1.24665 16.0055 0.821801 15.849 0.486372 15.5136C-0.162124 14.8651 -0.162124 13.7917 0.486372 13.1432L13.1433 0.486372C13.7918 -0.162124 14.8651 -0.162124 15.5136 0.486372C16.1621 1.13487 16.1621 2.20824 15.5136 2.85674L2.85671 15.5136C2.54365 15.849 2.09641 16.0055 1.67153 16.0055Z" fill="white"/>
                        <path d="M14.3284 16.0055C13.9036 16.0055 13.4787 15.849 13.1433 15.5136L0.486372 2.85674C-0.162124 2.20824 -0.162124 1.13487 0.486372 0.486372C1.13485 -0.162124 2.20822 -0.162124 2.85671 0.486372L15.5136 13.1432C16.1621 13.7917 16.1621 14.8651 15.5136 15.5136C15.1782 15.849 14.7533 16.0055 14.3284 16.0055Z" fill="white"/>
                    </svg>               
                </label>

                <div class="h-[1.6px] w-full bg-footer/20 rounded-lg my-5"></div>

                <p class="font-bold text-header text-lg">Make a  agreement</p>

                <p class="font-medium text-[10px] text-footer/50">Please tell them why you rejected !</p>

                <div class="flex flex-col gap-4 mt-4">

                    <input id="" type="text" placeholder="Place" class="py-3 px-4 pl-6 font-medium text-footer placeholder:text-footer/30 text-xs rounded-md border border-footer/20 bg-sidebar hover:border-footer/80 focus:border-footer/80 focus:outline-none transition duration-200">

                    <input id="" type="time" placeholder="Time" class="py-3 px-4 pl-6 font-medium text-footer placeholder:text-footer/30 text-xs rounded-md border border-footer/20 bg-sidebar hover:border-footer/80 focus:border-footer/80 focus:outline-none transition duration-200">

                    <input id="" type="text" onfocus="(this.type='date')" placeholder="Date" class="py-3 px-4 pl-6 font-medium text-footer placeholder:text-footer/30 text-xs rounded-md border border-footer/20 bg-sidebar hover:border-footer/80 focus:border-footer/80 focus:outline-none transition duration-200">

                    <textarea id="" placeholder="Tell them why you reviced !" class="mt-4 w-full h-48 rounded-md bg-sidebar border border-footer/30 py-3 px-4 font-medium text-xs tracking-wide placeholder:text-footer/30" style="resize: none"></textarea>


                </div>

                <button class="text-white font-semibold text-[13px] px-8 py-[15px] rounded-md bg-gradient-to-br from-blue-main-100 to-blue-main-200 to-[200%] w-fit ml-auto my-5 mb-8 hover:scale-95 transition duration-300">
                    Send
                </button>

            </div>


            <div class="w-full bg-white z-10 h-0 peer-checked/reject:h-fit invisible absolute font-Mplus1cus flex-col flex opacity-0 transition peer-checked/reject:visible peer-checked/reject:opacity-100 peer-checked/reject:[&>*]:translate-y-0 peer-checked/reject:[&>*]:scale-100">

                <p class="font-bold text-xs text-footer/50">Change mind?</p>

                <label for="reject" class="bg-gradient-to-br mt-4 from-blue-main-100 to-blue-main-200 to-[200%] px-7 py-[14px] rounded-md w-fit hover:scale-95 transition duration-300 cursor-pointer">
                    <svg width="18" height="12" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 8.32698L8.32706 13.654L19 3" stroke="white" stroke-width="4.41422" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>                        
                </label>

                <div class="h-[1.6px] w-full bg-footer/20 rounded-lg my-5"></div>

                <p class="font-bold text-header text-lg">Reason why you rejected.</p>

                <p class="font-medium text-[10px] text-footer/50">Please tell them why you rejected !</p>

                <textarea id="" class="mt-4 w-full h-48 rounded-md bg-sidebar border border-footer/30 py-3 px-4 font-medium text-xs tracking-wide" style="resize: none"></textarea>

                <button class="text-white font-semibold text-[13px] px-8 py-[15px] rounded-md bg-gradient-to-br from-blue-main-100 to-blue-main-200 to-[200%] w-fit ml-auto my-5 mb-8 hover:scale-95 transition duration-300">
                    Send
                </button>

            </div>

        </div>

    </div>
    

@endsection