<!-- Tautan CSS Kustom (Jika Ada) -->
<link href="{{ asset('path/to/custom.css') }}" rel="stylesheet">
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Point Market</title>
<!-- base:css -->
<link rel="stylesheet" href="{{ asset ('vendors/typicons/typicons.css') }}">
<link rel="stylesheet" href="{{ asset ('vendors/css/vendor.bundle.base.css') }}">

<link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
<!-- endinject -->
<link rel="shortcut icon" href="images/favicon.png" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Pemuatan jQuery dari CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Pemuatan Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{ asset('js/confirm.js') }}"></script>
<style>
  /* Navbar Styling */
.custom-navbar {
  background-color: #f8f9fa; /* Latar belakang putih lembut */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan halus */
  padding: 1rem;
  font-family: 'Poppins', sans-serif;
}

.custom-navbar .navbar-brand {
  font-size: 1.5rem;
  font-weight: 700;
  color: #dc5f7e; /* Warna merah muda */
  text-transform: uppercase;
}

.custom-navbar .navbar-brand strong {
  color: #5d6de8; /* Warna biru */
}

.custom-navbar .navbar-toggler {
  border: none;
}

.custom-navbar .navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23dc5f7e' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(220, 95, 126, 1)' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

.custom-navbar .nav-link {
  font-size: 1rem;
  font-weight: 500;
  color: #5d6de8; /* Warna biru */
  margin-left: 10px;
  transition: color 0.3s ease-in-out, transform 0.3s ease;
  text-transform: capitalize; /* Huruf awal kapital */
}

.custom-navbar .nav-link:hover {
  color: #dc5f7e; /* Warna merah muda saat hover */
  transform: translateY(-2px);
}

.custom-navbar .nav-link.active {
  color: #dc5f7e;
  font-weight: 700;
}

.custom-navbar .search-input {
  border: 1px solid #5d6de8; /* Warna biru */
  border-radius: 30px 0 0 30px;
  padding: 0.5rem 1rem;
  font-size: 1rem;
  transition: border-color 0.3s, box-shadow 0.3s;
}

.custom-navbar .search-input:focus {
  border-color: #dc5f7e; /* Merah muda */
  box-shadow: 0 0 5px rgba(220, 95, 126, 0.5);
  outline: none;
}

.custom-navbar .btn-search {
  background-color: #5d6de8; /* Biru */
  color: #ffffff;
  border: none;
  border-radius: 0 30px 30px 0;
  font-size: 1rem;
  transition: background-color 0.3s, color 0.3s;
}

.custom-navbar .btn-search:hover {
  background-color: #dc5f7e; /* Merah muda */
  color: #ffffff;
}

.custom-navbar .btn-logout {
  background-color: #dc5f7e; /* Merah muda */
  color: #ffffff;
  border: none;
  font-size: 1rem;
  font-weight: 500;
  padding: 0.5rem 1rem;
  border-radius: 20px;
  transition: background-color 0.3s ease, transform 0.3s ease;
}

.custom-navbar .btn-logout:hover {
  background-color: #5d6de8; /* Biru */
  transform: scale(1.05);
}

</style>

<nav class="navbar navbar-expand-lg custom-navbar">
  <div class="container-fluid">
    <!-- Nama Aplikasi -->
    <a class="navbar-brand" href="/profile">
      Point <strong>Market</strong>
    </a>

    <!-- Toggle Button untuk Mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <!-- Menu Links -->
        <li class="nav-item">
          <a class="nav-link {{ request()->is('level_mahasiswa') ? 'active' : '' }}" href="/level_mahasiswa">
            Level Mahasiswa
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('mhs_misitambahan') ? 'active' : '' }}" href="/mhs_misitambahan">
            Misi Tambahan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('mhs_barangproject') ? 'active' : '' }}" href="/mhs_barangproject">
            Reward
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('mhs_jenistransaksi') ? 'active' : '' }}" href="/mhs_jenistransaksi">
            Jenis Transaksi
          </a>
        </li>

        <!-- Form Pencarian -->
        <form class="d-flex ms-lg-3" action="{{ url('/search') }}" method="GET">
          <div class="input-group">
            <input
              type="text"
              class="form-control search-input"
              placeholder="Cari NPM..."
              name="npm"
              value="{{ request('npm') }}">
            <button class="btn btn-search" type="submit">Cari</button>
          </div>
        </form>

        <!-- Logout -->
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-logout">
              Logout
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>





<!-- partial -->
<div class="main-panel pl-5 mt-5">
  <div class="row">
    @if(session()->has('success'))
    <div class="col-12 pl-5">
      <div class="alert laert-success">{{ session('success') }}</div>
          @endif
          @yield('konten')
        </div>
      </div>
    </div>
  </div>
