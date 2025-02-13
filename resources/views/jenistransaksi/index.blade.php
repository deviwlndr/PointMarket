@extends('layouts.master')

@section('konten')

<style>
    .custom-title {
        background-color: rgb(239, 190, 241);
        /* Choose a background color */
        color: white;
        /* Text color */
        padding: 10px 20px;
        /* Add padding to the title */
        border-radius: 5px;
        /* Rounded corners */
        font-size: 1.5rem;
        /* Adjust the font size */
        font-weight: bold;
        /* Make the title bold */
        text-align: center;
        /* Center-align the title */


    }

    .table td,
    .table th {
        word-wrap: break-word;
        white-space: normal;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table {
        table-layout: auto;
    }

    /* Style the table header */
    .table th {
        background-color: rgb(239, 190, 241);
        color: black;
        text-align: center;
        padding: 12px 15px;
        font-weight: bold;
        border-top: 2px solid #ddd;
    }

    /* Style the table rows */
    .table td {
        text-align: center;
        padding: 10px 15px;
    }

    /* Menggunakan Flexbox untuk menyusun tombol secara sejajar */
    .btn-container {
        display: flex;
        gap: 10px;
        /* Memberikan jarak antara tombol */
        align-items: center;
        /* Menjaga tombol tetap sejajar vertikal */
    }

    /* Styling tombol Edit */
    .btn-edit {
        background-color: #4CAF50;
        /* Hijau */
        color: white;
        font-size: 14px;
        padding: 5px 15px;
        border-radius: 5px;
        border: none;
        transition: background-color 0.3s ease;
        margin-bottom: 16px;
        margin-top: 20px;
    }

    .btn-edit:hover {
        background-color: #45a049;
        /* Hijau lebih gelap saat hover */
    }

    /* Styling tombol Delete */
    .btn-delete {
        background-color: #f44336;
        /* Merah */
        color: white;
        font-size: 14px;
        padding: 5px 15px;
        border-radius: 5px;
        border: none;
        transition: background-color 0.3s ease;
        margin-top: 16px;
    }

    .btn-delete:hover {
        background-color: #e53935;
        /* Merah lebih gelap saat hover */
    }
</style>

<div class="card mr-5 ml-5">
    <div class="card-body">
        <h4 class="card-title custom-title">Rules</h4>
        <a href="/jenistransaksi/create" class="btn btn-primary float-end">Add</a>
        <p class="card-description"></p>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    @if(session()->has('success'))
                    <div class="custom-alert alert alert-success alert-dismissible fade show custom-alert" role="alert">
                        {!! session('success') !!}
                    </div>
                    @endif

                    @if(session()->has('danger'))
                    <div class="custom-alert alert alert-danger alert-dismissible fade show custom-alert" role="alert">
                        {!! session('danger') !!}
                    </div>
                    @endif
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 10%;">Jenis Rules</th>
                        <th style="width: 40%;">Deskripsi</th>
                        <th style="width: 10%;">Point</th>
                        <th style="width: 10%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jenistransaksis as $jenistransaksi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jenistransaksi->nama_transaksi }}</td>
                        <td id="deskripsiCell{{ $jenistransaksi->id }}" class="deskripsi-cell">{{ $jenistransaksi->deskripsi }}</td>
                        <td><label class="badge badge-danger">{{ $jenistransaksi->point }}</label></td>
                        <td>
                            <div class="btn-container">
                                <!-- Custom Edit Button (Green with icon) -->
                                <a href="/jenistransaksi/{{ $jenistransaksi->id_jenis_transaksi }}/edit" class="btn btn-edit">Edit</a>

                                <!-- Delete Form with Custom Button (Red with icon) -->
                                <form action="/jenistransaksi/{{ $jenistransaksi->id_jenis_transaksi }}" method="POST" onsubmit="return confirmDelete()">
                                    @method("DELETE")
                                    @csrf
                                    <input type="submit" class="btn btn-delete" value="Delete">
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection