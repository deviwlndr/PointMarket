@extends('layouts.master')

@section('konten')
<div class="card mx-5 mt-4 shadow-sm">
    <div class="card-header bg-primary text-white text-center">
        <h4 class="card-title mb-0">Riwayat Transaksi Reward</h4>
    </div>
    <div class="card-body">
        <!-- Tabel Riwayat -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center table-sm">
                <thead class="bg-primary text-white">
                    <tr>
                        <th style="width: 10%;">NPM</th>
                        <th style="width: 20%;">Nama Barang</th>
                        <th style="width: 20%;">Deskripsi</th>
                        <th style="width: 8%;">Point</th>
                        <th style="width: 15%;">Tanggal</th>
                        <th style="width: 15%;">Kode Unik</th>
                        <th style="width: 12%;">Bukti Terima</th>
                        <th style="width: 12%;">Status</th>
                        <th style="width: 12%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riwayatbarang as $reward)

                    <tr>
                        <td>{{ $reward->npm }}</td>
                        <td>{{ $reward->nama_barang }}</td>
                        <td>{{ $reward->deskripsi }}</td>
                        <td>{{ $reward->point }}</td>
                        <td>{{ \Carbon\Carbon::parse($reward->tanggal_transaksi)->format('d M Y') }}</td>
                        <td>{{ $reward->kode_unik }}</td>
                        <td>
                            @if($reward->bukti_terima)
                            <a href="{{ asset('storage/' . $reward->bukti_terima) }}" target="_blank" class="btn btn-success btn-sm">Lihat Bukti</a>
                            
                            @endif
                            <input type="file" name="bukti_terima" class="form-control mt-2" form="redeemForm-{{ $reward->kode_unik }}">
                        </td>
                        <td>
                            <span class="badge bg-{{ $reward->status === 'pending' ? 'warning' : 'success' }}">
                                {{ ucfirst($reward->status) }}
                            </span>
                        </td>
                        <td>
                            @if($reward->status === 'pending')
                            <form id="redeemForm-{{ $reward->kode_unik }}" action="{{ route('riwayat_barang.redeem') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="kode_unik" value="{{ $reward->kode_unik }}">
                                <button type="submit" class="btn btn-success btn-sm mt-2">Tukarkan</button>
                            </form>

                            <!-- Debugging Block -->
                            @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @else
                            <span class="text-success">Sudah Ditukarkan</span>
                            @endif
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Belum ada transaksi reward.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    /* Memperkecil tampilan tabel */
    .table {
        font-size: 0.85rem;
        /* Ukuran font kecil */
    }

    .table td,
    .table th {
        padding: 0.5rem;
        /* Padding kecil */
        vertical-align: middle;
    }

    .btn-sm {
        font-size: 0.75rem;
        /* Ukuran font tombol kecil */
        padding: 0.3rem 0.6rem;
    }

    .badge {
        font-size: 0.8rem;
        /* Ukuran font badge kecil */
        padding: 0.4rem 0.6rem;
    }

    .card-header {
        padding: 0.75rem 1rem;
        /* Padding header kecil */
    }

    .card-body {
        padding: 1rem;
        /* Padding body kecil */
    }
</style>
@endsection
