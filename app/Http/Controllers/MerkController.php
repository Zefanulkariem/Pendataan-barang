<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merks = Merk::all();
        return view('home.merk.index', compact('merks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.merk.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('assets/gambar'), $imageName);
            $validated['gambar'] = $imageName;
        } else {
            $validated['gambar'] = null;
        }

        \App\Models\Merk::create($validated);

        return redirect()->route('merk.index')->with('success', 'Merk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $merk = \App\Models\Merk::findOrFail($id);
        return view('home.merk.show', compact('merk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $merk = \App\Models\Merk::findOrFail($id);
        return view('home.merk.edit', compact('merk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $merk = \App\Models\Merk::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('assets/gambar'), $imageName);
            $validated['gambar'] = $imageName;
        } else {
            $validated['gambar'] = $merk->gambar;
        }

        $merk->update($validated);

        return redirect()->route('merk.index')->with('success', 'Merk berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $merk = \App\Models\Merk::findOrFail($id);

        if ($merk->gambar && file_exists(public_path('assets/gambar/' . $merk->gambar))) {
            unlink(public_path('assets/gambar/' . $merk->gambar));
        }

        $merk->delete();

        return redirect()->route('merk.index')->with('success', 'Merk berhasil dihapus.');
    }
}
