<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') - Ecommerce</title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">

  <!-- Css extra para esta seccion -->
  @yield('extra_css')
  <!-- Css extra para esta seccion end -->
 
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">

  <!-- Wrapper -->
  <div class="wrapper">

    <!-- Navbar Admin -->
    @yield('navbar')
    <!-- Navbar Admin end -->

    <!-- Aside Admin -->
    @yield('aside')
    <!-- Aside Admin end -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Header Content Admin -->
      @yield('header-content')
      <!-- Header Content Admin end -->

      <!-- Main Content Admin -->
      @yield('main-content')
      <!-- Main Content Admin end -->
    </div>
    <!-- Content Wrapper. Contains page content end -->

    <!-- Footer Admin -->
    @yield('footer')
    <!-- Footer Admin end -->

  </div>
  <!-- Wrapper end -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- overlayScrollbars -->
<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('admin/js/adminlte.min.js') }}"></script>

<!-- Scripts extra para esta seccion -->
@yield('scripts')
<!-- Scripts extra para esta seccion end -->

</body>
</html>
