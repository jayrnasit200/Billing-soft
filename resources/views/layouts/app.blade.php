<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Billing') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- Toastr -->
  
    <link rel="stylesheet" type="text/css" href="{{ url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <!--  -->
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>
</body>
</html>
