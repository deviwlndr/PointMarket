@extends('layouts.auth')

@section('konten')
<style>
  /* Burgundy Themed Styles */
  body {
    background-image: url('public/images/auth/lockscreen-bg.jpg');
    background: linear-gradient(to bottom right, #800020, #c72c41);
    background-size: cover;
    /* Gambar akan menutupi seluruh halaman */
    background-attachment: fixed;
    /* Agar latar belakang tetap pada tempatnya saat scroll */
    font-family: 'Arial', sans-serif;
  }


  .auth-form-light {
    width: 80%;
    /* Lebar form 70% dari parent container */
    max-width: 500px;
    /* Maksimum lebar form adalah 500px */
    margin: 20px auto;
    /* Pusatkan form di tengah dan beri jarak atas-bawah */
    background-color: rgba(255, 255, 255, 0.9);
    /* Warna latar dengan transparansi */
    border-radius: 10px;
    /* Rounded corner */
    padding: 30px;
    /* Padding untuk isi form */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    /* Efek bayangan */
  }

  .brand-logo h2 {
    color: #800020;
    /* Burgundy */
    font-weight: bold;
    text-align: center;
  }

  h4,
  h6 {
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
    <form action="/login" method="post" class="pt-3">
      @if(session()->has('success'))
      <div class="custom-alert alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if(session()->has('loginError'))
      <div class="custom-alert alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <div class="brand-logo">
    <h2>Point Market</h2>
</div>
<h5>Hello! Let's get started</h5>
<h6 class="font-weight-light">Login to continue.</h6>
@csrf
<div class="form-group">
    <label for="role">Role</label>
    <select name="role" id="role" class="form-control" onchange="toggleInputFields()">
        <option value="student">Student</option>
        <option value="admin">Admin</option>
        <option value="dosen">Dosen</option>
    </select>
</div>

<div id="npm-field" class="form-group">
    <label for="npm">NPM</label>
    <input type="text" name="npm" id="npm" class="form-control @error('npm') is-invalid @enderror" placeholder="Enter your NPM" maxlength="9">
    @error('npm')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div id="email-field" class="form-group" style="display: none;">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email">
    @error('email')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
    @error('password')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mt-3">
    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">LOGIN</button>
</div>
<div class="text-center mt-4 font-weight-light">
    Don't have an account? <a href="/register" class="text-primary">Create</a>
</div>

    </form>
  </div>
</div>

@endsection