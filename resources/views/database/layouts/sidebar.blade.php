<p class="text-2xl text-center font-bold order-1 text-header font-Mplus1cus"><span class="text-2xl text-blue-main-200">V</span>aleria.</p>

<ul class="flex flex-col items-start mt-16 order-2 gap-[5px]">

    <a href="/dashboard" class="w-full">
        <li class="flex items-start gap-2 p-3 pl-[18px] rounded-[10px] tracking-wide deep-shadow font-Mplus1cus cursor-pointer text-header font-medium text-xs transition duration-200 {{Request::path() == 'dashboard' ? 'bg-gradient-to-br from-blue-main-100 to-blue-main-200 to-[150%] text-white' : 'text-opacity-80 hover:text-blue-main-200 hover:text-opacity-100 group/hover text-header'}} {{Request::path() == 'request' ? 'bg-gradient-to-br from-blue-main-100 to-blue-main-200 to-[150%] text-white' : ''}}">
            <svg width="16" height="16" class="stroke-header {{Request::path() == 'dashboard' ? 'stroke-white' : 'group-hover/hover:stroke-blue-main-200'}} {{Request::path() == 'request' ? 'stroke-white' : ''}}" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.25 15.8569H10.75C14.5 15.8569 16 14.3569 16 10.6069V6.10687C16 2.35687 14.5 0.856873 10.75 0.856873H6.25C2.5 0.856873 1 2.35687 1 6.10687V10.6069C1 14.3569 2.5 15.8569 6.25 15.8569Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.3125 6.10687H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.3125 10.6069H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>            
            Dashboard
        </li>
    </a>

    <a href="" class="w-full">
        <li class="flex items-start gap-2 p-3 pl-[18px] rounded-[10px] tracking-wide deep-shadow font-Mplus1cus cursor-pointer text-header font-medium text-xs transition duration-200 {{Request::path() == '' ? 'bg-gradient-to-br from-blue-main-100 to-blue-main-200 to-[150%] text-white' : 'text-opacity-80 hover:text-blue-main-200 hover:text-opacity-100 group/hover text-header'}}">
            <svg width="16" height="16" class="stroke-header {{Request::path() == '' ? 'stroke-white' : 'group-hover/hover:stroke-blue-main-200'}}" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.25 15.8569H10.75C14.5 15.8569 16 14.3569 16 10.6069V6.10687C16 2.35687 14.5 0.856873 10.75 0.856873H6.25C2.5 0.856873 1 2.35687 1 6.10687V10.6069C1 14.3569 2.5 15.8569 6.25 15.8569Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.3125 6.10687H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.3125 10.6069H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>            
            Data Siswa
        </li>
    </a>
    

    <a href="" class="w-full">
        <li class="flex items-start gap-2 p-3 pl-[18px] rounded-[10px] tracking-wide deep-shadow font-Mplus1cus cursor-pointer text-header font-medium text-xs transition duration-200 {{Request::path() == '' ? 'bg-gradient-to-br from-blue-main-100 to-blue-main-200 to-[150%] text-white' : 'text-opacity-80 hover:text-blue-main-200 hover:text-opacity-100 group/hover text-header'}}">
            <svg width="16" height="16" class="stroke-header {{Request::path() == '' ? 'stroke-white' : 'group-hover/hover:stroke-blue-main-200'}}" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.25 15.8569H10.75C14.5 15.8569 16 14.3569 16 10.6069V6.10687C16 2.35687 14.5 0.856873 10.75 0.856873H6.25C2.5 0.856873 1 2.35687 1 6.10687V10.6069C1 14.3569 2.5 15.8569 6.25 15.8569Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.3125 6.10687H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.3125 10.6069H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>            
            Data Guru
        </li>
    </a>
    

    <a href="/profile" class="w-full">
        <li class="flex items-start gap-2 p-3 pl-[18px] rounded-[10px] tracking-wide deep-shadow font-Mplus1cus cursor-pointer text-header font-medium text-xs transition duration-200 {{Request::path() == 'profile' ? 'bg-gradient-to-br from-blue-main-100 to-blue-main-200 to-[150%] text-white' : 'text-opacity-80 hover:text-blue-main-200 hover:text-opacity-100 group/hover text-header'}}">
            <svg width="18" height="18" class="fill-header {{Request::path() == 'profile' ? 'fill-white' : 'group-hover/hover:fill-blue-main-200'}}" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.22371 10.3201C6.78087 10.3201 5.60986 9.14914 5.60986 7.7063C5.60986 6.26346 6.78087 5.09245 8.22371 5.09245C9.66655 5.09245 10.8376 6.26346 10.8376 7.7063C10.8376 9.14914 9.66655 10.3201 8.22371 10.3201ZM8.22371 6.13799C7.3594 6.13799 6.6554 6.84199 6.6554 7.7063C6.6554 8.57061 7.3594 9.27461 8.22371 9.27461C9.08802 9.27461 9.79202 8.57061 9.79202 7.7063C9.79202 6.84199 9.08802 6.13799 8.22371 6.13799Z"/>
                <path d="M10.4612 14.8089C10.3148 14.8089 10.1684 14.7879 10.0221 14.7531C9.58991 14.6346 9.22746 14.3628 8.99744 13.9794L8.9138 13.84C8.50255 13.129 7.93796 13.129 7.52672 13.84L7.45004 13.9724C7.22003 14.3628 6.85757 14.6416 6.42542 14.7531C5.98629 14.8716 5.53322 14.8089 5.14986 14.5788L3.95097 13.8888C3.52579 13.6448 3.2191 13.2475 3.08666 12.7666C2.9612 12.2856 3.02393 11.7907 3.26789 11.3655C3.47003 11.0101 3.52579 10.6894 3.40729 10.4873C3.2888 10.2852 2.98908 10.1667 2.57783 10.1667C1.56017 10.1667 0.730713 9.3372 0.730713 8.31955V7.09278C0.730713 6.07512 1.56017 5.24566 2.57783 5.24566C2.98908 5.24566 3.2888 5.12717 3.40729 4.92503C3.52579 4.72289 3.477 4.40226 3.26789 4.04678C3.02393 3.62159 2.9612 3.11973 3.08666 2.64575C3.21213 2.16481 3.51882 1.7675 3.95097 1.52354L5.15683 0.833487C5.94447 0.366479 6.98304 0.638319 7.45701 1.4399L7.54066 1.5793C7.9519 2.29027 8.51649 2.29027 8.92774 1.5793L9.00441 1.44687C9.47839 0.638319 10.517 0.366479 11.3116 0.840457L12.5105 1.53051C12.9356 1.77447 13.2423 2.17178 13.3748 2.65272C13.5002 3.13367 13.4375 3.62856 13.1935 4.05375C12.9914 4.40923 12.9356 4.72986 13.0541 4.932C13.1726 5.13414 13.4723 5.25263 13.8836 5.25263C14.9013 5.25263 15.7307 6.08209 15.7307 7.09975V8.32652C15.7307 9.34417 14.9013 10.1736 13.8836 10.1736C13.4723 10.1736 13.1726 10.2921 13.0541 10.4943C12.9356 10.6964 12.9844 11.017 13.1935 11.3725C13.4375 11.7977 13.5072 12.2996 13.3748 12.7735C13.2493 13.2545 12.9426 13.6518 12.5105 13.8958L11.3046 14.5858C11.0397 14.7322 10.7539 14.8089 10.4612 14.8089ZM8.22374 12.2299C8.8441 12.2299 9.42263 12.6202 9.81993 13.3103L9.8966 13.4427C9.98025 13.5891 10.1197 13.6936 10.2869 13.7354C10.4542 13.7773 10.6215 13.7563 10.7609 13.6727L11.9668 12.9757C12.148 12.8711 12.2874 12.6969 12.3432 12.4878C12.3989 12.2787 12.371 12.0626 12.2665 11.8813C11.8692 11.1983 11.8204 10.4943 12.1271 9.95756C12.4338 9.42085 13.0681 9.11416 13.8627 9.11416C14.3088 9.11416 14.6643 8.75867 14.6643 8.31258V7.08581C14.6643 6.64668 14.3088 6.28423 13.8627 6.28423C13.0681 6.28423 12.4338 5.97754 12.1271 5.44083C11.8204 4.90412 11.8692 4.20012 12.2665 3.51704C12.371 3.33581 12.3989 3.11973 12.3432 2.91062C12.2874 2.70152 12.155 2.53423 11.9737 2.42271L10.7679 1.73265C10.4682 1.55142 10.0709 1.65598 9.88964 1.96267L9.81296 2.0951C9.41566 2.78516 8.83712 3.17549 8.21677 3.17549C7.59642 3.17549 7.01789 2.78516 6.62058 2.0951L6.54391 1.9557C6.36965 1.66295 5.97932 1.55839 5.6796 1.73265L4.47374 2.42968C4.29252 2.53423 4.15311 2.70849 4.09735 2.91759C4.04159 3.1267 4.06947 3.34278 4.17402 3.52401C4.57133 4.20709 4.62012 4.91109 4.31343 5.4478C4.00674 5.98451 3.37244 6.2912 2.57783 6.2912C2.13174 6.2912 1.77625 6.64668 1.77625 7.09278V8.31955C1.77625 8.75867 2.13174 9.12113 2.57783 9.12113C3.37244 9.12113 4.00674 9.42782 4.31343 9.96453C4.62012 10.5012 4.57133 11.2052 4.17402 11.8883C4.06947 12.0695 4.04159 12.2856 4.09735 12.4947C4.15311 12.7038 4.28555 12.8711 4.46677 12.9826L5.67263 13.6727C5.819 13.7633 5.99326 13.7842 6.15357 13.7424C6.32086 13.7006 6.46027 13.5891 6.55088 13.4427L6.62755 13.3103C7.02486 12.6272 7.60339 12.2299 8.22374 12.2299Z"/>
            </svg>            
            Settings
        </li>
    </a>

