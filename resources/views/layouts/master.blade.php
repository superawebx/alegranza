<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <title>{{ config('app.name', ':Adm Eventos:') }}</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

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
  <link rel="stylesheet" href="{{ asset('lib/assets/css/demo.css') }}">

  <script src="{{ asset('lib/assets/vendor/js/material-ripple.js') }}"></script>
  <script src="{{ asset('lib/assets/vendor/js/layout-helpers.js') }}"></script>

  <!-- Theme settings -->
  <!-- This file MUST be included after core stylesheets and layout-helpers.js in the <head> section -->
  <script src="{{ asset('lib/assets/vendor/js/theme-settings.js') }}"></script>

  <!-- Core scripts -->
  <script src="{{ asset('lib/assets/vendor/js/pace.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Libs -->
  <link rel="stylesheet" href="{{ asset('lib/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }} ">
  <link rel="stylesheet" href="{{ asset('lib/assets/vendor/libs/bootstrap-markdown/bootstrap-markdown.css') }} ">
  <link rel="stylesheet" href="{{ asset('lib/assets/vendor/libs/quill/typography.css') }} ">
  <link rel="stylesheet" href="{{ asset('lib/assets/vendor/libs/quill/editor.css') }} ">
  <link rel="stylesheet" href="{{ asset('lib/assets/vendor/libs/bootstrap-sweetalert/bootstrap-sweetalert.css') }} ">
  <link rel="stylesheet" href="{{ asset('lib/assets/vendor/libs/fullcalendar/fullcalendar.css') }} ">

</head>

<body>

  <div class="page-loader">
    <div class="bg-primary"></div>
  </div>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-2">
    <div class="layout-inner">

      @include('layouts.nav')

      <!-- Layout container -->
      <div class="layout-container">

        @include('layouts.topo')

        <!-- Layout content -->
        <div class="layout-content">

        <!-- Content -->
          <div class="container-fluid flex-grow-1 container-p-y">

            @if(Session::has('mensagem'))
              <div class="alert alert-dark-{{ Session::get('mensagem')['class'] }} alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ Session::get('mensagem')['msg'] }}
              </div>
            @endif

             @if ($errors->any())
                @foreach ($errors->all() as $error)
                  <div class="alert alert-dark-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ $error }}
                  </div>
                @endforeach
              @endif

            @yield('content')

          </div>
          <!-- / Content -->

          <!-- Layout footer -->
          <nav class="layout-footer footer bg-footer-theme">
            <div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
              <div class="pt-3">
                <span class="footer-text font-weight-bolder">Supera webx</span> ©
              </div>
              <div>
                <a href="http://www.superawebx.com.br/" target="_blank"  class="footer-link pt-3">Sobre nós</a>
              </div>
            </div>
          </nav>
          <!-- / Layout footer -->

        </div>
        <!-- Layout content -->

      </div>
      <!-- / Layout container -->

    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-sidenav-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core scripts -->
  <script src="{{ asset('lib/assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('lib/assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('lib/assets/vendor/js/sidenav.js') }}"></script>

  <!-- Libs -->
  <script src="{{ asset('lib/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/markdown/markdown.js') }}"></script>
  <script src="{{ asset('lib/assets/vendor/libs/chartjs/chartjs.js') }}"></script>
  <script src="{{ asset('lib/assets/vendor/libs/bootstrap-markdown/bootstrap-markdown.js') }} "></script>
  <script src="{{ asset('lib/assets/vendor/libs/bootstrap-sweetalert/bootstrap-sweetalert.js') }} "></script>
  <script src="{{ asset('lib/assets/vendor/libs/vanilla-text-mask/jquery.mask.min.js') }} "></script>
  <script src="{{ asset('lib/assets/vendor/libs/moment/moment.js') }} "></script>
  <script src="{{ asset('lib/assets/vendor/libs/fullcalendar/fullcalendar.js') }} "></script>
  <script src=""></script>

  <script>
      // Quill does not support IE 10 and below so don't load it to prevent console errors
      if (typeof document.documentMode !== 'number' || document.documentMode > 10) {
          document.write('\x3Cscript src="{{ asset('libs/assets/vendor/libs/quill/quill.js') }} ">\x3C/script>');
      }
  </script>

  <!-- Demo -->
  <script src="{{ asset('lib/assets/js/demo.js') }}"></script>
  <script src="{{ asset('lib/assets/js/ui_fullcalendar.js') }}  "></script>
  
  <script src="{{ asset('lib/assets/js/dashboards_dashboard-1.js') }}"></script>
  <script src="{{ asset('lib/assets/js/forms_editors.js') }} "></script>
  <script src="{{ asset('lib/assets/js/ui_modals.js') }}  "></script>
  <script src="{{ asset('js/jquery.mask.js') }}  "></script>
  <script src="{{ asset('js/jquery.maskMoney.js') }}  "></script>

  @yield('post-script')
    
</body>
</html>