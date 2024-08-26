<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('title')

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles
    @yield('css-code')
</head>

<body>
    {{-- <div class="container mx-auto my-4"> --}}
        @yield('content')
    {{-- </div> --}}
</body>
    @livewireScripts
    @yield('js-code')
</html>
