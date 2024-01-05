@extends('layouts.auth')

@section('konten')
    <div class="col-lg-6 mx-auto">
      <div class="auth-form-light text-left py-5 px-4 px-sm-5">
        
        <form action="/login" method="post" class="pt-3">
        @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
          <div class="brand-logo">
            <img src="" alt="Point Market">
          </div>
          <h4>Hello! let's get started</h4>
          <h6 class="font-weight-light">Login to continue.</h6>
            @csrf
            <div class="form-group">
                <input type="npm" name="npm" class="form-control form-control-lg @error('npm') is-invalid @enderror" id="npm" placeholder="NPM" autofocus required>
                @error('npm')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" placeholder="Password" autofocus required>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mt-3">
              <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">LOGIN</button>
            </div>
            <div class="form-check">
              <a href="/dashboard_mahasiswa" class="btn btn-warning mr-5">Sebagai Mahasiswa</a>
            </div> 
            <div class="my-2 d-flex justify-content-between align-items-center">
              <div class="form-check">
                <label class="form-check-label text-muted">
                  <input type="checkbox" class="form-check-input">
                  Keep me signed in
                <i class="input-helper"></i></label>
              
          </form>
        </div>
      </div>
        
@endsection