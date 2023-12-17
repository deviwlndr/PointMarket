@extends('layouts.master')

@section('konten')
<div class="container mr-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Barang Project</h4>
                <form action="/barangproject/{{$barangproject->id}}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Kode</label>
                        <input type="text" name="kode" id="disabledTextInput" class="form-control" placeholder="" value="{{$barangproject->kode}}">
                </div>
                <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Nama Barang</label>
                        <input type="text" name="nama_barang" id="disabledTextInput" class="form-control" placeholder="" value="{{$barangproject->nama_barang}}">
                </div>
                <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Dekripsi</label>
                        <input type="text" name="deskripsi" id="disabledTextInput" class="form-control" placeholder=""value="{{$barangproject->deskripsi}}" >
                </div>
                <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Harga Point</label>
                        <input type="text" name="harga_point" id="disabledTextInput" class="form-control" placeholder="" value="{{$barangproject->harga_point}}">
                </div>      
                        <input type="submit" name="submit" class="btn btn-info" value="Simpan"><br>
                </div>

                </form>
        </div>
   </div>
</div>
@endsection