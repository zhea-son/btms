<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="//unpkg.com/alpinejs" defer></script>

    <script src="{{ asset('global_assets/js/plugins/notifications/pnotify.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/extra_pnotify.js') }}"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body>
        
        @include('layouts.header')
        <main>
            <div style="min-height: 570px; margin-top:100px"> 
                @yield('content')
            </div>
        </main>
            <hr>
        <footer>@include('layouts.footer')</footer>

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
    
</body>
</html>