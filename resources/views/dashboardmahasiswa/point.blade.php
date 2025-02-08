@extends('layouts.dashboard_mahasiswa')

@section('konten')
    <div class="card">
        <div class="card-body mb-10">
            <h4 class="card-title">Point Mahasiswa</h4>
            <p class="card-description"></p>
            <div class="container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NPM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Jumlah Point</th>
                                <th>Level</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(session()->has('success'))
                                <div class="custom-alert alert alert-success">
                                    {!! session('success') !!}
                                </div>
                            @endif
                            @if(session()->has('danger'))
                                <div class="custom-alert alert alert-danger">
                                    {!! session('danger') !!}
                                </div>
                            @endif

                                    @foreach($mahasiswa as $p)    
                                        <td>{{ $p->npm }}</td>
                                        <td>{{ $p->nama_mahasiswa }}</td>
                                        <td>{{ $p->jumlah_point }}</td>
                                        <td>{{ $p->level }}
                                
                                    
                                        @if($p->jumlah_point >= 10 && $p->jumlah_point <= 50)
                                            <span class="badge bg-secondary">Silver</span>
                                        @elseif($p->jumlah_point > 50 && $p->jumlah_point <= 100)
                                            <span class="badge bg-warning">Gold</span>
                                        @elseif($p->jumlah_point > 100 && $p->jumlah_point <= 150 )
                                            <span class="badge bg-pink">Platinum</span>
                                        @elseif($p->jumlah_point > 150 && $p->jumlah_point <= 200)
                                            <span class="badge bg-primary" > Diamond</span>
                                        @else        
                                            <span class="badge bg-secondary">0</span>
                                        @endif
                                    </td>
                                    @endforeach
                                    <td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                        </div>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
@endsection
