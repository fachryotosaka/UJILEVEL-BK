@extends('database.layouts.main')

@section('dcontent')

    <div class="w-[83%] h-full py-10 pt-8 px-12 overflow-y-auto hide-scroll box-border flex flex-col font-Mplus1cus">

        <p class="text-footer text-opacity-60 text-xs font-semibold">Your Avatar</p>

        <div class="flex items-center mt-5 w-full">

            <div class="w-14 h-14 rounded-full bg-cover" style="background-image: url({{asset('img/chop.png')}});"></div>

            <p class="flex flex-col font-semibold text-header text-lg ml-3 leading-snug">
                Lexa
                <span class="font-medium text-footer opacity-60 text-[13px]">fachrylord0@gmail.com</span>
            </p>

            <button class="ml-auto px-7 py-[11px] rounded-md shadow-xl text-[11px] text-white font-medium bg-gradient-to-br from-blue-main-100 to-[200%] to-blue-main-200 hover:scale-95 transition duration-300">
                Upload New
            </button>

        </div>

        <form action="" class="flex flex-col gap-9 border-t-[1px] mt-7 pt-6 border-footer border-opacity-30">

            <div class="flex items-center justify-between">

                <div class="flex flex-col gap-2 w-[48%]">
                    <label for="firstname" class="font-semibold text-xs text-footer opacity-60">Firstname</label>
                    <input id="firstname" class="bg-sidebar rounded-md border border-footer text-footer placeholder:opacity-75 border-opacity-20 focus:border-opacity-100 focus:outline-none transition duration-200 hover:border-opacity-100 font-medium text-xs w-full px-4 py-3" type="text" value="Lexa" placeholder="Lexa">
                </div>

                <div class="flex flex-col gap-2 w-[48%]">
                    <label for="lastname" class="font-semibold text-xs text-footer opacity-60">Lastname</label>
                    <input id="lastname"  class="bg-sidebar rounded-md border border-footer text-footer placeholder:opacity-75 border-opacity-20 focus:border-opacity-100 focus:outline-none transition duration-200 hover:border-opacity-100 font-medium text-xs w-full px-4 py-3"type="text" value="Otosaka" placeholder="Otosaka">
                </div>

            </div>

            <div class="flex items-center justify-between">

                <div class="flex flex-col gap-2 w-[48%]">
                    <label for="email" class="font-semibold text-xs text-footer opacity-60">Email</label>
                    <input id="email" class="bg-sidebar rounded-md border border-footer text-footer placeholder:opacity-75 border-opacity-20 focus:border-opacity-100 focus:outline-none transition duration-200 hover:border-opacity-100 font-medium text-xs w-full px-4 py-3" type="email" value="fachrylord0@gmail.com" placeholder="fachrylord0@gmail.com">
                </div>

                <div class="flex flex-col gap-2 w-[48%]">
                    <label for="class" class="font-semibold text-xs text-footer opacity-60">Class</label>
                    <input id="class"  class="bg-sidebar rounded-md border border-footer text-footer placeholder:opacity-75 border-opacity-20 focus:border-opacity-100 focus:outline-none transition duration-200 hover:border-opacity-100 font-medium text-xs w-full px-4 py-3"type="text" value="XI PPLG 2" placeholder="XI PPLG 2">
                </div>

            </div>

            <div class="flex flex-col w-full gap-2">
                <label for="about" class="font-semibold text-xs text-footer opacity-60">About You</label>
                <textarea id="about" class="bg-sidebar rounded-md border border-footer text-footer placeholder:opacity-75 border-opacity-20 focus:border-opacity-100 focus:outline-none transition duration-200 hover:border-opacity-100 font-medium text-xs px-4 py-3 h-28" maxlength="500" style="resize:none">Sedikit tentang gweh , gweh tub orang nya cool abies i mean dingin dan tampan , but gweh tuh gatau kenapa kaya ganteng bgt gitu you know lah ya , jujurly gw tuh kurang suka di keramaian , kaya tch mendokusai watashi ga bisa menghirup oksigen yang sama dengan para alat...</textarea>
            </div>

            <div class="flex flex-col w-full gap-2">
                <label for="address" class="font-semibold text-xs text-footer opacity-60">Address</label>
                <input id="address" type="text" class="bg-sidebar rounded-md border border-footer text-footer placeholder:opacity-75 border-opacity-20 focus:border-opacity-100 focus:outline-none transition duration-200 hover:border-opacity-100 font-medium text-xs px-4 py-3" value="Jl.Underworld, jigoku, 666" placeholder="Jl.Underworld, jigoku, 666">
            </div>

            <button disabled class="mt-2 w-fit px-12 py-3 cursor-pointer rounded-md shadow-xl text-xs text-white font-medium bg-gradient-to-br from-blue-main-100 to-[200%] to-blue-main-200 hover:scale-95 transition duration-300">
                Save
            </button>

        </form>

    </div>

@endsection