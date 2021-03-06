<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- TailwindCSS -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <!--Livewire Styles-->
    @livewireStyles

    <!--Font Awesome Icons-->
    <script src="https://kit.fontawesome.com/d8d68bfe42.js" crossorigin="anonymous"></script>
    
    <!--Bootstrap Script-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body >

    <!-- App content -->
    @yield('content')


 

    <!-- livewire Script -->
    @livewireScripts
    @livewireChartsScripts
      <!--Alpine Js-->
      <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

      <!--Apex Charts Js-->
      <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- sweetalert Js -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        window.addEventListener('swal:modal', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
            });
        $("#ingredientModal").modal('hide');
        $("#ingredientEditModal").modal('hide');
        $("#contactModal").modal('hide');
        });
       
    </script>
  
</body>
</html>