@extends('layouts.master')

@section('konten')
<div class="container mr-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Pembelian</h4>
            
            <p class="card-description"></p>
            
            
            <form action="{{ url('/formpembelian') }}" method="POST">
                @csrf
                
                <div class="form-group">
                <label for="examplenpm">NPM</label>
                    <input type="text" name="npm" class="form-control" id="examplenpm" aria-describedby="npm" placeholder="NPM">
                </div>
                <div class="form-group">
                <label for="examplenpm">Kode Pembelian</label>
                    <input type="text" name="kode_pembelian" class="form-control" id="examplekode_pembelian" aria-describedby="kode_pembelian" placeholder="Kode Pembelian">
                </div>
                <div class="form-group">
                <label for="examplenpm">Nama Pembelian</label>
                    <input type="text" name="nama_pembelian" class="form-control" id="examplenama_pembelian" aria-describedby="nama_pembelian" placeholder="Nama Pembelian">
                </div>
                <label for="tanggal_pembelian">Tanggal Pembelian:</label>
                    <input type="date" name="tanggal_pembelian" required>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
