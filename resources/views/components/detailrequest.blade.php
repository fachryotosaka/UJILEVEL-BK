
<div id="detailrequest" tabindex="-1" aria-hidden="true" class="modal z-10 box-border fixed inset-0 p-20 px-32 py-24 pb-10 flex items-center justify-center overflow-hidden overscroll-contain bg-header/30 transition duration-200 pointer-events-auto visible opacity-100 [&>*]:translate-y-0 [&>*]:scale-100">
                    
    <div class="max-h-full min-w-[50%] w-fit h-fit max-w-full ml-[20%] p-11 px-14 bg-white transition relative rounded-3xl font-Mplus1cus overflow-y-auto hide-scroll">

        <label for="tw-modal" class="absolute right-7 top-7 group/hover cursor-pointer">
            <svg width="12" height="11" data-dismiss="modal" aria-label="Close" class="close opacity-70 group-hover/hover:opacity-100 transition duration-150" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.71777 9.94068L10.0649 1.95181" stroke="#676767" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10.0649 9.94068L1.71777 1.95181" stroke="#676767" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </label>
    
            
    <p id="title-consultation" class="font-bold text-[28px] text-header text-2xl"></p>
    
    <p id="description-consultation" class="font-Mulish text-sm mt-5 text-sidebar-items"></p>
    
    <ul class="w-full items-center flex flex-col mt-8 gap-6 font-Mplus1cus">
    
        <li class="flex items-center gap-7 w-full">
    
            <div class="flex flex-col gap-1 w-[calc(100%/3)]">
                <p class="font-bold text-[10px] text-sidebar-items font-Mulish opacity-60">Name</p>
    
                <p id="name-consultation" class="font-bold text-[13px] text-header leading-normal"></p>
            </div>
    
            <div class="flex flex-col gap-1 w-[calc(100%/3)]">
                <p class="font-bold text-[10px] text-sidebar-items font-Mulish opacity-60">Gender</p>
    
                <p id="gender-consultation" class="font-bold text-[13px] text-header leading-normal">Male</p>
            </div>
    
            <div class="flex flex-col gap-1 w-[calc(100%/3)]">
                <p class="font-bold text-[10px] text-sidebar-items font-Mulish opacity-60">Time</p>
    
                <p id="time-consultation" class="font-bold text-[13px] text-header leading-normal"></p>
            </div>
    
        </li>
        <li class="flex items-center gap-7 w-full">
    
            <div class="flex flex-col gap-1 w-[calc(100%/3)]">
                <p class="font-bold text-[10px] text-sidebar-items font-Mulish opacity-60 uppercase">Class</p>
    
                <p id="class-consultation" class="font-bold text-[13px] text-header leading-normal"></p>
            </div>
    
            <div class="flex flex-col gap-1 w-[calc(100%/3)]">
                <p class="font-bold text-[10px] text-sidebar-items font-Mulish opacity-60 uppercase">place</p>
    
                <p id="place-consultation" class="font-bold text-[13px] text-header leading-normal"></p>
            </div>
    
            <div class="flex flex-col gap-1 w-[calc(100%/3)]">
                <p class="font-bold text-[10px] text-sidebar-items font-Mulish opacity-60 uppercase">date</p>
    
                <p id="date-consultation" class="font-bold text-[13px] text-header leading-normal"></p>
            </div>
    
        </li>
    
        <div class="flex flex-col gap-1 self-start">
            <p class="font-bold text-[10px] text-sidebar-items font-Mulish opacity-60 uppercase">status</p>
    
            <span id="status-consultation" class="py-2 px-3 bg-[#FFF9F0] font-bold text-[10px] rounded-sm text-center text-[#FFB033] leading-normal"></span>
        </div>
    
    </ul>
    
    <div class="flex items-center gap-4 mt-10 font-Mplus1cus">
        
        <button class="px-5 py-3 rounded-md text-[#EAEBEF] font-bold text-xs bg-[#4351FF] hover:scale-95 transition duration-200">Messages</button>
    
        <button data-dismiss="modal" class="px-5 py-3 rounded-md text-[#EAEBEF] font-bold text-xs bg-[#FF4377] hover:scale-95 transition duration-200">Cancel</button>
    
        <a id="result-form" class="px-5 py-3 rounded-md text-[#EAEBEF] font-bold text-xs bg-[#FF4377] hover:scale-95 transition duration-200">Result</a>

    </div>
</div>

</div>

@include('dashboard.teacher.detailrequest.js')
