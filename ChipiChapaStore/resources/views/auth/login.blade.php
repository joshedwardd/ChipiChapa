@extends('layouts.app')

@section('title', 'Login')

@section('content')
<h1>Login</h1>
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form action="{{ route('login.post') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Email (@gmail.com)</label>
        <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
    </div>
    <div class="form-group">
        <label>Password (6 - 12 huruf)</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button class="btn btn-primary">Login</button>
</form>
@endsection
