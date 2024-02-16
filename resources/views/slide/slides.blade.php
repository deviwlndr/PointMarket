@extends('layouts.master')

@section('konten')
<div class="slider-container">
        <div class="slides">
            @foreach($misitambahans as $slide)
                <div>
                    <h2>{{ $slide->nama_misi }}</h2>
                    <p>{{ $slide->deskripsi }}</p>
                    <p>Harga Point: {{ $slide->harga_point }}</p>
                </div>
            @endforeach
        </div>
    </div>
    <div class="pagination">
        <p>Halaman {{ $slide->currentPage() }} dari {{ $slide->lastPage() }}</p>
        {{ $slide->links() }}
</div>
@endsection
