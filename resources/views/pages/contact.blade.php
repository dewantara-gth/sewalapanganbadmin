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
                    Get in Touch with us to learn more about our services. We're here to assist you with any inquiries or requests you might have.
                </p>
                <form class="space-y-4" method="POST" action="{{ route('contact.submit') }}">
                    @csrf
                    <div>
                        <input class="w-full p-3 border rounded" placeholder="Name *" type="text" name="name" required />
                    </div>
                    <div>
                        <input class="w-full p-3 border rounded" placeholder="Email" type="email" name="email" />
                    </div>
                    <div>
                        <input class="w-full p-3 border rounded" placeholder="Phone number *" type="text" name="phone" required />
                    </div>
                    <div>
                        <select class="w-full p-3 border rounded" name="source">
                            <option value="Google">Google</option>
                            <option value="Social Media">Social Media</option>
                            <option value="Friend" selected>Friend</option>
                        </select>
                    </div>
                    <input class="w-full p-3 border rounded" placeholder="Description *" type="text" name="description" required />

                    <button class="w-full p-3 bg-green-600 text-white font-bold rounded" type="submit">
                        SEND
                    </button>
                </form>

                <div class="mt-8 flex justify-between items-center text-center text-sm">
                    <div class="flex flex-col items-center">
                        <i class="fas fa-phone-alt text-xl mb-2"></i>
                        <p class="font-bold">PHONE</p>
                        <p>0851-3568-9617</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <i class="fab fa-instagram text-xl mb-2"></i>
                        <p class="font-bold">Instagram</p>
                        <p>@jayabadmintonhall</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <i class="fas fa-envelope text-xl mb-2"></i>
                        <p class="font-bold">EMAIL</p>
                        <p>jayabadmintonhall.co.id</p>
                    </div>
                </div>
            </div>

            <<div class="w-full md:w-1/2 mt-8 md:mt-0 md:ml-8">
    <!-- Embed Google Maps Here -->
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0578062716795!2d104.04588167472416!3d1.118720498870558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98921856ddfab%3A0xf9d9fc65ca00c9d!2sPoliteknik%20Negeri%20Batam!5e0!3m2!1sid!2sid!4v1751759747665!5m2!1sid!2sid" 
        width="100%" 
        height="400" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>

        </div>
    </main>

@endsection
