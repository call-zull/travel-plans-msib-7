<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   @include('partials.meta')
   @include('partials.font')
   @include('partials.scripts')
   @stack('scripts')
   @include('sweetalert::alert')
</head>

<body>
    <div id="app">
      <x-navbar />

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
