<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @routes
</head>
<body class="font-sans bg-grey-lighter text-grey-darker leading-normal">
    <div id="app" class="relative flex flex-row h-screen w-screen">
        <header class="flex items-center py-3 px-6 fixed w-full" style="z-index:500">
            <div class="flex-shrink w-8 leading-none">
                <app-filter></app-filter>
            </div>

            <div class="flex-1 leading-none flex justify-center items-center">
                @svg('monogram', 'h-16 w-16 text-guava-dark')
            </div>

            <div class="flex-shrink w-8 text-right leading-none">
                <app-upload></app-upload>
            </div>
        </header>

        <main class="flex-1 py-6">
            @yield('content')
        </main>
    </div>

    {{ svg_spritesheet() }}

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        window.App = new CreateApp();

        App.run();
    </script>
</body>
</html>
