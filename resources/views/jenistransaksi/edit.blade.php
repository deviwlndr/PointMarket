@extends('layouts.master')

@section('konten')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Jenis Transaksi</h4>
            <p class="card-description"></p>            
            <form action="/jenistransaksi/{{ $jenistransaksi->id }}" method="POST">
                @method('put')
                @csrf
                
                <div class="form-group">
                <label for="examplenpm">Nama Transaksi</label>
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
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>    
@endsection
