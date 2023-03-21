<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Acceso Backend a Caerus">
    <meta name="keywords" content="empleos, paraguay, backend">
    <meta name="author" content="Christopher">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/site.webmanifest') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/custom.css') }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

</head>

<body>

<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center"><img src="{{ asset('assets/frontend/imgs/template/loading.gif') }}" alt="jobBox"></div>
        </div>
    </div>
</div>

@yield('content')

<script src="{{ asset('assets/frontend/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/waypoints.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/wow.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/isotope.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/scrollup.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if($errors->has('email'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-right',
            title: '{{ $errors->first('email') }}',
            icon: 'error',
            timer: 2000,
            showConfirmButton: false,
        });
    </script>
@endif

@if($errors->has('password'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-right',
            title: '{{ $errors->first('password') }}',
            icon: 'error',
            timer: 2000,
            showConfirmButton: false,
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-right',
            title: '{{ session('error') }}',
            icon: 'error',
            timer: 3000,
            showConfirmButton: false,
        });
    </script>
@endif

</body>
</html>
