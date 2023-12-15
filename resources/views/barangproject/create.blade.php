@extends('layouts.master')

@section('konten')   
<div class="container">
<h1>Tambah Barang Project</h1>
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
@endsection