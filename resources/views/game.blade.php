<x-app-layout>
    {{-- Inline styles for video background, scoped to this view --}}
    <style>
        .video-background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -2; /* Place it behind all content */
        }
        #video-bg {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure it covers the whole screen */
        }
        .video-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Dark overlay for text readability */
            z-index: -1;
        }
        #loader-bar {
            transition: width 1.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>

    <div class="video-background-container">
        <video autoplay muted loop id="video-bg">
            {{-- Video of Balinese dance --}}
            <source src="https://cdn.pixabay.com/video/2024/09/17/231925_large.mp4" type="video/mp4">
            Browser Anda tidak mendukung tag video.
        </video>
    </div>
    <div class="video-overlay"></div>

    <div id="game-container" class="min-h-screen flex items-center justify-center p-4 overflow-hidden">
        
        <div id="game-box" class="w-full max-w-4xl bg-white/30 dark:bg-gray-800/30 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/20 p-6 md:p-8 relative animate-fade-in-up">

            {{-- Header: Nyawa, Skor, Timer --}}
            <div class="grid grid-cols-3 gap-4 items-center border-b-2 border-white/20 pb-4 mb-6 text-white font-semibold [text-shadow:0_2px_4px_rgba(0,0,0,0.8)]">
                <div class="flex items-center space-x-2 text-lg">
                    <span class="hidden sm:inline font-bold">Nyawa:</span>
                    <div id="lives" class="flex items-center space-x-1 text-2xl">
                        {{-- Hati di-generate oleh JS --}}
                    </div>
                </div>
                <div class="text-center text-xl">
                    <span class="font-bold">Skor:</span>
                    <span id="score" class="font-extrabold text-white text-2xl">0</span>
                </div>
                <div class="flex items-center justify-end space-x-2 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span id="timer" class="font-bold text-2xl transition-colors duration-300 w-10 text-center">30</span>
                </div>
            </div>

            {{-- Area Pertanyaan & Gambar --}}
            <div id="question-area" class="mb-6 text-center min-h-[280px] flex flex-col justify-center items-center p-4 bg-black/20 rounded-lg shadow-inner">
                 <img id="question-image" src="" alt="Gambar Petunjuk" class="mx-auto mb-4 rounded-lg shadow-lg max-h-48 transition-all duration-500" style="display: none; opacity: 0;">
                <p class="text-xl md:text-2xl font-medium text-white [text-shadow:0_2px_5px_rgba(0,0,0,0.9)]" id="question-text">Memuat pertanyaan...</p>
            </div>

            {{-- Drop Zone --}}
            <div id="drop-zone" class="border-4 border-dashed border-white/40 rounded-lg p-6 md:p-10 text-center mb-8 transition-all duration-300 bg-black/20 flex flex-col justify-center items-center min-h-[100px]">
                <div id="feedback-container">
                    <span id="feedback-text" class="text-white/80 text-lg font-semibold [text-shadow:0_1px_3px_rgba(0,0,0,0.7)]">Letakkan Jawabanmu di Sini</span>
                </div>
                <div id="next-question-loader" class="w-full bg-white/20 rounded-full h-2.5 mt-2 hidden">
                    <div id="loader-bar" class="bg-green-500 h-2.5 rounded-full" style="width: 0%"></div>
                </div>
            </div>

            {{-- Pilihan Jawaban --}}
            <div id="options-container" class="flex flex-wrap justify-center gap-4 min-h-[80px]">
                {{-- Pilihan di-generate oleh JS --}}
            </div>

            {{-- Tombol Clue --}}
            <div class="mt-8 text-center">
                <button id="clue-btn" class="bg-yellow-500 hover:bg-yellow-400 text-yellow-900 font-bold px-6 py-3 rounded-lg shadow-lg disabled:bg-gray-500 disabled:text-gray-300 disabled:cursor-not-allowed btn-animated">
                    <svg class="w-5 h-5 inline-block -mt-1 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m12.728 0l-.707.707M12 21v-1m-6.364-1.636l.707-.707M6 12a6 6 0 1112 0 6 6 0 01-12 0z"></path></svg>
                    Gunakan Clue (Sisa: <span id="clue-count">3</span>)
                </button>
            </div>
        </div>

        {{-- Modal Game Over --}}
        <div id="game-over-modal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 p-4">
            <div id="modal-content" class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-8 text-center transform transition-all opacity-0 -translate-y-10">
                <h2 class="text-4xl font-bold text-red-600 mb-4">Game Over!</h2>
                <p class="text-xl text-gray-700 dark:text-gray-300 mb-2">Skor Akhir Kamu:</p>
                <p id="final-score" class="text-6xl font-bold text-gray-800 dark:text-white mb-8">0</p>
                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">
                    <button id="restart-btn" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg btn-animated">Main Lagi</button>
                    <a href="{{ route('dashboard') }}" class="w-full inline-block bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-lg btn-animated">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>

        {{-- Modal Konfirmasi Keluar --}}
        <div id="confirm-exit-modal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 p-4">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-8 text-center transform transition-all animate-fade-in-up">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Peringatan</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">Apakah Anda yakin ingin keluar? Skor saat ini akan disimpan.</p>
                <div class="flex justify-center space-x-4">
                    <button id="cancel-exit-btn" class="px-6 py-2 rounded-lg bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold btn-animated">Batal</button>
                    <button id="confirm-exit-btn" class="px-6 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white font-semibold btn-animated">Ya, Keluar</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/game.js') }}" defer></script>
    @endpush
</x-app-layout>
