@extends('layouts.app')

@section('title', 'Register')

@section('content')
<h1>Register</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('register.post') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Nama Lengkap (3 - 40 huruf)</label>
        <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
    </div>
    <div class="form-group">
        <label>Email (@gmail.com)</label>
        <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
    </div>
    <div class="form-group">
        <label>Password (6 - 12 huruf)</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Nomor Handphone (harus diawali 08)</label>
        <input type="text" name="nomor_hp" class="form-control" value="{{ old('nomor_hp') }}" required>
    </div>
    <button class="btn btn-primary">Register</button>
</form>
@endsection
