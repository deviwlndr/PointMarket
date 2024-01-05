@extends('layouts.dashboard_mahasiswa')

@section('konten')
    <div class="card">
        <div class="card-body mb-10">
            <h4 class="card-title">Mahasiswa</h4>
            <p class="card-description"></p>
            <div class="container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NPM</th>
                                <th>Nama Mahasiswa</th>
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
                                    
                                    @foreach($users as $u)        
                                    <tr>
                                        
                                        <td>{{ $u -> npm }}</td>
                                        <td>{{ $u-> name}}</td>
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
