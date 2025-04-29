<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = Jenis::all();
        return view('home.jenis.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.jenis.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:jenis,nama',
        ]);

        Jenis::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenis = Jenis::findOrFail($id);
        return view('home.jenis.edit', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jenis = Jenis::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255|unique:jenis,nama,' . $jenis->id,
        ]);

        $jenis->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenis = Jenis::findOrFail($id);
        $jenis->delete();

        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil dihapus.');
    }
}
