@extends('layouts.dashboard_mahasiswa')

@section('konten')

<style>
    /* Styling untuk tampilan lebih modern */
    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        font-family: 'Poppins', sans-serif;
        text-transform: uppercase;
        font-weight: bold;
        letter-spacing: 1px;
        background: linear-gradient(90deg, #007bff, #6610f2);
        color: white;
    }

    .table th {
        width: 30%;
        background-color: #f1f1f1;
        color: #333;
        font-weight: 600;
        text-transform: uppercase;
    }

    .table td {
        font-weight: 500;
        color: #555;
    }

    .badge {
        font-size: 0.95rem;
        padding: 0.4rem 0.7rem;
    }

    img.rounded-circle {
        border: 5px solid #f8f9fa;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .alert {
        font-weight: bold;
        border-left: 5px solid #28a745;
        background-color: #e9f7ea;
        color: #155724;
    }

    .content-section {
        margin-bottom: 30px;
    }

    .foto-profil {
    width: 150px; /* Sesuaikan ukuran */
    height: 150px; /* Sesuaikan ukuran */
    border-radius: 50%; /* Membuat gambar menjadi bulat */
    object-fit: cover; /* Memastikan gambar tetap rapi dalam lingkaran */
    border: 2px solid #fff; /* Opsional: Tambahkan border putih */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Opsional: Tambahkan bayangan */
    }

</style>

<div class="row g-4">
    <!-- Profil Mahasiswa -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header text-center">
                <h4>Profil Mahasiswa</h4>
            </div>
            <div class="card-body text-center">
            
            <img src="{{ $user->foto_profil}}" alt="Foto Profil" class="foto-profil" width="150" height="150">

                <h5 class="mt-3">{{ $user->name }}</h5>
                <p class="text-muted">NPM: {{ $user->npm }}</p>
                <table class="table mt-3">
                    <tbody>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Poin</th>
                            <td><span class="badge bg-danger">{{ $user->mahasiswa ? $user->mahasiswa->jumlah_point : '0' }}</span></td>
                        </tr>
                        <tr>
                            <th>Level</th>
                            <td>
                                @if($user->mahasiswa)
                                @if($user->mahasiswa->jumlah_point >= 10 && $user->mahasiswa->jumlah_point <= 50)
                                    <span class="badge bg-secondary">Silver</span>
                                    @elseif($user->mahasiswa->jumlah_point > 50 && $user->mahasiswa->jumlah_point <= 100)
                                        <span class="badge bg-warning">Gold</span>
                                        @elseif($user->mahasiswa->jumlah_point > 100 && $user->mahasiswa->jumlah_point <= 150)
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


    <!-- Riwayat Transaksi -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">
                <h4>Riwayat Transaksi Misi</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>NPM</th>
                                <th>Nama Misi</th>
                                <th>Deskripsi</th>
                                <th>Point</th>
                                <th>Tanggal Transaksi</th>
                                <th>File Bukti</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($riwayatTransaksi as $transaksi)
                            <tr>
                                <td>{{ $transaksi->npm }}</td>
                                <td>{{ $transaksi->nama_misi }}</td>
                                <td>{{ $transaksi->deskripsi }}</td>
                                <td>{{ $transaksi->point }}</td>
                                <td>{{ $transaksi->tanggal_transaksi }}</td>
                                <td>
                                    @if ($transaksi->file_bukti)
                                    <a href="{{ asset('storage/' . $transaksi->file_bukti) }}" target="_blank" class="btn btn-sm btn-primary">Lihat File</a>
                                    @else
                                    <span class="text-danger">Tidak Ada</span>
                                    @endif
                                </td>
                                <td><span class="badge bg-{{ $transaksi->status === 'pending' ? 'warning' : 'success' }}">
                                    {{ ucfirst($transaksi->status) }}
                                </span></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data transaksi.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--Riwayat Reward-->
        <div class="container-fluid mt-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Riwayat Transaksi Reward</h4>
                </div>
                <div class="card-body">
                    <!-- Tabel Riwayat -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>NPM</th>
                                    <th>Nama Barang</th>
                                    <th>Deskripsi</th>
                                    <th>Point</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Kode Unik</th>
                                    <th>Bukti Terima</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($riwayatbarang as $reward)
                                    <!-- Cek apakah NPM sesuai dengan mahasiswa yang login -->
                                    @if($reward->npm == auth()->user()->npm)
                                    <tr>
                                        <td>{{ $reward->npm }}</td>
                                        <td>{{ $reward->nama_barang }}</td>
                                        <td>{{ $reward->deskripsi }}</td>
                                        <td>{{ $reward->point }}</td>
                                        <td>{{ \Carbon\Carbon::parse($reward->tanggal_transaksi)->format('d M Y') }}</td>
                                        <td>{{ $reward->kode_unik }}</td>
                                        <td>
                                            <a href="{{ asset('storage/' . $reward->bukti_terima) }}" target="_blank" class="btn btn-success btn-sm">Lihat Bukti</a>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $reward->status === 'pending' ? 'warning' : 'success' }}">
                                                {{ ucfirst($reward->status) }}
                                            </span>
                                        </td>
                                       

                                    </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">Belum ada transaksi reward.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>







    </div>
</div>



@endsection