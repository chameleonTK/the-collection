@extends('layouts.content')


@section('style')
    @parent
@stop


@section('script')
    @parent
    
    <script>
    $(document)
    .ready(function() {
        $('.main.menu').visibility({
            type: 'fixed'
        });
      
        $('.main.menu  .ui.dropdown').dropdown({
            on: 'hover'
        });
    });
    </script>
@stop


@section('content')
    <!-- <div class="ui main text container">
        <h1 class="ui header">Sticky Example</h1>
        <p>This example shows how to use lazy loaded images, a sticky menu, and a simple text container</p>
    </div> -->
    <nav class="ui borderless main menu">
        <div class="ui text container">
            <div href="#" class="header item">
                The Collections
            </div>
            <a href="#" class="item">Blog</a>
            <a href="#" class="item">Articles</a>
            <a href="#" class="ui right floated dropdown item">
                Dropdown <i class="dropdown icon"></i>
                <div class="menu">
                  <div class="item">Link Item</div>
                  <div class="item">Link Item</div>
                  <div class="divider"></div>
                  <div class="header">Header Item</div>
                  <div class="item">
                    <i class="dropdown icon"></i>
                    Sub Menu
                    <div class="menu">
                      <div class="item">Link Item</div>
                      <div class="item">Link Item</div>
                    </div>
                  </div>
                  <div class="item">Link Item</div>
                </div>
            </a>
        </div>
    </nav>

    <div class="ui text container">
        
    </div>
@stop