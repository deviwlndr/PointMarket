@extends('layouts.dashboard_mahasiswa')

@section('konten')
<div class="container mr-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Transaksi</h4>
            <p class="card-description"></p>
            <form action="{{ url('/riwayat_pembelian_jenis_transaksi') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="examplenpm">NPM</label>
                    <input type="text" name="npm" class="form-control" id="examplenpm" aria-describedby="npm" placeholder="NPM">
                </div>
                <div class="form-group">
                    <label for="exampletransaksi">Transaksi</label>
                    <input type="text" name="transaksi" class="form-control" id="exampletransaksi" aria-describedby="transaksi" placeholder="Transaksi">
                </div>
                <div class="form-group">
                    <label for="examplepoint">Point</label>
                    <input type="text" name="point" class="form-control" id="examplepoint" aria-describedby="point" placeholder="Point">
                </div>
                <div class="form-group">
                    <label for="exampletanggal_transaksi">Tanggal Transaksi:</label>
                    <input type="date" name="tanggal_transaksi" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
