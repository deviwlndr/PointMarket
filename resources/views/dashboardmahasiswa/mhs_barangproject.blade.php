@extends('layouts.dashboard_mahasiswa')

@section('konten')
    <div class="container mt-4">
        <h4 class="mb-4">Barang Project</h4>
        <div class="row g-4">
            @foreach($barangprojects as $p)
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $p->nama_barang }}</h5>
                                    <p class="text-muted mb-1">Kode Barang: <strong>{{ $p->kode_barang }}</strong></p>
                                    <p class="text-secondary mb-3">
                                        <span class="badge bg-danger " >
                                            <i class="fas fa-coins"></i> Harga Poin: {{ $p->harga_point }}</span>
                                    </p>
                                    <p class="deskripsi-cell">
                                        {{ $p->deskripsi }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
    <a href="/riwayat_pembelian_jenis_transaksi/create" class="btn btn-warning">
        <i class="fas fa-shopping-cart"></i> Beli
    </a>
</div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        /* Gaya untuk card */
        .card {
            border: 1px solid #eaeaea;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .badge {
            font-size: 0.9rem;
            padding: 0.5rem 0.75rem;
        }

        /* Gaya khusus untuk tampilan persegi panjang */
        .row.g-0 {
            align-items: center;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-left: 1px solid #eaeaea;
            padding: 15px;
        }

        .btn-warning {
            font-weight: bold;
            color: #fff;
        }
    </style>
@endsection
