<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestionar Reserva - @yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{!! asset('/css/app.css') !!}">

    </head>
    <body class="bg-light">
        @section('menu')
        @show

        @yield('contenido')

        
        <!-- Js -->
        <script src="{!!asset('/js/app.js')!!}"></script>
        
        @yield('script')
    </body>
</html>
