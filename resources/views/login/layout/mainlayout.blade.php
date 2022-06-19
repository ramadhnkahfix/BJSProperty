<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>


    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    @include('login.layout.css_global')
    @yield('custom_css')
</head>

<body class="hold-transition login-page">
    @yield('content')
    <!-- /.login-box -->

@include('login.layout.js_global')
@yield('custom_js')
</body>

</html>