@extends('layouts.master')

@section('konten')
<div class="container mr-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Misi Tambahan</h4>
            <p class="card-description"></p>
            <form action="{{ url('/misitambahan') }}" method="POST">
                @csrf
                               
                <div class="form-group">
                    <label for="examplekodemisi">Kode Misi</label>
                    <input type="text" name="kode_misi" class="form-control" id="examplekode_misi" aria-describedby="kode_misi" placeholder="Kode Misi">
                    <small id="kode_misi" class="form-text text-muted"></small>
                </div>                
                <div class="form-group">
                <label for="examplenama_misi">Nama Misi</label>
                    <input type="text" name="nama_misi" class="form-control" id="examplenama_misi" aria-describedby="nama_misi" placeholder="Nama Misi">
                </div>
                <div class="form-group">
                <label for="exampledeskripsi">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" id="exampledeskripsi" aria-describedby="deskripsi" placeholder="Deskripsi">
                </div>
                <div class="form-group">
                <label for="examplenpm">Harga Point</label>
                    <input type="text" name="harga_point" class="form-control" id="examplehargapoint" aria-describedby="hargapoint" placeholder="Harga Point">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
