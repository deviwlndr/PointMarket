@extends('layouts.master')

@section('konten')
    <div class="col-lg-6 mx-auto">
        <div class="auth-form-light text-left py-5 px-4 px-sm-5">

        @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
          <div class="brand-logo">
            <img src="../../images/logo-dark.svg" alt="logo">
          </div>
          <h4>Hello! let's get started</h4>
          <h6 class="font-weight-light">Login to continue.</h6>
          <form action="/login" method="POST" class="pt-3">
            @csrf
            <div class="form-group">
              <input type="npm" class="form-control form-control-lg" id="npm" placeholder="NPM" autofocus required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" autofocus required>
            </div>
            <div class="mt-3">
              <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn {{ request()->is('login') ? 'active' : '' }}" href="/login">LOGIN</a>
            </div>
            <div class="my-2 d-flex justify-content-between align-items-center">
              <div class="form-check">
                <label class="form-check-label text-muted">
                  <input type="checkbox" class="form-check-input">
                  Keep me signed in
                <i class="input-helper"></i></label>
              </div>
              <a href="#" class="auth-link text-black ">Forgot password?</a>
            </div>
            
            <div class="text-center mt-4 font-weight-light">
              Don't have an account? <a href="/register" class="text-primary {{ request()->is('register') ? 'active' : '' }}">Create</a>
            </div>
          </form>
        </div>
      </div>
        
@endsection