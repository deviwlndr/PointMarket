@extends('layouts.dashboard_mahasiswa')

@section('konten')
<div class="container mr-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Barang Project</h4>
            <p class="card-description"></p>
            <form action="{{ url('/riwayat_pembelian_barang') }}" method="post">
                @csrf
                
                <div class="form-group">
                    <label for="examplenpm">NPM</label>
                    <input type="text" name="npm" class="form-control" id="examplenpm" aria-describedby="npm" placeholder="NPM">
                </div>
                <div class="form-group">
                    <label for="examplekode_pembelian">Kode Pembelian</label>
                    <input type="text" name="kode_pembelian" class="form-control" id="examplekode_pembelian" aria-describedby="kode_pembelian" placeholder="Kode Pembelian">
                </div>
                <div class="form-group">
                    <label for="examplenama_barang">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" id="examplenama_barang" aria-describedby="nama_barang" placeholder="Nama Barang">
                </div>
                <div class="form-group">
                    <label for="exampledeskripsi">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" id="exampledeskripsi" aria-describedby="deskripsi" placeholder="Deskripsi">
                </div>
                <div class="form-group">
                    <label for="tanggap_pembelian">Tanggal Transaksi:</label>
                    <input type="date" name="tanggap_pembelian" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
