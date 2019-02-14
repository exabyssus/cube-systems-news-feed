<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.system.head')
</head>
<body>
@include('partials.system.svg')
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        @include('partials.system.navbar')
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
@include('partials.system.footer')
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
@stack('scripts')
</body>
</html>
