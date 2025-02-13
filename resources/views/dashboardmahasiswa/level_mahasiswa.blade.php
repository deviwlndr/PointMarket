@extends('layouts.dashboard_mahasiswa')

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

    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .student-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 250px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .student-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
    }

    .student-card img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .student-card h5 {
        font-size: 1.2rem;
        font-weight: bold;
        margin: 10px 0;
    }

    .student-card p {
        margin: 5px 0;
        font-size: 0.95rem;
    }

    .student-card .badge {
        font-size: 0.9rem;
        padding: 5px 10px;
        border-radius: 5px;
    }

    /* Styling untuk navbar dan form pencarian */
    .navbar-nav .nav-link {
        font-size: 1rem;
        font-weight: 500;
        color: #5d6de8;
        margin-left: 15px;
        text-transform: capitalize;
        transition: color 0.3s ease-in-out, transform 0.3s ease;
    }

    .navbar-nav .nav-link.active {
        color: #dc5f7e;
        font-weight: 700;
    }

    .input-group {
        display: flex;
        align-items: center;
        max-width: 300px;
    }

    .input-group .form-control {
        border-radius: 20px 0 0 20px;
        border-color: #5d6de8;
        font-size: 0.9rem;
    }

    .input-group .form-control:focus {
        border-color: #dc5f7e;
        box-shadow: 0 0 5px rgba(220, 95, 126, 0.5);
    }

    .input-group .btn-primary {
        background-color: #5d6de8;
        border: none;
        border-radius: 0 20px 20px 0;
        color: white;
        font-weight: bold;
        transition: background-color 0.3s, transform 0.3s;
    }

    .input-group .btn-primary:hover {
        background-color: #dc5f7e;
        transform: scale(1.05);
    }
</style>

<!-- Main Card -->
<div class="card mr-5 ml-5">
    <div class="card-body">
        <h4 class="card-title custom-title">Level Mahasiswa</h4>

        <!-- Success / Danger Messages -->
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

        <!-- Card Grid -->
        <div class="card-container">
            @foreach($mahasiswas as $mahasiswa)
            <div class="student-card">
                @if($mahasiswa->foto)
                <img src="{{ $mahasiswa->foto }}" alt="Foto Mahasiswa" style="width: 100px; height: 100px; border-radius: 50%;">
                @else
                <i class="fas fa-user-circle" style="font-size: 100px; color: #ccc;"></i>
                @endif

                <h5>{{ $mahasiswa->nama_mahasiswa }}</h5>
                <p>NPM: {{ $mahasiswa->npm }}</p>
                <p>
                    Poin:
                    <span class="badge badge-danger">{{ $mahasiswa->jumlah_point }}</span>
                </p>
                <p>
                    Level:
                    @if($mahasiswa->jumlah_point >= 10 && $mahasiswa->jumlah_point <= 50)
                        <span class="badge bg-secondary">Silver</span>
                        @elseif($mahasiswa->jumlah_point > 50 && $mahasiswa->jumlah_point <= 100)
                            <span class="badge bg-warning">Gold</span>
                            @elseif($mahasiswa->jumlah_point > 100 && $mahasiswa->jumlah_point <= 150)
                                <span class="badge bg-info">Platinum</span>
                                @elseif($mahasiswa->jumlah_point > 150 && $mahasiswa->jumlah_point <= 10000)
                                    <span class="badge bg-primary">Diamond</span>
                                    @else
                                    <span class="badge bg-secondary">Other Status</span>
                                    @endif
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
