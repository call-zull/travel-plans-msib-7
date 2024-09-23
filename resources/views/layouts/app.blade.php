<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.meta')
    @include('includes.scripts')
    @stack('scripts')
</head>

<body>
    <div id="app">
        @include('sweetalert::alert')
        <x-navbar />

        <main class="py-4">
            {{$slot}}
        </main>
    </div>
</body>

</html>
