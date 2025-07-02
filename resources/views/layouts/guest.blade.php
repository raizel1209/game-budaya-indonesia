<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- Favicon Baru --}}
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <title>NusantaraQuest - @yield('title', 'Autentikasi')</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <style>
            .video-bg {
                position: fixed;
                top: 50%;
                left: 50%;
                min-width: 100%;
                min-height: 100%;
                width: auto;
                height: auto;
                z-index: -2;
                transform: translateX(-50%) translateY(-50%);
                object-fit: cover;
            }
            .video-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5); /* Overlay lebih gelap untuk kontras */
                z-index: -1;
            }
        </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <video autoplay muted loop class="video-bg">
            <source src="https://cdn.pixabay.com/video/2024/09/17/231925_large.mp4" type="video/mp4">
            Browser Anda tidak mendukung tag video.
        </video>
        <div class="video-overlay"></div>

        <div class="min-h-screen flex items-center justify-center p-4 sm:p-6">
            <div class="w-full max-w-4xl bg-white/10 dark:bg-gray-800/10 backdrop-blur-xl shadow-2xl rounded-2xl overflow-hidden animate-fade-in-up">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
