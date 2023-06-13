<div class="w-full flex items-center justify-between border-b border-[#EEF2F6] py-3.2 px-4.5 m-1">

    <a href="/home">
        <p class="font-bold text-[1.125rem] flex items-center gap-[0.375rem] m-0"><span class="text-white w-8 h-8 flex items-center justify-center bg-blue-main rounded-md m-0">R</span> odegree</p>
    </a>

    <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10.0002 13.28L5.65355 8.93333C5.14022 8.42 5.14022 7.58 5.65355 7.06667L10.0002 2.72" stroke="#94A3B8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M18.0002 13.28L13.6536 8.93333C13.1402 8.42 13.1402 7.58 13.6536 7.06667L18.0002 2.72" stroke="#94A3B8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
        

</div>

<div class="flex flex-col pt-16 h-full m-1">

    <ul class="flex flex-col font-Mulish font-medium gap-7 pb-9 border-b border-{#EEF2F6}">

        <a href="/home" class="group/hover">
            <li class="flex items-center gap-3 text-[13px] tracking-wide transition duration-200 {{Request::path() == 'home' ? 'text-blue-main font-semibold ' : 'group-hover/hover:text-blue-main text-sidebar-items'}}">
                <svg class="transition duration-200 {{Request::path() == 'home' ? 'stroke-blue-main' : 'group-hover/hover:stroke-blue-main stroke-sidebar-items'}}" width="19.5" height="19.5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.51699 2.36667L3.02533 5.86667C2.27533 6.45 1.66699 7.69167 1.66699 8.63334V14.8083C1.66699 16.7417 3.24199 18.325 5.17533 18.325H14.8253C16.7587 18.325 18.3337 16.7417 18.3337 14.8167V8.75C18.3337 7.74167 17.6587 6.45 16.8337 5.875L11.6837 2.26667C10.517 1.45 8.64199 1.49167 7.51699 2.36667Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 14.9917V12.4917" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Home                    
            </li>
        </a>

        @if (Auth::user()->role === 'admin')
        <a href="{{ route('admin.index') }}" class="group/hover">
            <li class="flex items-center gap-3 text-[13px] tracking-wide transition duration-200 {{Request::path() == 'admin.*' ? 'text-blue-main font-semibold ' : 'group-hover/hover:text-blue-main text-sidebar-items'}}">
                <svg class="transition duration-200 {{Request::path() == 'admin.*' ? 'stroke-blue-main' : 'group-hover/hover:stroke-blue-main stroke-sidebar-items'}}" width="16" height="16" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.25 15.8569H10.75C14.5 15.8569 16 14.3569 16 10.6069V6.10687C16 2.35687 14.5 0.856873 10.75 0.856873H6.25C2.5 0.856873 1 2.35687 1 6.10687V10.6069C1 14.3569 2.5 15.8569 6.25 15.8569Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 6.10687H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 10.6069H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>                    
                Admin 
            </li>
        </a>

        <a href="{{ route('counseling-teacher.index') }}" class="group/hover">
            <li class="flex items-center gap-3 text-[13px] tracking-wide transition duration-200 {{Request::path() == 'counseling-teacher.*' ? 'text-blue-main font-semibold ' : 'group-hover/hover:text-blue-main text-sidebar-items'}}">
                <svg class="transition duration-200 {{Request::path() == 'counseling-teacher.*' ? 'stroke-blue-main' : 'group-hover/hover:stroke-blue-main stroke-sidebar-items'}}" width="16" height="16" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.25 15.8569H10.75C14.5 15.8569 16 14.3569 16 10.6069V6.10687C16 2.35687 14.5 0.856873 10.75 0.856873H6.25C2.5 0.856873 1 2.35687 1 6.10687V10.6069C1 14.3569 2.5 15.8569 6.25 15.8569Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 6.10687H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 10.6069H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>      
                Counseling Teacher
            </li>
        </a>

        <a href="{{ route('classroom-teacher.index') }}" class="group/hover">
            <li class="flex items-center gap-3 text-[13px] tracking-wide transition duration-200 {{Request::path() == 'classroom-teacher.*' ? 'text-blue-main font-semibold ' : 'group-hover/hover:text-blue-main text-sidebar-items'}}">
                <svg class="transition duration-200 {{Request::path() == 'classroom-teacher.*' ? 'stroke-blue-main' : 'group-hover/hover:stroke-blue-main stroke-sidebar-items'}}" width="16" height="16" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.25 15.8569H10.75C14.5 15.8569 16 14.3569 16 10.6069V6.10687C16 2.35687 14.5 0.856873 10.75 0.856873H6.25C2.5 0.856873 1 2.35687 1 6.10687V10.6069C1 14.3569 2.5 15.8569 6.25 15.8569Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 6.10687H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 10.6069H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>      
                Classroom Teacher
            </li>
        </a>
        <a href="{{ route('student.index') }}" class="group/hover">
            <li class="flex items-center gap-3 text-[13px] tracking-wide transition duration-200 {{Request::path() == 'student.*' ? 'text-blue-main font-semibold ' : 'group-hover/hover:text-blue-main text-sidebar-items'}}">
                <svg class="transition duration-200 {{Request::path() == 'student.*' ? 'stroke-blue-main' : 'group-hover/hover:stroke-blue-main stroke-sidebar-items'}}" width="16" height="16" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.25 15.8569H10.75C14.5 15.8569 16 14.3569 16 10.6069V6.10687C16 2.35687 14.5 0.856873 10.75 0.856873H6.25C2.5 0.856873 1 2.35687 1 6.10687V10.6069C1 14.3569 2.5 15.8569 6.25 15.8569Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 6.10687H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 10.6069H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>      
                 Student 
            </li>
        </a>
        @elseif(Auth::user()->role === 'teacher')
        <a href="{{ route('students') }}" class="group/hover">
            <li class="flex items-center gap-3 text-[13px] tracking-wide transition duration-200 {{Request::path() == 'students' ? 'text-blue-main font-semibold ' : 'group-hover/hover:text-blue-main text-sidebar-items'}}">
                <svg class="transition duration-200 {{Request::path() == 'students' ? 'stroke-blue-main' : 'group-hover/hover:stroke-blue-main stroke-sidebar-items'}}" width="16" height="16" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.25 15.8569H10.75C14.5 15.8569 16 14.3569 16 10.6069V6.10687C16 2.35687 14.5 0.856873 10.75 0.856873H6.25C2.5 0.856873 1 2.35687 1 6.10687V10.6069C1 14.3569 2.5 15.8569 6.25 15.8569Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 6.10687H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 10.6069H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>      
                Student 
            </li>
        </a>

        <a  href="javascript:void(0)" id="btn-create-schedule" class="group/hover">
            <li class="flex items-center gap-3 text-[13px] tracking-wide transition duration-200 {{Request::path() == '' ? 'text-blue-main font-semibold ' : 'group-hover/hover:text-blue-main text-sidebar-items'}}">
                <svg class="transition duration-200 {{Request::path() == '' ? 'stroke-blue-main' : 'group-hover/hover:stroke-blue-main stroke-sidebar-items'}}" width="16" height="16" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.25 15.8569H10.75C14.5 15.8569 16 14.3569 16 10.6069V6.10687C16 2.35687 14.5 0.856873 10.75 0.856873H6.25C2.5 0.856873 1 2.35687 1 6.10687V10.6069C1 14.3569 2.5 15.8569 6.25 15.8569Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 6.10687H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 10.6069H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>      
                Send Schedule
            </li>
        </a>

        <a href="{{ route('archive-schedule') }}" class="group/hover">
            <li class="flex items-center gap-3 text-[13px] tracking-wide transition duration-200 {{Request::path() == 'archive-schedule' ? 'text-blue-main font-semibold ' : 'group-hover/hover:text-blue-main text-sidebar-items'}}">
                <svg class="transition duration-200 {{Request::path() == 'archive-schedule' ? 'stroke-blue-main' : 'group-hover/hover:stroke-blue-main stroke-sidebar-items'}}" width="16" height="16" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.25 15.8569H10.75C14.5 15.8569 16 14.3569 16 10.6069V6.10687C16 2.35687 14.5 0.856873 10.75 0.856873H6.25C2.5 0.856873 1 2.35687 1 6.10687V10.6069C1 14.3569 2.5 15.8569 6.25 15.8569Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 6.10687H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 10.6069H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>      
                History
            </li>
        </a>

        
        <a href="{{ route('vulnerability') }}" class="group/hover">
            <li class="flex items-center gap-3 text-[13px] tracking-wide transition duration-200 {{Request::path() == 'guru' ? 'text-blue-main font-semibold ' : 'group-hover/hover:text-blue-main text-sidebar-items'}}">
                <svg class="transition duration-200 {{Request::path() == 'guru' ? 'stroke-blue-main' : 'group-hover/hover:stroke-blue-main stroke-sidebar-items'}}" width="16" height="16" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.25 15.8569H10.75C14.5 15.8569 16 14.3569 16 10.6069V6.10687C16 2.35687 14.5 0.856873 10.75 0.856873H6.25C2.5 0.856873 1 2.35687 1 6.10687V10.6069C1 14.3569 2.5 15.8569 6.25 15.8569Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 6.10687H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 10.6069H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>      
                Vulnerability 
            </li>
        </a>

        @elseif(Auth::user()->role === 'classroom_teacher')
        <a href="{{ route('students') }}" class="group/hover">
            <li class="flex items-center gap-3 text-[13px] tracking-wide transition duration-200 {{Request::path() == 'students' ? 'text-blue-main font-semibold ' : 'group-hover/hover:text-blue-main text-sidebar-items'}}">
                <svg class="transition duration-200 {{Request::path() == 'students' ? 'stroke-blue-main' : 'group-hover/hover:stroke-blue-main stroke-sidebar-items'}}" width="16" height="16" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.25 15.8569H10.75C14.5 15.8569 16 14.3569 16 10.6069V6.10687C16 2.35687 14.5 0.856873 10.75 0.856873H6.25C2.5 0.856873 1 2.35687 1 6.10687V10.6069C1 14.3569 2.5 15.8569 6.25 15.8569Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 6.10687H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 10.6069H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Student 
            </li>
        </a>

        <a href="{{ route('archive-schedule') }}" class="group/hover">
            <li class="flex items-center gap-3 text-[13px] tracking-wide transition duration-200 {{Request::path() == 'archive-schedule' ? 'text-blue-main font-semibold ' : 'group-hover/hover:text-blue-main text-sidebar-items'}}">
                <svg class="transition duration-200 {{Request::path() == 'archive-schedule' ? 'stroke-blue-main' : 'group-hover/hover:stroke-blue-main stroke-sidebar-items'}}" width="16" height="16" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.25 15.8569H10.75C14.5 15.8569 16 14.3569 16 10.6069V6.10687C16 2.35687 14.5 0.856873 10.75 0.856873H6.25C2.5 0.856873 1 2.35687 1 6.10687V10.6069C1 14.3569 2.5 15.8569 6.25 15.8569Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 6.10687H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 10.6069H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>      
                History
            </li>
        </a>
        @elseif(Auth::user()->role === 'student')
        <a  href="javascript:void(0)" id="btn-create-schedule" class="group/hover">
            <li class="flex items-center gap-3 text-[13px] tracking-wide transition duration-200 {{Request::path() == '' ? 'text-blue-main font-semibold ' : 'group-hover/hover:text-blue-main text-sidebar-items'}}">
                <svg class="transition duration-200 {{Request::path() == '' ? 'stroke-blue-main' : 'group-hover/hover:stroke-blue-main stroke-sidebar-items'}}" width="16" height="16" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.25 15.8569H10.75C14.5 15.8569 16 14.3569 16 10.6069V6.10687C16 2.35687 14.5 0.856873 10.75 0.856873H6.25C2.5 0.856873 1 2.35687 1 6.10687V10.6069C1 14.3569 2.5 15.8569 6.25 15.8569Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 6.10687H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 10.6069H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>      
                Request Schedule
            </li>
        </a>

        <a href="{{ route('archive-schedule') }}" class="group/hover">
            <li class="flex items-center gap-3 text-[13px] tracking-wide transition duration-200 {{Request::path() == 'archive-schedule' ? 'text-blue-main font-semibold ' : 'group-hover/hover:text-blue-main text-sidebar-items'}}">
                <svg class="transition duration-200 {{Request::path() == 'archive-schedule' ? 'stroke-blue-main' : 'group-hover/hover:stroke-blue-main stroke-sidebar-items'}}" width="16" height="16" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.25 15.8569H10.75C14.5 15.8569 16 14.3569 16 10.6069V6.10687C16 2.35687 14.5 0.856873 10.75 0.856873H6.25C2.5 0.856873 1 2.35687 1 6.10687V10.6069C1 14.3569 2.5 15.8569 6.25 15.8569Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 6.10687H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.3125 10.6069H5.6875" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>      
                History
            </li>
        </a>

        @endif
        <a href="{{ route('profile.show') }}" class="group/hover">
            <li class="flex items-center gap-3 text-[13px] tracking-wide transition duration-200 {{Request::path() == 'profile' ? 'text-blue-main font-semibold ' : 'group-hover/hover:text-blue-main text-sidebar-items'}}">
                <svg  class="transition duration-200 {{Request::path() == 'profile' ? 'fill-blue-main' : 'group-hover/hover:fill-blue-main fill-sidebar-items'}}" width="18" height="17" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.22371 10.3201C6.78087 10.3201 5.60986 9.14914 5.60986 7.7063C5.60986 6.26346 6.78087 5.09245 8.22371 5.09245C9.66655 5.09245 10.8376 6.26346 10.8376 7.7063C10.8376 9.14914 9.66655 10.3201 8.22371 10.3201ZM8.22371 6.13799C7.3594 6.13799 6.6554 6.84199 6.6554 7.7063C6.6554 8.57061 7.3594 9.27461 8.22371 9.27461C9.08802 9.27461 9.79202 8.57061 9.79202 7.7063C9.79202 6.84199 9.08802 6.13799 8.22371 6.13799Z"/>
                    <path d="M10.4612 14.8089C10.3148 14.8089 10.1684 14.7879 10.0221 14.7531C9.58991 14.6346 9.22746 14.3628 8.99744 13.9794L8.9138 13.84C8.50255 13.129 7.93796 13.129 7.52672 13.84L7.45004 13.9724C7.22003 14.3628 6.85757 14.6416 6.42542 14.7531C5.98629 14.8716 5.53322 14.8089 5.14986 14.5788L3.95097 13.8888C3.52579 13.6448 3.2191 13.2475 3.08666 12.7666C2.9612 12.2856 3.02393 11.7907 3.26789 11.3655C3.47003 11.0101 3.52579 10.6894 3.40729 10.4873C3.2888 10.2852 2.98908 10.1667 2.57783 10.1667C1.56017 10.1667 0.730713 9.3372 0.730713 8.31955V7.09278C0.730713 6.07512 1.56017 5.24566 2.57783 5.24566C2.98908 5.24566 3.2888 5.12717 3.40729 4.92503C3.52579 4.72289 3.477 4.40226 3.26789 4.04678C3.02393 3.62159 2.9612 3.11973 3.08666 2.64575C3.21213 2.16481 3.51882 1.7675 3.95097 1.52354L5.15683 0.833487C5.94447 0.366479 6.98304 0.638319 7.45701 1.4399L7.54066 1.5793C7.9519 2.29027 8.51649 2.29027 8.92774 1.5793L9.00441 1.44687C9.47839 0.638319 10.517 0.366479 11.3116 0.840457L12.5105 1.53051C12.9356 1.77447 13.2423 2.17178 13.3748 2.65272C13.5002 3.13367 13.4375 3.62856 13.1935 4.05375C12.9914 4.40923 12.9356 4.72986 13.0541 4.932C13.1726 5.13414 13.4723 5.25263 13.8836 5.25263C14.9013 5.25263 15.7307 6.08209 15.7307 7.09975V8.32652C15.7307 9.34417 14.9013 10.1736 13.8836 10.1736C13.4723 10.1736 13.1726 10.2921 13.0541 10.4943C12.9356 10.6964 12.9844 11.017 13.1935 11.3725C13.4375 11.7977 13.5072 12.2996 13.3748 12.7735C13.2493 13.2545 12.9426 13.6518 12.5105 13.8958L11.3046 14.5858C11.0397 14.7322 10.7539 14.8089 10.4612 14.8089ZM8.22374 12.2299C8.8441 12.2299 9.42263 12.6202 9.81993 13.3103L9.8966 13.4427C9.98025 13.5891 10.1197 13.6936 10.2869 13.7354C10.4542 13.7773 10.6215 13.7563 10.7609 13.6727L11.9668 12.9757C12.148 12.8711 12.2874 12.6969 12.3432 12.4878C12.3989 12.2787 12.371 12.0626 12.2665 11.8813C11.8692 11.1983 11.8204 10.4943 12.1271 9.95756C12.4338 9.42085 13.0681 9.11416 13.8627 9.11416C14.3088 9.11416 14.6643 8.75867 14.6643 8.31258V7.08581C14.6643 6.64668 14.3088 6.28423 13.8627 6.28423C13.0681 6.28423 12.4338 5.97754 12.1271 5.44083C11.8204 4.90412 11.8692 4.20012 12.2665 3.51704C12.371 3.33581 12.3989 3.11973 12.3432 2.91062C12.2874 2.70152 12.155 2.53423 11.9737 2.42271L10.7679 1.73265C10.4682 1.55142 10.0709 1.65598 9.88964 1.96267L9.81296 2.0951C9.41566 2.78516 8.83712 3.17549 8.21677 3.17549C7.59642 3.17549 7.01789 2.78516 6.62058 2.0951L6.54391 1.9557C6.36965 1.66295 5.97932 1.55839 5.6796 1.73265L4.47374 2.42968C4.29252 2.53423 4.15311 2.70849 4.09735 2.91759C4.04159 3.1267 4.06947 3.34278 4.17402 3.52401C4.57133 4.20709 4.62012 4.91109 4.31343 5.4478C4.00674 5.98451 3.37244 6.2912 2.57783 6.2912C2.13174 6.2912 1.77625 6.64668 1.77625 7.09278V8.31955C1.77625 8.75867 2.13174 9.12113 2.57783 9.12113C3.37244 9.12113 4.00674 9.42782 4.31343 9.96453C4.62012 10.5012 4.57133 11.2052 4.17402 11.8883C4.06947 12.0695 4.04159 12.2856 4.09735 12.4947C4.15311 12.7038 4.28555 12.8711 4.46677 12.9826L5.67263 13.6727C5.819 13.7633 5.99326 13.7842 6.15357 13.7424C6.32086 13.7006 6.46027 13.5891 6.55088 13.4427L6.62755 13.3103C7.02486 12.6272 7.60339 12.2299 8.22374 12.2299Z"/>
                </svg>                
                Settings
            </li>
        </a>
    </ul>

    <ul class="flex flex-col font-Mulish font-medium gap-7 py-4">

        <p class="text-sidebar-items font-semibold text-sm">Workspace</p>

    </ul>

    <a href="{{ route('logout') }}"  style="cursor: pointer" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();" class="group/hover text-sidebar-items flex items-center gap-3 text-[13px] tracking-wide font-Mulish font-medium mt-auto transition duration-200 hover:text-blue-main">
        <svg class="fill-[#292D32] group-hover/hover:fill-blue-main transition duration-200" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.2317 15.5224H10.1365C6.88754 15.5224 5.32157 14.2418 5.05082 11.3733C5.02155 11.0733 5.24108 10.8026 5.54842 10.7733C5.84112 10.744 6.11919 10.9709 6.14846 11.2709C6.36067 13.5686 7.44367 14.4248 10.1439 14.4248H10.239C13.2173 14.4248 14.271 13.371 14.271 10.3928V5.6217C14.271 2.64344 13.2173 1.5897 10.239 1.5897H10.1439C7.42904 1.5897 6.34603 2.4605 6.14846 4.80213C6.11187 5.10215 5.85576 5.32899 5.54842 5.29972C5.24108 5.27777 5.02155 5.00702 5.0435 4.707C5.2923 1.7946 6.86558 0.492065 10.1365 0.492065H10.2317C13.8246 0.492065 15.3613 2.02876 15.3613 5.6217V10.3928C15.3613 13.9857 13.8246 15.5224 10.2317 15.5224Z" fill-opacity="0.5"/>
            <path d="M10.0549 8.55607H1.72753C1.42751 8.55607 1.17871 8.30728 1.17871 8.00725C1.17871 7.70723 1.42751 7.45844 1.72753 7.45844H10.0549C10.3549 7.45844 10.6037 7.70723 10.6037 8.00725C10.6037 8.30728 10.3549 8.55607 10.0549 8.55607Z" fill-opacity="0.5"/>
            <path d="M3.35971 11.0075C3.22068 11.0075 3.08164 10.9563 2.97188 10.8466L0.520486 8.39516C0.308276 8.18295 0.308276 7.83171 0.520486 7.6195L2.97188 5.1681C3.18409 4.95589 3.53533 4.95589 3.74754 5.1681C3.95975 5.38031 3.95975 5.73155 3.74754 5.94376L1.68398 8.00733L3.74754 10.0709C3.95975 10.2831 3.95975 10.6343 3.74754 10.8466C3.6451 10.9563 3.49875 11.0075 3.35971 11.0075Z" fill-opacity="0.5"/>
        </svg>  
        Logout          
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</div>

@if(Auth::user() != null && Auth::user()->role === 'student' || Auth::user() != null && Auth::user()->role === 'teacher')
    @include('components.request-schedule-modal')
@endif
@stack('script')


@include('dashboard.shared.searchJS')