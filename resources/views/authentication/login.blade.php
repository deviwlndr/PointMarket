@extends('layouts.auth')

@section('konten')
    <div class="col-lg-5 mx-auto">
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
            {{ session('loginError')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
          <div class="brand-logo">
            <img src="" alt="">
            <h2>Point Market</h2>
          </div>
          <h5>Hello! let's get started</h5>
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
            <div class="text-center mt-4 font-weight-light">
            Don't have an account? <a href="/register" class="text-primary">Create</a>
            </div>
          </form>
        </div>
      </div>
        
@endsection