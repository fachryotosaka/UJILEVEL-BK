@extends('database.layouts.main')

@section('dcontent')

    <div class="w-[83%] h-full py-10 pt-2 px-12 overflow-y-auto hide-scroll box-border flex flex-col font-Mplus1cus">

        <div class="flex flex-col text-xs leading-none mb-8">
            <div class="flex items-center gap-2 font-medium">
                <p>Dashboard</p>
                <span>
                    <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.07942 0.770967L6.19029 5.1375C6.31597 5.27036 6.37879 5.44086 6.37879 5.6115C6.37879 5.78205 6.31594 5.95249 6.19029 6.0855L2.07942 10.452C1.81743 10.7278 1.38107 10.7393 1.10471 10.4779C0.826401 10.2158 0.816576 9.77752 1.07778 9.50289L4.76635 5.61035L1.07778 1.71782C0.816576 1.44318 0.826343 1.00797 1.10471 0.743963C1.38107 0.482833 1.81743 0.494324 2.07942 0.770967Z" fill="#6B7280"/>
                    </svg>
                </span>
                <p class="text-subheader">Settings</p>
            </div>
        </div>

        <p class="text-subheader text-opacity-60 text-xs font-semibold">Your Avatar</p>

        <div class="flex items-center mt-5 w-full">

            <div id="preview" class="w-14 h-14 rounded-full bg-cover" style="background-image: url({{ Auth()->user()->profile_photo_url }});"></div>

            <p class="flex flex-col font-semibold text-header text-lg ml-3 leading-snug"  name="name" value="{{ $user->name }}" >
                {{ $user->name }}
                <span class="font-medium text-subheader opacity-60 text-[13px]">{{ $user->email }}</span>
            </p>
            
            <div class="flex items-center gap-1 ml-auto">

                @if ($user->profile_photo_url)
                    <a class="ml-auto px-4 py-[11px] rounded-md text-[11px] text-header font-medium hover:scale-95 transition duration-300" href="{{ route('profile.photo-delete',$user->id) }}">Delete Photo</a>
                @endif

                <label for="selectImage" class="ml-auto px-7 py-[11px] rounded-md shadow-xl text-[11px] text-white font-medium bg-blue-main hover:scale-95 transition duration-300">
                    Upload New
                </label>

            </div>
            
        </div>
        
        <form class="flex flex-col gap-9 border-t-[1px] mt-7 pt-0 border-subheader border-opacity-30" action="{{ route('user-profile-information.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input class="w-0 h-0 invisible -mt-2"  type="file" name="photo" id="selectImage">
            <div class="flex items-center justify-between">
                
                <div class="flex flex-col gap-2 w-[48%]">
                    <label for="firstname"  class="font-semibold text-xs text-subheader opacity-60">Name </label>
                    <input id="firstname"  name="name" value="{{ $user->name }}"  class="bg-sidebar rounded-md border border-subheader text-subheader placeholder:opacity-75 border-opacity-20 focus:border-opacity-100 focus:outline-none transition duration-200 hover:border-opacity-100 font-medium text-xs w-full px-4 py-3" type="text" value="Lexa" placeholder="Lexa">
                </div>                
                <div class="flex flex-col gap-2 w-[48%]">
                    <label for="email" class="font-semibold text-xs text-subheader opacity-60">Email</label>
                    <input id="email" name="email" value="{{ $user->email }}"  class="bg-sidebar rounded-md border border-subheader text-subheader placeholder:opacity-75 border-opacity-20 focus:border-opacity-100 focus:outline-none transition duration-200 hover:border-opacity-100 font-medium text-xs w-full px-4 py-3" type="email" value="fachrylord0@gmail.com" placeholder="fachrylord0@gmail.com">
                </div>
            </div>

            <div class="flex items-center justify-between">

                <div class="flex flex-col gap-2 w-[48%]">
                    <label for="class" class="font-semibold text-xs text-subheader opacity-60">Class</label>
                    <input id="class" disabled class="bg-sidebar rounded-md border border-subheader text-subheader placeholder:opacity-75 border-opacity-20 disabled: focus:border-opacity-100 focus:outline-none transition duration-200 hover:border-opacity-100 font-medium text-xs w-full px-4 py-3"type="text" value="{{ $user->classroom->name }}" >
                </div>

            </div>

            <button type="submit" class="mt-2 w-fit px-12 py-3 cursor-pointer rounded-md shadow-xl text-xs text-white font-medium bg-blue-main shadow-xl hover:scale-95 transition duration-300">
                Save
            </button>

        </form>

    </div>

@endsection

@push('script')
    <script>
        selectImage.onchange = evt => {
            preview = document.getElementById('preview');
            preview.style.display = 'block';
            const [file] = selectImage.files
            if (file) {
                const url = URL.createObjectURL(file);
                preview.style.backgroundImage = `url(${url})`;
            }
        }
    </script>
@endpush 