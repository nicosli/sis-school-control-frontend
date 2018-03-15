<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sis Control Escolar - @yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{!! asset('/css/app.css') !!}">
        <script>
            window.access_token = "{!!$access_token!!}";
        </script>
    </head>
    <body class="bg-light">
        @section('menu')
        @show

        <div id="app">
            @yield('contenido')
        </div>

        <div class="container">
            <code>
                La sesión expira: {!!$timestamp_token!!}
            </code>
        </div>

        
        <!-- Js -->
        <script src="{!!asset('js/app.js')!!}"></script>
        
        
        @yield('script')
    </body>
</html>
