@extends('layouts.master')

@section('konten')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-purple text-white text-center">
            <h4 class="card-title mb-0">Daftar Dosen</h4>
        </div>
        <div class="card-body">
            <a href="{{ route('dosen.create') }}" class="btn btn-primary mb-3">Add Data</a>
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead class="bg-pink text-white">
                    @if(session()->has('success'))
                        <div class="custom-alert alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session()->has('danger'))
                        <div class="custom-alert alert alert-danger">
                            {{ session('danger') }}
                        </div>
                    @endif
                        <tr>
                            <th style="width: 10%;">No</th>
                            <th style="width: 10%;">Kode Dosen</th>
                            <th style="width: 10%;">Nama</th>
                            <th style="width: 10%;">Email</th>
                            <th style="width: 10%;">No Telepon</th>
                            <th style="width: 30%;">Alamat</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dosen as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->kode_dosen }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->telepon }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>
                                <a href="{{ route('dosen.edit', $data->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{ route('dosen.destroy', $data->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    /* Warna khusus untuk header */
    .bg-purple {
        background-color: #9b59b6;
    }

    .bg-pink {
        background-color: #f8a5c2;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .table td {
        font-size: 0.9rem;
    }

    .btn-sm {
        padding: 0.3rem 0.6rem;
        font-size: 0.85rem;
    }
</style>
@endsection
