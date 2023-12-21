@extends('layouts.master')

@section('konten')

<div class="card">

    <div class="card-body">
        <h4 class="card-title">Edit Level Mahasiswa</h4>
        
        <p class="card-description"></p>
        
           
        <form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="examplenpm">NPM</label>
                    <input type="text" name="npm" class="form-control" id="examplenpm" aria-describedby="npm" placeholder="NPM" value="{{ $mahasiswa->npm }}">
                </div>
                <div class="form-group">
                <label for="examplenama_mahasiswa">Nama Mahasiswa</label>
                    <input type="text" name="nama_mahasiswa" class="form-control" id="examplenama_mahasiswa" aria-describedby="nama_mahasiswa" placeholder="Nama Mahasiswa" value="{{ $mahasiswa->nama_mahasiswa }}">
                </div>
                <div class="form-group">
                <label for="examplejumlah_point">Jumlah Point</label>
                    <input type="text" name="jumlah_point" class="form-control" id="examplejumlah_point" aria-describedby="jumlah_point" placeholder="Jumlah Point" value="{{ $mahasiswa->jumlah_point }}">
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
