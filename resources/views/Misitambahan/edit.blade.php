@extends('layouts.master')

@section('konten')
<div class="container">
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edit Misi Tambahan</h4>
        <p class="card-description"></p>   
        <form action="/misitambahan/{{ $misitambahan->id_misi }}" method="POST">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="examplekodemisi">ID Misi</label>
                <input type="text" name="kode_misi" class="form-control" id="examplekodemisi" aria-describedby="kodetransaksi" placeholder="Kode Transaksi" value="{{ $misitambahan->kode_misi }}">
                <small id="kodemisi" class="form-text text-muted"></small>
            </div>           
            <div class="form-group">
                <label for="examplekodemisi">Kode Misi</label>
                <input type="text" name="kode_misi" class="form-control" id="examplekodemisi" aria-describedby="kodetransaksi" placeholder="Kode Transaksi" value="{{ $misitambahan->kode_misi }}">
                <small id="kodemisi" class="form-text text-muted"></small>
            </div>           
            <div class="form-group">
            <label for="examplenpm">Nama Misi</label>
                <input type="text" name="nama_misi" class="form-control" id="examplenama_misi" aria-describedby="nama_misi" placeholder="Jenis Misi" value="{{ $misitambahan->nama_misi }}">
            </div>
            <div class="form-group">
            <label for="examplenpm">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" id="exampledeskripsi" aria-describedby="deskripsi" placeholder="Jenis Misi" value="{{ $misitambahan->deskripsi }}">
            </div>
            <div class="form-group">
            <label for="examplenpm">Harga Point</label>
                <input type="text" name="harga_point" class="form-control" id="examplehargapoint" aria-describedby="hargapoint" placeholder="Harga Point" value="{{ $misitambahan->harga_point }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>
@endsection
