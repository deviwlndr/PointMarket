@extends('layouts.master')

@section('konten')
        <div class="container">
            <a class="btn btn-primary" href="/barangproject/create">Tambah Barang Project</a>
                <table class="table table-hover">
                    <tr>
                        <th>KODE</th>
                        <th>NAMA BARANG</th>
                        <th>DESKRIPSI</th>
                        <th>HARGA POINT</th>
                        <th>AKSI</th>
                    </tr>
                    @foreach($barangproject as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->nama_barang}}</td>
                            <td>{{$p->deskripsi}}</td>
                            <td><label class="badge badge-danger">{{$p->harga_point}}</td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-warning mr-5" href="/barangproject/{{$p->id}}/edit">Edit</a>
                                <form action="/barangproject/{{$p->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
                                </div>
                        </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection