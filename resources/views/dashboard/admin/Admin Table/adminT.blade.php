@extends('database.layouts.main')

@section('dcontent') 

<div class="pl-12 w-full font-Mplus1cus mt-16">

 <div class="flex items-center gap-1 mb-2">
                <p class="text-header font-semibold text-xl">List Data</p>
                <button class="w-5 h-5 mt-2 rounded-md flex items-center justify-center group/hover">
                    <svg width="12" height="11" class="fill-footer opacity-70 group-hover/hover:opacity-100" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.4766 3.48838H10.2906C10.0045 3.48838 9.76733 3.25117 9.76733 2.96512C9.76733 2.67907 10.0045 2.44186 10.2906 2.44186H14.4766C14.7627 2.44186 14.9999 2.67907 14.9999 2.96512C14.9999 3.25117 14.7627 3.48838 14.4766 3.48838Z" />
                        <path d="M3.31395 3.48838H0.523256C0.237209 3.48838 0 3.25117 0 2.96512C0 2.67907 0.237209 2.44186 0.523256 2.44186H3.31395C3.6 2.44186 3.83721 2.67907 3.83721 2.96512C3.83721 3.25117 3.6 3.48838 3.31395 3.48838Z" />
                        <path d="M6.10476 5.93023C4.47221 5.93023 3.13965 4.59767 3.13965 2.96512C3.13965 1.33256 4.47221 0 6.10476 0C7.73732 0 9.06988 1.33256 9.06988 2.96512C9.06988 4.59767 7.73732 5.93023 6.10476 5.93023ZM6.10476 1.04651C5.0443 1.04651 4.18616 1.90465 4.18616 2.96512C4.18616 4.02558 5.0443 4.88372 6.10476 4.88372C7.16523 4.88372 8.02337 4.02558 8.02337 2.96512C8.02337 1.90465 7.16523 1.04651 6.10476 1.04651Z" />
                        <path d="M14.4768 11.1628H11.6861C11.4001 11.1628 11.1628 10.9256 11.1628 10.6395C11.1628 10.3535 11.4001 10.1163 11.6861 10.1163H14.4768C14.7628 10.1163 15.0001 10.3535 15.0001 10.6395C15.0001 10.9256 14.7628 11.1628 14.4768 11.1628Z" />
                        <path d="M4.7093 11.1628H0.523256C0.237209 11.1628 0 10.9256 0 10.6395C0 10.3535 0.237209 10.1163 0.523256 10.1163H4.7093C4.99535 10.1163 5.23256 10.3535 5.23256 10.6395C5.23256 10.9256 4.99535 11.1628 4.7093 11.1628Z" />
                        <path d="M8.89529 13.6047C7.26273 13.6047 5.93018 12.2721 5.93018 10.6395C5.93018 9.00698 7.26273 7.67442 8.89529 7.67442C10.5279 7.67442 11.8604 9.00698 11.8604 10.6395C11.8604 12.2721 10.5279 13.6047 8.89529 13.6047ZM8.89529 8.72093C7.83483 8.72093 6.97669 9.57907 6.97669 10.6395C6.97669 11.7 7.83483 12.5581 8.89529 12.5581C9.95576 12.5581 10.8139 11.7 10.8139 10.6395C10.8139 9.57907 9.95576 8.72093 8.89529 8.72093Z" />
                    </svg>                    
                </button>
                <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-admin">TAMBAH</a>
                <a class="btn btn-success mb-2" style="display: none" id="btn-reset-search">Reset</a>
            </div>

            <table class="w-full">
                <thead>
                    <tr class="m-0 font-medium text-xs text-footer text-opacity-60 text-left">
                        <td class=" pt-6 pb-3 pl-0 m-0">Name</td>
                        <td class=" pt-6 pb-3 pl-0 m-0">Email</td>
                        <td class=" pt-6 pb-3 pl-0 m-0">Role</td>
                        <td class=" pt-6 pb-3 pl-0 m-0">Class</td>
                        {{-- <td class="p-4 pt-6 pb-3 pl-0 ">Date</td> --}}
                        <td class=" pt-6 pb-3 pl-0 m-0">Action</td>
                    </tr>
                </thead>
                <tbody id="table-admin-body">
                    @foreach ($users as $item)
                    <tr class="font-medium text-[13px] text-header text-left"  id="index_{{ $item->id }}">
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->role }}</td>
                        <td>{{ $item->classroom->name ?? 'No Class' }}</td>
                        <td class="p-4 py-[10px] px-0 flex items-center gap-2 w-fit">

                            <button id="btn-delete-admin" data-id="{{ $item->id }}" class="w-9 h-9 flex justify-center items-center border border-footer border-opacity-70 rounded-lg hover:scale-95 transition-all ease-in-out duration-200 hover:border-opacity-100">
                                <svg width="13" height="16" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path  d="M14.4279 4.21598C14.4125 4.21598 14.3895 4.21598 14.3664 4.21598C10.2966 3.80823 6.23444 3.65436 2.21076 4.06211L0.641306 4.21598C0.318183 4.24675 0.0335261 4.01595 0.00275246 3.69282C-0.0280212 3.3697 0.202781 3.09274 0.518212 3.06196L2.08767 2.9081C6.18059 2.49265 10.3273 2.65421 14.4818 3.06196C14.7972 3.09274 15.028 3.37739 14.9972 3.69282C14.9742 3.99287 14.7203 4.21598 14.4279 4.21598Z" fill="#F24040"/>
                                    <path d="M4.81195 3.43896C4.78118 3.43896 4.75041 3.43896 4.71194 3.43126C4.4042 3.37741 4.18879 3.07737 4.24264 2.76963L4.41189 1.76179C4.53499 1.02322 4.70424 0 6.49678 0H8.51246C10.3127 0 10.482 1.06169 10.5974 1.76949L10.7666 2.76963C10.8205 3.08506 10.6051 3.3851 10.2973 3.43126C9.9819 3.48512 9.68186 3.2697 9.6357 2.96197L9.46644 1.96182C9.35873 1.29249 9.33565 1.16171 8.52015 1.16171H6.50447C5.689 1.16171 5.67362 1.26941 5.55821 1.95413L5.38127 2.95427C5.3351 3.23893 5.08892 3.43896 4.81195 3.43896Z" fill="#F24040"/>
                                    <path d="M9.9741 16.5409H5.03492C2.34991 16.5409 2.24221 15.0561 2.15758 13.8559L1.65751 6.10862C1.63443 5.79319 1.88061 5.51624 2.19604 5.49316C2.51917 5.47777 2.78844 5.71627 2.81152 6.0317L3.31159 13.779C3.39622 14.9484 3.42699 15.3869 5.03492 15.3869H9.9741C11.5897 15.3869 11.6205 14.9484 11.6974 13.779L12.1975 6.0317C12.2206 5.71627 12.4975 5.47777 12.813 5.49316C13.1284 5.51624 13.3746 5.7855 13.3515 6.10862L12.8514 13.8559C12.7668 15.0561 12.6591 16.5409 9.9741 16.5409Z" fill="#F24040"/>
                                    <path d="M8.78126 12.3095H6.21936C5.90391 12.3095 5.64233 12.0479 5.64233 11.7325C5.64233 11.417 5.90391 11.1555 6.21936 11.1555H8.78126C9.09669 11.1555 9.35827 11.417 9.35827 11.7325C9.35827 12.0479 9.09669 12.3095 8.78126 12.3095Z" fill="#F24040"/>
                                    <path d="M9.42738 9.2321H5.58067C5.26524 9.2321 5.00366 8.97052 5.00366 8.65509C5.00366 8.33966 5.26524 8.07809 5.58067 8.07809H9.42738C9.74281 8.07809 10.0044 8.33966 10.0044 8.65509C10.0044 8.97052 9.74281 9.2321 9.42738 9.2321Z" fill="#F24040"/>
                                </svg>                                
                            </button>

                            <a href="javascript:void(0)" id="btn-edit-admin" data-id="{{ $item->id }}" class="cursor-pointer w-9 h-9 flex justify-center items-center border border-footer border-opacity-70 rounded-lg hover:scale-95 transition-all ease-in-out duration-200 hover:border-opacity-100">
                                <svg width="14" height="14" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.48188 15.0003H5.34433C1.59985 15.0003 0 13.4004 0 9.65596V5.51841C0 1.77393 1.59985 0.17408 5.34433 0.17408H6.72352C7.00625 0.17408 7.24071 0.408541 7.24071 0.691274C7.24071 0.974006 7.00625 1.20847 6.72352 1.20847H5.34433C2.16532 1.20847 1.03439 2.3394 1.03439 5.51841V9.65596C1.03439 12.835 2.16532 13.9659 5.34433 13.9659H9.48188C12.6609 13.9659 13.7918 12.835 13.7918 9.65596V8.27678C13.7918 7.99405 14.0263 7.75959 14.309 7.75959C14.5918 7.75959 14.8262 7.99405 14.8262 8.27678V9.65596C14.8262 13.4004 13.2264 15.0003 9.48188 15.0003Z" fill="#DBC022"/>
                                    <path d="M4.99902 11.511C4.57837 11.511 4.1922 11.3593 3.90947 11.0835C3.57157 10.7456 3.42675 10.256 3.50261 9.73878L3.79913 7.66311C3.8543 7.26315 4.11635 6.74596 4.39908 6.46322L9.83302 1.02922C11.2053 -0.343072 12.5983 -0.343072 13.9706 1.02922C14.7222 1.78087 15.0601 2.54632 14.9912 3.31176C14.9291 3.9324 14.5981 4.53924 13.9706 5.15987L8.53659 10.5939C8.25386 10.8766 7.73667 11.1387 7.3367 11.1938L5.26107 11.4903C5.17142 11.511 5.08177 11.511 4.99902 11.511ZM10.564 1.76018L5.13005 7.19419C4.99902 7.32521 4.84731 7.62863 4.81973 7.80793L4.5232 9.8836C4.49562 10.0836 4.537 10.2491 4.64043 10.3525C4.74387 10.456 4.90938 10.4973 5.10936 10.4698L7.18499 10.1732C7.36429 10.1456 7.6746 9.99393 7.79873 9.86291L13.2327 4.4289C13.6809 3.98067 13.9154 3.5807 13.9499 3.20832C13.9913 2.76009 13.7568 2.28427 13.2327 1.75329C12.1294 0.64994 11.3708 0.960257 10.564 1.76018Z" fill="#DBC022"/>
                                    <path d="M12.8261 6.09062C12.7778 6.09062 12.7295 6.08372 12.6882 6.06993C10.8745 5.55964 9.43329 4.11839 8.92299 2.30476C8.84713 2.02893 9.00574 1.74619 9.28158 1.66344C9.55741 1.58759 9.84014 1.74619 9.916 2.02203C10.3298 3.49086 11.4952 4.65627 12.964 5.07003C13.2398 5.14588 13.3984 5.43551 13.3226 5.71135C13.2605 5.94581 13.0536 6.09062 12.8261 6.09062Z" fill="#DBC022"/>
                                </svg>                                                        
                            </a>
{{-- 
                            <button id="btn-delete-admin" data-id="{{ $item->id }}" class="w-9 h-9 flex justify-center items-center border border-footer border-opacity-70 rounded-lg hover:scale-95 transition-all ease-in-out duration-200 hover:border-opacity-100 group/hover">
                                <svg width="16" height="14" class="opacity-60 group-hover/hover:opacity-100 transition-all ease-linear duration-150" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.2441 7.34646C11.2441 8.86409 10.0177 10.0905 8.50006 10.0905C6.98244 10.0905 5.7561 8.86409 5.7561 7.34646C5.7561 5.82884 6.98244 4.6025 8.50006 4.6025C10.0177 4.6025 11.2441 5.82884 11.2441 7.34646Z" stroke="#676767" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.50001 13.6852C11.2057 13.6852 13.7274 12.091 15.4826 9.33164C16.1725 8.25091 16.1725 6.43435 15.4826 5.3536C13.7274 2.59427 11.2057 1 8.50001 1C5.79432 1 3.27261 2.59427 1.51737 5.3536C0.827542 6.43435 0.827542 8.25091 1.51737 9.33164C3.27261 12.091 5.79432 13.6852 8.50001 13.6852Z" stroke="#676767" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>                                                            
                            </button> --}}

                        </td>
                    </tr>
                    @endforeach
                    {{-- <tr class="font-medium text-[13px] text-header text-left">
                        <td class="p-4 py-[10px] pl-0 ">Lexa Otosaka</td>
                        <td class="p-4 py-[10px] pl-0 ">XI PPLG 2</td>
                        <td class="p-4 py-[10px] pl-0 ">beaten by sadness</td>
                        <td class="p-4 py-[10px] pl-0 ">Tanggerang</td>
                        <td class="p-4 py-[10px] pl-0 ">October 27th, 2027</td>
                        <td class="p-4 py-[10px] px-0 flex items-center gap-2 w-fit">

                            <button class="w-9 h-9 flex justify-center items-center border border-footer border-opacity-70 rounded-lg hover:scale-95 transition-all ease-in-out duration-200 hover:border-opacity-100">
                                <svg width="13" height="16" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.4279 4.21598C14.4125 4.21598 14.3895 4.21598 14.3664 4.21598C10.2966 3.80823 6.23444 3.65436 2.21076 4.06211L0.641306 4.21598C0.318183 4.24675 0.0335261 4.01595 0.00275246 3.69282C-0.0280212 3.3697 0.202781 3.09274 0.518212 3.06196L2.08767 2.9081C6.18059 2.49265 10.3273 2.65421 14.4818 3.06196C14.7972 3.09274 15.028 3.37739 14.9972 3.69282C14.9742 3.99287 14.7203 4.21598 14.4279 4.21598Z" fill="#F24040"/>
                                    <path d="M4.81195 3.43896C4.78118 3.43896 4.75041 3.43896 4.71194 3.43126C4.4042 3.37741 4.18879 3.07737 4.24264 2.76963L4.41189 1.76179C4.53499 1.02322 4.70424 0 6.49678 0H8.51246C10.3127 0 10.482 1.06169 10.5974 1.76949L10.7666 2.76963C10.8205 3.08506 10.6051 3.3851 10.2973 3.43126C9.9819 3.48512 9.68186 3.2697 9.6357 2.96197L9.46644 1.96182C9.35873 1.29249 9.33565 1.16171 8.52015 1.16171H6.50447C5.689 1.16171 5.67362 1.26941 5.55821 1.95413L5.38127 2.95427C5.3351 3.23893 5.08892 3.43896 4.81195 3.43896Z" fill="#F24040"/>
                                    <path d="M9.9741 16.5409H5.03492C2.34991 16.5409 2.24221 15.0561 2.15758 13.8559L1.65751 6.10862C1.63443 5.79319 1.88061 5.51624 2.19604 5.49316C2.51917 5.47777 2.78844 5.71627 2.81152 6.0317L3.31159 13.779C3.39622 14.9484 3.42699 15.3869 5.03492 15.3869H9.9741C11.5897 15.3869 11.6205 14.9484 11.6974 13.779L12.1975 6.0317C12.2206 5.71627 12.4975 5.47777 12.813 5.49316C13.1284 5.51624 13.3746 5.7855 13.3515 6.10862L12.8514 13.8559C12.7668 15.0561 12.6591 16.5409 9.9741 16.5409Z" fill="#F24040"/>
                                    <path d="M8.78126 12.3095H6.21936C5.90391 12.3095 5.64233 12.0479 5.64233 11.7325C5.64233 11.417 5.90391 11.1555 6.21936 11.1555H8.78126C9.09669 11.1555 9.35827 11.417 9.35827 11.7325C9.35827 12.0479 9.09669 12.3095 8.78126 12.3095Z" fill="#F24040"/>
                                    <path d="M9.42738 9.2321H5.58067C5.26524 9.2321 5.00366 8.97052 5.00366 8.65509C5.00366 8.33966 5.26524 8.07809 5.58067 8.07809H9.42738C9.74281 8.07809 10.0044 8.33966 10.0044 8.65509C10.0044 8.97052 9.74281 9.2321 9.42738 9.2321Z" fill="#F24040"/>
                                </svg>                                
                            </button>

                            <label for="tw-modal" data-id="input" class="cmodal cursor-pointer w-9 h-9 flex justify-center items-center border border-footer border-opacity-70 rounded-lg hover:scale-95 transition-all ease-in-out duration-200 hover:border-opacity-100">
                                <svg width="14" height="14" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.48188 15.0003H5.34433C1.59985 15.0003 0 13.4004 0 9.65596V5.51841C0 1.77393 1.59985 0.17408 5.34433 0.17408H6.72352C7.00625 0.17408 7.24071 0.408541 7.24071 0.691274C7.24071 0.974006 7.00625 1.20847 6.72352 1.20847H5.34433C2.16532 1.20847 1.03439 2.3394 1.03439 5.51841V9.65596C1.03439 12.835 2.16532 13.9659 5.34433 13.9659H9.48188C12.6609 13.9659 13.7918 12.835 13.7918 9.65596V8.27678C13.7918 7.99405 14.0263 7.75959 14.309 7.75959C14.5918 7.75959 14.8262 7.99405 14.8262 8.27678V9.65596C14.8262 13.4004 13.2264 15.0003 9.48188 15.0003Z" fill="#DBC022"/>
                                    <path d="M4.99902 11.511C4.57837 11.511 4.1922 11.3593 3.90947 11.0835C3.57157 10.7456 3.42675 10.256 3.50261 9.73878L3.79913 7.66311C3.8543 7.26315 4.11635 6.74596 4.39908 6.46322L9.83302 1.02922C11.2053 -0.343072 12.5983 -0.343072 13.9706 1.02922C14.7222 1.78087 15.0601 2.54632 14.9912 3.31176C14.9291 3.9324 14.5981 4.53924 13.9706 5.15987L8.53659 10.5939C8.25386 10.8766 7.73667 11.1387 7.3367 11.1938L5.26107 11.4903C5.17142 11.511 5.08177 11.511 4.99902 11.511ZM10.564 1.76018L5.13005 7.19419C4.99902 7.32521 4.84731 7.62863 4.81973 7.80793L4.5232 9.8836C4.49562 10.0836 4.537 10.2491 4.64043 10.3525C4.74387 10.456 4.90938 10.4973 5.10936 10.4698L7.18499 10.1732C7.36429 10.1456 7.6746 9.99393 7.79873 9.86291L13.2327 4.4289C13.6809 3.98067 13.9154 3.5807 13.9499 3.20832C13.9913 2.76009 13.7568 2.28427 13.2327 1.75329C12.1294 0.64994 11.3708 0.960257 10.564 1.76018Z" fill="#DBC022"/>
                                    <path d="M12.8261 6.09062C12.7778 6.09062 12.7295 6.08372 12.6882 6.06993C10.8745 5.55964 9.43329 4.11839 8.92299 2.30476C8.84713 2.02893 9.00574 1.74619 9.28158 1.66344C9.55741 1.58759 9.84014 1.74619 9.916 2.02203C10.3298 3.49086 11.4952 4.65627 12.964 5.07003C13.2398 5.14588 13.3984 5.43551 13.3226 5.71135C13.2605 5.94581 13.0536 6.09062 12.8261 6.09062Z" fill="#DBC022"/>
                                </svg>                                                        
                            </label>

                            <button class="w-9 h-9 flex justify-center items-center border border-footer border-opacity-70 rounded-lg hover:scale-95 transition-all ease-in-out duration-200 hover:border-opacity-100 group/hover">
                                <svg width="16" height="14" class="opacity-60 group-hover/hover:opacity-100 transition-all ease-linear duration-150" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.2441 7.34646C11.2441 8.86409 10.0177 10.0905 8.50006 10.0905C6.98244 10.0905 5.7561 8.86409 5.7561 7.34646C5.7561 5.82884 6.98244 4.6025 8.50006 4.6025C10.0177 4.6025 11.2441 5.82884 11.2441 7.34646Z" stroke="#676767" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.50001 13.6852C11.2057 13.6852 13.7274 12.091 15.4826 9.33164C16.1725 8.25091 16.1725 6.43435 15.4826 5.3536C13.7274 2.59427 11.2057 1 8.50001 1C5.79432 1 3.27261 2.59427 1.51737 5.3536C0.827542 6.43435 0.827542 8.25091 1.51737 9.33164C3.27261 12.091 5.79432 13.6852 8.50001 13.6852Z" stroke="#676767" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>                                                            
                            </button>

                        </td>
                    </tr>
                    <tr class="font-medium text-[13px] text-header text-left">
                        <td class="p-4 py-[10px] pl-0 ">Lexa Otosaka</td>
                        <td class="p-4 py-[10px] pl-0 ">XI PPLG 2</td>
                        <td class="p-4 py-[10px] pl-0 ">beaten by sadness</td>
                        <td class="p-4 py-[10px] pl-0 ">Tanggerang</td>
                        <td class="p-4 py-[10px] pl-0 ">October 27th, 2027</td>
                        <td class="p-4 py-[10px] px-0 flex items-center gap-2 w-fit">

                            <button class="w-9 h-9 flex justify-center items-center border border-footer border-opacity-70 rounded-lg hover:scale-95 transition-all ease-in-out duration-200 hover:border-opacity-100">
                                <svg width="13" height="16" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.4279 4.21598C14.4125 4.21598 14.3895 4.21598 14.3664 4.21598C10.2966 3.80823 6.23444 3.65436 2.21076 4.06211L0.641306 4.21598C0.318183 4.24675 0.0335261 4.01595 0.00275246 3.69282C-0.0280212 3.3697 0.202781 3.09274 0.518212 3.06196L2.08767 2.9081C6.18059 2.49265 10.3273 2.65421 14.4818 3.06196C14.7972 3.09274 15.028 3.37739 14.9972 3.69282C14.9742 3.99287 14.7203 4.21598 14.4279 4.21598Z" fill="#F24040"/>
                                    <path d="M4.81195 3.43896C4.78118 3.43896 4.75041 3.43896 4.71194 3.43126C4.4042 3.37741 4.18879 3.07737 4.24264 2.76963L4.41189 1.76179C4.53499 1.02322 4.70424 0 6.49678 0H8.51246C10.3127 0 10.482 1.06169 10.5974 1.76949L10.7666 2.76963C10.8205 3.08506 10.6051 3.3851 10.2973 3.43126C9.9819 3.48512 9.68186 3.2697 9.6357 2.96197L9.46644 1.96182C9.35873 1.29249 9.33565 1.16171 8.52015 1.16171H6.50447C5.689 1.16171 5.67362 1.26941 5.55821 1.95413L5.38127 2.95427C5.3351 3.23893 5.08892 3.43896 4.81195 3.43896Z" fill="#F24040"/>
                                    <path d="M9.9741 16.5409H5.03492C2.34991 16.5409 2.24221 15.0561 2.15758 13.8559L1.65751 6.10862C1.63443 5.79319 1.88061 5.51624 2.19604 5.49316C2.51917 5.47777 2.78844 5.71627 2.81152 6.0317L3.31159 13.779C3.39622 14.9484 3.42699 15.3869 5.03492 15.3869H9.9741C11.5897 15.3869 11.6205 14.9484 11.6974 13.779L12.1975 6.0317C12.2206 5.71627 12.4975 5.47777 12.813 5.49316C13.1284 5.51624 13.3746 5.7855 13.3515 6.10862L12.8514 13.8559C12.7668 15.0561 12.6591 16.5409 9.9741 16.5409Z" fill="#F24040"/>
                                    <path d="M8.78126 12.3095H6.21936C5.90391 12.3095 5.64233 12.0479 5.64233 11.7325C5.64233 11.417 5.90391 11.1555 6.21936 11.1555H8.78126C9.09669 11.1555 9.35827 11.417 9.35827 11.7325C9.35827 12.0479 9.09669 12.3095 8.78126 12.3095Z" fill="#F24040"/>
                                    <path d="M9.42738 9.2321H5.58067C5.26524 9.2321 5.00366 8.97052 5.00366 8.65509C5.00366 8.33966 5.26524 8.07809 5.58067 8.07809H9.42738C9.74281 8.07809 10.0044 8.33966 10.0044 8.65509C10.0044 8.97052 9.74281 9.2321 9.42738 9.2321Z" fill="#F24040"/>
                                </svg>                                
                            </button>

                            <label for="tw-modal" data-id="input" class="cmodal cursor-pointer w-9 h-9 flex justify-center items-center border border-footer border-opacity-70 rounded-lg hover:scale-95 transition-all ease-in-out duration-200 hover:border-opacity-100">
                                <svg width="14" height="14" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.48188 15.0003H5.34433C1.59985 15.0003 0 13.4004 0 9.65596V5.51841C0 1.77393 1.59985 0.17408 5.34433 0.17408H6.72352C7.00625 0.17408 7.24071 0.408541 7.24071 0.691274C7.24071 0.974006 7.00625 1.20847 6.72352 1.20847H5.34433C2.16532 1.20847 1.03439 2.3394 1.03439 5.51841V9.65596C1.03439 12.835 2.16532 13.9659 5.34433 13.9659H9.48188C12.6609 13.9659 13.7918 12.835 13.7918 9.65596V8.27678C13.7918 7.99405 14.0263 7.75959 14.309 7.75959C14.5918 7.75959 14.8262 7.99405 14.8262 8.27678V9.65596C14.8262 13.4004 13.2264 15.0003 9.48188 15.0003Z" fill="#DBC022"/>
                                    <path d="M4.99902 11.511C4.57837 11.511 4.1922 11.3593 3.90947 11.0835C3.57157 10.7456 3.42675 10.256 3.50261 9.73878L3.79913 7.66311C3.8543 7.26315 4.11635 6.74596 4.39908 6.46322L9.83302 1.02922C11.2053 -0.343072 12.5983 -0.343072 13.9706 1.02922C14.7222 1.78087 15.0601 2.54632 14.9912 3.31176C14.9291 3.9324 14.5981 4.53924 13.9706 5.15987L8.53659 10.5939C8.25386 10.8766 7.73667 11.1387 7.3367 11.1938L5.26107 11.4903C5.17142 11.511 5.08177 11.511 4.99902 11.511ZM10.564 1.76018L5.13005 7.19419C4.99902 7.32521 4.84731 7.62863 4.81973 7.80793L4.5232 9.8836C4.49562 10.0836 4.537 10.2491 4.64043 10.3525C4.74387 10.456 4.90938 10.4973 5.10936 10.4698L7.18499 10.1732C7.36429 10.1456 7.6746 9.99393 7.79873 9.86291L13.2327 4.4289C13.6809 3.98067 13.9154 3.5807 13.9499 3.20832C13.9913 2.76009 13.7568 2.28427 13.2327 1.75329C12.1294 0.64994 11.3708 0.960257 10.564 1.76018Z" fill="#DBC022"/>
                                    <path d="M12.8261 6.09062C12.7778 6.09062 12.7295 6.08372 12.6882 6.06993C10.8745 5.55964 9.43329 4.11839 8.92299 2.30476C8.84713 2.02893 9.00574 1.74619 9.28158 1.66344C9.55741 1.58759 9.84014 1.74619 9.916 2.02203C10.3298 3.49086 11.4952 4.65627 12.964 5.07003C13.2398 5.14588 13.3984 5.43551 13.3226 5.71135C13.2605 5.94581 13.0536 6.09062 12.8261 6.09062Z" fill="#DBC022"/>
                                </svg>                                                        
                            </label>

                            <button class="w-9 h-9 flex justify-center items-center border border-footer border-opacity-70 rounded-lg hover:scale-95 transition-all ease-in-out duration-200 hover:border-opacity-100 group/hover">
                                <svg width="16" height="14" class="opacity-60 group-hover/hover:opacity-100 transition-all ease-linear duration-150" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.2441 7.34646C11.2441 8.86409 10.0177 10.0905 8.50006 10.0905C6.98244 10.0905 5.7561 8.86409 5.7561 7.34646C5.7561 5.82884 6.98244 4.6025 8.50006 4.6025C10.0177 4.6025 11.2441 5.82884 11.2441 7.34646Z" stroke="#676767" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.50001 13.6852C11.2057 13.6852 13.7274 12.091 15.4826 9.33164C16.1725 8.25091 16.1725 6.43435 15.4826 5.3536C13.7274 2.59427 11.2057 1 8.50001 1C5.79432 1 3.27261 2.59427 1.51737 5.3536C0.827542 6.43435 0.827542 8.25091 1.51737 9.33164C3.27261 12.091 5.79432 13.6852 8.50001 13.6852Z" stroke="#676767" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>                                                            
                            </button>

                        </td>
                    </tr>
                    <tr class="font-medium text-[13px] text-header text-left">
                        <td class="p-4 py-[10px] pl-0 ">Lexa Otosaka</td>
                        <td class="p-4 py-[10px] pl-0 ">XI PPLG 2</td>
                        <td class="p-4 py-[10px] pl-0 ">beaten by sadness</td>
                        <td class="p-4 py-[10px] pl-0 ">Tanggerang</td>
                        <td class="p-4 py-[10px] pl-0 ">October 27th, 2027</td>
                        <td class="p-4 py-[10px] px-0 flex items-center gap-2 w-fit">

                            <button class="w-9 h-9 flex justify-center items-center border border-footer border-opacity-70 rounded-lg hover:scale-95 transition-all ease-in-out duration-200 hover:border-opacity-100">
                                <svg width="13" height="16" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.4279 4.21598C14.4125 4.21598 14.3895 4.21598 14.3664 4.21598C10.2966 3.80823 6.23444 3.65436 2.21076 4.06211L0.641306 4.21598C0.318183 4.24675 0.0335261 4.01595 0.00275246 3.69282C-0.0280212 3.3697 0.202781 3.09274 0.518212 3.06196L2.08767 2.9081C6.18059 2.49265 10.3273 2.65421 14.4818 3.06196C14.7972 3.09274 15.028 3.37739 14.9972 3.69282C14.9742 3.99287 14.7203 4.21598 14.4279 4.21598Z" fill="#F24040"/>
                                    <path d="M4.81195 3.43896C4.78118 3.43896 4.75041 3.43896 4.71194 3.43126C4.4042 3.37741 4.18879 3.07737 4.24264 2.76963L4.41189 1.76179C4.53499 1.02322 4.70424 0 6.49678 0H8.51246C10.3127 0 10.482 1.06169 10.5974 1.76949L10.7666 2.76963C10.8205 3.08506 10.6051 3.3851 10.2973 3.43126C9.9819 3.48512 9.68186 3.2697 9.6357 2.96197L9.46644 1.96182C9.35873 1.29249 9.33565 1.16171 8.52015 1.16171H6.50447C5.689 1.16171 5.67362 1.26941 5.55821 1.95413L5.38127 2.95427C5.3351 3.23893 5.08892 3.43896 4.81195 3.43896Z" fill="#F24040"/>
                                    <path d="M9.9741 16.5409H5.03492C2.34991 16.5409 2.24221 15.0561 2.15758 13.8559L1.65751 6.10862C1.63443 5.79319 1.88061 5.51624 2.19604 5.49316C2.51917 5.47777 2.78844 5.71627 2.81152 6.0317L3.31159 13.779C3.39622 14.9484 3.42699 15.3869 5.03492 15.3869H9.9741C11.5897 15.3869 11.6205 14.9484 11.6974 13.779L12.1975 6.0317C12.2206 5.71627 12.4975 5.47777 12.813 5.49316C13.1284 5.51624 13.3746 5.7855 13.3515 6.10862L12.8514 13.8559C12.7668 15.0561 12.6591 16.5409 9.9741 16.5409Z" fill="#F24040"/>
                                    <path d="M8.78126 12.3095H6.21936C5.90391 12.3095 5.64233 12.0479 5.64233 11.7325C5.64233 11.417 5.90391 11.1555 6.21936 11.1555H8.78126C9.09669 11.1555 9.35827 11.417 9.35827 11.7325C9.35827 12.0479 9.09669 12.3095 8.78126 12.3095Z" fill="#F24040"/>
                                    <path d="M9.42738 9.2321H5.58067C5.26524 9.2321 5.00366 8.97052 5.00366 8.65509C5.00366 8.33966 5.26524 8.07809 5.58067 8.07809H9.42738C9.74281 8.07809 10.0044 8.33966 10.0044 8.65509C10.0044 8.97052 9.74281 9.2321 9.42738 9.2321Z" fill="#F24040"/>
                                </svg>                                
                            </button>

                            <label for="tw-modal" data-id="input" class="cmodal cursor-pointer w-9 h-9 flex justify-center items-center border border-footer border-opacity-70 rounded-lg hover:scale-95 transition-all ease-in-out duration-200 hover:border-opacity-100">
                                <svg width="14" height="14" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.48188 15.0003H5.34433C1.59985 15.0003 0 13.4004 0 9.65596V5.51841C0 1.77393 1.59985 0.17408 5.34433 0.17408H6.72352C7.00625 0.17408 7.24071 0.408541 7.24071 0.691274C7.24071 0.974006 7.00625 1.20847 6.72352 1.20847H5.34433C2.16532 1.20847 1.03439 2.3394 1.03439 5.51841V9.65596C1.03439 12.835 2.16532 13.9659 5.34433 13.9659H9.48188C12.6609 13.9659 13.7918 12.835 13.7918 9.65596V8.27678C13.7918 7.99405 14.0263 7.75959 14.309 7.75959C14.5918 7.75959 14.8262 7.99405 14.8262 8.27678V9.65596C14.8262 13.4004 13.2264 15.0003 9.48188 15.0003Z" fill="#DBC022"/>
                                    <path d="M4.99902 11.511C4.57837 11.511 4.1922 11.3593 3.90947 11.0835C3.57157 10.7456 3.42675 10.256 3.50261 9.73878L3.79913 7.66311C3.8543 7.26315 4.11635 6.74596 4.39908 6.46322L9.83302 1.02922C11.2053 -0.343072 12.5983 -0.343072 13.9706 1.02922C14.7222 1.78087 15.0601 2.54632 14.9912 3.31176C14.9291 3.9324 14.5981 4.53924 13.9706 5.15987L8.53659 10.5939C8.25386 10.8766 7.73667 11.1387 7.3367 11.1938L5.26107 11.4903C5.17142 11.511 5.08177 11.511 4.99902 11.511ZM10.564 1.76018L5.13005 7.19419C4.99902 7.32521 4.84731 7.62863 4.81973 7.80793L4.5232 9.8836C4.49562 10.0836 4.537 10.2491 4.64043 10.3525C4.74387 10.456 4.90938 10.4973 5.10936 10.4698L7.18499 10.1732C7.36429 10.1456 7.6746 9.99393 7.79873 9.86291L13.2327 4.4289C13.6809 3.98067 13.9154 3.5807 13.9499 3.20832C13.9913 2.76009 13.7568 2.28427 13.2327 1.75329C12.1294 0.64994 11.3708 0.960257 10.564 1.76018Z" fill="#DBC022"/>
                                    <path d="M12.8261 6.09062C12.7778 6.09062 12.7295 6.08372 12.6882 6.06993C10.8745 5.55964 9.43329 4.11839 8.92299 2.30476C8.84713 2.02893 9.00574 1.74619 9.28158 1.66344C9.55741 1.58759 9.84014 1.74619 9.916 2.02203C10.3298 3.49086 11.4952 4.65627 12.964 5.07003C13.2398 5.14588 13.3984 5.43551 13.3226 5.71135C13.2605 5.94581 13.0536 6.09062 12.8261 6.09062Z" fill="#DBC022"/>
                                </svg>                                                        
                            </label>

                            <button class="w-9 h-9 flex justify-center items-center border border-footer border-opacity-70 rounded-lg hover:scale-95 transition-all ease-in-out duration-200 hover:border-opacity-100 group/hover">
                                <svg width="16" height="14" class="opacity-60 group-hover/hover:opacity-100 transition-all ease-linear duration-150" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.2441 7.34646C11.2441 8.86409 10.0177 10.0905 8.50006 10.0905C6.98244 10.0905 5.7561 8.86409 5.7561 7.34646C5.7561 5.82884 6.98244 4.6025 8.50006 4.6025C10.0177 4.6025 11.2441 5.82884 11.2441 7.34646Z" stroke="#676767" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.50001 13.6852C11.2057 13.6852 13.7274 12.091 15.4826 9.33164C16.1725 8.25091 16.1725 6.43435 15.4826 5.3536C13.7274 2.59427 11.2057 1 8.50001 1C5.79432 1 3.27261 2.59427 1.51737 5.3536C0.827542 6.43435 0.827542 8.25091 1.51737 9.33164C3.27261 12.091 5.79432 13.6852 8.50001 13.6852Z" stroke="#676767" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>                                                            
                            </button>

                        </td>
                    </tr>
                    <tr class="font-medium text-[13px] text-header text-left">
                        <td class="p-4 py-[10px] pl-0 ">Lexa Otosaka</td>
                        <td class="p-4 py-[10px] pl-0 ">XI PPLG 2</td>
                        <td class="p-4 py-[10px] pl-0 ">beaten by sadness</td>
                        <td class="p-4 py-[10px] pl-0 ">Tanggerang</td>
                        <td class="p-4 py-[10px] pl-0 ">October 27th, 2027</td>
                        <td class="p-4 py-[10px] px-0 flex items-center gap-2 w-fit">

                            <button class="w-9 h-9 flex justify-center items-center border border-footer border-opacity-70 rounded-lg hover:scale-95 transition-all ease-in-out duration-200 hover:border-opacity-100">
                                <svg width="13" height="16" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.4279 4.21598C14.4125 4.21598 14.3895 4.21598 14.3664 4.21598C10.2966 3.80823 6.23444 3.65436 2.21076 4.06211L0.641306 4.21598C0.318183 4.24675 0.0335261 4.01595 0.00275246 3.69282C-0.0280212 3.3697 0.202781 3.09274 0.518212 3.06196L2.08767 2.9081C6.18059 2.49265 10.3273 2.65421 14.4818 3.06196C14.7972 3.09274 15.028 3.37739 14.9972 3.69282C14.9742 3.99287 14.7203 4.21598 14.4279 4.21598Z" fill="#F24040"/>
                                    <path d="M4.81195 3.43896C4.78118 3.43896 4.75041 3.43896 4.71194 3.43126C4.4042 3.37741 4.18879 3.07737 4.24264 2.76963L4.41189 1.76179C4.53499 1.02322 4.70424 0 6.49678 0H8.51246C10.3127 0 10.482 1.06169 10.5974 1.76949L10.7666 2.76963C10.8205 3.08506 10.6051 3.3851 10.2973 3.43126C9.9819 3.48512 9.68186 3.2697 9.6357 2.96197L9.46644 1.96182C9.35873 1.29249 9.33565 1.16171 8.52015 1.16171H6.50447C5.689 1.16171 5.67362 1.26941 5.55821 1.95413L5.38127 2.95427C5.3351 3.23893 5.08892 3.43896 4.81195 3.43896Z" fill="#F24040"/>
                                    <path d="M9.9741 16.5409H5.03492C2.34991 16.5409 2.24221 15.0561 2.15758 13.8559L1.65751 6.10862C1.63443 5.79319 1.88061 5.51624 2.19604 5.49316C2.51917 5.47777 2.78844 5.71627 2.81152 6.0317L3.31159 13.779C3.39622 14.9484 3.42699 15.3869 5.03492 15.3869H9.9741C11.5897 15.3869 11.6205 14.9484 11.6974 13.779L12.1975 6.0317C12.2206 5.71627 12.4975 5.47777 12.813 5.49316C13.1284 5.51624 13.3746 5.7855 13.3515 6.10862L12.8514 13.8559C12.7668 15.0561 12.6591 16.5409 9.9741 16.5409Z" fill="#F24040"/>
                                    <path d="M8.78126 12.3095H6.21936C5.90391 12.3095 5.64233 12.0479 5.64233 11.7325C5.64233 11.417 5.90391 11.1555 6.21936 11.1555H8.78126C9.09669 11.1555 9.35827 11.417 9.35827 11.7325C9.35827 12.0479 9.09669 12.3095 8.78126 12.3095Z" fill="#F24040"/>
                                    <path d="M9.42738 9.2321H5.58067C5.26524 9.2321 5.00366 8.97052 5.00366 8.65509C5.00366 8.33966 5.26524 8.07809 5.58067 8.07809H9.42738C9.74281 8.07809 10.0044 8.33966 10.0044 8.65509C10.0044 8.97052 9.74281 9.2321 9.42738 9.2321Z" fill="#F24040"/>
                                </svg>                                
                            </button>

                            <a href="">
                                <label for="tw-modal" data-id="input" class="cmodal cursor-pointer w-9 h-9 flex justify-center items-center border border-footer border-opacity-70 rounded-lg hover:scale-95 transition-all ease-in-out duration-200 hover:border-opacity-100">
                                    <svg width="14" height="14" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.48188 15.0003H5.34433C1.59985 15.0003 0 13.4004 0 9.65596V5.51841C0 1.77393 1.59985 0.17408 5.34433 0.17408H6.72352C7.00625 0.17408 7.24071 0.408541 7.24071 0.691274C7.24071 0.974006 7.00625 1.20847 6.72352 1.20847H5.34433C2.16532 1.20847 1.03439 2.3394 1.03439 5.51841V9.65596C1.03439 12.835 2.16532 13.9659 5.34433 13.9659H9.48188C12.6609 13.9659 13.7918 12.835 13.7918 9.65596V8.27678C13.7918 7.99405 14.0263 7.75959 14.309 7.75959C14.5918 7.75959 14.8262 7.99405 14.8262 8.27678V9.65596C14.8262 13.4004 13.2264 15.0003 9.48188 15.0003Z" fill="#DBC022"/>
                                        <path d="M4.99902 11.511C4.57837 11.511 4.1922 11.3593 3.90947 11.0835C3.57157 10.7456 3.42675 10.256 3.50261 9.73878L3.79913 7.66311C3.8543 7.26315 4.11635 6.74596 4.39908 6.46322L9.83302 1.02922C11.2053 -0.343072 12.5983 -0.343072 13.9706 1.02922C14.7222 1.78087 15.0601 2.54632 14.9912 3.31176C14.9291 3.9324 14.5981 4.53924 13.9706 5.15987L8.53659 10.5939C8.25386 10.8766 7.73667 11.1387 7.3367 11.1938L5.26107 11.4903C5.17142 11.511 5.08177 11.511 4.99902 11.511ZM10.564 1.76018L5.13005 7.19419C4.99902 7.32521 4.84731 7.62863 4.81973 7.80793L4.5232 9.8836C4.49562 10.0836 4.537 10.2491 4.64043 10.3525C4.74387 10.456 4.90938 10.4973 5.10936 10.4698L7.18499 10.1732C7.36429 10.1456 7.6746 9.99393 7.79873 9.86291L13.2327 4.4289C13.6809 3.98067 13.9154 3.5807 13.9499 3.20832C13.9913 2.76009 13.7568 2.28427 13.2327 1.75329C12.1294 0.64994 11.3708 0.960257 10.564 1.76018Z" fill="#DBC022"/>
                                        <path d="M12.8261 6.09062C12.7778 6.09062 12.7295 6.08372 12.6882 6.06993C10.8745 5.55964 9.43329 4.11839 8.92299 2.30476C8.84713 2.02893 9.00574 1.74619 9.28158 1.66344C9.55741 1.58759 9.84014 1.74619 9.916 2.02203C10.3298 3.49086 11.4952 4.65627 12.964 5.07003C13.2398 5.14588 13.3984 5.43551 13.3226 5.71135C13.2605 5.94581 13.0536 6.09062 12.8261 6.09062Z" fill="#DBC022"/>
                                    </svg>                                                        
                                </label>
                            </a>

                            <button class="w-9 h-9 flex justify-center items-center border border-footer border-opacity-70 rounded-lg hover:scale-95 transition-all ease-in-out duration-200 hover:border-opacity-100 group/hover">
                                <svg width="16" height="14" class="opacity-60 group-hover/hover:opacity-100 transition-all ease-linear duration-150" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.2441 7.34646C11.2441 8.86409 10.0177 10.0905 8.50006 10.0905C6.98244 10.0905 5.7561 8.86409 5.7561 7.34646C5.7561 5.82884 6.98244 4.6025 8.50006 4.6025C10.0177 4.6025 11.2441 5.82884 11.2441 7.34646Z" stroke="#676767" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.50001 13.6852C11.2057 13.6852 13.7274 12.091 15.4826 9.33164C16.1725 8.25091 16.1725 6.43435 15.4826 5.3536C13.7274 2.59427 11.2057 1 8.50001 1C5.79432 1 3.27261 2.59427 1.51737 5.3536C0.827542 6.43435 0.827542 8.25091 1.51737 9.33164C3.27261 12.091 5.79432 13.6852 8.50001 13.6852Z" stroke="#676767" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>                                                            
                            </button>

                        </td>
                    </tr> --}}
                </tbody>
            </table>

        </div>
            <div id="pagination-bar">
              {{ $users->links() }}
            </div>
        </div>
    </div>

    @include('components.modal-admin')

@endsection