@extends('layouts.dashboard_mahasiswa')

@section('konten')
    <div class="card">
        <div class="card-body mb-10">
            <h4 class="card-title">Mahasiswa</h4>
            <p class="card-description"></p>
            <div class="container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NPM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Jumlah Point</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
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
                            @foreach($users as $u)
                                <tr>
                                    <td>{{ $u->npm }}</td>
                                    <td>{{ $u->nama_mahasiswa }}</td>
                                    <td><label class="badge badge-danger">{{ $u->jumlah_point }}</label></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#riwayatPembelianModal{{ $u->npm }}">
                                            +
                                        </button>
                                    </td>
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @foreach($users as $u)
        <div class="modal fade" id="riwayatPembelianModal{{ $u->npm }}" tabindex="-1" role="dialog" aria-labelledby="riwayatPembelianModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="riwayatPembelianModalLabel">Riwayat Pembelian - {{ $u->npm }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"> 
                        <!-- Menampilkan rekap pembelian jenis transaksi -->
                        <h5>Riwayat Transaksi</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID Jenis Transaksi</th>
                                    <th>Nama Transaksi</th>
                                    <th>Point</th>
                                    <th>Tanggal Pembelian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($riwayat_pembelian_jeniss as $jenistransaksi)
                                    @if($jenistransaksi->npm == $u->npm)
                                        <tr>
                                            <td>{{ $jenistransaksi->id_transaksi }}</td>
                                            <td>{{ $jenistransaksi->transaksi }}</td>
                                            
                                            <td><label class="badge badge-danger">{{ $jenistransaksi->point }}</label></td>
                                            <td>{{ $jenistransaksi->tanggal_transaksi}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        

                    
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
