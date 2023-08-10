@extends('database.layouts.main')

@section('dcontent') 

    <div class="w-full h-screen pt-4 pb-10 overflow-y-auto hide-scroll">

        <div class="w-full flex items-center justify-between text-breadcrumbs px-12 font-Publicsans">

            <!-- Breadcrumb -->
            <div class="flex flex-col text-xs leading-none">
                <p class="font-bold text-xl text-[#1f2937]">Dashboard</p>
                <div class="flex items-center gap-2 font-medium">
                    <p>Dashboard</p>
                    <span>
                        <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.07942 0.770967L6.19029 5.1375C6.31597 5.27036 6.37879 5.44086 6.37879 5.6115C6.37879 5.78205 6.31594 5.95249 6.19029 6.0855L2.07942 10.452C1.81743 10.7278 1.38107 10.7393 1.10471 10.4779C0.826401 10.2158 0.816576 9.77752 1.07778 9.50289L4.76635 5.61035L1.07778 1.71782C0.816576 1.44318 0.826343 1.00797 1.10471 0.743963C1.38107 0.482833 1.81743 0.494324 2.07942 0.770967Z" fill="#6B7280"/>
                        </svg>
                    </span>
                    <p>Home</p>
                </div>
            </div>

            <!-- Current date -->
            <div class="flex items-center gap-3 p-2 px-3 border-2 border-[#f3f4f6] rounded-md">
                <p class="text-[#6b7280] font-medium text-[13px] tracking-wide">
                    10 Sep 2022
                    <span> - </span>
                    11 Oct 2022
                </p>
                <svg class="-mt-0.5" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.25011 2.33333H8.75011V1.3611C8.75011 1.03906 9.01018 0.777771 9.33344 0.777771C9.6567 0.777771 9.91677 1.03906 9.91677 1.3611V2.33333H10.889C11.747 2.33333 12.4446 3.02968 12.4446 3.88888V11.6667C12.4446 12.5246 11.747 13.2222 10.889 13.2222H3.11122C2.25202 13.2222 1.55566 12.5246 1.55566 11.6667V3.88888C1.55566 3.02968 2.25202 2.33333 3.11122 2.33333H4.08344V1.3611C4.08344 1.03906 4.34351 0.777771 4.66677 0.777771C4.99004 0.777771 5.25011 1.03906 5.25011 1.3611V2.33333ZM2.72233 11.6667C2.72233 11.8805 2.89636 12.0555 3.11122 12.0555H10.889C11.1029 12.0555 11.2779 11.8805 11.2779 11.6667V5.44444H2.72233V11.6667Z" fill="#9CA3AF"/>
                </svg>                    
            </div>

        </div>

        <!-- Stats cards start -->
        <div class="w-full px-12">

            <div class="flex items-center font-Publicsans w-full h-[150px] border-[1.5px] drop-shadow border-[#e5e7eb] rounded-2xl overflow-auto hide-scroll mt-6 py-6">
    
                <div class="flex items-center h-full w-[calc(100%/3)] border-r pl-5 pr-7 flex-shrink-0">
                    <div class="flex flex-col gap-1.5 h-full">
                        <p class="font-semibold text-breadcrumbs">Total Download</p>
    
                        <span class="flex items-center text-xs gap-2 text-breadcrumbs">
                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_599_703)">
                                <path d="M9.87442 5.2716C9.49201 5.2716 9.18306 4.96265 9.18306 4.58024C9.18306 4.19784 9.49201 3.88889 9.87442 3.88889H13.3312C13.7136 3.88889 14.0226 4.19784 14.0226 4.58024V8.03703C14.0226 8.41944 13.7136 8.72839 13.3312 8.72839C12.9488 8.72839 12.6399 8.41944 12.6399 8.03703V6.25031L8.97998 9.90802C8.70992 10.1781 8.2735 10.1781 8.00343 9.90802L5.70683 7.63302L2.7584 10.5994C2.48834 10.8694 2.05062 10.8694 1.78061 10.5994C1.51063 10.3293 1.51063 9.8929 1.78061 9.62284L5.238 6.16605C5.50806 5.89598 5.94448 5.89598 6.21454 6.16605L8.49171 8.44105L11.6611 5.25216L9.87442 5.2716Z" fill="#65A30D"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_599_703">
                                <rect width="14" height="14" fill="white" transform="translate(0.800781)"/>
                                </clipPath>
                                </defs>
                            </svg> 
                            +2.4%                           
                        </span>
    
                        <p class="font-semibold text-card text-2xl mt-auto">7,890</p>
                    </div>
    
                    <svg width="62" height="34" class="ml-auto" viewBox="0 0 62 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.800781 33.701V22.2421C3.42578 22.2421 5.67578 18.4933 8.30078 18.4933C10.9258 18.4933 13.1758 21.7735 15.8008 21.7735C18.4258 21.7735 20.6758 15.0569 23.3008 15.0569C25.9258 15.0569 28.1758 11.7766 30.8008 11.7766C33.4258 11.7766 35.6758 10.0584 38.3008 10.0584C40.9258 10.0584 43.1758 8.34021 45.8008 8.34021C48.4258 8.34021 50.6758 11.7766 53.3008 11.7766C55.9258 11.7766 58.1758 16.7751 60.8008 16.7751C60.8008 16.7751 60.8008 26.672 60.8008 33.701" fill="url(#paint0_linear_599_707)"/>
                        <path d="M0.800781 21.9485C3.42578 21.9485 5.67578 18.2788 8.30078 18.2788C10.9258 18.2788 13.1758 21.4898 15.8008 21.4898C18.4258 21.4898 20.6758 14.915 23.3008 14.915C25.9258 14.915 28.1758 11.704 30.8008 11.704C33.4258 11.704 35.6758 10.0221 38.3008 10.0221C40.9258 10.0221 43.1758 8.34021 45.8008 8.34021C48.4258 8.34021 50.6758 11.704 53.3008 11.704C55.9258 11.704 58.1758 16.5969 60.8008 16.5969" stroke="#6418C3" stroke-linecap="round"/>
                        <defs>
                        <linearGradient id="paint0_linear_599_707" x1="30.8008" y1="8.34021" x2="30.8008" y2="33.701" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#6418C3" stop-opacity="0.32"/>
                        <stop offset="1" stop-color="#6418C3" stop-opacity="0.08"/>
                        </linearGradient>
                        </defs>
                    </svg>                    
                </div>
                
                <div class="flex items-center h-full w-[calc(100%/3)] border-r pr-7 flex-shrink-0 pl-5">
                    <div class="flex flex-col gap-1.5 h-full">
                        <p class="font-semibold text-breadcrumbs">Total Install</p>
    
                        <span class="flex items-center text-xs gap-2 text-breadcrumbs">
                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_599_703)">
                                <path d="M9.87442 5.2716C9.49201 5.2716 9.18306 4.96265 9.18306 4.58024C9.18306 4.19784 9.49201 3.88889 9.87442 3.88889H13.3312C13.7136 3.88889 14.0226 4.19784 14.0226 4.58024V8.03703C14.0226 8.41944 13.7136 8.72839 13.3312 8.72839C12.9488 8.72839 12.6399 8.41944 12.6399 8.03703V6.25031L8.97998 9.90802C8.70992 10.1781 8.2735 10.1781 8.00343 9.90802L5.70683 7.63302L2.7584 10.5994C2.48834 10.8694 2.05062 10.8694 1.78061 10.5994C1.51063 10.3293 1.51063 9.8929 1.78061 9.62284L5.238 6.16605C5.50806 5.89598 5.94448 5.89598 6.21454 6.16605L8.49171 8.44105L11.6611 5.25216L9.87442 5.2716Z" fill="#65A30D"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_599_703">
                                <rect width="14" height="14" fill="white" transform="translate(0.800781)"/>
                                </clipPath>
                                </defs>
                            </svg> 
                            +2.4%                           
                        </span>
    
                        <p class="font-semibold text-card text-2xl mt-auto">7,890</p>
                    </div>
    
                    <svg width="62" height="34" class="ml-auto" viewBox="0 0 62 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M60.8008 33.7008V22.2419C58.1758 22.2419 55.9258 18.4931 53.3008 18.4931C50.6758 18.4931 48.4258 21.7733 45.8008 21.7733C43.1758 21.7733 40.9258 15.0566 38.3008 15.0566C35.6758 15.0566 33.4258 11.7764 30.8008 11.7764C28.1758 11.7764 25.9258 10.0582 23.3008 10.0582C20.6758 10.0582 18.4258 8.33998 15.8008 8.33998C13.1758 8.33998 10.9258 11.7764 8.30079 11.7764C5.67579 11.7764 3.42578 16.7748 0.800785 16.7748C0.800785 16.7748 0.800785 26.6718 0.800785 33.7008" fill="url(#paint0_linear_599_721)"/>
                        <path d="M60.8008 21.9482C58.1758 21.9482 55.9258 18.2786 53.3008 18.2786C50.6758 18.2786 48.4258 21.4895 45.8008 21.4895C43.1758 21.4895 40.9258 14.9148 38.3008 14.9148C35.6758 14.9148 33.4258 11.7038 30.8008 11.7038C28.1758 11.7038 25.9258 10.0219 23.3008 10.0219C20.6758 10.0219 18.4258 8.33998 15.8008 8.33998C13.1758 8.33998 10.9258 11.7038 8.30078 11.7038C5.67578 11.7038 3.42578 16.5967 0.800782 16.5967" stroke="#3B82F6" stroke-linecap="round"/>
                        <defs>
                        <linearGradient id="paint0_linear_599_721" x1="30.8008" y1="8.33998" x2="30.8008" y2="33.7008" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#3B82F6" stop-opacity="0.32"/>
                        <stop offset="1" stop-color="#3B82F6" stop-opacity="0.08"/>
                        </linearGradient>
                        </defs>
                    </svg>
                                                        
                </div>
                
                <div class="flex items-center h-full w-[calc(100%/3)] border-r pr-7 flex-shrink-0 pl-5">
                    <div class="flex flex-col gap-1.5 h-full">
                        <p class="font-semibold text-breadcrumbs">Total Install</p>
    
                        <span class="flex items-center text-xs gap-2 text-breadcrumbs">
                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_599_703)">
                                <path d="M9.87442 5.2716C9.49201 5.2716 9.18306 4.96265 9.18306 4.58024C9.18306 4.19784 9.49201 3.88889 9.87442 3.88889H13.3312C13.7136 3.88889 14.0226 4.19784 14.0226 4.58024V8.03703C14.0226 8.41944 13.7136 8.72839 13.3312 8.72839C12.9488 8.72839 12.6399 8.41944 12.6399 8.03703V6.25031L8.97998 9.90802C8.70992 10.1781 8.2735 10.1781 8.00343 9.90802L5.70683 7.63302L2.7584 10.5994C2.48834 10.8694 2.05062 10.8694 1.78061 10.5994C1.51063 10.3293 1.51063 9.8929 1.78061 9.62284L5.238 6.16605C5.50806 5.89598 5.94448 5.89598 6.21454 6.16605L8.49171 8.44105L11.6611 5.25216L9.87442 5.2716Z" fill="#65A30D"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_599_703">
                                <rect width="14" height="14" fill="white" transform="translate(0.800781)"/>
                                </clipPath>
                                </defs>
                            </svg> 
                            +2.4%                           
                        </span>
    
                        <p class="font-semibold text-card text-2xl mt-auto">7,890</p>
                    </div>
    
                    <svg width="62" height="34" class="ml-auto" viewBox="0 0 62 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M60.8008 33.7008V22.2419C58.1758 22.2419 55.9258 18.4931 53.3008 18.4931C50.6758 18.4931 48.4258 21.7733 45.8008 21.7733C43.1758 21.7733 40.9258 15.0566 38.3008 15.0566C35.6758 15.0566 33.4258 11.7764 30.8008 11.7764C28.1758 11.7764 25.9258 10.0582 23.3008 10.0582C20.6758 10.0582 18.4258 8.33998 15.8008 8.33998C13.1758 8.33998 10.9258 11.7764 8.30079 11.7764C5.67579 11.7764 3.42578 16.7748 0.800785 16.7748C0.800785 16.7748 0.800785 26.6718 0.800785 33.7008" fill="url(#paint0_linear_599_721)"/>
                        <path d="M60.8008 21.9482C58.1758 21.9482 55.9258 18.2786 53.3008 18.2786C50.6758 18.2786 48.4258 21.4895 45.8008 21.4895C43.1758 21.4895 40.9258 14.9148 38.3008 14.9148C35.6758 14.9148 33.4258 11.7038 30.8008 11.7038C28.1758 11.7038 25.9258 10.0219 23.3008 10.0219C20.6758 10.0219 18.4258 8.33998 15.8008 8.33998C13.1758 8.33998 10.9258 11.7038 8.30078 11.7038C5.67578 11.7038 3.42578 16.5967 0.800782 16.5967" stroke="#3B82F6" stroke-linecap="round"/>
                        <defs>
                        <linearGradient id="paint0_linear_599_721" x1="30.8008" y1="8.33998" x2="30.8008" y2="33.7008" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#3B82F6" stop-opacity="0.32"/>
                        <stop offset="1" stop-color="#3B82F6" stop-opacity="0.08"/>
                        </linearGradient>
                        </defs>
                    </svg>
                                                        
                </div>
    
            </div>
            
        </div>
        <!-- Stats cards end -->

        <!-- Table starts -->
        
        <!-- Table ends -->

    </div>

@endsection