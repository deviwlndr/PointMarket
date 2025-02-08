@extends('layouts.dashboard_mahasiswa')

@section('konten')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Form Ambil Misi</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('riwayat_misi.store') }}" method="POST" enctype="multipart/form-data" id="misiForm">
                @csrf

                <!-- ID Misi -->
                <!-- Nama Misi -->
                <div class="form-group mb-3">
                    <label for="id_misi" class="form-label">ID Misi:</label>
                    <input type="text" name="id_misi" id="id_misi" class="form-control" value="{{$misi->id_misi }}" readonly>
                </div>

                <!-- NPM -->
                <div class="form-group mb-3">
                    <label for="npm" class="form-label">NPM:</label>
                    <input type="text" name="npm" id="npm" class="form-control" value="{{ Auth::user()->npm }}" readonly>
                </div>

                <!-- Nama Misi -->
                <div class="form-group mb-3">
                    <label for="nama_misi" class="form-label">Nama Misi:</label>
                    <input type="text" name="nama_misi" id="nama_misi" class="form-control" value="{{ $misi->nama_misi }}" readonly>
                </div>

                <!-- Deskripsi -->
                <div class="form-group mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi:</label>
                    <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="{{ $misi->deskripsi }}" readonly>
                </div>

                <!-- Point -->
                <div class="form-group mb-3">
                    <label for="point" class="form-label">Point:</label>
                    <input type="text" name="point" id="point" class="form-control" value="{{ $misi->harga_point }}" readonly>
                </div>

                <!-- Tanggal Transaksi -->
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" readonly>
                </div>
                
                <!-- File Bukti -->
                <div class="form-group">
                    <label for="file_bukti">File Bukti</label>
                    <input type="file" name="file_bukti" id="file_bukti" class="form-control">
                </div>

                <button type="button" class="btn btn-success w-100" onclick="confirmSubmission()">Ajukan</button>
            </form>
        </div>
    </div>
</div>
@endsection