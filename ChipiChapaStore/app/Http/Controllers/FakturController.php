<?php

namespace App\Http\Controllers;
use App\Models\Faktur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FakturController extends Controller
{
    public function createInvoice(){
        return 'INV-' . Str::random(8);
    }
    public function checkout(Request $request) {
        $validated = $request->validate([
            'items' => 'required|array',
            'alamat_pengiriman' => 'required|min:10|max:100',
            'kode_pos' => 'required|digits:5',
        ]);
    
        $total = collect($validated['items'])->sum(function ($item) {
            return $item['harga'] * $item['qty'];
        });
    
        $faktur = Faktur::create([
            'user_id' => auth()->id(),
            'nomor_invoice' => $this->createInvoice(),
            'items' => json_encode($validated['items']),
            'alamat_pengiriman' => $validated['alamat_pengiriman'],
            'kode_pos' => $validated['kode_pos'],
            'total_harga' => $total,
        ]);
    
        return response()->json(['message' => 'Checkout berhasil', 'invoice' => $faktur->nomor_invoice]);
    }
    
}
