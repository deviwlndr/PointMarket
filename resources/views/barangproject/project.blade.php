@extends('layouts.master')

@section('konten')
    <div class="card">
        <div class="card-body mb-10">
            <h4 class="card-title">Barang Project</h4>
            <a href="/barangproject/create" class="btn btn-primary float-end">Tambah Barang Project</a>
            <p class="card-description"></p>
            <div class="container">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
            @endif
            @if(session()->has('danger'))
            <div class="alert alert-danger">
                {!! session('danger') !!}
            </div>
            @endif
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Barang</th>
                                <th>KODE Barang</th>
                                <th>Nama Barang</th>
                                <th>Deskripsi</th>
                                <th>Harga Point</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangproject as $p)
                                <tr>
                                    <td>{{ $p->kode_barang}}</td>
                                    <td>{{$p->nama_barang}}</td>
                                    <td id="deskripsiCell{{ $p->id }}" class="deskripsi-cell">{{ $p->deskripsi }}</td>
                                    <td><label class="badge badge-danger">{{$p->harga_point}}</label></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/barangproject/{{$p->id_barang}}/edit" class="btn btn-warning mr-5">Edit</a>
                                            <form action="/barangproject/{{$p->id_barang}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input class="btn btn-danger" type="submit" value="Delete">
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
    </div>
@endsection
