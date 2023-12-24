@extends('layouts.master')

@section('konten')
<div class="container">
    <div class="card ml-5">
        <div class="card-body">
            <h4 class="card-title">Misi Tambahan</h4>
            <p class="card-description"></p>
            @isset($misitambahan)
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Misi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $misitambahan->nama_misi }}</td>
                        <!-- Kolom-kolom lain sesuai kebutuhan -->
                    </tr>
                </tbody>
            </table>
            @endisset
            
            <form method="post" action="{{ url('/submit_misi') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="nama_misi">Nama Misi</label>
                    <input type="text" name="nama_misi" class="form-control" id="nama_misi">
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControl">Kumpulkan Disini</label>
                    <input type="text" name="nama_misi" class="form-control" id="exampleFormControl">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
