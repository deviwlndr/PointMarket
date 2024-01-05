@extends('layouts.dashboard_mahasiswa')

@section('konten')
    <div class="card">
        <div class="card-body mb-10">
            <h4 class="card-title">Barang Project</h4>
            
            <p class="card-description"></p>
            <div class="container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>KODE</th>
                                <th>NAMA BARANG</th>
                                <th>DESKRIPSI</th>
                                <th>HARGA POINT</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangprojects as $p)
                                <tr>
                                    
                                    <td>{{ $p->kode}}</td>
                                    <td>{{$p->nama_barang}}</td>
                                    <td id="deskripsiCell{{ $p->id }}" class="deskripsi-cell">{{ $p->deskripsi }}
                                       
                                    </td>
                                    <td><label class="badge badge-danger">{{$p->harga_point}}</label></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/riwayat_pembelian_barang/create" class="btn btn-warning mr-5">Beli</a>
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".btn-lihat-selengkapnya").on("click", function(e) {
                e.preventDefault();
                var id = $(this).data("id");
                toggleDeskripsi(id);
            });

            function toggleDeskripsi(id) {
                // Ganti "deskripsiCell" dengan ID yang sesuai pada elemen <td>
                var deskripsiCell = $("#deskripsiCell" + id);
                deskripsiCell.toggleClass("show-full"); // Tambahkan atau hapus kelas "show-full"
            }
        });
    </script>

    <style>
        /* Gaya CSS untuk mengatur tinggi deskripsi-cell */
        .deskripsi-cell {
            max-height: 50px; /* Tinggi maksimum awal */
            overflow: hidden;
            transition: max-height 0.3s ease-out; /* Efek transisi */
        }

        /* Gaya CSS untuk menampilkan seluruh isi saat kelas show-full diaktifkan */
        .deskripsi-cell.show-full {
            max-height: none;
        }
    </style>
@endsection
