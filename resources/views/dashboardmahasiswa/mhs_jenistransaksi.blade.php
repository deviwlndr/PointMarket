@extends('layouts.dashboard_mahasiswa')

@section('konten')

<div class="container">
    <!-- Pesan Status (Success / Danger) -->
    @if(session()->has('success'))
        <div class="custom-alert alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session()->has('danger'))
        <div class="custom-alert alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif

    <!-- Daftar Jenis Transaksi / Rules -->
    <div class="row">
        @foreach($jenistransaksis as $jenistransaksi)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm rounded">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">{{ $jenistransaksi->nama_transaksi }}</h5>
                        <p class="card-text text-muted mb-3">{{ $jenistransaksi->deskripsi }}</p>
                        <span class="badge bg-danger text-white">Point: {{ $jenistransaksi->point }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
