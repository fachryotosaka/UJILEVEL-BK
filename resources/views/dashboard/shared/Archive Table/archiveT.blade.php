@extends('database.layouts.main')

@section('dcontent')
    
    <div class="w-full h-full flex flex-col overflow-y-auto hide-scroll py-10 px-12 pt-2">
        
        <div class="flex items-center order gap-2 font-medium text-xs mb-10">
            <p>Dashboard</p>
            <span class="pb-3">
                <svg class=""g width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.07942 0.770967L6.19029 5.1375C6.31597 5.27036 6.37879 5.44086 6.37879 5.6115C6.37879 5.78205 6.31594 5.95249 6.19029 6.0855L2.07942 10.452C1.81743 10.7278 1.38107 10.7393 1.10471 10.4779C0.826401 10.2158 0.816576 9.77752 1.07778 9.50289L4.76635 5.61035L1.07778 1.71782C0.816576 1.44318 0.826343 1.00797 1.10471 0.743963C1.38107 0.482833 1.81743 0.494324 2.07942 0.770967Z" fill="#6B7280"/>
                </svg>
            </span>
            <p>Request</p>
        </div>

        <div class="w-full h-full flex gap-24 font-Mplus1cus">
    
    
            <div class="flex flex-col min-w-[calc(100%/4)] max-w-[calc(100%/4)] h-fit">
    
                <div class="flex items-center w-full gap-3 px-0.5">
                    <p class="pt-3 font-Mulish font-extrabold text-[13px] text-[#1E293B] tracking-wide uppercase">pending</p>
    
                    <span class="rounded-full w-6 h-5 border flex justify-center items-center border-[#E2E8F0] font-Roboto text-sidebar-items font-bold text-xs">{{ $counts['waiting'] ?? 0 }}</span>
    
                    <svg class="ml-auto" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.16634 10.8334C4.62658 10.8334 4.99967 10.4603 4.99967 10C4.99967 9.53978 4.62658 9.16669 4.16634 9.16669C3.7061 9.16669 3.33301 9.53978 3.33301 10C3.33301 10.4603 3.7061 10.8334 4.16634 10.8334Z" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.99935 10.8334C10.4596 10.8334 10.8327 10.4603 10.8327 10C10.8327 9.53978 10.4596 9.16669 9.99935 9.16669C9.53911 9.16669 9.16602 9.53978 9.16602 10C9.16602 10.4603 9.53911 10.8334 9.99935 10.8334Z" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.8333 10.8334C16.2936 10.8334 16.6667 10.4603 16.6667 10C16.6667 9.53978 16.2936 9.16669 15.8333 9.16669C15.3731 9.16669 15 9.53978 15 10C15 10.4603 15.3731 10.8334 15.8333 10.8334Z" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
    
                </div>
    
                <div class="h-[3px] w-full rounded-full my-4 bg-[#FF8800]"></div>
    
                <div class="flex flex-col gap-4">
                  @foreach($statusConsultations as $status => $consultations)
                    @foreach ($consultations as $consultation)
                      @if($consultation->status === 'waiting')
                        <details class="w-full h-fit border bg-white border-[#E2E8F0] cursor-pointer rounded-md p-3 px-4 relative flex flex-col before:absolute before:-z-10 before:h-full before:-right-1 before:-bottom-1 before:rounded-md before:border before:w-full">
                            <summary id="detail" class="flex items-center gap-4">

                                @if(Auth::user()->role === 'teacher')

                                <div class="w-8 h-8 bg-cover bg-center rounded" style="background-image: url({{ $firstImageStudent[$consultation->id]->profile_photo_url ?? '' }})"></div>
                                  @if($consultation->service_name === 'Social Counseling')
                                      <p class="font-bold text-xs text-header m-0">
                                          {{ $consultation->service_name }}
                                      </p>
                                  @else
                                      @if($groupedConsultations[$consultation->id]->isNotEmpty())
                                        @foreach($groupedConsultations[$consultation->id] as $user)
                                            <p class="font-bold text-xs text-header m-0">
                                                {{$user->name}}
                                            </p>
                                        @endforeach
                                      @else
                                        <div class="w-8 h-8 bg-cover bg-center rounded" style="background-image: url({{ Auth::user()->profile_photo_url }})"></div>
                                        <p class="font-bold text-xs text-header m-0">
                                            All classes
                                        </p>
                                      @endif
                                  @endif
                                @else
                                  <div class="w-8 h-8 bg-cover bg-center rounded" style="background-image: url({{ Auth()->user()->profile_photo_url }})"></div>
  
                                  <p class="font-bold text-xs text-header">{{Auth::user()->name}}</p>
                                @endif

                                <svg class="ml-auto " width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.49999 5.9102C5.0558 5.9102 4.61161 5.72459 4.2753 5.36025L0.138016 0.878198C-0.0460053 0.678842 -0.0460053 0.348873 0.138016 0.149517C0.322037 -0.049839 0.626624 -0.049839 0.810645 0.149517L4.94793 4.63157C5.25251 4.96154 5.74747 4.96154 6.05205 4.63157L10.1894 0.149517C10.3734 -0.049839 10.678 -0.049839 10.862 0.149517C11.046 0.348873 11.046 0.678842 10.862 0.878198L6.72468 5.36025C6.38837 5.72459 5.94418 5.9102 5.49999 5.9102Z" fill="#676767" fill-opacity="0.5"/>
                                </svg>                                

                            </summary>

                            <ul class="content flex flex-col gap-4 pt-6 cursor-default">
                                
                                <li class="flex items-center w-full">
                                    <p class="text-[11px] text-subheader/50 font-medium">Title</p>

                                    <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{$consultation->title}}</p>
                                </li>

                                <li class="flex items-center">
                                    <p class="text-[11px] text-subheader/50 font-medium">Description</p>

                                    <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{$consultation->description}}</p>
                                </li>

                                <li class="flex items-center">
                                    <p class="text-[11px] text-subheader/50 font-medium">Consultation Type</p>

                                    <p class="text-header/80 text-xs font-semibold max-w-[60%] overflow-ellipsis ml-auto text-limit">{{ $consultation->service_name }}</p>
                                </li>

                                <li class="flex items-center">
                                    <p class="text-[11px] text-subheader/50 font-medium">Place</p>

                                    <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{ $consultation->place }}</p>
                                </li>

                                <li class="flex items-center">
                                    <p class="text-[11px] text-subheader/50 font-medium">Date</p>

                                    <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{ $consultation->date }}</p>
                                </li>

                                <li class="flex items-center">
                                    <p class="text-[11px] text-subheader/50 font-medium">Time</p>

                                    <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{ $consultation->time }}</p>
                                </li>

                                <a href="{{ Route('request-form', $consultation->id) }}" id="btn-detail-request" for="tw-modal" data-id="detailrequest" class="cmodal cursor-pointer font-Mulish text-white py-2.5 font-bold text-xs text-center rounded tracking-wide bg-[#306BFF] hover:scale-[.98] transition duration-300">
                                    View
                                </a>

                            </ul>

                        </details>
                      @endif
                    @endforeach
                  @endforeach
                </div>
            </div>
    
            <div class="flex flex-col min-w-[calc(100%/4)] max-w-[calc(100%/4)] h-fit">
    
                <div class="flex items-center w-full gap-3 px-0.5">
                    <p class="pt-3 font-Mulish font-extrabold text-[13px] text-[#1E293B] tracking-wide uppercase">Approve</p>
    
                    <span class="rounded-full w-6 h-5 border flex justify-center items-center border-[#E2E8F0] font-Roboto text-sidebar-items font-bold text-xs">{{ $counts['approve'] ?? 0 }}</span>
    
                    <svg class="ml-auto" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.16634 10.8334C4.62658 10.8334 4.99967 10.4603 4.99967 10C4.99967 9.53978 4.62658 9.16669 4.16634 9.16669C3.7061 9.16669 3.33301 9.53978 3.33301 10C3.33301 10.4603 3.7061 10.8334 4.16634 10.8334Z" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.99935 10.8334C10.4596 10.8334 10.8327 10.4603 10.8327 10C10.8327 9.53978 10.4596 9.16669 9.99935 9.16669C9.53911 9.16669 9.16602 9.53978 9.16602 10C9.16602 10.4603 9.53911 10.8334 9.99935 10.8334Z" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.8333 10.8334C16.2936 10.8334 16.6667 10.4603 16.6667 10C16.6667 9.53978 16.2936 9.16669 15.8333 9.16669C15.3731 9.16669 15 9.53978 15 10C15 10.4603 15.3731 10.8334 15.8333 10.8334Z" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
    
                </div>
    
                <div class="h-[3px] w-full rounded-full my-4 bg-[#306BFF]"></div>
    
                <div class="flex flex-col gap-3">

                    <div class="flex flex-col gap-4">

                      @foreach($statusConsultations as $status => $consultations)
                      @foreach ($consultations as $consultation)
                        @if($consultation->status === 'approve')
                          <details class="w-full h-fit border bg-white border-[#E2E8F0] cursor-pointer rounded-md p-3 px-4 relative flex flex-col before:absolute before:-z-10 before:h-full before:-right-1 before:-bottom-1 before:rounded-md before:border before:w-full">
                              
                              <summary id="detail" class="flex items-center gap-4">
  
                                @if(Auth::user()->role === 'teacher')

                                <div class="w-8 h-8 bg-cover bg-center rounded" style="background-image: url({{ $firstImageStudent[$consultation->id]->profile_photo_url ?? '' }})"></div>
                                  @if($consultation->service_name === 'Social Counseling')
                                      <p class="font-bold text-xs text-header m-0">
                                          {{ $consultation->service_name }}
                                      </p>
                                  @else
                                      @if($groupedConsultations[$consultation->id]->isNotEmpty())
                                        @foreach($groupedConsultations[$consultation->id] as $user)
                                            <p class="font-bold text-xs text-header m-0">
                                                {{$user->name}}
                                            </p>
                                        @endforeach
                                      @else
                                        <div class="w-8 h-8 bg-cover bg-center rounded" style="background-image: url({{ Auth::user()->profile_photo_url }})"></div>
                                        <p class="font-bold text-xs text-header m-0">
                                            All classes
                                        </p>
                                      @endif
                                  @endif
                                @else
                                  <div class="w-8 h-8 bg-cover bg-center rounded" style="background-image: url({{ Auth()->user()->profile_photo_url }})"></div>
  
                                  <p class="font-bold text-xs text-header">{{Auth::user()->name}}</p>
                                @endif
  
                                  <svg class="ml-auto " width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.49999 5.9102C5.0558 5.9102 4.61161 5.72459 4.2753 5.36025L0.138016 0.878198C-0.0460053 0.678842 -0.0460053 0.348873 0.138016 0.149517C0.322037 -0.049839 0.626624 -0.049839 0.810645 0.149517L4.94793 4.63157C5.25251 4.96154 5.74747 4.96154 6.05205 4.63157L10.1894 0.149517C10.3734 -0.049839 10.678 -0.049839 10.862 0.149517C11.046 0.348873 11.046 0.678842 10.862 0.878198L6.72468 5.36025C6.38837 5.72459 5.94418 5.9102 5.49999 5.9102Z" fill="#676767" fill-opacity="0.5"/>
                                  </svg>                                
  
                              </summary>
  
                              <ul class="content flex flex-col gap-4 pt-6 cursor-default">
                                  
                                  <li class="flex items-center w-full">
                                      <p class="text-[11px] text-subheader/50 font-medium">Title</p>
  
                                      <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{$consultation->title}}</p>
                                  </li>
  
                                  <li class="flex items-center">
                                      <p class="text-[11px] text-subheader/50 font-medium">Description</p>
  
                                      <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{$consultation->description}}</p>
                                  </li>
  
                                  <li class="flex items-center">
                                      <p class="text-[11px] text-subheader/50 font-medium">Consultation Type</p>
  
                                      <p class="text-header/80 text-xs font-semibold max-w-[60%] overflow-ellipsis ml-auto text-limit">{{ $consultation->service_name }}</p>
                                  </li>
  
                                  <li class="flex items-center">
                                      <p class="text-[11px] text-subheader/50 font-medium">Place</p>
  
                                      <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{ $consultation->place }}</p>
                                  </li>
  
                                  <li class="flex items-center">
                                      <p class="text-[11px] text-subheader/50 font-medium">Date</p>
  
                                      <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{ $consultation->date }}</p>
                                  </li>
  
                                  <li class="flex items-center">
                                      <p class="text-[11px] text-subheader/50 font-medium">Time</p>
  
                                      <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{ $consultation->time }}</p>
                                  </li>
  
                                  <a id="btn-detail-request" data-id="{{ $consultation->id }}" class="cursor-pointer font-Mulish text-white py-2.5 font-bold text-xs text-center rounded tracking-wide bg-[#306BFF] hover:scale-[.98] transition duration-300">
                                      View
                                  </a>
  
                              </ul>
  
                          </details>
                        @endif
                      @endforeach
                    @endforeach
    
                    </div>

                </div>
    
            </div>
    
            <div class="flex flex-col min-w-[calc(100%/4)] max-w-[calc(100%/4)] h-fit">
    
                <div class="flex items-center w-full gap-3 px-0.5">
                    <p class="pt-3 font-Mulish font-extrabold text-[13px] text-[#1E293B] tracking-wide uppercase">Revised</p>
    
                    <span class="rounded-full w-6 h-5 border flex justify-center items-center border-[#E2E8F0] font-Roboto text-sidebar-items font-bold text-xs">{{ $counts['revised'] ?? 0 }}</span>
    
                    <svg class="ml-auto" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.16634 10.8334C4.62658 10.8334 4.99967 10.4603 4.99967 10C4.99967 9.53978 4.62658 9.16669 4.16634 9.16669C3.7061 9.16669 3.33301 9.53978 3.33301 10C3.33301 10.4603 3.7061 10.8334 4.16634 10.8334Z" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.99935 10.8334C10.4596 10.8334 10.8327 10.4603 10.8327 10C10.8327 9.53978 10.4596 9.16669 9.99935 9.16669C9.53911 9.16669 9.16602 9.53978 9.16602 10C9.16602 10.4603 9.53911 10.8334 9.99935 10.8334Z" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.8333 10.8334C16.2936 10.8334 16.6667 10.4603 16.6667 10C16.6667 9.53978 16.2936 9.16669 15.8333 9.16669C15.3731 9.16669 15 9.53978 15 10C15 10.4603 15.3731 10.8334 15.8333 10.8334Z" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
    
                </div>
    
                <div class="h-[3px] w-full rounded-full my-4 bg-[#FFB580]"></div>
    
                <div class="flex flex-col gap-3">

                    <div class="flex flex-col gap-4">

                      @foreach($statusConsultations as $status => $consultations)
                      @foreach ($consultations as $consultation)
                        @if($consultation->status === 'revised')
                          <details class="w-full h-fit border bg-white border-[#E2E8F0] cursor-pointer rounded-md p-3 px-4 relative flex flex-col before:absolute before:-z-10 before:h-full before:-right-1 before:-bottom-1 before:rounded-md before:border before:w-full">
                              
                              <summary id="detail" class="flex items-center gap-4">
  
                                @if(Auth::user()->role === 'teacher')

                                <div class="w-8 h-8 bg-cover bg-center rounded" style="background-image: url({{ $firstImageStudent[$consultation->id]->profile_photo_url ?? '' }})"></div>
                                  @if($consultation->service_name === 'Social Counseling')
                                      <p class="font-bold text-xs text-header m-0">
                                          {{ $consultation->service_name }}
                                      </p>
                                  @else
                                      @if($groupedConsultations[$consultation->id]->isNotEmpty())
                                        @foreach($groupedConsultations[$consultation->id] as $user)
                                            <p class="font-bold text-xs text-header m-0">
                                                {{$user->name}}
                                            </p>
                                        @endforeach
                                      @else
                                        <div class="w-8 h-8 bg-cover bg-center rounded" style="background-image: url({{ Auth::user()->profile_photo_url }})"></div>
                                        <p class="font-bold text-xs text-header m-0">
                                            All classes
                                        </p>
                                      @endif
                                  @endif
                                @else
                                  <div class="w-8 h-8 bg-cover bg-center rounded" style="background-image: url({{ Auth()->user()->profile_photo_url }})"></div>
  
                                  <p class="font-bold text-xs text-header">{{Auth::user()->name}}</p>
                                @endif
  
                                  <svg class="ml-auto " width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.49999 5.9102C5.0558 5.9102 4.61161 5.72459 4.2753 5.36025L0.138016 0.878198C-0.0460053 0.678842 -0.0460053 0.348873 0.138016 0.149517C0.322037 -0.049839 0.626624 -0.049839 0.810645 0.149517L4.94793 4.63157C5.25251 4.96154 5.74747 4.96154 6.05205 4.63157L10.1894 0.149517C10.3734 -0.049839 10.678 -0.049839 10.862 0.149517C11.046 0.348873 11.046 0.678842 10.862 0.878198L6.72468 5.36025C6.38837 5.72459 5.94418 5.9102 5.49999 5.9102Z" fill="#676767" fill-opacity="0.5"/>
                                  </svg>                                
  
                              </summary>
  
                              <ul class="content flex flex-col gap-4 pt-6 cursor-default">
                                  
                                  <li class="flex items-center w-full">
                                      <p class="text-[11px] text-subheader/50 font-medium">Title</p>
  
                                      <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{$consultation->title}}</p>
                                  </li>
  
                                  <li class="flex items-center">
                                      <p class="text-[11px] text-subheader/50 font-medium">Description</p>
  
                                      <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{$consultation->description}}</p>
                                  </li>
  
                                  <li class="flex items-center">
                                      <p class="text-[11px] text-subheader/50 font-medium">Consultation Type</p>
  
                                      <p class="text-header/80 text-xs font-semibold max-w-[60%] overflow-ellipsis ml-auto text-limit">{{ $consultation->service_name }}</p>
                                  </li>
  
                                  <li class="flex items-center">
                                      <p class="text-[11px] text-subheader/50 font-medium">Place</p>
  
                                      <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{ $consultation->place }}</p>
                                  </li>
  
                                  <li class="flex items-center">
                                      <p class="text-[11px] text-subheader/50 font-medium">Date</p>
  
                                      <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{ $consultation->date }}</p>
                                  </li>
  
                                  <li class="flex items-center">
                                      <p class="text-[11px] text-subheader/50 font-medium">Time</p>
  
                                      <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{ $consultation->time }}</p>
                                  </li>
  
                                  <a id="btn-detail-request" data-id="{{ $consultation->id }}" class="cursor-pointer font-Mulish text-white py-2.5 font-bold text-xs text-center rounded tracking-wide bg-[#306BFF] hover:scale-[.98] transition duration-300">
                                    View
                                  </a>
  
                              </ul>
  
                          </details>
                        @endif
                      @endforeach
                    @endforeach
    
                    </div>

                </div>
    
            </div>
    
            <div class="flex flex-col min-w-[calc(100%/4)] max-w-[calc(100%/4)] h-fit">
    
                <div class="flex items-center w-full gap-3 px-0.5">
                    <p class="pt-3 font-Mulish font-extrabold text-[13px] text-[#1E293B] tracking-wide uppercase">completed</p>
    
                    <span class="rounded-full w-6 h-5 border flex justify-center items-center border-[#E2E8F0] font-Roboto text-sidebar-items font-bold text-xs">{{ $counts['finished'] ?? 0 }}</span>
    
                    <svg class="ml-auto" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.16634 10.8334C4.62658 10.8334 4.99967 10.4603 4.99967 10C4.99967 9.53978 4.62658 9.16669 4.16634 9.16669C3.7061 9.16669 3.33301 9.53978 3.33301 10C3.33301 10.4603 3.7061 10.8334 4.16634 10.8334Z" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.99935 10.8334C10.4596 10.8334 10.8327 10.4603 10.8327 10C10.8327 9.53978 10.4596 9.16669 9.99935 9.16669C9.53911 9.16669 9.16602 9.53978 9.16602 10C9.16602 10.4603 9.53911 10.8334 9.99935 10.8334Z" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.8333 10.8334C16.2936 10.8334 16.6667 10.4603 16.6667 10C16.6667 9.53978 16.2936 9.16669 15.8333 9.16669C15.3731 9.16669 15 9.53978 15 10C15 10.4603 15.3731 10.8334 15.8333 10.8334Z" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
    
                </div>
    
                <div class="h-[3px] w-full rounded-full my-4 bg-[#78C552]"></div>
    
                <div class="flex flex-col gap-3">

                    <div class="flex flex-col gap-4">

                      @foreach($statusConsultations as $status => $consultations)
                      @foreach ($consultations as $consultation)
                        @if($consultation->status === 'finished')
                          <details class="w-full h-fit border bg-white border-[#E2E8F0] cursor-pointer rounded-md p-3 px-4 relative flex flex-col before:absolute before:-z-10 before:h-full before:-right-1 before:-bottom-1 before:rounded-md before:border before:w-full">
                              
                              <summary id="detail" class="flex items-center gap-4">
  
                                @if(Auth::user()->role === 'teacher')

                                <div class="w-8 h-8 bg-cover bg-center rounded" style="background-image: url({{ $firstImageStudent[$consultation->id]->profile_photo_url ?? '' }})"></div>
                                  @if($consultation->service_name === 'Social Counseling')
                                      <p class="font-bold text-xs text-header m-0">
                                          {{ $consultation->service_name }}
                                      </p>
                                  @else
                                      @if($groupedConsultations[$consultation->id]->isNotEmpty())
                                        @foreach($groupedConsultations[$consultation->id] as $user)
                                            <p class="font-bold text-xs text-header m-0">
                                                {{$user->name}}
                                            </p>
                                        @endforeach
                                      @else
                                        <div class="w-8 h-8 bg-cover bg-center rounded" style="background-image: url({{ Auth::user()->profile_photo_url }})"></div>
                                        <p class="font-bold text-xs text-header m-0">
                                            All classes
                                        </p>
                                      @endif
                                  @endif
                                @else
                                  <div class="w-8 h-8 bg-cover bg-center rounded" style="background-image: url({{ Auth()->user()->profile_photo_url }})"></div>
  
                                  <p class="font-bold text-xs text-header">{{Auth::user()->name}}</p>
                                @endif
  
                                  <svg class="ml-auto " width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.49999 5.9102C5.0558 5.9102 4.61161 5.72459 4.2753 5.36025L0.138016 0.878198C-0.0460053 0.678842 -0.0460053 0.348873 0.138016 0.149517C0.322037 -0.049839 0.626624 -0.049839 0.810645 0.149517L4.94793 4.63157C5.25251 4.96154 5.74747 4.96154 6.05205 4.63157L10.1894 0.149517C10.3734 -0.049839 10.678 -0.049839 10.862 0.149517C11.046 0.348873 11.046 0.678842 10.862 0.878198L6.72468 5.36025C6.38837 5.72459 5.94418 5.9102 5.49999 5.9102Z" fill="#676767" fill-opacity="0.5"/>
                                  </svg>                                
  
                              </summary>
  
                              <ul class="content flex flex-col gap-4 pt-6 cursor-default">
                                  
                                  <li class="flex items-center w-full">
                                      <p class="text-[11px] text-subheader/50 font-medium">Title</p>
  
                                      <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{$consultation->title}}</p>
                                  </li>
  
                                  <li class="flex items-center">
                                      <p class="text-[11px] text-subheader/50 font-medium">Description</p>
  
                                      <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{$consultation->description}}</p>
                                  </li>
  
                                  <li class="flex items-center">
                                      <p class="text-[11px] text-subheader/50 font-medium">Consultation Type</p>
  
                                      <p class="text-header/80 text-xs font-semibold max-w-[60%] overflow-ellipsis ml-auto text-limit">{{ $consultation->service_name }}</p>
                                  </li>
  
                                  <li class="flex items-center">
                                      <p class="text-[11px] text-subheader/50 font-medium">Place</p>
  
                                      <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{ $consultation->place }}</p>
                                  </li>
  
                                  <li class="flex items-center">
                                      <p class="text-[11px] text-subheader/50 font-medium">Date</p>
  
                                      <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{ $consultation->date }}</p>
                                  </li>
  
                                  <li class="flex items-center">
                                      <p class="text-[11px] text-subheader/50 font-medium">Time</p>
  
                                      <p class="text-header/80 text-xs font-semibold max-w-[40%] overflow-ellipsis ml-auto text-limit">{{ $consultation->time }}</p>
                                  </li>
  
                                  <a id="btn-detail-request" data-id="{{ $consultation->id }}" class="cursor-pointer font-Mulish text-white py-2.5 font-bold text-xs text-center rounded tracking-wide bg-[#306BFF] hover:scale-[.98] transition duration-300">
                                    View
                                  </a>
  
                              </ul>
  
                          </details>
                        @endif
                      @endforeach
                    @endforeach
    
                    </div>

                </div>
    
            </div>
    
        </div>
        
    </div>


    @include('components.detailrequest')

@endsection