<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <title>{{ config('app.name', ':Adm Eventos:') }}</title>

    <meta charset="utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="{{ asset('lib/assets/vendor/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/assets/vendor/fonts/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/assets/vendor/fonts/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/assets/vendor/fonts/open-iconic.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/assets/vendor/fonts/pe-icon-7-stroke.css') }}">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="{{ asset('lib/assets/vendor/css/rtl/bootstrap.css') }}" class="theme-settings-bootstrap-css">
    <link rel="stylesheet" href="{{ asset('lib/assets/vendor/css/rtl/appwork.css') }}" class="theme-settings-appwork-css">
    <link rel="stylesheet" href="{{ asset('lib/assets/vendor/css/rtl/theme-corporate.css') }}" class="theme-settings-theme-css">
    <link rel="stylesheet" href="{{ asset('lib/assets/vendor/css/rtl/colors.css') }}" class="theme-settings-colors-css">
    <link rel="stylesheet" href="{{ asset('lib/assets/vendor/css/rtl/uikit.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">


    <script src="{{ asset('lib/assets/vendor/js/material-ripple.js') }}"></script>
    <script src="{{ asset('lib/assets/vendor/js/layout-helpers.js') }}"></script>

    <!-- Theme settings -->
    <!-- This file MUST be included after core stylesheets and layout-helpers.js in the <head> section -->
    <script src="{{ asset('lib/assets/vendor/js/theme-settings.js') }}"></script>

    <!-- Core scripts -->
    <script src="{{ asset('lib/assets/vendor/js/pace.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Libs -->
    <link rel="stylesheet" href="{{ asset('lib/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}">

    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('lib/assets/vendor/css/pages/authentication.css') }}">

</head>

<body>

<div class="page-loader">
    <div class="bg-primary"></div>
</div>

<!-- Content -->
<div class="authentication-wrapper authentication-2 ui-bg-cover ui-bg-overlay-container px-4" style="background-image: url('{{ asset('img/bg/23.jpg') }}');">
    <div class="ui-bg-overlay bg-dark opacity-25"></div>

    <div class="authentication-inner py-5">

        <div class="card">
            <div class="p-4 p-sm-5">

                <!-- Logo -->
                <!--<div class="d-flex justify-content-center align-items-center pb-2 mb-4">
                    <img src="{{ asset('img/LogoAlegranza.png') }}" width="220" height="100">
                </div>
                <!-- / Logo -->

                <h5 class="text-center text-muted font-weight-normal mb-4">Adm Eventos - Acesso ao Sistema</h5>

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">E-mail</label>

                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label class="form-label d-flex justify-content-between align-items-end">
                            <div>Senha</div>
                            <!--<a href="{{ route('password.request') }}" class="d-block small">Esqueceu a senha?</a>-->
                        </label>

                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="d-flex justify-content-between align-items-center m-0">

                        <label class="custom-control custom-checkbox m-0">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Lembre-me</label>
                        </label>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>


                    </div>
                </form>
                <!-- / Form -->

            </div>

        </div>

    </div>
</div>

<!-- Core scripts -->
<script src="{{ asset('lib/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('lib/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('lib/assets/vendor/js/sidenav.js') }}"></script>

<!-- Libs -->
<script src="{{ asset('lib/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('lib/assets/vendor/libs/chartjs/chartjs.js') }}"></script>

<!-- Demo -->
<script src="{{ asset('lib/assets/js/demo.js') }}"></script>
<script src="{{ asset('lib/assets/js/dashboards_dashboard-1.js') }}"></script>
</body>

</html>