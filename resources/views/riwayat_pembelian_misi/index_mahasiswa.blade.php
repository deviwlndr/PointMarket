@extends('layouts.dashboard_mahasiswa')

@section('konten')
<div class="card ml-5">
    <div class="card-body">
        <h4 class="card-title">Riwayat Transaksi Misi</h4>
        <p class="card-description"></p>
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
        @foreach($rekap_pembelian as $npm => $pembelian)
            <!-- Memulai bagian untuk setiap NPM -->
            <div>
                <h4>NPM: {{ $npm }}</h4>
                <ul></ul>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode Misi</th>
                                <th>Nama Misi</th>
                                <th>Point</th>
                                <th>Tanggal Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riwayat_pembelians as $riwayat_pembelian)
                                @if($riwayat_pembelian->npm == $npm)
                                    <tr>
                                        <td>{{ $riwayat_pembelian->id_transaksi_misi }}</td>
                                        <td>{{ $riwayat_pembelian->kode_misi }}</td>
                                        <td>{{ $riwayat_pembelian->nama_misi }}</td>
                                        <td>{{ $riwayat_pembelian->point }}</td>
                                        <td>{{ $riwayat_pembelian->tanggal_pembelian }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Akhir dari bagian untuk setiap NPM -->
        @endforeach
    </div>
</div>
@endsection
