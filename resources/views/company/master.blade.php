<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>@yield('title')</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('template/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <script src="{{ asset('global_assets/js/plugins/notifications/pnotify.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/extra_pnotify.js') }}"></script>

    <!-- Main Styling -->
    <link href="{{ asset('template/assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>

  @yield('content')

        @if (Session::has('message'))
            <p id="pnotify-solid-success" hidden>{{ Session::get('message') }}</p>
        @endif
        @if (Session::has('errors'))
            <p id="pnotify-solid-warning" hidden>{{ Session::get('errors')->first() }}</p>
        @endif
    
        <script type="text/javascript">
            $(document).ready(function() {
                $("#pnotify-solid-success").trigger('click');
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#pnotify-solid-warning").trigger('click');
            });
        </script>

   <!-- plugin for charts  -->
   <script src="{{ asset('template/assets/js/plugins/chartjs.min.js') }}" async></script>
   <!-- plugin for scrollbar  -->
   {{-- <script src="{{ asset('template/assets/js/plugins/perfect-scrollbar.min.js') }}" async></script> --}}
   <!-- main script file  -->
   <script src="{{ asset('template/assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>
 </html>