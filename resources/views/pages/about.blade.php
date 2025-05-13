@extends('layout.app')

@section('title', 'About Us')


@section('content')

    <main class="flex flex-col md:flex-row">
        <div class="md:w-1/2">
            <img alt="Modern house with a pool and outdoor furniture" class="w-full h-full object-cover" height="600"
                src="https://storage.googleapis.com/a1aa/image/bDqCBuvPqfivm48tLePWij-nsWF1ziem6-llzvNp4LY.jpg"
                width="800" />
        </div>
        <div class="md:w-1/2 p-8 bg-gray-50">
            <h1 class="text-3xl font-bold mb-4">
                Discover our History
            </h1>
            <p class="mb-4">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's
            </p>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            </p>
        </div>
    </main>

@endsection


