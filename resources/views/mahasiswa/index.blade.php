@extends('layouts.master')

@section('konten')
    <div class="card">
        <div class="card-body mb-10">
            <h4 class="card-title">Level Mahasiswa</h4>
            <a href="mahasiswa/create" class="btn btn-primary float-end">Add Mahasiswa</a>
            <p class="card-description"></p>
            <div class="container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NPM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Jumlah Point</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
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

                            @foreach($mahasiswas as $mahasiswa)
                                <tr>
                                    <td>{{ $mahasiswa->npm }}</td>
                                    <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                                    <td>{{ $mahasiswa->jumlah_point }}</td>
                                    <td>
                                        @if($mahasiswa->jumlah_point >= 10 && $mahasiswa->jumlah_point <= 50)
                                            <span class="badge bg-secondary">Silver</span>
                                        @elseif($mahasiswa->jumlah_point > 50 && $mahasiswa->jumlah_point <= 100)
                                            <span class="badge bg-warning">Gold</span>
                                        @elseif($mahasiswa->jumlah_point > 100 && $mahasiswa->jumlah_point <= 150 )
                                            <span class="badge bg-pink">Platinum</span>
                                        @elseif($mahasiswa->jumlah_point > 150 && $mahasiswa->jumlah_point <= 200)
                                            <span class="badge bg-primary" > Diamond</span>
                                        @else        
                                            <span class="badge bg-secondary">Other Status</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/mahasiswa/{{ $mahasiswa->id }}/edit" class="btn btn-warning mr-5">Edit</a>
                                            <form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST">
                                                @method("DELETE")
                                                @csrf
                                                <input type="submit" class="btn btn-danger" value="Delete">
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
    
    <!-- Your scripts and styles here -->
@endsection
