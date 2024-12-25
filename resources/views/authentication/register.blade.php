@extends('layouts.auth')

@section('konten')
<style>
    /* Burgundy Themed Styles */
    body {
    background-image: url('public/images/auth/lockscreen-bg.jpg');
    background: linear-gradient(to bottom right, #800020, #c72c41);
    background-size: cover; /* Gambar akan menutupi seluruh halaman */
    background-attachment: fixed; /* Agar latar belakang tetap pada tempatnya saat scroll */
    font-family: 'Arial', sans-serif;
    }


.auth-form-light {
    width: 80%; /* Lebar form 70% dari parent container */
    max-width: 500px; /* Maksimum lebar form adalah 500px */
    margin: 20px auto; /* Pusatkan form di tengah dan beri jarak atas-bawah */
    background-color: rgba(255, 255, 255, 0.9); /* Warna latar dengan transparansi */
    border-radius: 10px; /* Rounded corner */
    padding: 30px; /* Padding untuk isi form */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Efek bayangan */
}

    .brand-logo h2 {
        color: #800020; /* Burgundy */
        font-weight: bold;
        text-align: center;
    }

    h4, h6 {
        color: #800020;
        text-align: center;
    }

    .form-control {
        border: 1px solid #800020;
        border-radius: 5px;
    }

    .form-control:focus {
        border-color: #800020;
        box-shadow: 0 0 5px rgba(128, 0, 32, 0.5);
    }

    .invalid-feedback {
        color: red;
        font-size: 0.875rem;
    }

    .auth-form-btn {
        background-color: #800020;
        color: #fff;
        border: none;
        transition: all 0.3s ease;
    }

    .auth-form-btn:hover {
        background-color: #5c0018;
    }

    .text-primary {
        color: #800020 !important;
        text-decoration: underline;
    }

    .text-primary:hover {
        color: #5c0018 !important;
    }
</style>

<div class="col-lg-5 mx-auto">
    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
        <div class="brand-logo">
            <h2>Point Market</h2>
        </div>
        <h4>New here?</h4>
        <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
        <form action="/register" method="post" class="pt-3">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" 
                placeholder="Nama" required value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" name="npm" class="form-control form-control-lg @error('npm') is-invalid @enderror" id="npm" 
                placeholder="NPM" required value="{{ old('npm') }}">
                @error('npm')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" 
                placeholder="name@example.com" required value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" 
                placeholder="Password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3">
                <button class="btn btn-block auth-form-btn btn-lg font-weight-medium" type="submit">SIGN UP</button>
            </div>
            <div class="text-center mt-4 font-weight-light">
                Already have an account? <a href="/login" class="text-primary">Login</a>
            </div>
        </form>
    </div>
</div>
@endsection
