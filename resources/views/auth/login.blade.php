@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
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
                            <label for="role" class="form-label">{{ __('Role') }}</label>
                            <select id="role" name="role" class="form-control" required onchange="toggleInputFields()">
                                <option value="student">Student</option>
                                <option value="admin">Admin</option>
                                <option value="dosen">Dosen</option>
                            </select>
                        </div>

                        <div id="login-field" class="mb-3">
                            <label for="login" class="form-label">{{ __('Email or NPM') }}</label>
                            <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autofocus>
                            @error('login')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('password.request') }}" class="text-primary">{{ __('Forgot Your Password?') }}</a>
                        </div>

                        <div class="text-center mt-3">
                            Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create</a>
                        </div>
                    </form>
                </div>
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
