@extends('layouts.app')

@section('title', 'Katalog Barang')

@section('content')
<h1>Katalog Barang</h1>
<div class="row">
    @forelse ($barangs as $barang)
    <div class="col-md-4">
        <div class="card mb-3">
            @if($barang->foto_barang)
                <img src="{{ asset('storage/'.$barang->foto_barang) }}" alt="" class="card-img-top">
            @else
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="No Image">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                <p>Harga: Rp {{ number_format($barang->harga_barang, 0, ',', '.') }}</p>
                <p>Stok: {{ $barang->jumlah_barang > 0 ? $barang->jumlah_barang : 'Habis' }}</p>
                @if($barang->jumlah_barang > 0)
                    <form action="{{ route('faktur.addToCart', $barang->id) }}" method="POST">
                        @csrf
                        <input type="number" name="qty" value="1" min="1" class="form-control mb-2" style="width:80px;display:inline-block;">
                        <button class="btn btn-primary btn-sm">Tambah ke Faktur</button>
                    </form>
                @else
                    <span class="text-danger">Barang sudah habis</span>
                @endif
            </div>
        </div>
    </div>
    @empty
    <p class="ml-3">Tidak ada barang.</p>
    @endforelse
</div>
@endsection
