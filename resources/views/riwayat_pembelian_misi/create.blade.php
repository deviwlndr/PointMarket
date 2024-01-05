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
                    <input type="text" name="kode_pembelian" class="form-control" id="examplekode_pembelian" aria-describedby="kode_pembelian" placeholder="Kode Pembelian">
                </div>
                <div class="form-group">
                    <label for="examplenama_pembelian">Nama Misi</label>
                    <input type="text" name="nama_pembelian" class="form-control" id="examplenama_pembelian" aria-describedby="nama_pembelian" placeholder="Nama Pembelian">
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
