<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Admin @yield('title', config('app.name'))</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">


  @yield('head')
</head>

<body class="d-flex flex-column min-vh-100">
  <!-- === NAVBAR === -->
  @include('admin.layouts.navbar')


  <!-- === SIDEBAR === -->
  @include('admin.layouts.sidebar')

  <!-- === CONTENT AREA === -->
  <div class="content-area" id="contentArea">
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
    @yield('content')
  </div>

  <!-- === Footer === -->
  @include('admin.layouts.footer')
  
    @stack('scripts')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  @yield('scripts')


</body>

</html>