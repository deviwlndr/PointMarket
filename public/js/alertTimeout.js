document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        let alerts = document.querySelectorAll('.custom-alert');
        alerts.forEach(function (alert) {
            alert.style.transition = 'opacity 0.5s ease'; // Efek transisi memudar
            alert.style.opacity = '0'; // Atur opacity menjadi 0
            setTimeout(() => alert.remove(), 500); // Hapus elemen setelah transisi selesai
        });
    }, 3000); // Waktu delay 3 detik
});
