@extends('layouts.dashboard_mahasiswa')

@section('konten')
<div class="container mr-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Transaksi</h4>
            <p class="card-description"></p>
            <form action="{{ url('/riwayat_pembelian_jenis_transaksi') }}" method="POST">
                @csrf
                
                <!-- NPM -->
                <div class="form-group">
                    <label for="examplenpm">NPM</label>
                    <input 
                        type="text" 
                        name="npm" 
                        class="form-control" 
                        id="examplenpm" 
                        aria-describedby="npm" 
                        placeholder="Masukkan NPM" 
                        required>
                </div>

                <!-- Transaksi -->
                <div class="form-group">
                    <label for="exampletransaksi">Transaksi</label>
                    <input 
                        type="text" 
                        name="transaksi" 
                        class="form-control" 
                        id="exampletransaksi" 
                        aria-describedby="transaksi" 
                        placeholder="Masukkan Jenis Transaksi" 
                        required>
                </div>

                <!-- Point -->
                <div class="form-group">
                    <label for="examplepoint">Point</label>
                    <input 
                        type="number" 
                        name="point" 
                        class="form-control" 
                        id="examplepoint" 
                        aria-describedby="point" 
                        placeholder="Masukkan Jumlah Point" 
                        required>
                </div>

                <!-- Upload Bukti -->
                <div class="form-group">
                    <label for="exampleFile">Upload Bukti</label>
                    <input 
                        type="file" 
                        name="file_bukti" 
                        class="form-control" 
                        id="exampleFile" 
                        accept=".jpg, .jpeg, .png, .pdf, .doc, .docx">
                    <small class="form-text text-muted">
                        File yang diizinkan: JPG, PNG, PDF, DOC, DOCX. Maksimal 2 MB.
                    </small>
                </div>

                <!-- Tanggal Transaksi -->
                <div class="form-group">
                    <label for="exampletanggal_transaksi">Tanggal Transaksi:</label>
                    <input 
                        type="date" 
                        name="tanggal_transaksi" 
                        class="form-control" 
                        id="exampletanggal_transaksi" 
                        required>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
