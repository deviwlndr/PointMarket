
@extends('layouts.master')

@section('konten')
<style>
    .custom-title {
        background-color:rgb(119, 191, 255); /* Choose a background color */
        color: white; /* Text color */
        padding: 10px 20px; /* Add padding to the title */
        border-radius: 5px; /* Rounded corners */
        font-size: 1.5rem; /* Adjust the font size */
        font-weight: bold; /* Make the title bold */
        text-align: center; /* Center-align the title */

        
    }
    .btn-primary {
        background-color: #007bff; /* Blue color */
        border-color: #007bff; /* Border matching the background color */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Darker blue on hover */
        border-color: #0056b3; /* Darker blue border on hover */
    }
</style>

<div class="container pr-5 pl-5">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title custom-title">Edit Misi Tambahan</h4>
            
            <form action="/misitambahan/{{ $misitambahan->id_misi }}" method="POST">
            @method('put')
            @csrf
                       
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
            <button type="save" class="btn btn-primary">Save</button>
        </form>
        </div>
    </div>
</div>
@endsection


