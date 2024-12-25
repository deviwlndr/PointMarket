

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Tautan CSS Bootstrap -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Tautan CSS Kustom (Jika Ada) -->
  <link href="{{ asset('path/to/custom.css') }}" rel="stylesheet">
  
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
  
  <link rel="shortcut icon" href="images/favicon.png" />

  <script src="{{ asset('js/alertTimeout.js') }}"></script>
  <script src="{{ asset('js/confirm.js') }}"></script>

  
  <!-- Custom CSS -->
  <style>
    /* Navbar styling */
    .navbar {
      background-color:rgb(113, 18, 97); /* A soft grey color for a more elegant look */
      padding: 10px 15px;
      border-bottom: 2px solid #f8f9fa; /* Adds a subtle bottom border */
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
      background-color: #f1f3f5; /* Light, neutral color for the sidebar */
      color:rgb(241, 151, 236); /* Dark grey text for better readability */
      height: 100vh;
      padding: 20px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar .nav-item .nav-link {
      color:rgb(250, 137, 243);
      padding: 15px 20px;
      border-radius: 5px;
      font-size: 16px;
      transition: background-color 0.3s, color 0.3s;
    }

    .sidebar .nav-item .nav-link:hover {
      background-color: rgb(245, 177, 238);
      color: #fff; /* Change text color to white when hovered */
    }

    /* Sidebar active link */
    .sidebar .nav-item .nav-link.active {
      background-color:rgb(245, 177, 238);
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
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="index.html"><img src="" alt="Point Market" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="typcn typcn-th-menu"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <form class="form-inline ml-auto" action="{{ url('/search') }}" method="GET">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari" name="npm" value="">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
          </div>
        </div>
      </form>
    </div>
  </nav>

  <div class="container-fluid page-body-wrapper">
    <!-- Sidebar -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
            <i class="typcn typcn-device-desktop menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="typcn typcn-document-text menu-icon"></i>
            <span class="menu-title">Master Data</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="/misitambahan">Misi Tambahan</a></li>
              <li class="nav-item"><a class="nav-link" href="/barangproject">Barang Project</a></li>
              <li class="nav-item"><a class="nav-link" href="/jenistransaksi">Jenis Transaksi</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="typcn typcn-user-add-outline menu-icon"></i>
            <span class="menu-title">Admin</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link {{ request()->is('mahasiswa') ? 'active' : '' }}" href="/mahasiswa">Level Mahasiswa</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </nav>

    <!-- Main Content -->
    
            @yield('konten')
         

  <!-- base:js -->
  <script src="{{ asset ('vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset ('js/dashboard.js') }}"></script>
  <script src="{{ asset ('js/off-canvas.js') }}"></script>
  <script src="{{ asset ('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset ('js/settings.js') }}"></script>
  <script src="{{ asset ('js/todolist.js') }}"></script>


