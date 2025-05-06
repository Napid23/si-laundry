<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }} | Si Laundry</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('template-admin/src/assets/images/logos/favicon.png') }}"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('template-admin/src/assets/css/styles.min.css') }}"/>
  <!-- Data Tables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css">
  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  @yield('style')
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
        {{-- sidebar start --}}
        @include('admin.partials.sidebar')
        {{-- sidebar end --}}

        <div class="body-wrapper">
          {{-- header start --}}
          @include('admin.partials.header')
          {{-- header end --}}

          <div class="container-fluid">
            @yield('content')
          </div>

          {{-- footer start --}}
          @include('admin.partials.footer')
          {{-- footer end --}}
        </div>
  </div>
  <script src="{{ asset('template-admin/src/assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('template-admin/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('template-admin/src/assets/js/sidebarmenu.js')}}"></script>
  <script src="{{ asset('template-admin/src/assets/js/app.min.js')}}"></script>
  <script src="{{ asset('template-admin/src/assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{ asset('template-admin/src/assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{ asset('template-admin/src/assets/js/dashboard.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- Data Tables -->
  <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script> 
  <script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Select2 -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
  @if(session('status'))
      swal('{{ session('title') }}', '{{ session('message') }}', '{{ session('status') }}')
  @endif
  </script>
  @yield('script')
</body>

</html>