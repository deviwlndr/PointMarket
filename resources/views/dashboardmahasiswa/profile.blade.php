@extends('layouts.dashboard_mahasiswa')

@section('konten')
<div class="card">
    <div class="card-body mb-10">
        <h4 class="card-title">Profil Mahasiswa</h4>
        <p class="card-description"></p>

        <!-- Menampilkan data profil mahasiswa -->
        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NPM</th>
                            <th>Email</th>
                            <th>Poin</th>
                            <th>Level</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $users->name }}</td>  <!-- Menggunakan $user dari controller -->
                            <td>{{ $users->npm }}</td>  <!-- Menampilkan NPM mahasiswa -->
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->poin }}</td>
                            <td>{{ $users->level }}</td>
                           
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
