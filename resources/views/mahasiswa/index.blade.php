@extends('layouts.master')

@section('konten')
    <div class="card">
        <div class="card-body mb-10">
            <h4 class="card-title">Level Mahasiswa</h4>
            <a href="mahasiswa/create" class="btn btn-primary float-end">Add Mahasiswa</a>
            <p class="card-description"></p>
            <div class="container">
                <div class="table-responsive">
                    <table class="table">
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

                            @foreach($mahasiswas as $mahasiswa)
                                <tr>
                                    <td>{{ $mahasiswa->npm }}</td>
                                    <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                                    <td><label class="badge badge-danger">{{ $mahasiswa->jumlah_point }}</label></td>
                                    <td>
                                        @if($mahasiswa->jumlah_point >= 10 && $mahasiswa->jumlah_point <= 50)
                                            <span class="badge bg-secondary">Silver</span>
                                        @elseif($mahasiswa->jumlah_point > 50 && $mahasiswa->jumlah_point <= 100)
                                            <span class="badge bg-warning">Gold</span>
                                        @elseif($mahasiswa->jumlah_point > 100 && $mahasiswa->jumlah_point <= 150 )
                                            <span class="badge bg-info">Platinum</span>
                                        @elseif($mahasiswa->jumlah_point > 150 && $mahasiswa->jumlah_point <= 200)
                                            <span class="badge bg-primary" > Diamond</span>
                                        @else        
                                            <span class="badge bg-secondary">Other Status</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/mahasiswa/{{ $mahasiswa->id }}/edit" class="btn btn-warning mr-5">Edit</a>
                                            <form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST">
                                                @method("DELETE")
                                                @csrf
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </form>
                                            <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#riwayatPembelianModal{{ $mahasiswa->npm }}">
                                            +
                                        </button>
                                    </td>
                                        </div>
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
        @foreach($mahasiswas as $u)
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
                                            <td>{{ $jenistransaksi->id_transaksi_jenis }}</td>
                                            <td>{{ $jenistransaksi->nama_transaksi }}</td>
                                            <td><label class="badge badge-danger">{{ $jenistransaksi->point }}</label></td>
                                            <td>{{ $jenistransaksi->tanggal_pembelian }}</td>
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
