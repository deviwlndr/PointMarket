@extends('layouts.master')

@section('konten')
    <div class="card">
        <div class="card-body mb-10">
            <h4 class="card-title">Jenis Transaksi</h4>
            <a href="jenistransaksi/create" class="btn btn-primary float-end">Add Jenis Transaksi</a>
            <p class="card-description"></p>
            <div class="container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Transaksi</th>
                                <th>Deskripsi</th>
                                <th>Point</th>
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


                            @foreach($jenistransaksis as $jenistransaksi)

                                <tr>
                                    
                                    <td>{{ $jenistransaksi->nama_transaksi }}</td>
                                    <td id="deskripsiCell{{ $jenistransaksi->id }}" class="deskripsi-cell">{{ $jenistransaksi->deskripsi }}
                                        <a href="#" class="btn btn-info btn-lihat-selengkapnya" data-id="{{ $jenistransaksi->id }}">Lihat Selengkapnya</a>
                                    </td>
                                    <td><label class="badge badge-danger">{{ $jenistransaksi->point }}</label></td>
                                    <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                
                                <a href="/jenistransaksi/{{ $jenistransaksi->id }}/edit" class="btn btn-warning mr-5">Edit</a>
                                <form action="/jenistransaksi/{{ $jenistransaksi->id }}" method="POST">
                                  @method("DELETE")
                                  @csrf
                                  <input type="submit" class="btn btn-danger " value="Delete">
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
