<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TBShop - Gundam Model Kit Store')</title>
    <link rel="icon" href="{{ asset('images/logos/Logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom/nav.css') }}">
    @stack('styles')
    <script defer src="{{ asset('js/custom/script.js') }}"></script>
    @stack('scripts')
</head>
<body>
    @include('components.header')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    @stack('page-scripts')
</body>
</html>
