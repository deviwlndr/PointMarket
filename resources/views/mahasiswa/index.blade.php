@extends('layouts.master')

@section('konten')
<!-- Styles -->
<style>
    .custom-title {
        background-color: rgb(239, 190, 241);
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 1.5rem;
        font-weight: bold;
        text-align: center;
    }

    .table td,
    .table th {
        word-wrap: break-word;
        white-space: normal;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table {
        table-layout: auto;
    }

    .table th {
        background-color: rgb(239, 190, 241);
        color: black;
        text-align: center;
        padding: 12px 15px;
        font-weight: bold;
        border-top: 2px solid #ddd;
    }

    .table td {
        text-align: center;
        padding: 10px 15px;
    }

    .btn-container {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .btn-edit {
        background-color: #4CAF50;
        color: white;
        font-size: 14px;
        padding: 5px 15px;
        border-radius: 5px;
        border: none;
        transition: background-color 0.3s ease;
        margin-bottom: 16px;
        margin-top: 20px;
    }

    .btn-edit:hover {
        background-color: #45a049;
    }

    .btn-delete {
        background-color: #f44336;
        color: white;
        font-size: 14px;
        padding: 5px 15px;
        border-radius: 5px;
        border: none;
        transition: background-color 0.3s ease;
        margin-top: 16px;
    }

    .btn-delete:hover {
        background-color: #e53935;
    }
</style>

<!-- Main Card -->
<div class="card mr-5 ml-5">
    <div class="card-body">
        <h4 class="card-title custom-title">Level Mahasiswa</h4>
        <a href="mahasiswa/create" class="btn btn-primary float-end">Add Data</a>
        
        <!-- Success / Danger Messages -->
        @if(session()->has('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
        @endif
        @if(session()->has('danger'))
            <div class="alert alert-danger">
                {!! session('danger') !!}
            </div>
        @endif

        <!-- Table -->
        <div class="table-responsive">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>NPM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Jumlah Point</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{ $mahasiswa->npm }}</td>
                        <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                        <td>
                            <label class="badge badge-danger">{{ $mahasiswa->jumlah_point }}</label>
                        </td>
                        <td>
                            @if($mahasiswa->jumlah_point >= 10 && $mahasiswa->jumlah_point <= 50)
                                <span class="badge bg-secondary">Silver</span>
                            @elseif($mahasiswa->jumlah_point > 50 && $mahasiswa->jumlah_point <= 100)
                                <span class="badge bg-warning">Gold</span>
                            @elseif($mahasiswa->jumlah_point > 100 && $mahasiswa->jumlah_point <= 150)
                                <span class="badge bg-info">Platinum</span>
                            @elseif($mahasiswa->jumlah_point > 150 && $mahasiswa->jumlah_point <= 200)
                                <span class="badge bg-primary">Diamond</span>
                            @else
                                <span class="badge bg-secondary">Other Status</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-container">
                                <!-- Custom Edit Button -->
                                <a href="/mahasiswa/{{ $mahasiswa->id }}/edit" class="btn btn-edit">Edit</a>

                                <!-- Delete Form -->
                                <form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @method("DELETE")
                                    @csrf
                                    <input type="submit" class="btn btn-delete" value="Delete">
                                </form>

                                <!-- Button Modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#riwayatPembelianModal{{ $mahasiswa->npm }}">Detail</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
@foreach($mahasiswas as $mahasiswa)
    <div class="modal fade" id="riwayatPembelianModal{{ $mahasiswa->npm }}" tabindex="-1" role="dialog" aria-labelledby="riwayatPembelianModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="riwayatPembelianModalLabel">Riwayat Pembelian - {{ $mahasiswa->npm }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Riwayat Transaksi</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Jenis Transaksi</th>
                                <th>Nama Transaksi</th>
                                <th>Point</th>
                                <th>Bukti</th>
                                <th>Status</th>
                                <th>Tanggal Pembelian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riwayat_pembelian_jeniss as $jenistransaksi)
                                @if($jenistransaksi->npm == $mahasiswa->npm)
                                    <tr>
                                        <td>{{ $jenistransaksi->id_transaksi }}</td>
                                        <td>{{ $jenistransaksi->transaksi }}</td>
                                        <td><label class="badge badge-danger">{{ $jenistransaksi->point }}</label></td>
                                        <td>
                                            @if ($jenistransaksi->file_bukti)
                                                <a href="{{ asset('storage/' . $jenistransaksi->file_bukti) }}" target="_blank">Lihat Bukti</a>
                                            @else
                                                Tidak ada bukti
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge {{ $jenistransaksi->status === 'pending' ? 'bg-warning' : 'bg-success' }}">
                                                {{ ucfirst($jenistransaksi->status) }}
                                            </span>
                                        </td>
                                        
                                        <td>{{ $jenistransaksi->tanggal_transaksi }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
