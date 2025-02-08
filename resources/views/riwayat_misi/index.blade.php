@extends('layouts.master')

@section('konten')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white text-center">
        <h4 class="mb-0">Daftar Riwayat Transaksi Misi</h4>
    </div>
    <div class="card-body p-3">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-bordered">
                <thead class="table-primary text-center">
                    <tr>
                        <th style="width: 10%;">NPM</th>
                        <th style="width: 20%;">Nama Misi</th>
                        <th style="width: 20%;">Deskripsi</th>
                        <th style="width: 10%;">Point</th>
                        <th style="width: 15%;">Tanggal Transaksi</th>
                        <th style="width: 20%;">File Bukti</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($riwayatTransaksi as $transaksi)
                    <tr class="text-center align-middle">
                        <td>{{ $transaksi->npm }}</td>
                        <td>{{ $transaksi->nama_misi }}</td>
                        <td>{{ $transaksi->deskripsi }}</td>
                        <td>{{ $transaksi->point }}</td>
                        <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d M Y') }}</td>
                        <td class="text-nowrap">
                            @if ($transaksi->file_bukti)
                            <a href="{{ asset('storage/' . $transaksi->file_bukti) }}" target="_blank" class="btn btn-sm btn-outline-primary">Lihat File</a>
                            @else
                            <span class="text-muted">Tidak Ada</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-{{ $transaksi->status === 'pending' ? 'warning' : 'success' }}">
                                {{ ucfirst($transaksi->status) }}
                            </span>
                        </td>
                        <td>
                            @if ($transaksi->status === 'pending')
                            <form action="{{ route('riwayat-misi.complete', $transaksi->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-warning btn-lg px-3 py-2 rounded-pill" style="font-weight: bold;">
                                    <i class="fas fa-hourglass-start"></i> Tandai Selesai
                                </button>
                            </form>
                            @elseif ($transaksi->status === 'completed')
                            <span class="btn btn-success btn-lg px-3 py-2 rounded-pill" style="font-weight: bold;">
                                <i class="fas fa-check-circle"></i> Sudah Selesai
                            </span>
                            @endif
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Belum ada transaksi misi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .btn-warning {
        background-color: #ffc107;
        color: #000;
        border: none;
    }

    .btn-warning:hover {
        background-color: #e0a800;
        color: #fff;
    }

    .btn-success {
        background-color: #28a745;
        color: #fff;
        border: none;
    }

    .btn-success:hover {
        background-color: #218838;
        color: #fff;
    }

    .rounded-pill {
        border-radius: 50px;
    }
</style>


@endsection