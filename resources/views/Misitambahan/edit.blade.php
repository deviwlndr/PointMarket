@extends('layouts.master')

@section('konten')
<head>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Tautan CSS Bootstrap -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Tautan CSS Kustom (Jika Ada) -->
<link href="{{ asset('path/to/custom.css') }}" rel="stylesheet">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Point Market</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{ asset ('vendors/typicons/typicons.css') }}">
  <link rel="stylesheet" href="{{ asset ('vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ ('css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<div class="card">

    <div class="card-body">
        <h4 class="card-title">Edit Misi Tambahan</h4>
        <a href="#" class="btn btn-primary float-end">Add</a>
        <p class="card-description"></p>
        
           
        <form action="/misitambahan/{{ $misitambahan->id }}" method="POST">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="examplekodemisi">Kode Misi</label>
                <input type="text" name="kode_misi" class="form-control" id="examplekodemisi" aria-describedby="kodetransaksi" placeholder="Kode Transaksi" value="{{ $misitambahan->kode_misi }}">
                <small id="kodemisi" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
            <label for="examplenpm">NPM</label>
                <input type="text" name="npm" class="form-control" id="examplenpm" aria-describedby="npm" placeholder="NPM" value="{{ $misitambahan->npm }}">
            </div>
            <div class="form-group">
            <label for="examplenpm">Jenis Misi</label>
                <input type="text" name="jenis_misi" class="form-control" id="examplejenismisi" aria-describedby="jenismisi" placeholder="Jenis Misi" value="{{ $misitambahan->jenis_misi }}">
            </div>
            <div class="form-group">
            <label for="examplenpm">Harga Point</label>
                <input type="text" name="harga_point" class="form-control" id="examplehargapoint" aria-describedby="hargapoint" placeholder="Harga Point" value="{{ $misitambahan->harga_point }}">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
