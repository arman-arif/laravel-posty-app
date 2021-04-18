<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    {{-- <link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'> --}}
    <link rel="stylesheet" href="{{ URL::to('css/styles.css') }}">
</head>
<body>
@include('partials.header')
<div class="container">
    @yield('content')
</div>
</body>
</html>
