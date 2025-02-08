<!DOCTYPE html>
<html lang="en">

<head>
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
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

  <script src="{{ asset('js/auth.js') }}"></script>
</head>
<body>
 <html> 

      
          @if(session()->has('success'))
          <div class="col-12"> 
            <div class="custom-alert alert laert-success">{{ session('success') }}</div>
           @endif 
          @yield('konten')
          

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="{{ asset ('vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset ('vendors/chart.js/Chart.min.js') }}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset ('js/off-canvas.js') }}"></script>
  <script src="{{ asset ('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset ('js/template.js') }}"></script>
<script src="{{ asset ('js/settings.js') }}"></script>
  <script src="{{ asset ('js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset ('js/dashboard.js') }}"></script>
  <!-- End custom js for this page-->
</body>

</html>

