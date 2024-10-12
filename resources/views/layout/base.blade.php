<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/2f9a7f15c2.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
</head>
<body class="flex sm:bg-gray-300">
    @auth
        @include('layout.admin.header_admin')
    @endauth
    @guest
        @include('layout.header')
    @endguest
    <div class="lg:mx-auto bg-white px-10 lg:w-[calc(42rem+12vw)] w-[calc(72rem+12vw)] min-h-screen">
        <div>
            @yield('content')
        </div>
    </div>
</body>
</html>