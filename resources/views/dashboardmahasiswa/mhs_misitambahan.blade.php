@extends('layouts.dashboard_mahasiswa')

@section('konten')


<div class="misi-tambahan-container mt-5">
    <h2 class="text-center mb-5"></h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($misitambahans as $misitambahan)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">                  
                    <h5 class="card-title">{{ $misitambahan->nama_misi }}</h5>
                    <p>
                        <span class="badge bg-danger">
                            <i class="fas fa-coins"></i>
                            Poin: {{ $misitambahan->harga_point }}
                        </span>
                    </p>
                    <!-- Deskripsi -->
                    <div class="deskripsi rounded">
                        <h6 class="text-secondary mb-2">Deskripsi</h6>
                        <p class="text-dark mb-0">{{ $misitambahan->deskripsi }}</p>
                    </div>
                    <div class="mt-2">
                        <span class="badge bg-secondary">
                            {{ $misitambahan->dosen }}
                        </span>
                    </div>

                    <!-- Tombol -->
                    <a href="{{ route('riwayat_misi.create', ['id_misi' => $misitambahan->id_misi]) }}" 
                        class="btn btn-primary w-100 mt-3">
                        Ambil Misi
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


<style>
        /* Namespace khusus untuk konten halaman */
    .misi-tambahan-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .misi-tambahan-container h2 {
        font-size: 2rem;
        color: #333;
        text-align: center;
        margin-bottom: 2rem;
    }

    .card {
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .btn {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 40px;
        margin-top: 10px;
        border-radius: 25px;
        text-transform: uppercase;
        font-weight: bold;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        color: #fff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .badge {
        font-size: 0.9rem;
    }
    .deskripsi {
        background: #f9f9f9;
        border-left: 4px solid #007bff;
        padding: 15px;
    }
    .container {
        max-width: 1200px;
    }
    .card-title {
        font-size: 1.25rem;
        color: #333;
        font-weight: bold;
    }
    .card p {
        margin-bottom: 1rem;
    }
</style>
@endsection
