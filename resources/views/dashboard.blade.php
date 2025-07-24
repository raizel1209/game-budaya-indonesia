<x-app-layout>
    <style>
        .dashboard-bg {
            background-image: url("{{ asset('images/Indonesia.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }
    </style>
    <div class="dashboard-bg">
        <!-- Background Music -->
        <audio id="bg-music" src="{{ asset('audio/main-theme.mp3') }}" autoplay loop></audio>
        <script>
            document.addEventListener('click', function() {
                var audio = document.getElementById('bg-music');
                if (audio && audio.paused) audio.play();
            }, { once: true });
        </script>

        <!-- Hero Section -->
        <div class="bg-red-800 text-white animate-fade-in">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">Selamat Datang, {{ Auth::user()->name }}!</h1>
                <p class="mt-4 text-lg md:text-xl text-red-200 max-w-2xl mx-auto">
                    Tantang wawasanmu dan jadilah master budaya Indonesia. Petualangan menantimu!
                </p>
            </div>
        </div>

        <!-- Menu Utama -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 animate-stagger">
                    
                    <!-- Kartu Mulai Bermain -->
                    <a href="{{ route('game.play') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg p-8 card-animated text-center group">
                        <div class="text-red-600 dark:text-red-500 mb-4">
                            <svg class="w-16 h-16 mx-auto transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Mulai Bermain</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Langsung uji pengetahuanmu sekarang!</p>
                    </a>

                    <!-- Kartu Papan Skor -->
                    <a href="{{ route('scores.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg p-8 card-animated text-center group">
                        <div class="text-yellow-500 dark:text-yellow-400 mb-4">
                            <svg class="w-16 h-16 mx-auto transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Papan Skor</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Lihat siapa yang menjadi jawara budaya.</p>
                    </a>

                    <!-- Kartu Belajar -->
                    <a href="{{ route('belajar.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg p-8 text-center group transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                        <div class="text-blue-500 dark:text-blue-400 mb-4">
                            <svg class="w-16 h-16 mx-auto transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Belajar Bareng Yuk</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Perdalam pengetahuanmu tentang budaya.</p>
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
