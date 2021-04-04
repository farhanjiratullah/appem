<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>@yield('title')</title>    

    <!-- Bootstrap core CSS -->
<link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
{{-- <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico"> --}}
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">APPEM RT 03/14</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</header>

<div class="container-fluid">
  <div class="row">
    @include('components.navbar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
      {{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"> --}}
        {{-- <h1 class="h2">Dashboard</h1> --}}
      {{-- </div> --}}

      {{-- <h2>Section title</h2> --}}

      @yield('content')
      @include('sweetalert::alert')
      
    </main>
  </div>
</div>   
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/feather.min.js"></script>
    <script src="../../js/Chart.min.js"></script>
    <script src="../../js/dashboard.js"></script>

    <script>
      $(document).ready(function() {
        $('a.active').removeClass('active');
        $('nav a[href$="/' + location.pathname.split("/")[1] + '"]').closest('a').addClass('active'); 
      });

      // $(function() {
      //   if ((location.pathname.split("/")[1]) !== ""){
      //     $('nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
      //   }
      // });

      // $(document).ready(function() {
      //   // get current URL path and assign 'active' class
      //   var pathname = window.location.pathname;
      //   $('.nav > .nav-item > a[href="'+pathname+'"]').parent().addClass('active');
      // })
    </script>
  </body>
</html>
