@props(['action', 'method' => 'POST'])

<form x-data="{ loading: false }" action="{{ $action }}" method="{{ $method }}" @submit="loading = !loading">
    @if ($method == 'POST')
        @csrf
    @endif
    {{ $slot }}
</form>
