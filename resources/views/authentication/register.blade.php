@extends('layouts.master')

@section('konten')
<div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="" alt="Point Market">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form action="/register" method="post" class="pt-3">
                @csrf
                <div class="form-group">
                  <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" 
                  placeholder="Nama" required value="{{ old('name') }}">
                  @error('name')
                    <div class="invalid feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="text" name="npm" class="form-control form-control-lg @error('npm') is-invalid @enderror" id="npm" 
                  placeholder="NPM" required value="{{ old('npm') }}">
                  @error('npm')
                  <div class="invalid feedback">
                      {{ $message }}
                    </div>
                  @enderror                
                </div>
                <div class="form-group">
                  <input type="text" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" 
                  placeholder="name@example.com" required value="{{ old('email') }}">
                  @error('email')
                    <div class="invalid feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" placeholder="Password">
                  @error('password')
                    <div class="invalid feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms &amp; Conditions
                    <i class="input-helper"></i></label>
                  </div>
                </div>*
                <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN UP</button>
                </div>

                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="/login" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        
@endsection