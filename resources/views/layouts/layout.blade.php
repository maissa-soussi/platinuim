<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield("title")</title>
  <link href="{{asset('css/client.css')}}" rel="stylesheet">
@include("layouts.styles")

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include("layouts.header")

@include("layouts.left_sidebar")

  @section("content")
  @show

  @include("layouts.footer")
</div>
<!-- ./wrapper -->

@include("layouts.scripts")
</body>
</html>
