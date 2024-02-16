@extends('layouts.master')

@section('konten')

<div class="card ml-5">
                <div class="card-body ">
                  <h4 class="card-title">Misi Tambahan</h4>
                  <a href="/misitambahan/create" class="btn btn-primary float-end" >Add</a>
                  <p class="card-description"></p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
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
                        <tr>
                          <th>ID Misi</th>
                          <th>Kode Misi</th>
                          <th>Nama Misi</th>
                          <th>Deskripsi</th>
                          <th>Harga Point</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        @foreach($misitambahans as $misitambahan)
                        <tr>
                            <td>{{ $misitambahan->id_misi }}</td>
                            <td>{{ $misitambahan->kode_misi }}</td>
                            <!-- Tambahkan kolom lainnya sesuai dengan struktur tabel Anda -->
                            
                            <td>{{ $misitambahan->nama_misi }}</td>
                            <td>{{ $misitambahan->deskripsi }}</td>
                            <td><label class="badge badge-danger">{{ $misitambahan->harga_point }}</label></td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example"> <!--div yang digunakan untuk mengelompokkan tombol-tombol dalam satu kelompok-->
                              <a href="/misitambahan/{{ $misitambahan->id_misi }}/edit" class="btn btn-warning mr-5">Edit</a>
                              <form action="/misitambahan/{{ $misitambahan->id_misi }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <input type="submit" class="btn btn-danger " value="Delete">
                              </form>
                            </td>
                        </tr>
                    @endforeach
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><label class="badge badge-warning"></label></td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            

@endsection