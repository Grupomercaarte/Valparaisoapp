<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') | {{ config('app.name') }}</title>

    <!-- General CSS Files -->
    <link href="{{ secure_url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ secure_url('css/font-awesome.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ secure_url('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ secure_url('web/css/components.css') }}">
    <link rel="stylesheet" href="{{ secure_url('assets/css/iziToast.min.css') }}">
    <link href="{{ secure_url('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_url('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="login-brand">
                            <img src="{{ secure_url('img/logo_val.svg') }}" alt="logo" width="100">
                        </div>
                        @yield('content')
                        <div class="simple-footer">
                            {{--                        Copyright &copy; {{ getSettingValue('application_name') }}  {{ date('Y') }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ secure_url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ secure_url('assets/js/popper.min.js') }}"></script>
    <script src="{{ secure_url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ secure_url('assets/js/jquery.nicescroll.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ secure_url('web/js/stisla.js') }}"></script>
    <script src="{{ secure_url('web/js/scripts.js') }}"></script>
    <!-- Page Specific JS File -->
</body>

</html>
