@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-5" >
    <div class="card shadow-lg" style="width: 500px; border-radius: 10px; background-color: #fff0f3;">
        <div class="card-header text-center" style="background-color:#ffccd5; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <h4 class="mb-0" style="color: #6a0572;">Registrasi Mahasiswa</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                </div>
                
                <div class="mb-3">
                    <label for="npm" class="form-label">NPM</label>
                    <input id="npm" type="text" class="form-control" name="npm" value="{{ old('npm') }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>
                
                <div class="mb-3">
                    <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn text-white" style="background-color: #ff4d4d;">Daftar</button>
                </div>
            </form>
        </div>
        <div class="text-center py-3">
            <small>Sudah punya akun? <a href="{{ route('login') }}" class="text-danger">Login</a></small>
        </div>
    </div>
</div>
@endsection
