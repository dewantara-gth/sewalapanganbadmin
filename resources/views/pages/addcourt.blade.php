@extends('layout.adm')

@section('title', isset($court) ? 'Edit Court Data' : 'Add Court Data')

@section('content')

<div class="flex-1 p-4 md:p-10 flex flex-col">
    <div class="flex justify-between items-center mb-6">
        <div class="mobile-menu">
            <button id="menu-button" class="text-gray-700 focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
        <div class="flex items-center ml-auto">
            <span class="mr-2 md:mr-4 text-gray-700 whitespace-nowrap">{{ Auth::user()->username }}</span>
            <div class="h-8 w-8 md:h-10 md:w-10 rounded-full flex items-center justify-center bg-gray-300 text-white font-bold">
                {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
            </div>
            <a class="ml-2 md:ml-4 text-gray-700 hover:text-blue-900" href="{{ route('logout') }}">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>

    <!-- Main content -->
    <main class="flex-1 p-8">
        <h2 class="font-bold text-sm mb-1">
            {{ isset($court) ? 'EDIT COURT' : 'ADD COURT' }}
        </h2>
        <p class="text-[10px] mb-6">Fill The Data</p>

        <form class="max-w-lg space-y-8" action="{{ isset($court) ? url('/courts/update/'.$court->id) : url('/courts/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($court))
                @method('PUT')
            @endif

            <div>
                <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="courtnumber">
                    Court Number
                </label>
                <input
                    class="w-full rounded-full border border-[#6b6fcf] px-6 py-3 text-xs text-[#1a1a1a] placeholder:text-[#a0a0a0] focus:outline-none focus:ring-2 focus:ring-[#6b6fcf]"
                    id="courtnumber" name="court_name" placeholder="type court number" type="text"
                    value="{{ old('court_name', $court->court_name ?? '') }}" required />
            </div>

            <div>
                <label class="block mb-2 text-xs font-normal text-[#1a1a1a]" for="price">
                    Price/ 2 Hours
                </label>
                <input
                    class="w-full rounded-full border border-[#6b6fcf] px-6 py-3 text-xs text-[#1a1a1a] placeholder:text-[#a0a0a0] focus:outline-none focus:ring-2 focus:ring-[#6b6fcf]"
                    id="price" name="price" placeholder="type the price" type="text"
                    value="{{ old('price', $court->price ?? '') }}" />
            </div>

            <div>
                <label class="block mb-2 text-xs font-normal text-gray-900" for="uploadPicture">
                    Upload Picture
                </label>
                <input class="text-xs border border-gray-300 rounded px-2 py-1 cursor-pointer" id="uploadPicture"
                    type="file" name="picture" {{ isset($court) ? '' : 'required' }} />

                @if(isset($court))
                    <div class="mt-2">
                        <p class="text-[10px] text-gray-600 mb-1">Current Image:</p>
                        <img src="{{ asset('uploads/' . $court->picture) }}" alt="Current Image" class="w-32 h-auto rounded shadow">
                    </div>
                @endif
            </div>

            <div>
                <button
                    class="bg-blue-600 text-white text-[10px] font-semibold px-6 py-2 rounded shadow-md hover:bg-blue-700 transition-colors"
                    type="submit">
                    {{ isset($court) ? 'Update Court' : 'Add Court' }}
                </button>
            </div>
        </form>
    </main>
</div>

@endsection
