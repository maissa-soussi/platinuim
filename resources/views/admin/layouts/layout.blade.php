<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield("title")</title>
  
@include("admin.layouts.styles")

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include("admin.layouts.header")

@include("admin.layouts.left_sidebar")

  @section("content")
  @show

  @include("admin.layouts.footer")
</div>
<!-- ./wrapper -->

@include("admin.layouts.scripts")
</body>
</html>
