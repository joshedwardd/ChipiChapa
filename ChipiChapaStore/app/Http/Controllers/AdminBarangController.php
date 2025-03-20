<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

class AdminBarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('admin.barang.index', compact('barangs'));
    }


    public function create()
    {
        $kategoriBarangs = Kategori::all();
        return view('admin.barang.create', compact('kategoriBarangs'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_barangs,id',
            'nama_barang' => 'required|string|min:5|max:80',
            'harga_barang' => 'required|integer',
            'jumlah_barang' => 'required|integer',
            'foto_barang' => 'nullable|image|max:2048',
        ]);

        $barang = new Barang($request->all());

        if ($request->hasFile('foto_barang')) {
            $path = $request->file('foto_barang')->store('barang', 'public');
            $barang->foto_barang = $path;
        }

        $barang->save();

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }


    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.barang.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategoriBarangs = Kategori::all();
        return view('admin.barang.edit', compact('barang', 'kategoriBarangs'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_barangs,id',
            'nama_barang' => 'required|string|min:5|max:80',
            'harga_barang' => 'required|integer',
            'jumlah_barang' => 'required|integer',
            'foto_barang' => 'nullable|image|max:2048',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->fill($request->all());

        if ($request->hasFile('foto_barang')) {
            $path = $request->file('foto_barang')->store('barang', 'public');
            $barang->foto_barang = $path;
        }

        $barang->save();

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
