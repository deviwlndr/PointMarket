document.querySelectorAll('.ambil-misi').forEach(button => {
    button.addEventListener('click', function (event) {
        event.preventDefault(); // Mencegah aksi default <a>

        const missionId = this.dataset.id; // Ambil ID misi dari atribut data-id tombol
        console.log('Fetching mission with ID:', missionId); // Debug log

        fetch(`/missions/${missionId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    // Redirect to the form with data passed as query string
                    const queryString = new URLSearchParams(data).toString();
                    window.location.href = `/riwayat_pembelian_jenis_transaksi/create?${queryString}`;
                }
            })
            .catch(error => {
                console.error('Terjadi kesalahan:', error);
                alert('Terjadi kesalahan saat mengambil data misi.');
            });
    });
});
