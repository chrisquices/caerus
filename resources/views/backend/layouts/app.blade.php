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

    <link rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/custom.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    @livewireStyles

</head>

<body>

<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center"><img src="{{ asset('assets/backend/imgs/template/loading.gif') }}" alt="jobBox"></div>
        </div>
    </div>
</div>

@include('backend.layouts.header')


<main class="main">

    @include('backend.layouts.navigation')

    @yield('content')

</main>

<script src="{{ asset('assets/backend/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins/waypoints.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins/isotope.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins/scrollup.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins/jquery.circliful.js') }}"></script>
<script src="{{ asset('assets/backend/js/main.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="{{ asset('assets/backend/js/custom.js') }}"></script>

@livewireScripts

@yield('scripts')

@if(session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-right',
            title: '{{ session('success') }}',
            icon: 'success',
            timer: 3000,
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

@if($errors->any())
    <script>
        Swal.fire({
            toast: true,
            position: 'top-right',
            title: 'Vuelva a verificar el formulario',
            icon: 'error',
            timer: 3000,
            showConfirmButton: false,
        });
    </script>
@endif

</body>
</html>
