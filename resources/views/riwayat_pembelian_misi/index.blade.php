@extends('layouts.master')

@section('konten')
<div class="card ml-5">
                <div class="card-body ">
                  <h4 class="card-title">Riwayat Transaksi Misi</h4>                 
                  <p class="card-description">                   
                  </p>
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
                          <th>NPM</th>
                          <th>Kode Misi</th>
                          <th>Nama Misi</th>
                          <th>Point</th>
                          <th>Tanggal Transaksi</th>

                         
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        @foreach($riwayat_pembelians as $riwayat_pembelian)
                        <tr>
                        <td>{{ $riwayat_pembelian->id_transaksi_misi }}</td>
                        <td>{{ $riwayat_pembelian->npm }}</td>
                        <td>{{ $riwayat_pembelian->kode_misi }}</td>
                        <td>{{ $riwayat_pembelian->nama_misi}}</td>                        
                        <td>{{ $riwayat_pembelian->point}}</td>                        
                        <td>{{ $riwayat_pembelian->tanggal_pembelian }}</td>                             
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