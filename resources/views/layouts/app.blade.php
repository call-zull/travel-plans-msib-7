<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('layouts.css')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- @stack('scripts') --}}
</head>

<body>
    <div id="app">
        @include('sweetalert::alert')
        @include('layouts.navbar')

        <main class="py-4">
            {{$slot}}
        </main>
    </div>
</body>

</html>
