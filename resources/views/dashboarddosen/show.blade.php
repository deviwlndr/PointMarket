@extends('layouts.master')

@section('konten')
<div class="container">
    <h1>Detail Dosen</h1>
    <p><strong>Kode Dosen:</strong> {{ $dosen->kode_dosen }}</p>
    <p><strong>Nama:</strong> {{ $dosen->name }}</p>
    <p><strong>Email:</strong> {{ $dosen->email }}</p>
    <p><strong>Telepon:</strong> {{ $dosen->telepon }}</p>
    <p><strong>Alamat:</strong> {{ $dosen->alamat }}</p>
</div>
@endsection
