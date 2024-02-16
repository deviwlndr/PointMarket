@extends('layouts.master')

@section('konten')
<div class="container mr-5">
    <div class="card">
        <div class="card-body">
        <div class="card-title" style="width: 50%;" >
            <div class="g-col-3 g-start-2">Add Level Mahasiswa</div>
        </div>
            <p class="card-description"></p>
            
            
            <form action="{{ url('/mahasiswa') }}" method="POST">
                @csrf
                
                <div class="form-group">
                <label for="examplenpm">NPM</label>
                    <input type="text" name="npm" class="form-control" id="examplenpm" aria-describedby="npm" placeholder="NPM" value="{{ old('npm') }}">
                </div>
                <div class="form-group">
                <label for="examplenama_mahasiswa">Nama Mahasiswa</label>
                    <input type="text" name="nama_mahasiswa" class="form-control" id="examplenama_mahasiswa" aria-describedby="nama_mahasiswa" placeholder="Nama Mahasiswa" value="{{ old('nama_mahasiswa') }}">
                </div>
                <div class="form-group">
                <label for="examplejumlah_point">Jumlah Point</label>
                    <input type="text" name="jumlah_point" class="form-control" id="examplejumlah_point" aria-describedby="jumlah_point" placeholder="Jumlah Point" value="{{ old('jumlah_point') }}">
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>    
@endsection
