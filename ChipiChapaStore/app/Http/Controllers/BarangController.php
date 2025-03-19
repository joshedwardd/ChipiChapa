<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller {
    public function store(Request $request) {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'nama_barang' => 'required|min:5|max:80',
            'harga_barang' => 'required|integer',
            'jumlah_barang' => 'required|integer',
            'foto_barang' => 'nullable|image'
        ]);

        if ($request->hasFile('foto_barang')) {
            $validated['foto_barang'] = $request->file('foto_barang')->store('barang');
        }

        Barang::create($validated);
        return response()->json(['message' => 'Barang berhasil ditambahkan']);
    }

    public function index() {
        return Barang::with('kategori')->get();
    }

    public function show($id) {
        $barang = Barang::findOrFail($id);
        if ($barang->jumlah_barang <= 0) {
            return response()->json(['message' => 'Barang sudah habis, silakan tunggu hingga restock'], 400);
        }
        return $barang;
    }

    public function listView(){
        $barangs = Barang::all();
        return view('showbarang', compact('barangs'));
    }
    
}
