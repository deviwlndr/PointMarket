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
        <h4 class="card-title custom-title">Edit Reward</h4>
           
            <form action="{{ route('barangproject.update', $barangproject->id_barang) }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Kode Barang</label>
                        <input type="text" name="kode_barang" id="disabledTextInput" class="form-control" placeholder="" value="{{$barangproject->kode_barang}}">
                </div>
                <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Dosen</label>
                        <input type="text" name="dosen" id="disabledTextInput" class="form-control" placeholder="" value="{{$barangproject->dosen}}" readonly>
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
                        <input type="submit" name="submit" class="btn btn-info" value="Save"><br>
                </div>

                </form>
        </div>
    </div>
</div>

@endsection