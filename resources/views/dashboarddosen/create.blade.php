@extends('layouts.master')

@section('konten')
<div class="container mt-1">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="card-title">Add Dosen</h3>
            <p class="card-text">Fill out the form below to add a new "Dosen".</p>
        </div>
        <div class="card-body">
            <form action="{{ route('dosen.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kode_dosen" class="form-label">Kode Dosen</label>
                    <input type="text" name="kode_dosen" id="kode_dosen" class="form-control" placeholder="Enter Kode Dosen" value="{{ old('kode_dosen') }}" required>
                    <small class="form-text text-muted">Kode dosen will be used as the unique identifier for the dosen.</small>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Nama" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Enter Telepon" value="{{ old('telepon') }}">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Enter Alamat">{{ old('alamat') }}</textarea>
                </div>
                <div >
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
