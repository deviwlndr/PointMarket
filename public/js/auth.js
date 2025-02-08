function toggleInputFields() {
    const role = document.getElementById('role').value;
    const npmField = document.getElementById('npm-field');
    const emailField = document.getElementById('email-field');

    if (role === 'student') {
        npmField.style.display = 'block';
        emailField.style.display = 'none';
    } else {
        npmField.style.display = 'none';
        emailField.style.display = 'block';
    }
}

// Panggil saat halaman pertama kali dimuat
document.addEventListener('DOMContentLoaded', toggleInputFields);



    document.addEventListener("DOMContentLoaded", function() {
        const roleSelect = document.getElementById("role");
        const emailField = document.getElementById("email-field");
        const npmField = document.getElementById("npm-field");

        roleSelect.addEventListener("change", function() {
            if (this.value === "student") {
                npmField.style.display = "block";
                emailField.style.display = "none";
            } else {
                npmField.style.display = "none";
                emailField.style.display = "block";
            }
        });
    });