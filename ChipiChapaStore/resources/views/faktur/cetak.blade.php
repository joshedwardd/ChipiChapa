@extends('layouts.app')

@section('title', 'Cetak Faktur')

@section('content')
<h1>Cetak Faktur</h1>

<div class="card">
    <div class="card-body">
        <p><strong>Nomor Invoice:</strong> {{ $faktur->nomor_invoice }}</p>
        <p><strong>Alamat Pengiriman:</strong> {{ $faktur->alamat_pengiriman }}</p>
        <p><strong>Kode Pos:</strong> {{ $faktur->kode_pos }}</p>

        <hr>
        <h5>Detail Barang:</h5>
        <ul>
            @foreach ($faktur->items as $item)
                <li>
                    {{ $item['nama_barang'] }} x {{ $item['qty'] }} 
                    = Rp {{ number_format($item['qty'] * $item['harga'], 0, ',', '.') }}
                </li>
            @endforeach
        </ul>

        <p><strong>Total Harga:</strong> Rp {{ number_format($faktur->total_harga, 0, ',', '.') }}</p>
    </div>
</div>

<button onclick="window.print()" class="btn btn-success mt-3">Print</button>
@endsection
