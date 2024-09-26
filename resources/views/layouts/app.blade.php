<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.meta')
    @include('includes.styles')
    @stack('styles')
</head>

<body>
    @include('includes.actions.sweetalert-delete')

    <div id="db-wrapper">
        <!-- navbar vertical -->
        @auth
            @include('includes.navbar-vertical')

            <div id="page-content">

                @include('layouts.header')
            @endauth

            {{ $slot }}

            @include('includes.footer')
        </div>
    </div>
    <!-- Scripts -->
    @include('includes.scripts')
    @stack('scripts')
</body>

</html>
