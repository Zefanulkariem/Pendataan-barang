<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Merk;
use App\Models\Jenis;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Barang::with(['merk', 'jenis']);

        // Filter by merk
        if ($request->filled('merk')) {
            $query->where('merk', $request->merk);
        }

        // Filter by jenis
        if ($request->filled('jenis')) {
            $query->where('jenis_id', $request->jenis);
        }

        // Search by nama
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $barangs = $query->get();
        $merks = Merk::all();
        $jenis = Jenis::all();

        return view('home.dashboard', compact('barangs', 'merks', 'jenis'));
    }
}
