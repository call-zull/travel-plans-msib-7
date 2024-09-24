<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.meta')
    @include('includes.styles')
    @stack('styles')
</head>

<body>
    <div id="app">
        @include('includes.actions.sweetalert-delete')
        <x-navbar />

        <main class="py-4">
            {{ $slot }}
        </main>
    </div>
    @include('includes.scripts')
    @stack('scripts')
</body>

</html>
