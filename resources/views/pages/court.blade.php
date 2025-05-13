@extends('layout.adm')

@section('title', 'Beranda')


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

    <main class="flex-1 overflow-auto">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 md:gap-0">
                    <div>
                        <h2 class="text-lg font-bold text-gray-900 uppercase">COURT DATA</h2>
                        <p class="text-xs text-gray-600 mt-1 max-w-xs md:max-w-none">
                            Here is a list of all COURT Data
                        </p>
                    </div>
                    <a class="bg-blue-600 text-white text-xs font-semibold px-4 py-2 rounded shadow hover:bg-blue-700 focus:outline-none whitespace-nowrap inline-block text-center" href="{{ route("addcourt")}}">
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
                            <tr>
                                <td class="py-2 px-3 border-b border-gray-100">1</td>
                                <td class="py-2 px-3 border-b border-gray-100">Court 1</td>
                                <td class="py-2 px-3 border-b border-gray-100">Rp. 180.000,00</td>
                                <td class="py-2 px-3 border-b border-gray-100">court_1.jpg</td>
                                <td class="py-2 px-3 border-b border-gray-100 flex gap-2">
                                    <button aria-label="Edit booking 1" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button aria-label="Delete booking 1" class="text-red-500 hover:text-red-600">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 border-b border-gray-100">2</td>
                                <td class="py-2 px-3 border-b border-gray-100">Court 2</td>
                                <td class="py-2 px-3 border-b border-gray-100">Rp. 150.000,00</td>
                                <td class="py-2 px-3 border-b border-gray-100">court_2.jpg</td>
                                <td class="py-2 px-3 border-b border-gray-100 flex gap-2">
                                    <button aria-label="Edit booking 1" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button aria-label="Delete booking 1" class="text-red-500 hover:text-red-600">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 border-b border-gray-100">3</td>
                                <td class="py-2 px-3 border-b border-gray-100">Court 3</td>
                                <td class="py-2 px-3 border-b border-gray-100">Rp. 120.000,00</td>
                                <td class="py-2 px-3 border-b border-gray-100">court_3.jpg</td>
                                <td class="py-2 px-3 border-b border-gray-100 flex gap-2">
                                    <button aria-label="Edit booking 1" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button aria-label="Delete booking 1" class="text-red-500 hover:text-red-600">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 border-b border-gray-100">4</td>
                                <td class="py-2 px-3 border-b border-gray-100">Court 4</td>
                                <td class="py-2 px-3 border-b border-gray-100">Rp. 125.000,00</td>
                                <td class="py-2 px-3 border-b border-gray-100">court_4.jpg</td>
                                <td class="py-2 px-3 border-b border-gray-100 flex gap-2">
                                    <button aria-label="Edit booking 1" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button aria-label="Delete booking 1" class="text-red-500 hover:text-red-600">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 border-b border-gray-100">5</td>
                                <td class="py-2 px-3 border-b border-gray-100">Court 5</td>
                                <td class="py-2 px-3 border-b border-gray-100">Rp. 100.000,00</td>
                                <td class="py-2 px-3 border-b border-gray-100">court_5.jpg</td>
                                <td class="py-2 px-3 border-b border-gray-100 flex gap-2">
                                    <button aria-label="Edit booking 1" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button aria-label="Delete booking 1" class="text-red-500 hover:text-red-600">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-6 flex flex-col sm:flex-row gap-4">
                    <button
                        class="bg-purple-600 text-white text-xs font-semibold px-5 py-2 rounded shadow hover:bg-purple-700 focus:outline-none whitespace-nowrap">
                        Download PDF
                    </button>
                    <button
                        class="bg-purple-600 text-white text-xs font-semibold px-5 py-2 rounded shadow hover:bg-purple-700 focus:outline-none whitespace-nowrap">
                        Download Excel
                    </button>
                </div>
            </main>

@endsection