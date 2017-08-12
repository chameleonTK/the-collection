<!doctype html>
<html ng-app="masterApp" xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://opengraphprotocol.org/schema/"
      xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Title" content=""/>
        <meta name="Description" content=""/>
        <meta name="Keywords" content=""/>
        <meta name="Classification" content=""/>
        <meta name="Robots" content="index,follow"/>
        <meta name="RobRatings" content="General"/>

        <meta property="og:type" content="article" />

        <meta property="og:url" content="{{url()->current()}}" />
        <meta property="fb:app_id" content="" />
        @if(isset($meta))
            
        @else
            <meta property="og:title" content="The Collection" />
            <meta property="og:description" content="" />
            <meta property="og:image" content="" />
        @endif

        <meta property="og:image:width" content="600"/>
        <meta property="og:image:height" content="315"/>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="{{asset('lib/css-spinners/css/spinners.css')}}" rel="stylesheet" type="text/css" />
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular-route.min.js"></script>

        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.5.0/ui-bootstrap.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.5.0/ui-bootstrap-tpls.min.js" type="text/javascript"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular-animate.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-scroll/1.0.2/angular-scroll.min.js"></script>
        <script type="text/javascript" src="{{asset('lib/ngInfiniteScroll/build/ng-infinite-scroll.min.js')}}"></script>
        <link rel="shortcut icon" type="image/png" href="{{asset('images/favicon.png')}}"/>

        <title>
            @section("title")
                The Collection
            @show
        </title>
        

        <link href="{{ env('PRODUCTION',false)?url('/').elixir('css/app.min.css'):asset('css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ env('PRODUCTION',false)?url('/').elixir('js/app.min.js'):asset('js/app.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
            angular.module('masterApp')
            .constant("BASE_URL","{{url('/')}}/")
            .constant("API_URL","{{url('/')}}/api/")

        </script>

        @section("style")
        @show
    </head>
    <body ng-controller="MainController">

        
        @yield('content')
        @yield('footer')
        @section("script")
        @show

    </body>
</html>
