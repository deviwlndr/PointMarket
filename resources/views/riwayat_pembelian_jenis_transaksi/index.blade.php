@extends('layouts.master')

@section('konten')
    <div class="card">
        <div class="card-body mb-10">
            <h4 class="card-title">Jenis Transaksi</h4>
            <p class="card-description"></p>
            <div class="container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Transaksi</th>
                                <th>Transaksi</th>
                                <th>Deskripsi</th>
                                <th>Point</th>
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
                            @foreach($riwayat_pembelian_jeniss as $jenistransaksi)
                                <tr>
                                    <td>{{ $jenistransaksi->id_transaksi }}</td>
                                    <td>{{ $jenistransaksi->transaksi }}</td>
                                    <td id="deskripsiCell{{ $jenistransaksi->id }}" class="deskripsi-cell">{{ $jenistransaksi->deskripsi }}</td>
                                    <td><label class="badge badge-danger">{{ $jenistransaksi->point }}</label></td>
                                    <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
