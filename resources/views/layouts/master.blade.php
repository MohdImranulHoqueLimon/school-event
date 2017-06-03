<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>{!! config('app.name') !!}  @section('title')@show</title>
    <meta charset="utf-8">
    @include('partials.header')
</head>
<body>
    {{--@include('partials.navigation')--}}

    @yield('content')

    @include('partials.footer')

    @section('bottom')
    @show
</body>
</html>