</ul>

<a href="" class="flex items-center text-header text-opacity-80 order-3 mt-auto gap-2 ml-5 hover:text-blue-main-200 group/hover font-medium font-Mplus1cus text-sm transition-all ease-in-out duration-150">
    <svg width="15" height="15" class="fill-[#292D32] group-hover/hover:fill-blue-main-200 transition-all ease-in-out duration-150" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10.2322 15.5224H10.137C6.88802 15.5224 5.32206 14.2419 5.05131 11.3734C5.02204 11.0733 5.24157 10.8026 5.54891 10.7733C5.84161 10.7441 6.11968 10.9709 6.14895 11.2709C6.36116 13.5686 7.44416 14.4248 10.1444 14.4248H10.2395C13.2177 14.4248 14.2715 13.3711 14.2715 10.3928V5.62173C14.2715 2.64347 13.2177 1.58973 10.2395 1.58973H10.1444C7.42953 1.58973 6.34652 2.46053 6.14895 4.80216C6.11236 5.10218 5.85624 5.32902 5.54891 5.29975C5.24157 5.2778 5.02204 5.00705 5.04399 4.70703C5.29279 1.79463 6.86607 0.492096 10.137 0.492096H10.2322C13.8251 0.492096 15.3618 2.02879 15.3618 5.62173V10.3928C15.3618 13.9857 13.8251 15.5224 10.2322 15.5224Z" "/>
        <path d="M10.0554 8.5561H1.72802C1.428 8.5561 1.1792 8.30731 1.1792 8.00728C1.1792 7.70726 1.428 7.45847 1.72802 7.45847H10.0554C10.3554 7.45847 10.6042 7.70726 10.6042 8.00728C10.6042 8.30731 10.3554 8.5561 10.0554 8.5561Z" "/>
        <path d="M3.3602 11.0076C3.22117 11.0076 3.08213 10.9564 2.97237 10.8466L0.520974 8.39519C0.308764 8.18298 0.308764 7.83174 0.520974 7.61953L2.97237 5.16813C3.18458 4.95592 3.53582 4.95592 3.74803 5.16813C3.96024 5.38034 3.96024 5.73158 3.74803 5.94379L1.68447 8.00736L3.74803 10.0709C3.96024 10.2831 3.96024 10.6344 3.74803 10.8466C3.64559 10.9564 3.49923 11.0076 3.3602 11.0076Z" "/>
    </svg>        
    Logout
</a>