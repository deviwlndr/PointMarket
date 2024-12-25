@extends('layouts.dashboard_mahasiswa')

@section('konten')

<style>
    /* Profil Card Styling */
    .card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
    }

    .card-header {
        font-family: 'Poppins', sans-serif;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 1px;
    }

    .table th {
        width: 30%;
        background-color: #f8f9fa;
        color: #333;
        font-weight: 500;
    }

    .table td {
        font-weight: 400;
        color: #555;
    }

    .badge {
        font-size: 0.9rem;
        padding: 0.4rem 0.6rem;
    }

    img.rounded-circle {
        border: 5px solid #f8f9fa;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>
<div class="card shadow-sm mt-4">
    <div class="card-header bg-primary text-white">
        <h4 class="card-title text-center mb-0">Profil Mahasiswa</h4>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <!-- Foto Profil -->
                <div class="col-md-3 text-center">
                    <img src="{{ asset('images/default-profile.png') }}" alt="Foto Profil" class="rounded-circle img-fluid shadow" style="width: 150px; height: 150px;">
                    <h5 class="mt-3">{{ $user->name }}</h5>
                    <p class="text-muted">{{ $user->npm }}</p>
                </div>
                <!-- Informasi Profil -->
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>NPM</th>
                                    <td>{{ $user->npm }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                <tr>
                                    <th>Poin</th>
                                    <td><span class="badge badge-danger">{{ $user->mahasiswa ? $user->mahasiswa->jumlah_point : 'Data tidak tersedia' }}</span></td>
                                </tr>
                                <tr>
                                    <th>Level</th>
                                    <td>
                                        @if($user->mahasiswa)
                                        @if($user->mahasiswa->jumlah_point >= 10 && $user->mahasiswa->poin <= 50)
                                            <span class="badge bg-secondary">Silver</span>
                                            @elseif($user->mahasiswa->jumlah_point > 50 && $user->mahasiswa->poin <= 100)
                                                <span class="badge bg-warning">Gold</span>
                                                @elseif($user->mahasiswa->jumlah_point > 100 && $user->mahasiswa->poin <= 150)
                                                    <span class="badge bg-info">Platinum</span>
                                                    @elseif($user->mahasiswa->jumlah_point > 150)
                                                    <span class="badge bg-primary">Diamond</span>
                                                    @else
                                                    <span class="badge bg-dark">Other</span>
                                                    @endif
                                                    @else
                                                    <span class="text-danger">Data tidak tersedia</span>
                                                    @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection