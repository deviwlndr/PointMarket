@extends('layouts.master')

@section('konten')   
<div class="container mr-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Barang Project</h4>          
            <p class="card-description"></p>
                <form action="/barangproject/store" method="POST">
                @csrf
                <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Kode</label>
                <input type="text" name="kode" id="disabledTextInput" class="form-control" placeholder="">
                </div>
                <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" id="disabledTextInput" class="form-control" placeholder="">
                </div>
                <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Dekripsi</label>
                <input type="text" name="deskripsi" id="disabledTextInput" class="form-control" placeholder="">
                </div>
                <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Harga Point</label>
                <input type="text" name="harga_point" id="disabledTextInput" class="form-control" placeholder="">
                </div>      
                <input type="submit" name="submit" class="btn btn-info" value="Simpan"><br>
                </div>
                </form>
    </div>
    </div>        
</div>             
@endsection