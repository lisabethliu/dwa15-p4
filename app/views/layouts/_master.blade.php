<?php
error_reporting(-1);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html ng-app='App'>
<head lang='en'>

  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  
  @section('javascript-libs')
      <script src='//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js'></script>
      <script src='//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.11.0.js'></script>
  @show

  @section('css')

    {{--<link href='//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css' rel='stylesheet'>--}}
    <link href='//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/darkly/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='{{ asset('css/app.css') }}'>
  @show

  <title>@yield('title')</title>
</head>
<body>
<div class='container-fluid'>

  @include('layouts.header')

  @yield('content')

  @include('layouts.footer')

  <script src='{{ asset('js/app.js') }}'></script>
  @yield('javascript-modules')
</div>
</body>