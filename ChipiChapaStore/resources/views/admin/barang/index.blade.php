@extends('layouts.app')

@section('title', 'Kelola Barang - Admin')

@section('content')
<h1>Kelola Barang</h1>
<a href="{{ route('admin.barang.create') }}" class="btn btn-success mb-3">Tambah Barang</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barangs as $key => $barang)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $barang->kategori->nama ?? 'Tidak Ada' }}</td>
            <td>{{ $barang->nama_barang }}</td>
            <td>Rp. {{ number_format($barang->harga_barang,0,',','.') }}</td>
            <td>{{ $barang->jumlah_barang }}</td>
            <td>
                @if($barang->foto_barang)
                    <img src="{{ asset('storage/'.$barang->foto_barang) }}" alt="" width="80">
                @else
                    <span class="text-muted">No Image</span>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.barang.edit', $barang->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.barang.destroy', $barang->id) }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus barang ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
