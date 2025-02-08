@extends('layouts.dashboard_mahasiswa')

@section('konten')

    <div class="container">
        <h4 class="mb-4">Jenis Transaksi</h4>
        
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

        @foreach($jenistransaksis as $jenistransaksi)
            <div class="media mb-4 p-3 border rounded shadow-sm">
                <div class="media-body">
                    <h5 class="mt-0">{{ $jenistransaksi->nama_transaksi }}</h5>
                    <p class="mb-2 text-muted">{{ $jenistransaksi->deskripsi }}</p>
                    <span class="badge badge-danger">Point: {{ $jenistransaksi->point }}</span>
                </div>
                <div class="ml-3">
                    <!-- Tempatkan tombol aksi di sini -->
                </div>
            </div>
        @endforeach
    </div>

@endsection
