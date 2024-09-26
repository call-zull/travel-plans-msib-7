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
            @include('layouts.navbar-vertical')

            <div id="page-content">

                @include('layouts.header')
        @endauth

            {{ $slot }}

            @include('layouts.footer')
        </div>
    </div>
    <!-- Scripts -->
    @include('layouts.scripts')
    @stack('scripts')
</body>

</html>
