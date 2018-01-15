<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,Angular 2,Angular4,Angular 4,jQuery,CSS,HTML,RWD,Dashboard,React,React.js,Vue,Vue.js">
  <link rel="shortcut icon" href="img/favicon.png">
  <title>Logistic Monitoring</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Icons -->
  <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <link href="/vendor/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
  <link href="/vendor/datetimepicker-bs4/build/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">

  <!-- Main styles for this application -->
  <link href="/css/style.css" rel="stylesheet">
  <link href="/css/main.css" rel="stylesheet">
  <!-- Styles required by this views -->
  @stack('css')

</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  @include('layouts.navbar')
  <div class="app-body">
    @include('layouts.sidebar')
    <main class="main">
      @yield('content')
    </main>
  </div>

  <script src="/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/vendor/popper.js/dist/umd/popper.min.js"></script>
  <script src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="/vendor/pace-progress/pace.min.js"></script>
  <script src="/vendor/moment/min/moment-with-locales.min.js"></script>
  <script src="/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="/vendor/datetimepicker-bs4/build/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

  <!-- CoreUI main scripts -->

  <script src="/js/main.js"></script>
  {{-- <script src="js/views/main.js"></script> --}}
  @stack('scripts')

</body>
