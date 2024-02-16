@extends('layouts.dashboard_mahasiswa')

@section('konten')
    <div class="container">
        <h1>Hasil Pencarian</h1>
            @if ($searchResults->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>NPM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Jumlah Point</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($searchResults as $result)
                        <tr>
                            <td>{{ $result->npm }}</td>
                            <td>{{ $result->nama_mahasiswa }}</td>
                            <td><label class="badge badge-danger">{{ $result->jumlah_point }}</label></td>
                            <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#riwayatPembelianModal{{ $result->npm }}">
                                    +
                                </button></td>
                                       
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No results found.</p>
        @endif 
            </ul>
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
    </div>
@endsection
