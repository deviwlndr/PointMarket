@extends('layouts.dashboard_mahasiswa')

@section('profile')

    <!-- Riwayat Transaksi -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">
                <h4>Riwayat Transaksi Misi</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NPM</th>
                                <th>Nama Misi</th>
                                <th>Point</th>
                                <th>Tanggal Transaksi</th>
                                <th>File Bukti</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($riwayatTransaksi as $transaksi)
                                <tr>
                                    <td>{{ $transaksi->id }}</td>
                                    <td>{{ $transaksi->npm }}</td>
                                    <td>{{ $transaksi->nama_misi }}</td>
                                    <td>{{ $transaksi->point }}</td>
                                    <td>{{ $transaksi->tanggal_transaksi }}</td>
                                    <td>
                                        @if ($transaksi->file_bukti)
                                            <a href="{{ asset('storage/' . $transaksi->file_bukti) }}" target="_blank" class="btn btn-sm btn-primary">Lihat File</a>
                                        @else
                                            <span class="text-danger">Tidak Ada</span>
                                        @endif
                                    </td>
                                    <td><span class="badge bg-success">{{ ucfirst($transaksi->status) }}</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada data transaksi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
