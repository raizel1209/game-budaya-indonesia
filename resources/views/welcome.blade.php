<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🎭</text></svg>">

    <title>NusantaraQuest - Game Edukasi Budaya Indonesia</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700&display=swap" rel="stylesheet" />

    <!-- Styles -->
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
            background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0.4));
            z-index: -1;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <audio id="bg-music" src="{{ asset('audio/main-theme.mp3') }}" autoplay loop></audio>
    <script>
        document.addEventListener('click', function() {
            var audio = document.getElementById('bg-music');
            if (audio && audio.paused) audio.play();
        }, { once: true });
    </script>

    <video autoplay muted loop class="video-bg">
        {{-- Video of Balinese dance --}}
        <source src="https://cdn.pixabay.com/video/2024/09/17/231925_large.mp4" type="video/mp4">
        Browser Anda tidak mendukung tag video.
    </video>
    <div class="video-overlay"></div>

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen">
        <div class="max-w-7xl mx-auto p-6 lg:p-8 text-center text-white">
            
            <div class="animate-fade-in-up">
                <x-application-logo class="w-28 h-28 mx-auto mb-6 text-white"/>
                <h1 class="text-5xl md:text-7xl font-bold tracking-tight" style="font-family: 'Figtree', sans-serif;">
                    NusantaraQuest
                </h1>
                <p class="mt-4 text-lg md:text-xl text-white/80 max-w-3xl mx-auto">
                    Sebuah perjalanan interaktif menelusuri kekayaan budaya Indonesia. Uji wawasanmu dan jadilah sang jawara budaya!
                </p>
            </div>

            <!-- Feature Icons -->
            <div class="mt-10 flex flex-wrap justify-center gap-8 md:gap-12 animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="flex flex-col items-center space-y-2">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                        {{-- Food Icon --}}
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.5a2.5 2.5 0 01-2.5 2.5h-11A2.5 2.5 0 015 15.5V12a2.5 2.5 0 012.5-2.5h11A2.5 2.5 0 0121 12v3.5zM9 10V6a2 2 0 012-2h2a2 2 0 012 2v4"></path></svg>
                    </div>
                    <span class="text-sm font-medium">Makanan Khas</span>
                </div>
                <div class="flex flex-col items-center space-y-2">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                        {{-- Dance Icon --}}
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.532 8.686a1 1 0 011.06-1.06l2.122 2.122a1 1 0 01-1.414 1.414L16 9.758V14a1 1 0 01-2 0V9.758l-.302.302a1 1 0 01-1.414-1.414l2.122-2.122zM8.468 15.314a1 1 0 01-1.06 1.06l-2.122-2.122a1 1 0 111.414-1.414L8 14.242V10a1 1 0 112 0v4.242l.302-.302a1 1 0 111.414 1.414l-2.122 2.122z"></path></svg>
                    </div>
                    <span class="text-sm font-medium">Kesenian</span>
                </div>
                <div class="flex flex-col items-center space-y-2">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                        {{-- Landmark Icon --}}
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <span class="text-sm font-medium">Tempat Ikonik</span>
                </div>
                {{-- Ikon Pahlawan Nasional Baru --}}
                <div class="flex flex-col items-center space-y-2">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <span class="text-sm font-medium">Pahlawan Nasional</span>
                </div>
            </div>

            @if (Route::has('login'))
            <div class="mt-12 animate-fade-in-up" style="animation-delay: 0.4s;">
                @auth
                    <a href="{{ url('/dashboard') }}" class="inline-block rounded-lg px-8 py-4 bg-red-700 text-white font-semibold shadow-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-black/50 transition-all btn-animated btn-pulse text-lg">
                        Lanjutkan Petualangan
                    </a>
                @else
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ route('login') }}" class="w-full sm:w-auto inline-block rounded-lg px-8 py-3 bg-red-700 text-white font-semibold shadow-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-black/50 transition-all btn-animated">
                            Masuk (Login)
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="w-full sm:w-auto inline-block rounded-lg px-8 py-3 bg-white/20 text-white font-semibold shadow-lg backdrop-blur-sm ring-1 ring-inset ring-white/20 hover:bg-white/30 focus:outline-none focus:ring-2 focus:ring-white transition-all btn-animated">
                                Daftar (Register)
                            </a>
                        @endif
                    </div>
                @endauth
            </div>
            @endif

            <div class="absolute bottom-6 left-1/2 -translate-x-1/2 text-center text-sm text-white/50 w-full">
                <p>&copy; {{ date('Y') }} NusantaraQuest. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
