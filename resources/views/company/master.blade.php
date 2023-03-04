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
    <!-- Main Styling -->
    <link href="{{ asset('template/assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />
  </head>

  {{-- @if(session('message'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('message') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 5.652a.999.999 0 1 0-1.414 1.414L11 8.414l-1.934 1.934a.999.999 0 1 0 1.414 1.414L12.414 10l1.934 1.934a.999.999 0 1 0 1.414-1.414L13.828 10l1.52-1.52a.999.999 0 0 0 0-1.414z"/>
            </svg>
        </span>
    </div>
    
  
@endif --}}

@if($errors->has('default'))
    <div class="w-1/4 mx-auto mt-10 bg-gray-200 text-center bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ $errors->first('default') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 5.652c-.75-.75-2.077-.75-2.828 0L10 7.172 8.48 5.652c-.75-.75-2.077-.75-2.828 0-.75.75-.75 2.077 0 2.828L7.172 10l-1.52 1.52c-.75.75-.75 2.077 0 2.828.375.375.884.586 1.414.586s1.06-.211 1.414-.586L10 12.828l1.52 1.52c.375.375.884.586 1.414.586s1.06-.211 1.414-.586c.75-.75.75-2.077 0-2.828L12.828 10l1.52-1.52c.75-.75.75-2.077 0-2.828z"/></svg>
        </span>
    </div>
@endif

  @yield('content')

   <!-- plugin for charts  -->
   <script src="{{ asset('template/assets/js/plugins/chartjs.min.js') }}" async></script>
   <!-- plugin for scrollbar  -->
   {{-- <script src="{{ asset('template/assets/js/plugins/perfect-scrollbar.min.js') }}" async></script> --}}
   <!-- main script file  -->
   <script src="{{ asset('template/assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>
 </html>