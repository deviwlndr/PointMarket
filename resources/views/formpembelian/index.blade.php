@extends('layouts.master')

@section('konten')

<div class="card ml-5">
                <div class="card-body ">
                  <h4 class="card-title">Form Pembelian</h4>
                  
                  <p class="card-description">
                    
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        
                        <tr>
                          <th>NPM</th>
                          <th>Kode Pembelian</th>
                          <th>Nama Pembelian</th>
                          <th>Tanggal Pembelian</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        @foreach($formpembelians as $misitambahan)
                        <tr>
                            
                            <td>{{ $formpembelians->npm }}</td>
                            <td>{{ $formpembelians->kode_pembelian }}</td>
                            <td><label class="badge badge-danger">{{ $formpembelians->tanggal_pembelian }}</label></td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                
                              <a href="/misitambahan/{{ $misitambahan->id }}/edit" class="btn btn-warning mr-5">Edit</a>
                              <form action="/misitambahan/{{ $misitambahan->id }}" method="POST">
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