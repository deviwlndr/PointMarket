@extends('layouts.master')

@section('konten')
<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="card shadow-lg" style="width: 24rem; border-radius: 15px;">
            <div class="card-header text-center" style="background: linear-gradient(45deg, #4facfe, #00f2fe); border-radius: 15px 15px 0 0;">
                <h5 class="text-white fw-bold mb-0">PROFIL DOSEN</h5>
            </div>
            <div class="card-body text-center">
                <!-- Foto Profil -->
                @if ($dosen->foto_profil)
    <img src="{{ asset('storage/' . $dosen->foto_profil) }}" alt="Foto Profil" 
         class="rounded-circle mb-3" 
         style="width: 120px; height: 120px; object-fit: cover; border: 5px solid #f1f1f1;">
@else
    <i class="fas fa-user-circle" 
       style="font-size: 120px; color: #ccc; display: block; margin-bottom: 15px;"></i>
@endif

                <!-- Nama Dosen -->
                <h5 class="fw-bold mb-1">{{ $dosen->name }}</h5>
                <p class="text-muted" style="margin-bottom: 15px;">Kode Dosen: {{ $dosen->kode_dosen }}</p>

                <!-- Informasi Lain -->
                <table class="table table-borderless text-start">
                    <tr>
                        <th>NAMA</th>
                        <td>{{ $dosen->name }}</td>
                    </tr>
                    <tr>
                        <th>EMAIL</th>
                        <td>{{ $dosen->email }}</td>
                    </tr>
                    <tr>
                        <th>ROLE</th>
                        <td><span class="badge bg-primary">{{ ucfirst($dosen->role) }}</span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .card-header {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .table th {
        width: 30%;
        text-align: left;
        font-weight: bold;
    }

    .table td {
        text-align: left;
    }
</style>
@endsection
