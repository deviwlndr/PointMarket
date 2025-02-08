
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


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">




<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{ asset('js/alertTimeout.js') }}"></script>
<script src="{{ asset('js/getmisi.js') }}"></script>
<script src="{{ asset('js/confirm.js') }}"></script>
<style>
/* Navbar Styling */
.custom-navbar {
    background-color: #f8f9fa; /* Latar belakang putih lembut */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan halus */
    padding: 0.8rem 1.5rem;
    font-family: 'Poppins', sans-serif;
}

/* Logo Styling */
.navbar-brand {
    display: flex;
    align-items: center;
    font-size: 0.7rem;
    font-weight: bold;
    color: #5d6de8; /* Warna biru */
    text-transform: uppercase;
}

.navbar-brand span:first-child {
    color: #5d6de8; /* Warna biru untuk "Point" */
}

.navbar-brand span:last-child {
    color: #dc5f7e; /* Warna merah muda untuk "Market" */
}

.navbar-brand img {
    width: 40px;
    height: 40px;
    margin-right: 10px;
    border-radius: 50%; /* Membuat logo berbentuk lingkaran */
    transform: scale(1.2); 
}

/* Menu Links */
.navbar-nav .nav-link {
    font-size: 1rem;
    font-weight: 500;
    color: #5d6de8; /* Warna biru */
    margin-left: 15px;
    text-transform: capitalize; /* Huruf awal kapital */
    transition: color 0.3s ease-in-out, transform 0.3s ease;
}

.navbar-nav .nav-link:hover {
    color: #dc5f7e; /* Warna merah muda saat hover */
    transform: translateY(-2px); /* Efek hover */
}

.navbar-nav .nav-link.active {
    color: #dc5f7e; /* Warna merah muda untuk menu aktif */
    font-weight: 700;
}

/* Pencarian Styling */
.input-group {
    max-width: 300px;
}

.input-group .form-control {
    border-radius: 20px 0 0 20px;
    border-color: #5d6de8;
    font-size: 0.9rem;
}

.input-group .form-control:focus {
    border-color: #dc5f7e; /* Warna merah muda saat fokus */
    box-shadow: 0 0 5px rgba(220, 95, 126, 0.5);
}

.input-group .btn-primary {
    background-color: #5d6de8;
    border: none;
    border-radius: 0 20px 20px 0;
    color: white;
    font-weight: bold;
    transition: background-color 0.3s, transform 0.3s;
}

.input-group .btn-primary:hover {
    background-color: #dc5f7e;
    transform: scale(1.05);
}

/* Logout Button */
.btn-logout {
    background-color: #dc5f7e; /* Warna merah muda */
    color: #ffffff;
    border: none;
    font-size: 1rem;
    font-weight: bold;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    transition: background-color 0.3s, transform 0.3s;
}

.btn-logout:hover {
    background-color: #5d6de8; /* Warna biru */
    transform: scale(1.05);
}
</style>

<nav class="navbar navbar-expand-lg custom-navbar">
  <div class="container-fluid d-flex align-items-center justify-content-between">
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="/profile">
    <img src="{{ asset('images/logo.svg') }}" alt="Point Market Logo" class="logo">
    <span class="fw-bold" >Point</span>
    <span class="fw-bold" >Market</span>
</a>


    <!-- Toggle Button untuk Mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}" href="/profile">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('level_mahasiswa') ? 'active' : '' }}" href="/level_mahasiswa">Level Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('mhs_misitambahan') ? 'active' : '' }}" href="/mhs_misitambahan">Misi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('mhs_barangproject') ? 'active' : '' }}" href="/mhs_barangproject">Reward</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('mhs_jenistransaksi') ? 'active' : '' }}" href="/mhs_jenistransaksi">Transaksi</a>
        </li>
      </ul>

      <!-- Form Pencarian -->
      <form class="d-flex ms-lg-3" action="{{ url('/search') }}" method="GET">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari NPM..." name="npm" value="{{ request('npm') }}">
          <button class="btn btn-primary" type="submit">Cari</button>
        </div>
      </form>

      <!-- Tombol Logout -->
      <form action="{{ route('logout') }}" method="POST" class="ms-lg-3">
        @csrf
        <button type="submit" class="btn btn-logout">Logout</button>
      </form>
    </div>
  </div>
</nav>








<!-- partial -->
<div class="main-panel pl-5 mt-5">
   <!-- Success / Danger Messages -->
   @if(session()->has('success'))
            <div class="custom-alert alert alert-success">
                {!! session('success') !!}
            </div>
        @endif
        @if(session()->has('danger'))
            <div class="custom-alert alert alert-danger">
                {!! session('danger') !!}
            </div>
        @endif
          @yield('konten')
      
  </div>
