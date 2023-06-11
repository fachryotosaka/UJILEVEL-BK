<label for="tw-modal" class="absolute right-7 top-7 group/hover cursor-pointer">
    <svg width="12" height="11" class="opacity-70 group-hover/hover:opacity-100 transition duration-150" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1.71777 9.94068L10.0649 1.95181" stroke="#676767" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M10.0649 9.94068L1.71777 1.95181" stroke="#676767" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>                        
</label>
        
<p class="font-bold text-[28px] text-header">Request Consul</p>

<form class="mt-10 w-full flex flex-col gap-8 overflow-y-auto hide-scroll">        

    <div class="flex items-center justify-between">
        <label class="font-semibold text-subheader opacity-50 text-[13px] mr-16" for="name">Name</label>
        <input id="name" type="text" placeholder="Lexa Otosaka" value="Lexa Otosaka" class="w-[480px] py-3 focus:outline-none focus:border-opacity-80 hover:border-opacity-80 transition duration-200 px-4 border border-subheader border-opacity-25 rounded-md font-medium text-xs text-subheader">
    </div>

    <div class="flex items-center justify-between gap-10">
        <label class="font-semibold text-subheader opacity-50 text-[13px] mr-16" for="class">Type</label>
        <select id="consType" class="consType w-[480px] py-3 focus:outline-none focus:border-opacity-80 hover:border-opacity-80 transition duration-200 px-4 border border-subheader border-opacity-25 rounded-md font-medium text-xs text-subheader">
            <option selected disabled class="decorated text-xs py-3 font-medium">Select Conseling Type</option>
            <option class="decorated text-[13px] h-6 font-medium">Private</option>
            <option class="decorated text-[13px] h-6 font-medium">Social</option>
        </select>
    </div>

    <input type="checkbox" id="inputType" class="inputType peer/type fixed appearance-none opacity-0">

    <ul class="flex flex-col gap-8 h-0 overflow-hidden peer-checked/type:overflow-visible peer-checked/type:h-fit invisible opacity-0 transition peer-checked/type:visible peer-checked/type:opacity-100 peer-checked/type:[&>*]:translate-y-0 peer-checked/type:[&>*]:scale-100">

        <div class="flex items-center justify-between">
            <label class="font-semibold text-subheader opacity-50 text-[13px] mr-16" for="name">Problem</label>
            <input id="problem" type="text" placeholder="Lexa Otosaka" value="Lexa Otosaka" class="w-[480px] py-3 focus:outline-none focus:border-opacity-80 hover:border-opacity-80 transition duration-200 px-4 border border-subheader border-opacity-25 rounded-md font-medium text-xs text-subheader">
        </div>

        <div class="flex items-center justify-between">
            <label class="font-semibold text-subheader opacity-50 text-[13px] mr-16" for="name">Place</label>
            <input id="place" type="text" placeholder="Lexa Otosaka" value="Lexa Otosaka" class="w-[480px] py-3 focus:outline-none focus:border-opacity-80 hover:border-opacity-80 transition duration-200 px-4 border border-subheader border-opacity-25 rounded-md font-medium text-xs text-subheader">
        </div>

        <div class="flex items-center justify-between">
            <label class="font-semibold text-subheader opacity-50 text-[13px] mr-16" for="name">Date</label>
            <input id="dateInput" type="date" placeholder="Lexa Otosaka" value="Lexa Otosaka" class="w-[480px] py-3 focus:outline-none focus:border-opacity-80 hover:border-opacity-80 transition duration-200 px-4 border border-subheader border-opacity-25 rounded-md font-medium text-xs text-subheader">
        </div>

    </ul>

    <button id="submit" type="submit" ></button>    
</form>

