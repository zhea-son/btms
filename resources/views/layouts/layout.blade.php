<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="//unpkg.com/alpinejs" defer></script>

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
        @if(session()->has('message'))

        <div x-data="{ show: true}" x-init="setTimeout(() => show=false, 3000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-teal-500 text-white-500 px-48 py-3">
        <p>
            {{session('message')}}
        </p>
        </div>

        @endif
    
    
</body>
</html>