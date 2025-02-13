@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-6">
        <div class="card shadow-lg" style="border-radius: 15px; background: #fff0f3;">
            <div class="card-header text-center" style="background: #ffccd5; color: #6a0572; font-weight: bold; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                {{ __('Login') }}
            </div>

            <div class="card-body p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="role" class="form-label text-dark">{{ __('Role') }}</label>
                        <select id="role" name="role" class="form-control" required onchange="toggleInputFields()" style="border-radius: 10px;">
                            <option value="student">Student</option>
                            <option value="admin">Admin</option>
                            <option value="dosen">Dosen</option>
                        </select>
                    </div>

                    <div id="login-field" class="mb-3">
                        <label for="login" class="form-label text-dark">{{ __('Email or NPM') }}</label>
                        <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autofocus style="border-radius: 10px;">
                        @error('login')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label text-dark">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required style="border-radius: 10px;">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn w-100 text-white" style="background: #ff4d6d; border-radius: 10px; font-weight: bold; transition: 0.3s;">
                            {{ __('Login') }}
                        </button>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('password.request') }}" class="text-dark" style="text-decoration: none; font-weight: bold;">{{ __('Forgot Your Password?') }}</a>
                    </div>

                    <div class="text-center mt-3">
                        Don't have an account? <a href="{{ route('register') }}" class="text-dark" style="text-decoration: none; font-weight: bold;">Create</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function toggleInputFields() {
    var role = document.getElementById("role").value;
    var loginInput = document.getElementById("login");
    
    if (role === "student") {
        loginInput.placeholder = "Enter your NPM";
    } else {
        loginInput.placeholder = "Enter your Email";
    }
}
</script>
@endsection
