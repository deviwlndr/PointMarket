
function confirmDelete() {
    return confirm("Apakah Anda yakin ingin menghapus data ini?");
}

function confirmSubmission() {
    // Tampilkan konfirmasi kepada pengguna
    if (confirm("Apakah Anda yakin semua jawaban sudah benar?")) {
        // Submit form jika pengguna menekan OK
        document.getElementById('misiForm').submit();
    }
}

