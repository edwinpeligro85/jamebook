<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jame Book - Book Store</title>

    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <meta name="theme-color" content="#ffffff">

    @vite(['resources/css/plugins.css', 'resources/css/main.css'])

    @livewireStyles
</head>

<body>
    <div class="site-wrapper" id="top">
        @livewire('ecommerce.header')

        @unless(request()->route()->getName() == 'home')
            @include('partials.breadcrumbs')
        @endunless

        <main class="inner-page-sec-padding-bottom">
            {{ $slot }}
        </main>

        @livewire('ecommerce.footer')
    </div>

    @livewireScripts
    @livewire('partials.modals')

    <!-- Use Minified Plugins Version For Fast Page Load -->
    @vite(['resources/js/app.js', 'resources/js/plugins.js', 'resources/js/custom.js', 'resources/js/modals.js'])

    @stack('js')
</body>

</html>
