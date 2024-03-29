<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{URL::asset('image/logo.png')}}">
        <title>@yield('title') - t9chnih</title>
        {{-- Google Analytics Code --}}
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.ga4.measurementId') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ config('services.ga4.measurementId') }}');
        </script>
        {{-- End Google Analytics Code --}}
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Changa:wght@400;700&family=IBM+Plex+Sans+Arabic:wght@500&family=Jomhuria&family=Playfair+Display:wght@400;500&family=Space+Mono:wght@700&display=swap" rel="stylesheet">
        {{-- Fira Code Font --}}
        <link href="https://fonts.googleapis.com/css2?family=Fira+Code&display=swap" rel="stylesheet">
        {{-- Font Awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css"
            />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-Mygray antialiased">
        <div class="w-full min-h-screen max-w-6xl">
            {{ $slot }}
        </div>
        @stack('modals')
    
        @livewireScripts
        
    </body>
</html>
<script src="{{asset('js/sweetAlertEvents.js')}}"></script>