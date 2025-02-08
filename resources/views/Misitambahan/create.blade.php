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
        <h4 class="card-title custom-title">Add Misi Tambahan</h4>
            <p class="card-description">Fill out the form below to add a new "Misi Tambahan".</p>
            
            <form action="{{ url('/misitambahan') }}" method="POST">
                @csrf

                <!-- Kode Misi Input -->
                <div class="form-group">
                    <label for="kode_misi">Kode Misi</label>
                    <input type="text" name="kode_misi" class="form-control" id="kode_misi" placeholder="Enter Kode Misi" required>
                    <small id="kode_misiHelp" class="form-text text-muted">Kode misi will be used as the unique identifier for the mission.</small>
                </div> 
                <div class="mb-3">
                    <label for="dosen" class="form-label">Dosen</label>
                    <input type="text" name="dosen" id="dosen" class="form-control" value="{{ auth()->user()->name }}" readonly>
                </div>              
                <!-- Nama Misi Input -->
                <div class="form-group">
                    <label for="nama_misi">Nama Misi</label>
                    <input type="text" name="nama_misi" class="form-control" id="nama_misi" placeholder="Enter Nama Misi" required>
                </div>

                <!-- Deskripsi Input -->
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" placeholder="Enter Deskripsi" required></textarea>
                </div>

                <!-- Harga Point Input -->
                <div class="form-group">
                    <label for="harga_point">Harga Point</label>
                    <input type="number" name="harga_point" class="form-control" id="harga_point" placeholder="Enter Harga Point" required>
                    <small id="harga_pointHelp" class="form-text text-muted">Point value for completing this mission.</small>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
