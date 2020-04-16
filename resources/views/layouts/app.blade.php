<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title') - Ecommerce</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Css extra para cada seccion -->
    @yield('extra_css')
    <!-- Css extra para cada seccion end -->
</head>
<body>

    @yield('header')
    @yield('content')
    @yield('footer')

    <!-- Scripts -->
    <script src="{{ asset('js/wow.min.js') }}" defer></script>

    <!-- JS extra para cada seccion -->
    @yield('extra_js')
    <!-- JS extra para cada seccion end -->

</body>
</html>
