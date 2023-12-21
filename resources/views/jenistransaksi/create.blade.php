@extends('layouts.master')

@section('konten')
<div class="container mr-5">
    <div class="card">
        <div class="card-body">
        <div class="card-title grid text-center bg-primary p-3 rounded " style="width: 50%;" >
            <div class="g-col-3 g-start-2">Add Jenis Transaksi</div>
        </div>
            <p class="card-description"></p>
            
            
            <form action="{{ url('/jenistransaksi') }}" method="POST">
                @csrf
                
                <div class="form-group">
                <label for="examplenama_transaksi">Nama Transaksi</label>
                    <input type="text" name="nama_transaksi" class="form-control" id="examplenama_transaksi" aria-describedby="nama_transaksi" placeholder="Nama Transaksi">
                </div>
                <div class="form-group">
                <label for="examplenpm">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" id="exampledeskripsi" aria-describedby="deskripsi" placeholder="Deskripsi">
                </div>
                <div class="form-group">
                <label for="examplenpm">Point</label>
                    <input type="text" name="point" class="form-control" id="examplepoint" aria-describedby="point" placeholder="Point">
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>    
@endsection
