<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('template_admin/src/assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('template_admin/src/assets/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('user.partials.sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
        @include('user.partials.header')
      <!--  Header End -->
      <div class="container-fluid">

        @yield('content')

        @include('user.partials.footer')
      </div>
    </div>
  </div>
  <script src="{{ asset('template_admin/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('template_admin/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template_admin/src/assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('template_admin/src/assets/js/app.min.js') }}"></script>
  <script src="{{ asset('template_admin/src/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('template_admin/src/assets/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('template_admin/src/assets/js/dashboard.js') }}"></script>
</body>

</html>