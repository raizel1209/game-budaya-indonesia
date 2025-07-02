<x-app-layout>
    <div class="min-h-screen flex items-center justify-center p-4 batik-bg">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-8 text-center transform transition-all animate-fade-in-up max-w-lg w-full">
            <h2 class="text-5xl font-extrabold text-red-600 mb-4">Game Over!</h2>
            <p class="text-xl text-gray-700 dark:text-gray-300 mb-2">Skor Akhir Kamu:</p>
            <p id="final-score" class="text-7xl font-bold text-gray-800 dark:text-white mb-8">{{ $score }}</p>
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('game.play') }}" class="w-full inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg btn-animated">Main Lagi</a>
                <a href="{{ route('scores.index') }}" class="w-full inline-block bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-lg btn-animated">Lihat Papan Skor</a>
            </div>
        </div>
    </div>
</x-app-layout>
