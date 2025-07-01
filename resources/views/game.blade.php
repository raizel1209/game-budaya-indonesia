<x-app-layout>
    <div id="game-container" class="game-bg min-h-screen flex items-center justify-center p-4">
        
        <div id="game-box" class="w-full max-w-4xl bg-white/90 backdrop-blur-sm rounded-2xl shadow-2xl p-6 md:p-8 relative">

            <div class="flex flex-wrap justify-between items-center border-b-2 border-gray-200 pb-4 mb-6 text-gray-700 font-semibold">
                <div class="flex items-center space-x-2 text-lg">
                    <span>Nyawa:</span>
                    <div id="lives" class="flex items-center space-x-1">
                        </div>
                </div>
                <div class="text-lg">Skor: <span id="score" class="font-bold">0</span></div>
                <div class="flex items-center space-x-2 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>Timer: <span id="timer" class="font-bold text-2xl">30</span></span>
                </div>
            </div>

            <div id="question-area" class="mb-6 text-center">
                <p class="text-xl md:text-2xl font-medium text-gray-800" id="question-text">Memuat pertanyaan...</p>
            </div>

            <div id="drop-zone" class="border-4 border-dashed border-gray-400 rounded-lg p-6 md:p-10 text-center mb-8 transition-all duration-300">
                <span class="text-gray-500 text-lg">Letakkan Jawabanmu di Sini</span>
            </div>

            <div id="options-container" class="flex flex-wrap justify-center gap-4">
                </div>

            <div class="mt-8 text-center">
                <button id="clue-btn" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold px-5 py-2 rounded-lg shadow-md transition-transform transform hover:scale-105 disabled:bg-gray-400 disabled:cursor-not-allowed">
                    Gunakan Clue (Sisa: <span id="clue-count">3</span>)
                </button>
            </div>
        </div>

        <div id="game-over-modal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-xl p-8 text-center transform transition-all scale-95">
                <h2 class="text-4xl font-bold text-red-600 mb-4">Game Over!</h2>
                <p class="text-xl text-gray-700 mb-2">Skor Akhir Kamu:</p>
                <p id="final-score" class="text-6xl font-bold text-gray-800 mb-8">0</p>
                <div class="flex space-x-4">
                    <button id="restart-btn" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition-all">Main Lagi</button>
                    <a href="{{ route('dashboard') }}" class="w-full inline-block bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-lg transition-all">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>

    </div>

    @push('scripts')
        <script src="{{ asset('js/game.js') }}" defer></script>
    @endpush
</x-app-layout>