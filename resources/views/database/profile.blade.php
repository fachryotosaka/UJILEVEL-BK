@extends('database.layouts.main')

@section('dcontent')

    <div class="w-[83%] h-full py-10 pt-2 px-12 overflow-y-auto hide-scroll box-border flex flex-col font-Mplus1cus">

        <div class="flex items-center gap-2 font-medium text-xs mb-8">
            <p>Dashboard</p>
            <span>
                <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.07942 0.770967L6.19029 5.1375C6.31597 5.27036 6.37879 5.44086 6.37879 5.6115C6.37879 5.78205 6.31594 5.95249 6.19029 6.0855L2.07942 10.452C1.81743 10.7278 1.38107 10.7393 1.10471 10.4779C0.826401 10.2158 0.816576 9.77752 1.07778 9.50289L4.76635 5.61035L1.07778 1.71782C0.816576 1.44318 0.826343 1.00797 1.10471 0.743963C1.38107 0.482833 1.81743 0.494324 2.07942 0.770967Z" fill="#6B7280"/>
                </svg>
            </span>
            <p>Settings</p>
        </div>

        <p class="text-subheader text-opacity-60 text-xs font-semibold">Your Avatar</p>

        <div class="flex items-center mt-5 w-full">

            <div class="w-14 h-14 rounded-full bg-cover" style="background-image: url({{asset('img/chop.png')}});"></div>

            <p class="flex flex-col font-semibold text-header text-lg ml-3 leading-snug">
                Lexa
                <span class="font-medium text-subheader opacity-60 text-[13px]">fachrylord0@gmail.com</span>
            </p>

            <div class="flex items-center gap-1 ml-auto">
                
                <button class="ml-auto px-4 py-[11px] rounded-md text-[11px] text-header font-medium hover:scale-95 transition duration-300">
                    Delete Photo
                </button>

                <button class="ml-auto px-7 py-[11px] rounded-md shadow-xl text-[11px] text-white font-medium bg-blue-main hover:scale-95 transition duration-300">
                    Upload New
                </button>

            </div>

        </div>

        <form action="" class="flex flex-col gap-9 border-t-[1px] mt-7 pt-6 border-subheader border-opacity-30">

            <div class="flex items-center justify-between">

                <div class="flex flex-col gap-2 w-[48%]">
                    <label class="font-semibold text-xs text-subheader opacity-60">Firstname</label>
                    <input id="firstname" class="bg-sidebar rounded-md border border-subheader text-subheader placeholder:opacity-75 border-opacity-25 focus:border-opacity-80 focus:outline-none transition duration-200 hover:border-opacity-80 font-medium text-xs w-full px-4 py-3" type="text" value="Lexa" placeholder="Lexa">
                </div>

                <div class="flex flex-col gap-2 w-[48%]">
                    <label class="font-semibold text-xs text-subheader opacity-60">Lastname</label>
                    <input id="lastname"  class="bg-sidebar rounded-md border border-subheader text-subheader placeholder:opacity-75 border-opacity-25 focus:border-opacity-80 focus:outline-none transition duration-200 hover:border-opacity-80 font-medium text-xs w-full px-4 py-3"type="text" value="Otosaka" placeholder="Otosaka">
                </div>

            </div>

            <div class="flex items-center justify-between">

                <div class="flex flex-col gap-2 w-[48%]">
                    <label class="font-semibold text-xs text-subheader opacity-60">Email</label>
                    <input id="email" class="bg-sidebar rounded-md border border-subheader text-subheader placeholder:opacity-75 border-opacity-25 focus:border-opacity-80 focus:outline-none transition duration-200 hover:border-opacity-80 font-medium text-xs w-full px-4 py-3" type="email" value="fachrylord0@gmail.com" placeholder="fachrylord0@gmail.com">
                </div>

                <div class="flex flex-col gap-2 w-[48%]">
                    <label class="font-semibold text-xs text-subheader opacity-60">Class</label>
                    <input id="class"  class="bg-sidebar rounded-md border border-subheader text-subheader placeholder:opacity-75 border-opacity-25 focus:border-opacity-80 focus:outline-none transition duration-200 hover:border-opacity-80 font-medium text-xs w-full px-4 py-3"type="text" value="XI PPLG 2" placeholder="XI PPLG 2">
                </div>

            </div>

            <div class="flex flex-col w-full gap-2">
                <label class="font-semibold text-xs text-subheader opacity-60">About You</label>
                <textarea id="about" class="bg-sidebar rounded-md border border-subheader text-subheader placeholder:opacity-75 border-opacity-25 focus:border-opacity-80 focus:outline-none transition duration-200 hover:border-opacity-80 font-medium text-xs px-4 py-3 h-28" maxlength="500" style="resize:none">Sedikit tentang gweh , gweh tub orang nya cool abies i mean dingin dan tampan , but gweh tuh gatau kenapa kaya ganteng bgt gitu you know lah ya , jujurly gw tuh kurang suka di keramaian , kaya tch mendokusai watashi ga bisa menghirup oksigen yang sama dengan para alat...</textarea>
            </div>

            <div class="flex flex-col w-full gap-2">
                <label class="font-semibold text-xs text-subheader opacity-60">Address</label>
                <input id="address" type="text" class="bg-sidebar rounded-md border border-subheader text-subheader placeholder:opacity-75 border-opacity-25 focus:border-opacity-80 focus:outline-none transition duration-200 hover:border-opacity-80 font-medium text-xs px-4 py-3" value="Jl.Underworld, jigoku, 666" placeholder="Jl.Underworld, jigoku, 666">
            </div>

            <button disabled class="mt-2 w-fit px-12 py-3 cursor-pointer rounded-md shadow-xl text-xs text-white font-medium bg-blue-main shadow-xl hover:scale-95 transition duration-300">
                Save
            </button>

        </form>

    </div>

@endsection