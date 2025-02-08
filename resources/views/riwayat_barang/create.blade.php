@extends('layouts.dashboard_mahasiswa')

@section('konten')
<style>
    .card {
        border: none;
        border-radius: 15px;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        border-radius: 25px;
        padding: 10px 20px;
        font-size: 1rem;
        text-transform: uppercase;
        font-weight: bold;
        transition: background-color 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
    background-color: #6c757d; /* Warna abu-abu */
    color: #fff; /* Warna teks putih */
    border: none; /* Hilangkan border */
    border-radius: 25px; /* Radius melingkar */
    padding: 10px 20px; /* Padding konsisten */
    font-size: 1rem; /* Ukuran font sama */
    text-transform: uppercase; /* Teks kapital */
    font-weight: bold; /* Teks tebal */
    transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out; /* Animasi */
    }

    .btn-secondary:hover {
        background-color: #5a6268; /* Warna hover lebih gelap */
        color: #fff; /* Warna teks tetap putih */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan hover */
    }


    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
    }

    .detail-item {
        margin-bottom: 10px;
        font-size: 1.1rem;
        color: #555;
    }

    .detail-item strong {
        color: #000;
    }
</style>

<div class="container mt-5">
    <div class="card">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        <div class="card-body">
            <h4 class="card-title text-center mb-4">Detail Pembelian</h4>
            
            <div class="detail-item">
                <strong>NPM:</strong> {{ Auth::user()->npm }}
            </div>
            <div class="detail-item">
                <strong>Nama Barang:</strong> {{ $barang->nama_barang }}
            </div>
            <div class="detail-item">
                <strong>Deskripsi:</strong> {{ $barang->deskripsi }}
            </div>
            <div class="detail-item">
                <strong>Point:</strong> {{ $barang->harga_point }}
            </div>
            <div class="detail-item">
                <strong>Tanggal Transaksi:</strong> {{ now()->format('Y-m-d') }}
            </div>

            <div class="d-flex justify-content-center mt-4">
                <!-- Tombol Konfirmasi -->
                <form action="{{ route('riwayat_barang.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="npm" value="{{ auth()->user()->npm }}">
                    <input type="hidden" name="id_barang" value="{{ $barang->id_barang }}">
                    <input type="hidden" name="nama_barang" value="{{ $barang->nama_barang }}">
                    <input type="hidden" name="deskripsi" value="{{ $barang->deskripsi }}">
                    <input type="hidden" name="point" value="{{ $barang->harga_point }}">
                    <button type="submit" class="btn btn-primary">Konfirmasi Pembelian</button>
                    <a href="{{ url('/riwayat_barang') }}" class="btn btn-secondary">Kembali</a>
                </form>



                <!-- Tombol Kembali -->
            </div>

        </div>
    </div>
</div>
@endsection
