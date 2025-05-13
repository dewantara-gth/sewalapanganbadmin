@extends('layout.adm')

@section('title', 'Add Court Data')


@section('content')

    <div class="flex-1 p-4 md:p-10 flex flex-col">
            <div class="flex justify-between items-center mb-6">
                <div class="mobile-menu">
                    <button id="menu-button" class="text-gray-700 focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
                <div class="flex items-center ml-auto">
                    <span class="mr-2 md:mr-4 text-gray-700 whitespace-nowrap">Dewantara Bram</span>
                    <img alt="User avatar of Dewantara Bram, a smiling man with short black hair wearing a blue shirt"
                        class="h-8 w-8 md:h-10 md:w-10 rounded-full" height="40"
                        src="https://storage.googleapis.com/a1aa/image/8bhRABXN6qfAH_O5DWhIrN9rgGhUj-t8JMTbbKIYhMc.jpg"
                        width="40" />
                    <a class="ml-2 md:ml-4 text-gray-700 hover:text-blue-900" href="login.blade.php">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
            </div>

            <!-- Main content -->
        <main class="flex-1 p-8">
            <h2 class="font-bold text-sm mb-1">
                ADD COURT
            </h2>
            <p class="text-[10px] mb-6">
                Fill The Data
            </p>
            <form class="max-w-lg space-y-8">
                <div>
                    <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="courtnumber">
                        Court Number
                    </label>
                    <input
                        class="w-full rounded-full border border-[#6b6fcf] px-6 py-3 text-xs text-[#1a1a1a] placeholder:text-[#a0a0a0] focus:outline-none focus:ring-2 focus:ring-[#6b6fcf]"
                        id="courtnumber" placeholder="type court number" type="text" />
                </div>
                <div>
                    <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="price">
                        Price/ 2 Hours
                    </label>
                    <input
                        class="w-full rounded-full border border-[#6b6fcf] px-6 py-3 text-xs text-[#1a1a1a] placeholder:text-[#a0a0a0] focus:outline-none focus:ring-2 focus:ring-[#6b6fcf]"
                        id="price" placeholder="type the price" type="text" />
                </div>
                <div>
                    <label class="block mb-2 text-xs font-normal text-gray-900" for="uploadPicture">
                        Upload Picture
                    </label>
                    <input class="text-xs border border-gray-300 rounded px-2 py-1 cursor-pointer" id="uploadPicture"
                        type="file" />
                </div>
                <div>
                    <button
                        class="bg-blue-600 text-white text-[10px] font-semibold px-6 py-2 rounded shadow-md hover:bg-blue-700 transition-colors"
                        type="submit">
                        Add Court
                    </button>
                </div>
            </form>
        </main>
    </div>

@endsection
