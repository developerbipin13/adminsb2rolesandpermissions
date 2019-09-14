<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SkeinSoft Client Management</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('admin/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/dataTables.bootstrap4.min.css') }}" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('partials.__sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          @include('partials.__topbar_search')

          <!-- Topbar Navbar -->
          @include('partials.__topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
          <div class="container">
            @include('flash')
          </div>
          @yield('content')
        <!-- ENd of page content -->
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
     @include('partials.__footer')
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  @include('partials.__scroll_to_top')
  <!-- End of Scroll To Top Button -->

  <!-- Logout Modal-->
  @include('partials.__logout_model')
  <!-- End of Logout Model -->

  <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('admin/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('admin/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('admin/chart-area-demo.js') }}"></script>
  <script src="{{ asset('admin/chart-pie-demo.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('admin/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('admin/datatables-demo.js') }}"></script>
</body>

</html>
