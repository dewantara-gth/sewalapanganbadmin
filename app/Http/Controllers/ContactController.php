<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
{
    // Validasi data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'nullable|email|max:255',
        'phone' => 'required|string|max:15',
        'source' => 'nullable|string|max:255',
        'description' => 'required|string|max:255',
    ]);

    // Format pesan yang akan dikirim ke WhatsApp
    $message = urlencode(
        "*Contact Us Form Submission*\n\n" .
        "*Name:* " . $validated['name'] . "\n" .
        "*Email:* " . ($validated['email'] ? $validated['email'] : 'N/A') . "\n" .
        "*Phone:* " . $validated['phone'] . "\n" .
        "*How did you find us?* " . ($validated['source'] ? $validated['source'] : 'N/A') . "\n" .
        "*Description:* " . $validated['description'] . "\n"
    );
    

    // Nomor WhatsApp Admin (ganti dengan nomor yang sesuai)
    $whatsappNumber = '6285135689617'; 

    // URL WhatsApp dengan pesan yang terformat
    $url = "https://wa.me/{$whatsappNumber}?text={$message}";

    // Redirect ke WhatsApp dengan pesan terformat
    return redirect()->to($url);
}

}
