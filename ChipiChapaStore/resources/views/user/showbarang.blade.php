@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')
    <h1 class="mb-4">Daftar Barang</h1>

    @if ($barangs->isEmpty())
        <p>Tidak ada barang yang tersedia.</p>
    @else
        <div class="row">
            @foreach ($barangs as $barang)
                <div class="col-md-4">
                    <div class="card mb-3">
                        @if ($barang->foto_barang)
                            <img src="{{ asset('storage/' . $barang->foto_barang) }}" class="card-img-top" alt="{{ $barang->nama_barang }}">
                        @else
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="No Image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                            <p class="card-text">Harga: Rp {{ number_format($barang->harga_barang, 0, ',', '.') }}</p>
                            <p class="card-text">Stok: {{ $barang->jumlah_barang }}</p>
                            <a href="{{ url('/barangs/' . $barang->id) }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
