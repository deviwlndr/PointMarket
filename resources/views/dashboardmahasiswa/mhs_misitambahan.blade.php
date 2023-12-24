@extends('layouts.master')

@section('konten')

<div class="card ml-5">
                <div class="card-body ">
                  <h4 class="card-title">Misi Tambahan</h4>
                  <p class="card-description">
                    
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        
                        <tr>
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
                            <td>{{ $misitambahan->kode_misi }}</td>
                            <!-- Tambahkan kolom lainnya sesuai dengan struktur tabel Anda -->
                            
                            <td>{{ $misitambahan->nama_misi }}</td>
                            <td>{{ $misitambahan->deskripsi }}</td>
                            <td><label class="badge badge-danger">{{ $misitambahan->harga_point }}</label></td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/riwayat_pembelian/create {{ $misitambahan->id }}" class="btn btn-warning mr-5">Ambil Misi</a>
                            </div> 
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
                        