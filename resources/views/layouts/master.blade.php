<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Tautan CSS Bootstrap -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Tautan CSS Kustom (Jika Ada) -->


<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Point Market</title>

<!-- base:css -->
<link rel="stylesheet" href="{{ asset ('vendors/typicons/typicons.css') }}">
<link rel="stylesheet" href="{{ asset ('vendors/css/vendor.bundle.base.css') }}">
<!-- endinject -->

<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
<!-- endinject -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">



<link rel="shortcut icon" href="images/favicon.png" />

<script src="{{ asset('js/alertTimeout.js') }}"></script>
<script src="{{ asset('js/confirm.js') }}"></script>



<!-- Custom CSS -->
<style>
  /* Navbar styling */
  .navbar {
    background-color: rgb(113, 18, 97);
    /* A soft grey color for a more elegant look */
    padding: 10px 15px;
    border-bottom: 2px solid #f8f9fa;
    /* Adds a subtle bottom border */
  }

  .navbar-brand img {
    max-height: 40px;
  }

  .navbar-toggler {
    border: none;
    background-color: transparent;
  }

  .navbar-form {
    margin-left: auto;
  }

  .navbar-form .form-control {
    border-radius: 25px;
    width: 300px;
  }

  .navbar-form .btn {
    border-radius: 25px;
  }

  /* Sidebar styling */
  .sidebar {
    background-color: #f1f3f5;
    /* Light, neutral color for the sidebar */
    color: rgb(241, 151, 236);
    /* Dark grey text for better readability */
    height: 100vh;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
  }

  .sidebar .nav-item .nav-link {
    color: rgb(250, 137, 243);
    padding: 15px 20px;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s, color 0.3s;
  }

  .sidebar .nav-item .nav-link:hover {
    background-color: rgb(245, 177, 238);
    color: #fff;
    /* Change text color to white when hovered */
  }

  /* Sidebar active link */
  .sidebar .nav-item .nav-link.active {
    background-color: rgb(245, 177, 238);
    color: #fff;
  }

  /* Main content styling */
  .main-panel {
    padding: 20px;
    background-color: #ffffff;
    min-height: 100vh;
  }

  .card {
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
  }

  .card-body {
    padding: 20px;
  }

  /* Pagination and slider styling */
  .pagination {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
  }

  .slider-container {
    margin-bottom: 20px;
  }

  .input-group .form-control {
    border-radius: 20px;
  }

  .input-group .btn {
    border-radius: 20px;
  }
</style>



<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" style="background-color: #711261;">
  <div class="container">
    <a class="navbar-brand text-white font-weight-bold" href="index.html">
      <img src="" alt="" style="max-height: 40px;" class="mr-2"> Point Market
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <form class="form-inline ml-auto" action="{{ url('/search') }}" method="GET">
        <div class="input-group">
          <input type="text" class="form-control border-0" placeholder="Cari" name="npm" value="" style="border-radius: 20px;">
          <div class="input-group-append">
            <button class="btn btn-outline-light" type="submit" style="border-radius: 20px; background-color: #f8f9fa; color: #711261;">Cari</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</nav>


<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" style="background-color: #711261;">
  <div class="container">
    <a class="navbar-brand text-white font-weight-bold" href="index.html">
      <img src="{{ asset('images/logo.svg') }}" alt="Point Market" style="max-height: 40px;" class="mr-2"> Point Market
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <form class="form-inline ml-auto" action="{{ url('/search') }}" method="GET">
        <div class="input-group">
          <input type="text" class="form-control border-0" placeholder="Cari" name="npm" value="" style="border-radius: 20px;">
          <div class="input-group-append">
            <button class="btn btn-outline-light" type="submit" style="border-radius: 20px; background-color: #f8f9fa; color: #711261;">Cari</button>

          </div>
        </div>
      </form>
    </div>

  </div>
</nav>

<div class="container-fluid page-body-wrapper">
  <nav class="sidebar sidebar-offcanvas shadow-sm" id="sidebar" style="background-color: #f8f9fa;">
    <ul class="nav flex-column">
      <li class="nav-item">
        @if(Auth::check())
        @if(Auth::user()->role == 'dosen')
        <a class="nav-link text-dark font-weight-bold {{ request()->is('dosen.profile') ? 'active' : '' }}" href="/dosen/profile">
          <i class="typcn typcn-device-desktop menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
        @elseif(Auth::user()->role == 'admin')
        <a class="nav-link text-dark font-weight-bold {{ request()->is('admin.profile') ? 'active' : '' }}" href="/admin/profile">
          <i class="typcn typcn-device-desktop menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
        @endif
        @endif


      </li>
      <li class="nav-item">
        <a class="nav-link text-dark font-weight-bold" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="typcn typcn-document-text menu-icon"></i>
          <span class="menu-title">Master Data</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link text-secondary" href="/misitambahan">Misi Tambahan</a></li>
            <li class="nav-item"><a class="nav-link text-secondary" href="/barangproject">Barang Project</a></li>
            <li class="nav-item"><a class="nav-link text-secondary" href="/jenistransaksi">Jenis Transaksi</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark font-weight-bold" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="typcn typcn-user-add-outline menu-icon"></i>
          <span class="menu-title">Mahasiswa</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link text-secondary {{ request()->is('mahasiswa') ? 'active' : '' }}" href="/mahasiswa">Level Mahasiswa</a></li>
            <li class="nav-item"><a class="nav-link text-secondary {{ request()->is('riwayat_misi.hasil') ? 'active' : '' }}" href="/riwayat_misi/hasil">Riwayat Misi</a></li>
            <li class="nav-item"><a class="nav-link text-secondary {{ request()->is('riwayat_barang.hasil') ? 'active' : '' }}" href="/riwayat_barang/hasil">Riwayat Reward</a></li>
          </ul>
        </div>
      </li>
      @if (auth()->check() && auth()->user()->role === 'admin')
<li class="nav-item">
    <a class="nav-link text-dark font-weight-bold" data-toggle="collapse" href="#dosen-section" aria-expanded="false" aria-controls="dosen-section">
        <i class="typcn typcn-mortar-board menu-icon"></i>
        <span class="menu-title">Dosen</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="dosen-section">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item">
                <a class="nav-link text-secondary {{ request()->is('dosen') ? 'active' : '' }}" href="/dosen">Data Dosen</a>
            </li>
        </ul>
    </div>
</li>
@endif

    </ul>
    <li class="nav-item">
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      <a class="nav-link text-dark font-weight-bold" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="typcn typcn-power menu-icon"></i>
        <span class="menu-title">Logout</span>
      </a>
    </li>
  </nav>


  <!-- Main Content -->
  @yield('konten')

</div>





<!-- base:js -->
<script src="{{ asset ('vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset ('js/dashboard.js') }}"></script>
<script src="{{ asset ('js/off-canvas.js') }}"></script>
<script src="{{ asset ('js/hoverable-collapse.js') }}"></script>
<script src="{{ asset ('js/settings.js') }}"></script>
<script src="{{ asset ('js/todolist.js') }}"></script>