<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Court;

class CourtController extends Controller
{
    public function index()
    {
        $courts = Court::all();
        return view('pages.court', compact('courts'));
    }

    public function create()
    {
        return view('pages.addcourt');
    }

    public function store(Request $request)
    {
        $request->validate([
            'court_name' => 'required|max:50',
            'price' => 'nullable',
            'picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filename = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('uploads'), $filename);

        Court::create([
            'court_name' => $request->court_name,
            'price' => $request->price,
            'picture' => $filename,
        ]);

        return redirect('/courts')->with('success', 'Court berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $court = Court::findOrFail($id);
        return view('pages.addcourt', compact('court'));
    }

    public function update(Request $request, $id)
    {
        $court = Court::findOrFail($id);

        $request->validate([
            'court_name' => 'required|max:50',
            'price' => 'nullable',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['court_name', 'description']);

        if ($request->hasFile('picture')) {
            $filename = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads'), $filename);
            $data['picture'] = $filename;
        }

        $court->update($data);

        return redirect('/courts')->with('success', 'Court berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $court = Court::findOrFail($id);
        $court->delete();

        return redirect('/courts')->with('success', 'Court berhasil dihapus!');
    }
}

