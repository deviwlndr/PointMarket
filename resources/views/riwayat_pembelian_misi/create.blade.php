@extends('layouts.dashboard_mahasiswa')

@section('konten')
<div class="container mr-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Misi Tambahan</h4>
            <p class="card-description"></p>
            <form action="{{ url('/riwayat_pembelian_misi') }}" method="post">
                @csrf
                
                <div class="form-group">
                    <label for="examplenpm">NPM</label>
                    <input type="text" name="npm" class="form-control" id="examplenpm" aria-describedby="npm" placeholder="NPM">
                </div>
                <div class="form-group">
                    <label for="examplekode_pembelian">Kode Misi</label>
                    <input type="text" name="kode_misi" class="form-control" id="examplekode_misi" aria-describedby="kode_misi" placeholder="Kode Misi">
                </div>
                <div class="form-group">
                    <label for="examplenama_misi">Nama Misi</label>
                    <input type="text" name="nama_misi" class="form-control" id="examplenama_barang" aria-describedby="nama_barang" placeholder="Nama Misi">
                </div>
                <div class="form-group">
                    <label for="examplenama_misi">Point</label>
                    <input type="text" name="point" class="form-control" id="examplenama_barang" aria-describedby="nama_barang" placeholder="Nama Misi">
                </div>
                <div class="form-group">
                    <label for="tanggal_pembelian">Tanggal Transaksi:</label>
                    <input type="date" name="tanggal_pembelian" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
