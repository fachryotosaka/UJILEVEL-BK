@extends('database.layouts.main')

@section('dcontent')

    <div class="w-[83%] h-full py-10 pt-8 px-12 overflow-y-auto hide-scroll box-border flex flex-col font-Mplus1cus m-0">

        <p class="text-footer text-opacity-60 text-xs font-semibold m-0">Your Avatar</p>

        <div class="flex items-center mt-3 w-full">

            <div id="preview" class="w-14 h-14 rounded-full bg-cover m-0" style="background-image: url({{ Auth()->user()->profile_photo_url }});"></div>

            <p class="flex flex-col font-semibold text-header text-lg ml-3 leading-snug"  name="name" value="{{ $user->name }}" >
                <span class="font-medium text-footer opacity-60 text-[13px]">{{ $user->email }}</span>
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
        
        <form class="flex flex-col gap-9 border-t-[1px] mt-7 pt-6 border-footer border-opacity-30" action="{{ route('user-profile-information.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input class="w-0 h-0 invisible"  type="file" name="photo" id="selectImage">
            <div class="flex items-center justify-between">
                
                <div class="flex flex-col gap-2 w-[48%]">
                    <label for="firstname"  class="font-semibold text-xs text-footer opacity-60">Name </label>
                    <input id="firstname"  name="name" value="{{ $user->name }}"  class="bg-sidebar rounded-md border border-footer text-footer placeholder:opacity-75 border-opacity-20 focus:border-opacity-100 focus:outline-none transition duration-200 hover:border-opacity-100 font-medium text-xs w-full px-4 py-3" type="text" value="Lexa" placeholder="Lexa">
                </div>                
                <div class="flex flex-col gap-2 w-[48%]">
                    <label for="email" class="font-semibold text-xs text-footer opacity-60">Email</label>
                    <input id="email" name="email" value="{{ $user->email }}"  class="bg-sidebar rounded-md border border-footer text-footer placeholder:opacity-75 border-opacity-20 focus:border-opacity-100 focus:outline-none transition duration-200 hover:border-opacity-100 font-medium text-xs w-full px-4 py-3" type="email" value="fachrylord0@gmail.com" placeholder="fachrylord0@gmail.com">
                </div>
            </div>

            <div class="flex items-center justify-between">

                <div class="flex flex-col gap-2 w-[48%]">
                    <label for="class" class="font-semibold text-xs text-footer opacity-60">Class</label>
                    <input id="class" disabled class="bg-sidebar rounded-md border border-footer text-footer placeholder:opacity-75 border-opacity-20 disabled: focus:border-opacity-100 focus:outline-none transition duration-200 hover:border-opacity-100 font-medium text-xs w-full px-4 py-3"type="text" value="{{ $user->classroom->name }}" >
                </div>

            </div>

            <button type="submit" class="mt-2 w-fit px-12 py-3 cursor-pointer rounded-md shadow-xl text-xs text-white font-medium bg-blue-main from-blue-main-100 to-[200%] to-blue-main-200 hover:scale-95 transition duration-300">
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