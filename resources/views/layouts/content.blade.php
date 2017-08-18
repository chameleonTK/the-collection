@extends('layouts.master')

@section('footer')
    
@stop

@section('script')
    @parent

    <script src="{{asset('js/core-js/client/shim.min.js')}}"></script>
    <script src="{{asset('js/zone.js/dist/zone.js')}}"></script>
    <script src="{{asset('js/reflect-metadata/Reflect.js')}}"></script>
    <script src="{{asset('js/systemjs/dist/system.src.js')}}"></script>
    <script src="{{asset('systemjs.config.js')}}"></script>

    <script>
        System.import('app').catch(function(err){ console.error(err); });
    </script>
@stop
