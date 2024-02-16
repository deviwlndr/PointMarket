@extends('layouts.dashboard_mahasiswa')

@section('konten')
<div class="container mr-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Riwayat Pembelian dan Rekap</h4>

            @foreach($rekap_pembelian as $npm => $pembelian)
                <!-- Memulai bagian untuk setiap NPM -->
                <div>
                    <h4>NPM: {{ $npm }}</h4>
                    <ul>
                        
                    </ul>

                    <!-- Menampilkan Tabel Riwayat Pembelian -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Jenis Transaksi</th>
                                <th>Transaksi</th>
                                <th>Point</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riwayat_pembelian_jeniss as $jenistransaksi)
                                @if($jenistransaksi->npm == $npm)
                                    <tr>
                                        <td>{{ $jenistransaksi->id_transaksi }}</td>
                                        <td>{{ $jenistransaksi->transaksi }}</td>
                                        <td><label class="badge badge-danger">{{ $jenistransaksi->point }}</label></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Akhir dari bagian untuk setiap NPM -->
            @endforeach
        </div>
    </div>
</div>
@endsection
