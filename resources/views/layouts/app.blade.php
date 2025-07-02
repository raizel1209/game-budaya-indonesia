<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- Favicon Baru --}}
        <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🎭</text></svg>">

        <title>NusantaraQuest - @yield('title', 'Game Edukasi')</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        
        @if(request()->routeIs('game.play'))
        <style>
            .video-background-container {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
                z-index: -2;
            }
            #video-bg {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .video-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.6);
                z-index: -1;
            }
        </style>
        @endif

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        {{-- Loading Indicator Overlay --}}
        <div id="loading-overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-[100]">
            <div class="w-16 h-16 border-4 border-t-red-500 border-gray-200 rounded-full animate-spin"></div>
        </div>

        @if(request()->routeIs('game.play'))
            <div class="video-background-container">
                <video autoplay muted loop id="video-bg">
                    <source src="https://cdn.pixabay.com/video/2022/05/23/116290-719999699_large.mp4" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                </video>
                <div class="video-overlay"></div>
            </div>
        @endif

        <div class="min-h-screen {{ request()->routeIs('game.play') ? '' : 'bg-gray-100 dark:bg-gray-900' }}">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
        </div>
        @stack('scripts')

        {{-- Load Loading Indicator Script --}}
        <script src="{{ asset('js/loading.js') }}" defer></script>
    </body>
</html>
