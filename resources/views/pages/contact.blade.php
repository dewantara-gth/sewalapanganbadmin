@extends('layout.app')

@section('title', 'Contact Us')


@section('content')

    <main class="flex flex-col items-center p-8">
        <div class="w-full max-w-4xl flex flex-col md:flex-row justify-between items-start">
            <div class="w-full md:w-1/2">
                <h2 class="text-4xl font-bold mb-4">
                    Get in
                    <span class="text-green-600">
                        Touch
                    </span>
                </h2>
                <p class="mb-8">
                    Enim tempor eget pharetra facilisis sed maecenas adipiscing. Eu leo molestie vel, ornare non id
                    blandit netus.
                </p>
                <form class="space-y-4">
                    <div>
                        <input class="w-full p-3 border rounded" placeholder="Name *" type="text" />
                    </div>
                    <div>
                        <input class="w-full p-3 border rounded" placeholder="Email" type="email" />
                    </div>
                    <div>
                        <input class="w-full p-3 border rounded" placeholder="Phone number *" type="text" />
                    </div>
                    <div>
                        <select class="w-full p-3 border rounded">
                            <option>
                                How did you find us?
                            </option>
                        </select>
                    </div>
                    <button class="w-full p-3 bg-green-600 text-white font-bold rounded" type="submit">
                        SEND
                    </button>
                </form>
                <div class="mt-8 flex justify-between items-center text-center text-sm">
                    <div class="flex flex-col items-center">
                        <i class="fas fa-phone-alt text-xl mb-2">
                        </i>
                        <p class="font-bold">
                            PHONE
                        </p>
                        <p>
                            03 5432 1234
                        </p>
                    </div>
                    <div class="flex flex-col items-center">
                        <i class="fas fa-fax text-xl mb-2">
                        </i>
                        <p class="font-bold">
                            FAX
                        </p>
                        <p>
                            03 5432 1234
                        </p>
                    </div>
                    <div class="flex flex-col items-center">
                        <i class="fas fa-envelope text-xl mb-2">
                        </i>
                        <p class="font-bold">
                            EMAIL
                        </p>
                        <p>
                            info@marcc.com.au
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 mt-8 md:mt-0 md:ml-8">
                <img alt="Map showing location of Jaya Badminton Hall" height="400"
                    src="https://storage.googleapis.com/a1aa/image/mgH_XbBbANd1KHohyP4DNH2PjSRhbSi7U6R1blcqP70.jpg"
                    width="600" />
            </div>
        </div>
    </main>

@endsection