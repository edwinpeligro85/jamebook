<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jame Book - Book Store</title>

    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">

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

    <!-- Use Minified Plugins Version For Fast Page Load -->
    @vite(['resources/js/plugins.js', 'resources/js/custom.js'])

    @stack('js')
</body>

</html>
