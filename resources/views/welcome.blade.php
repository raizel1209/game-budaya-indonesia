<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Game Edukasi Budaya Indonesia</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Style Kustom untuk Background -->
    <style>
        .batik-bg {
            background-color: #f8f3e9; /* Warna krem soft sebagai fallback */
            /* Ganti 'url('/images/batik-pattern.png')' jika Anda punya gambar sendiri */
            /* Untuk sementara, kita gunakan gradient untuk nuansa batik */
            background-image:
                linear-gradient(135deg, rgba(188, 113, 73, 0.05) 25%, transparent 25%),
                linear-gradient(225deg, rgba(188, 113, 73, 0.05) 25%, transparent 25%),
                linear-gradient(45deg, rgba(188, 113, 73, 0.05) 25%, transparent 25%),
                linear-gradient(315deg, rgba(188, 113, 73, 0.05) 25%, #f8f3e9 25%);
            background-position: 10px 0, 10px 0, 0 0, 0 0;
            background-size: 20px 20px;
            background-repeat: repeat;
        }
    </style>
</head>
<body class="antialiased batik-bg">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center selection:bg-red-500 selection:text-white">
        
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                {{-- Logo atau Judul Utama --}}
                <h1 class="text-5xl md:text-7xl font-bold text-gray-800" style="font-family: 'Figtree', sans-serif;">
                    Nusantara Quest
                </h1>
            </div>

            <div class="mt-16 bg-white/70 backdrop-blur-sm p-8 rounded-2xl shadow-2xl">
                <div class="text-center">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Jelajahi Kekayaan Budaya Indonesia!</h2>
                    <p class="text-gray-600">
                        Uji wawasanmu tentang tarian, makanan, pahlawan, dan warisan budaya nusantara lainnya melalui permainan drag-and-drop yang seru dan mendidik.
                    </p>
                </div>

                @if (Route::has('login'))
                <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                    @auth
                        {{-- Jika sudah login, arahkan ke dashboard --}}
                        <a href="{{ url('/dashboard') }}" class="w-full sm:w-auto rounded-md px-6 py-3 bg-red-700 text-white font-semibold shadow-sm hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all">
                            Lanjutkan ke Dashboard
                        </a>
                    @else
                        {{-- Jika belum login, tampilkan tombol Login dan Register --}}
                        <a href="{{ route('login') }}" class="w-full sm:w-auto rounded-md px-6 py-3 bg-red-700 text-white font-semibold shadow-sm hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all">
                            Masuk (Login)
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="w-full sm:w-auto rounded-md px-6 py-3 bg-white text-gray-700 font-semibold shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all">
                                Daftar (Register)
                            </a>
                        @endif
                    @endauth
                </div>
                @endif
            </div>

            <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    &copy; {{ date('Y') }} Game Edukasi Budaya Indonesia
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>
</body>
</html>
