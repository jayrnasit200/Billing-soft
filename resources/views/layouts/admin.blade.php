<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Billing') }}</title>

    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <!-- <link rel="stylesheet" href="{{ asset('assets/plugins//css/') }}"> -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
  <!-- DataTables -->

 <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/jquery.dataTables.min.css') }}">
 <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    @yield('css')
</head>
<body>

<body class="hold-transition sidebar-mini">
        <div class="wrapper">
          <!-- Navbar -->
          <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              </li>
              
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="{{ route('logout') }}"
   onclick="event.preventDefault();    document.getElementById('logout-form').submit();" role="button">
                  <i class="fas fa-sign-out-alt"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
                    {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </nav>
          <!-- /.navbar -->

          <!-- Main Sidebar Container -->
          <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{url('/')}}" class="brand-link">
              <img src="{{ asset('assets/bg.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 10 !important;box-shadow: 1px 1px #fff !important;">
              <span class="brand-text font-weight-light">BG Billing</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

              <!-- Sidebar Menu -->
              <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                  <li class="nav-item ">
                    <a href="{{url('/')}}" class="nav-link {{ (request()->segment(1) == '') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        Dashboard
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/brand')}}" class="nav-link {{ (request()->segment(1) == 'brand') ? 'active' : '' }}">
                      <i class="nav-icon fab fa-cloudsmith "></i>
                      <p>Brand</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/product')}}" class="nav-link {{ (request()->segment(1) == 'product') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-boxes"></i>
                      <p>Products</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{url('/bill')}}" class="nav-link {{ (request()->segment(1) == 'bill') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-file-invoice-dollar"></i>
                      <p>Bills Add</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{url('/sell')}}" class="nav-link {{ (request()->segment(1) == 'sell') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-money-bill-wave"></i>
                      <p>Sell</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{url('/report')}}" class="nav-link {{ (request()->segment(1) == 'report') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-calculator"></i>
                      <p>Report</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{url('/setting')}}" class="nav-link {{ (request()->segment(1) == 'setting') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-cogs"></i>
                      <p>Setting</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link"  href="{{ route('logout') }}"
   onclick="event.preventDefault();    document.getElementById('logout-form').submit();" role="button">

                      <i class="nav-icon fas fa-sign-out-alt"></i>
                      <p>Logout</p>
                    </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
                    {{ csrf_field() }}
                </form>>
                  </li>
                </ul>
              </nav>
              <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
          </aside>

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1>{{$title}}</h1>
                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                      </ol>
                    </div>
                  </div>
                </div><!-- /.container-fluid -->
              </section>
                 @if(session()->get('status'))
                        <body onload="successtogal('{{ session()->get('status') }}')"></body>
                  @endif
             @yield('content')
              </div>
          <!-- /.content-wrapper -->

        

          <!-- Main Footer -->
          <footer class="main-footer">
            <strong>Copyright <a href="https://bgtutorial.com/">BGtutorial.com</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
              <!-- <b>Version</b> 3.2.0-rc -->
            </div>
          </footer>
        </div>
           

        <script src="{{ asset('assets/custom.js') }}"></script>
        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE -->
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
         <script type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable();
            } );

        </script>
        <!-- Toastr -->
            <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
          <script type="text/javascript">
            function successtogal(msg){
            toastr.success(msg);
            }
          </script>
          <!-- Select2 -->
      <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
      <script>
        $(function () {
          //Initialize Select2 Elements
          $('.select2').select2();
        });

        </script>

        @yield('js')
        <div class="modal fade" id="confirm_model" role="dialog"></div>
      </body>

</html>
