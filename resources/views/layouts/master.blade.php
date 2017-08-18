<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"
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

        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.5.0/ui-bootstrap.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.5.0/ui-bootstrap-tpls.min.js" type="text/javascript"></script> -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

        <link rel="shortcut icon" type="image/png" href="{{asset('favicon.ico')}}"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.10/semantic.min.css">
        <title>
            @section("title")
                The Collection
            @show
        </title>
        
        <script src="https://cdn.jsdelivr.net/semantic-ui/2.2.10/semantic.min.js"></script>

        @section("style")
        @show
    </head>
    <body>

        
        @yield('content')
        @yield('footer')
        @section("script")
        @show

    </body>
</html>
