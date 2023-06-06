@switch(true)
    @case (Request::path() == 'profile')
        
        <div class="flex items-center w-full">
        
            <div class="flex flex-col mr-3">
                <p class="font-semibold text-header text-xl">Client Personal Information</p>
                <p class="font-medium text-footer opacity-70 text-xs">Hah 300 Jawirr ? Hanya 20.000 </p>
            </div>  
        
        </div>
    @break

    @case (Request::path() == 'request')
    
        <div class="flex items-center w-full">
            
            <div class="flex flex-col mr-3">
                <p class="font-semibold text-header text-xl">Detail Personal Information</p>
                <p class="font-medium text-footer opacity-70 text-xs">Hah 300 Jawirr ? Hanya 20.000 </p>
            </div>
        
        </div>

    @break

    @default
        
    <div class="flex items-center w-full">
    
        <div class="flex flex-col mr-3">
            <p class="font-semibold text-header text-xl">Today's Plan</p>
            <p class="font-medium text-footer opacity-70 text-xs">March 27th, 2023</p>
        </div>  
    
        <svg width="15" height="9" class="-mt-2 rotate cursor-pointer" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.49999 8.43133C6.89428 8.43133 6.28856 8.16655 5.82995 7.64679L0.188203 1.25281C-0.0627345 0.968418 -0.0627345 0.497693 0.188203 0.213297C0.439141 -0.0710991 0.854487 -0.0710991 1.10542 0.213297L6.74717 6.60727C7.16252 7.07799 7.83746 7.07799 8.2528 6.60727L13.8946 0.213297C14.1455 -0.0710991 14.5609 -0.0710991 14.8118 0.213297C15.0627 0.497693 15.0627 0.968418 14.8118 1.25281L9.17002 7.64679C8.71141 8.16655 8.1057 8.43133 7.49999 8.43133Z" fill="#292D32"/>
        </svg>
    
        <label for="search" class="flex items-center gap-3 ml-auto py-[11px] w-[320px] px-3 rounded-lg border-[1.5px] border-footer border-opacity-60 hover:border-opacity-100 focus-within:border-opacity-100 transition-all duration-300 ease-in-out group/form">
    
            <label for="search">
                <svg width="15" height="16" class="fill-footer opacity-70 group-focus-within/form:opacity-100 group-hover/form:opacity-100 transition-all ease-in-out duration-150" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.15186 14.3037C3.20962 14.3037 0 11.0941 0 7.15186C0 3.20962 3.20962 0 7.15186 0C11.0941 0 14.3037 3.20962 14.3037 7.15186C14.3037 11.0941 11.0941 14.3037 7.15186 14.3037ZM7.15186 1.04661C3.78176 1.04661 1.04661 3.78874 1.04661 7.15186C1.04661 10.515 3.78176 13.2571 7.15186 13.2571C10.522 13.2571 13.2571 10.515 13.2571 7.15186C13.2571 3.78874 10.522 1.04661 7.15186 1.04661Z"/>
                    <path d="M14.4783 15.0014C14.3458 15.0014 14.2132 14.9526 14.1085 14.8479L12.713 13.4524C12.5107 13.2501 12.5107 12.9152 12.713 12.7128C12.9154 12.5105 13.2503 12.5105 13.4526 12.7128L14.8481 14.1083C15.0505 14.3107 15.0505 14.6456 14.8481 14.8479C14.7435 14.9526 14.6109 15.0014 14.4783 15.0014Z"/>
                </svg>
            </label>
            
            <input id="search" type="text" class="text-xs font-medium text-footer bg-transparent placeholder:opacity-70 pr-1 focus:outline-none w-full" placeholder="Search...">
    
        </label>
    
    </div>
@endswitch

<div class="flex items-center min-w-fit ml-6">

    <label for="tw-modal" data-id="inbox" class="cmodal cursor-pointer w-10 h-10 justify-center border border-footer border-opacity-70 rounded-full flex items-center hover:border-opacity-100 group/hover transition-all ease-in-out duration-300 hover:scale-95">
        <svg width="20" height="17" viewBox="0 0 22 19" class="stroke-footer group-hover/hover:stroke-header transition-all ease-in-out duration-150" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16 18H6C3 18 1 16.5 1 13V6C1 2.5 3 1 6 1H16C19 1 21 2.5 21 6V13C21 16.5 19 18 16 18Z" stroke-opacity="0.5" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M16 6.5L12.87 9C11.84 9.82 10.15 9.82 9.12 9L6 6.5" stroke-opacity="0.5" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>                                                    
    </label>

    <div class="h-8 w-[1px] rounded-xl bg-footer opacity-40 ml-7 mr-[22px]"></div>

    <div class="w-11 h-11 rounded-full bg-cover" style="background-image: url({{asset('img/chop.png')}})"></div>

    <div class="flex flex-col font-Mplus1cus ml-3">

        <p class="font-semibold text-header">Lexa</p>
        <p class="font-medium text-xs text-footer opacity-50">CEO Tesla Technology</p>

    </div>

</div>