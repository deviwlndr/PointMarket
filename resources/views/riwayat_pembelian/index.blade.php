@extends('layouts.master')

@section('konten')
<div class="card ml-5">
                <div class="card-body ">
                  <h4 class="card-title">Riwayat Pembelian</h4>                 
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
                          <th>id</th>
                          <th>NPM</th>
                          <th>Kode Pembelian</th>
                          <th>Nama Pembelian</th>
                          <th>Tanggal Pemebelian</th>

                         
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        @foreach($riwayat_pembelians as $riwayat_pembelian)
                        <tr>
                        <td>{{ $riwayat_pembelian->id }}</td>
                        <td>{{ $riwayat_pembelian->npm }}</td>
                        <td>{{ $riwayat_pembelian->kode_pembelian }}</td>
                        <td>{{ $riwayat_pembelian->nama_pembelian }}</td>                        
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