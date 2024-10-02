<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/2f9a7f15c2.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>
<body class="flex bg-gray-200">
    @include('layout.header')
    <div class="mx-auto bg-white px-10">
        @yield('content')
    </div>
    {{-- @include('layout.footer') --}}
</body>
</html>