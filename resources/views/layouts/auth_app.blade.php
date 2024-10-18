<!DOCTYPE html>
<html lang="mx">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') | Valparaiso</title>

    @php
        $assetUrlFunction = 'secure_url';//'secure_url' //'asset';
    @endphp

    <!-- General CSS Files -->
    <link href="{{ $assetUrlFunction('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ $assetUrlFunction('css/font-awesome.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ $assetUrlFunction('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ $assetUrlFunction('web/css/components.css') }}">
    <link rel="stylesheet" href="{{ $assetUrlFunction('assets/css/iziToast.min.css') }}">
    <link href="{{ $assetUrlFunction('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ $assetUrlFunction('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="icon" href="{{ $assetUrlFunction('img/logo_val.svg') }}" type="image/x-icon">

    <style>
        body {
            background: url('{{ $assetUrlFunction('img/bg-email2.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }
        .login-container {
            background-color: rgba(73, 71, 71, 0.452); /* Fondo negro más claro */
            padding: 30px;
            border-radius: 60px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .text-light {
            color: #f8f9fa !important; /* Texto blanco */
        }
        .btn-custom {
            background-color: #007bff; /* Color azul vibrante */
            border-color: #007bff;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #0056b3; /* Color azul más oscuro en hover */
            border-color: #0056b3;
        }
        .form-control {
            border-radius: 0.25rem;
            padding: 0.75rem 1.25rem;
        }
        .form-group label {
            font-size: 1.1rem;
        }
    </style>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        {{-- <div class="login-container"> --}}
                            <div class="login-brand text-center">
                                <img src="{{ $assetUrlFunction('img/logo_val-n.png') }}" alt="logo" width="100">
                            </div>
                            @yield('content')
                            <div class="simple-footer text-center text-light">
                                &copy; {{ date('Y') }} Valparaiso Day Spa
                            </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ $assetUrlFunction('assets/js/jquery.min.js') }}"></script>
    <script src="{{ $assetUrlFunction('assets/js/popper.min.js') }}"></script>
    <script src="{{ $assetUrlFunction('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ $assetUrlFunction('assets/js/jquery.nicescroll.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ $assetUrlFunction('web/js/stisla.js') }}"></script>
    <script src="{{ $assetUrlFunction('web/js/scripts.js') }}"></script>
</body>

</html>