<div class="flex items-center justify-end gap-2 mt-1">

    <button class="resetType rounded-lg mr-auto bg-[#eaeaea] flex items-center gap-1 font-semibold text-subheader/80 text-[11px] px-4 py-3 hover:scale-95 transition duration-200">
        <svg width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.5042 3.65376C12.4909 3.65376 12.4709 3.65376 12.4509 3.65376C8.92369 3.30037 5.40319 3.16702 1.916 3.5204L0.555799 3.65376C0.275758 3.68043 0.029056 3.4804 0.00238546 3.20036C-0.0242851 2.92032 0.175744 2.68028 0.449117 2.65361L1.80931 2.52026C5.35651 2.16021 8.95037 2.30023 12.5509 2.65361C12.8243 2.68028 13.0243 2.92698 12.9976 3.20036C12.9776 3.46039 12.7576 3.65376 12.5042 3.65376Z" fill="#676767"/>
            <path d="M4.17049 2.98043C4.14382 2.98043 4.11715 2.98043 4.08381 2.97376C3.8171 2.92709 3.63041 2.66705 3.67708 2.40035L3.82377 1.52689C3.93045 0.886795 4.07714 0 5.63067 0H7.37759C8.93782 0 9.08451 0.920133 9.18452 1.53355L9.33121 2.40035C9.37788 2.67372 9.19119 2.93376 8.92448 2.97376C8.65111 3.02044 8.39107 2.83374 8.35107 2.56704L8.20438 1.70025C8.11103 1.12016 8.09103 1.00681 7.38426 1.00681H5.63734C4.9306 1.00681 4.91726 1.10016 4.81725 1.69358L4.66389 2.56037C4.62389 2.80707 4.41052 2.98043 4.17049 2.98043Z" fill="#676767"/>
            <path d="M8.64407 14.3353H4.36345C2.03644 14.3353 1.9431 13.0485 1.86975 12.0083L1.43636 5.29402C1.41636 5.02065 1.62972 4.78062 1.90309 4.76062C2.18313 4.74728 2.4165 4.95398 2.4365 5.22735L2.8699 11.9417C2.94324 12.9551 2.96991 13.3352 4.36345 13.3352H8.64407C10.0443 13.3352 10.0709 12.9551 10.1376 11.9417L10.571 5.22735C10.591 4.95398 10.8311 4.74728 11.1044 4.76062C11.3778 4.78062 11.5912 5.01398 11.5712 5.29402L11.1378 12.0083C11.0644 13.0485 10.9711 14.3353 8.64407 14.3353Z" fill="#676767"/>
            <path d="M7.61054 10.6684H5.39022C5.11684 10.6684 4.89014 10.4417 4.89014 10.1683C4.89014 9.89491 5.11684 9.66821 5.39022 9.66821H7.61054C7.88392 9.66821 8.11061 9.89491 8.11061 10.1683C8.11061 10.4417 7.88392 10.6684 7.61054 10.6684Z" fill="#676767"/>
            <path d="M8.17031 8.00112H4.8365C4.56313 8.00112 4.33643 7.77442 4.33643 7.50105C4.33643 7.22768 4.56313 7.00098 4.8365 7.00098H8.17031C8.44369 7.00098 8.67038 7.22768 8.67038 7.50105C8.67038 7.77442 8.44369 8.00112 8.17031 8.00112Z" fill="#676767"/>
        </svg>                        
        Reset
    </button>

    <label for="tw-modal" class="rounded-lg px-2 py-3 font-semibold text-subheader text-[11px] hover:scale-95 transition duration-200">
        Cancel
    </label>

    <input type="checkbox" id="inputType" class="inputType peer/type fixed appearance-none opacity-0">

    <label for="submit" disabled class="rounded-lg bg-blue-main shadow-xl grayscale transition duration-200 tracking-wide font-semibold text-[11px] text-white px-6 py-3 peer-checked/type:hover:scale-95 peer-checked/type:grayscale-0 peer-checked/type:cursor-pointer">
        Request
    </label>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    
<script src="{{asset('js/script.js')}}"></script>