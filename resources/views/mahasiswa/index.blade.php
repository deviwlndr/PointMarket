@extends('layouts.master')

@section('konten')
<!-- Styles -->
<style>
    .custom-title {
        background-color: rgb(239, 190, 241);
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 1.5rem;
        font-weight: bold;
        text-align: center;
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

    .table th {
        background-color: rgb(239, 190, 241);
        color: black;
        text-align: center;
        padding: 12px 15px;
        font-weight: bold;
        border-top: 2px solid #ddd;
    }

    .table td {
        text-align: center;
        padding: 10px 15px;
    }

    .btn-container {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .btn-edit {
        background-color: #4CAF50;
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
    }

    .btn-delete {
        background-color: #f44336;
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
    }
</style>

<!-- Main Card -->
<div class="card mr-5 ml-5">
    <div class="card-body">
        <h4 class="card-title custom-title">Level Mahasiswa</h4>
        <a href="mahasiswa/create" class="btn btn-primary float-end">Add Data</a>
        
        <!-- Success / Danger Messages -->
        @if(session()->has('success'))
            <div class="custom-alert alert alert-success">
                {!! session('success') !!}
            </div>
        @endif
        @if(session()->has('danger'))
            <div class="custom-alert alert alert-danger">
                {!! session('danger') !!}
            </div>
        @endif

        <!-- Table -->
        <div class="table-responsive">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th style="width: 10%;">NPM</th>
                        <th style="width: 15%;">Nama Mahasiswa</th>
                        <th>Jumlah Point</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{ $mahasiswa->npm }}</td>
                        <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                        <td>
                            <label class="badge badge-danger">{{ $mahasiswa->jumlah_point }}</label>
                        </td>
                        <td>
                            @if($mahasiswa->jumlah_point >= 10 && $mahasiswa->jumlah_point <= 50)
                                <span class="badge bg-secondary">Silver</span>
                            @elseif($mahasiswa->jumlah_point > 50 && $mahasiswa->jumlah_point <= 100)
                                <span class="badge bg-warning">Gold</span>
                            @elseif($mahasiswa->jumlah_point > 100 && $mahasiswa->jumlah_point <= 150)
                                <span class="badge bg-info">Platinum</span>
                            @elseif($mahasiswa->jumlah_point > 150 && $mahasiswa->jumlah_point <= 200)
                                <span class="badge bg-primary">Diamond</span>
                            @else
                                <span class="badge bg-secondary">Other Status</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-container">
                                <!-- Custom Edit Button -->
                                <a href="/mahasiswa/{{ $mahasiswa->id }}/edit" class="btn btn-edit">Edit</a>

                                <!-- Delete Form -->
                                <form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
