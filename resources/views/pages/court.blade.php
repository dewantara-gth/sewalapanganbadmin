@extends('layout.adm')

@section('title', 'Court')

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

    <main class="flex-1 overflow-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 md:gap-0">
            <div>
                <h2 class="text-lg font-bold text-gray-900 uppercase">COURT DATA</h2>
                <p class="text-xs text-gray-600 mt-1 max-w-xs md:max-w-none">
                    Here is a list of all COURT Data
                </p>
            </div>
            <a class="bg-blue-600 text-white text-xs font-semibold px-4 py-2 rounded shadow hover:bg-blue-700 focus:outline-none whitespace-nowrap inline-block text-center" href="{{ route("addcourt") }}">
                Add Court Data
            </a>
        </div>
        <div class="overflow-x-auto rounded-md shadow-sm">
            <table class="w-full text-xs text-left border-collapse min-w-[700px] md:min-w-full">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="py-2 px-3 font-normal border-b border-gray-200">No</th>
                        <th class="py-2 px-3 font-normal border-b border-gray-200">Court Number</th>
                        <th class="py-2 px-3 font-normal border-b border-gray-200">Price/ 2 Hours</th>
                        <th class="py-2 px-3 font-normal border-b border-gray-200">Picture</th>
                        <th class="py-2 px-3 font-normal border-b border-gray-200">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-800">
                    @foreach($courts as $index => $court)
                    <tr>
                        <td class="py-2 px-3 border-b border-gray-100">{{ $index + 1 }}</td>
                        <td class="py-2 px-3 border-b border-gray-100">{{ $court->court_name }}</td>
                        <td class="py-2 px-3 border-b border-gray-100">{{ $court->price }}</td>
                        <td class="py-2 px-3 border-b border-gray-100">
                            <img src="{{ asset('uploads/' . $court->picture) }}" alt="Court Picture" class="w-24 h-auto rounded">
                        </td>
                        <td class="py-2 px-3 border-b border-gray-100 flex gap-2">
                            <a href="{{ url('/courts/edit/'.$court->id) }}" aria-label="Edit" class="text-blue-600 hover:text-blue-700">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ url('/courts/delete/'.$court->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" aria-label="Delete" class="text-red-500 hover:text-red-600" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex flex-col sm:flex-row gap-4">
            <button class="bg-purple-600 text-white text-xs font-semibold px-5 py-2 rounded shadow hover:bg-purple-700 focus:outline-none whitespace-nowrap">
                Download PDF
            </button>
            <button class="bg-purple-600 text-white text-xs font-semibold px-5 py-2 rounded shadow hover:bg-purple-700 focus:outline-none whitespace-nowrap">
                Download Excel
            </button>
        </div>
    </main>
</div>

@endsection
