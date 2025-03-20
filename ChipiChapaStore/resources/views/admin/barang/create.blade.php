@extends('layouts.app')

@section('title', 'Tambah Barang - Admin')

@section('content')
<h1>Tambah Barang</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.barang.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Kategori</label>
        <select name="kategori_id" class="form-control">
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategoris as $kategori)
            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control" value="{{ old('nama_barang') }}">
    </div>
    <div class="form-group">
        <label>Harga Barang (Rp.)</label>
        <input type="number" name="harga_barang" class="form-control" value="{{ old('harga_barang') }}">
    </div>
    <div class="form-group">
        <label>Jumlah Barang</label>
        <input type="number" name="jumlah_barang" class="form-control" value="{{ old('jumlah_barang') }}">
    </div>
    <div class="form-group">
        <label>Foto Barang</label>
        <input type="file" name="foto_barang" class="form-control-file">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
