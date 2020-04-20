<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - Ecommerce</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Css extra para cada seccion -->
    @yield('extra_css')
    <!-- Css extra para cada seccion end -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

</head>
<body>

    @yield('header')
    @yield('content')
    @yield('footer')

    <!-- Scripts -->
    <script src="{{ asset('js/wow.min.js') }}" defer></script>

    <!-- Scripts extra para esta seccion -->
    @yield('scripts')
    <!-- Scripts extra para esta seccion end -->

</body>
</html>
