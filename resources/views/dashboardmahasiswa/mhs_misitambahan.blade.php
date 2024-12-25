@extends('layouts.dashboard_mahasiswa')

@section('konten')
<style>
    .btn {
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 10px;
    }
</style>

<div class="container mt-4 d-flex justify-content-center">
    <h4 class="mb-4"></h4>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($misitambahans as $misitambahan)
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <span class="badge bg-primary text-white mb-2">Misi Tambahan</span>
                    <h5 class="card-title">{{ $misitambahan->nama_misi }}</h5>
                    <p class="text-muted">
                    <span class="badge bg-danger " >
                    <i class="fas fa-coins"></i>
                    Poin: {{ $misitambahan->harga_point }}</p></span>

                    <!-- Deskripsi langsung ditampilkan -->
                    <div class="deskripsi mt-3 p-3 bg-light border rounded">
                        <h6 class="text-secondary">Deskripsi</h6>
                        <p class="text-dark mb-0">
                            {{ $misitambahan->deskripsi }}
                        </p>
                    </div>

                    <!-- Tombol Ambil Misi -->
                    <a href="/riwayat_pembelian_jenis_transaksi/create" 
                    class="btn btn-warning">
                    Ambil Misi
                    <i class="fa-solid fa-pen"></i>
                </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
