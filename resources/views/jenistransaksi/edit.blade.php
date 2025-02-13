@extends('layouts.master')

@section('konten')

<style>
    .custom-title {
        background-color:rgb(119, 255, 183); /* Choose a background color */
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
        <h4 class="card-title custom-title">Edit Rules</h4>
           
            <form action="/jenistransaksi/{{ $jenistransaksi->id_jenis_transaksi }}" method="POST">
                @method('put')
                @csrf
                 
                <div class="form-group">
                <label for="examplenpm">Nama Rules</label>
                    <input type="text" name="nama_transaksi" class="form-control" id="examplenama_transaksi" aria-describedby="nama_transaksi" placeholder="Nama Transaksi" value="{{ $jenistransaksi->nama_transaksi}}">
                </div>
                <div class="form-group">
                <label for="examplenpm">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" id="exampledeskripsi" aria-describedby="deskripsi" placeholder="Deskripsi" value="{{ $jenistransaksi->deskripsi }}">
                </div>
                <div class="form-group">
                <label for="examplenpm">Point</label>
                    <input type="text" name="point" class="form-control" id="examplepoint" aria-describedby="point" placeholder="Point" value="{{ $jenistransaksi->point }}">
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>

                </form>
        </div>
    </div>
</div>

@endsection
