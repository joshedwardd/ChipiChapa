@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="jumbotron">
        <h1>Selamat Datang di ChipiChapa Store</h1>
        <p>Aplikasi pendataan dan penjualan barang.</p>
        <a href="{{ route('user.katalog') }}" class="btn btn-primary">Lihat Katalog</a>
    </div>
@endsection
