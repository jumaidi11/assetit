<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AssetITControl | @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" type="text/css" />
</head>
<body>
    @yield('content')

    <script src="{{ asset('js/jquery-3.2.1.slim.min.js')}}" ></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
</body>
</html>