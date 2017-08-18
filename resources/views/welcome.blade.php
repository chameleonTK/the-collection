<!DOCTYPE html>
<html lang="en">
<head>
    <script>document.write('<base href="' + document.location + '" />');</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    
    <!-- 1. Load libraries -->
    <!-- Polyfill(s) for older browsers -->
    <script src="{{asset('js/core-js/client/shim.min.js')}}"></script>
    <script src="{{asset('js/zone.js/dist/zone.js')}}"></script>
    <script src="{{asset('js/reflect-metadata/Reflect.js')}}"></script>
    <script src="{{asset('js/systemjs/dist/system.src.js')}}"></script>
    <script src="{{asset('systemjs.config.js')}}"></script>

    <script>
        System.import('app').catch(function(err){ console.error(err); });
    </script>

<!-- Styles -->
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

</style>
    
</head>
<body>
    <my-app>Loading...</my-app>
    <div class="flex-center position-ref full-height">
        {{-- @if (Route::has('login'))
            <div class="top-right links">
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                @endif
            </div>
        @endif --}}

        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>
        </div>
    </div>
</body>
</html>
