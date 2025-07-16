<x-app-layout>
    {{-- Improved styles for modern, clean UI --}}
    <style>
        body, html { height: 100%; margin: 0; padding: 0; }
        .bg-gradient {
            background: linear-gradient(135deg, #1e293b 0%, #334155 50%, #fbbf24 100%);
            min-height: 100vh;
            width: 100vw;
            position: fixed;
            z-index: -3;
        }
        .video-background-container { position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; overflow: hidden; z-index: -2; }
        #video-bg { width: 100vw; height: 100vh; object-fit: cover; }
        .video-overlay { position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: rgba(30, 41, 59, 0.7); z-index: -1; }
        #game-box {
            background: rgba(255,255,255,0.15);
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.37);
            border-radius: 2rem;
            border: 1px solid rgba(255,255,255,0.18);
            backdrop-filter: blur(16px);
        }
        #question-area {
            background: rgba(17,24,39,0.7);
            border-radius: 1.25rem;
            box-shadow: 0 2px 16px 0 rgba(0,0,0,0.18);
        }
        #drop-zone {
            background: rgba(255,255,255,0.08);
            border-radius: 1rem;
            border: 2px dashed #fbbf24;
            min-height: 90px;
        }
        #options-container button {
            background: linear-gradient(90deg, #fbbf24 0%, #f59e42 100%);
            color: #1e293b;
            font-weight: 600;
            border-radius: 0.75rem;
            padding: 0.75rem 2rem;
            font-size: 1.1rem;
            box-shadow: 0 2px 8px 0 rgba(251,191,36,0.15);
            border: none;
            transition: transform 0.15s, box-shadow 0.15s, background 0.2s;
            margin: 0.25rem;
        }
        #options-container button:hover, #options-container button:focus {
            background: linear-gradient(90deg, #f59e42 0%, #fbbf24 100%);
            color: #fff;
            transform: translateY(-4px) scale(1.05);
            box-shadow: 0 4px 16px 0 rgba(251,191,36,0.25);
            outline: none;
        }
        #clue-btn {
            background: linear-gradient(90deg, #fde68a 0%, #fbbf24 100%);
            color: #92400e;
            font-weight: bold;
            border-radius: 0.75rem;
            box-shadow: 0 2px 8px 0 rgba(251,191,36,0.15);
            transition: background 0.2s, color 0.2s;
        }
        #clue-btn:hover:not(:disabled) {
            background: linear-gradient(90deg, #fbbf24 0%, #fde68a 100%);
            color: #fff;
        }
        .answer-correct { animation: flash-green 0.7s; }
        .answer-incorrect { animation: flash-red 0.7s; }
        .heart-lost { animation: shake 0.5s; color: #ef4444 !important; transform: scale(0.8); }
        @keyframes flash-green { 50% { background: #bbf7d0; border-color: #10b981; } }
        @keyframes flash-red { 50% { background: #fecaca; border-color: #ef4444; } }
        @keyframes shake {
            10%, 90% { transform: translateX(-2px); }
            20%, 80% { transform: translateX(4px); }
            30%, 50%, 70% { transform: translateX(-6px); }
            40%, 60% { transform: translateX(6px); }
        }
        /* Modal and overlay improvements */
        .modal-bg { background: rgba(30,41,59,0.85); }
        .modal-content { border-radius: 1.5rem; }
        /* Responsive tweaks */
        @media (max-width: 640px) {
            #game-box { padding: 1rem !important; }
            #question-area { padding: 1rem !important; }
            #drop-zone { padding: 1rem !important; }
        }
    </style>

    <div class="bg-gradient"></div>
    <div class="video-background-container">
        <video autoplay muted loop id="video-bg">
            <source src="https://cdn.pixabay.com/video/2024/09/17/231925_large.mp4" type="video/mp4">
        </video>
    </div>
    <div class="video-overlay"></div>

    <div id="game-container" class="min-h-screen flex items-center justify-center p-4 overflow-hidden">
        <div id="game-box" class="w-full max-w-2xl md:max-w-3xl lg:max-w-4xl p-6 md:p-8 relative animate-fade-in-up">
            {{-- Tombol Keluar --}}
            <button id="exit-game-btn" class="absolute top-4 right-4 bg-red-600 hover:bg-red-700 text-white font-bold p-2 rounded-full shadow-lg transition-transform hover:scale-110 z-30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
            {{-- Timer di pojok kanan atas --}}
            <div id="timer-container" class="absolute top-4 right-20 flex items-center space-x-2 z-20 bg-gray-900/70 px-4 py-2 rounded-full shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span id="timer" class="font-bold text-2xl text-white transition-colors duration-300 w-10 text-center">30</span>
            </div>
            {{-- Header: Nyawa, Skor --}}
            <div class="grid grid-cols-3 gap-4 items-center border-b-2 border-white/20 pb-4 mb-6 text-white font-semibold [text-shadow:0_2px_4px_rgba(0,0,0,0.8)]">
                <div class="flex items-center space-x-2 text-lg">
                    <span class="hidden sm:inline font-bold">Nyawa:</span>
                    <div id="lives" class="flex items-center space-x-1 text-2xl"></div>
                </div>
                <div class="text-center text-xl">
                    <span class="font-bold">Skor:</span>
                    <span id="score" class="font-extrabold text-white text-2xl">0</span>
                </div>
                <div class="flex items-center justify-end space-x-2 text-lg opacity-0 pointer-events-none">
                    {{-- Timer moved to absolute position --}}
                </div>
            </div>
            {{-- Area Pertanyaan & Gambar --}}
            <div id="question-area" class="mb-6 text-center min-h-[240px] flex flex-col justify-center items-center p-6">
                <img id="question-image" src="" alt="Gambar Petunjuk" class="mx-auto mb-4 rounded-xl shadow-lg max-h-44 transition-all duration-500" style="display: none; opacity: 0;">
                <p class="text-xl md:text-2xl font-medium text-white [text-shadow:0_2px_5px_rgba(0,0,0,0.9)]" id="question-text">Memuat...</p>
            </div>
            {{-- Drop Zone --}}
            <div id="drop-zone" class="border-4 border-dashed border-yellow-400 rounded-lg p-6 md:p-10 text-center mb-8 transition-all duration-300 flex flex-col justify-center items-center min-h-[90px]">
                <div id="feedback-container" class="text-center">
                    <span id="feedback-text" class="text-yellow-100 text-lg font-semibold [text-shadow:0_1px_3px_rgba(0,0,0,0.7)]">Letakkan Jawabanmu di Sini</span>
                </div>
            </div>
            {{-- Pilihan Jawaban --}}
            <div id="options-container" class="flex flex-wrap justify-center gap-4 min-h-[80px]"></div>
            {{-- Tombol Clue --}}
            <div class="mt-8 text-center">
                <button id="clue-btn" class="px-6 py-3 rounded-lg shadow-lg font-bold disabled:bg-gray-500 disabled:text-gray-300 disabled:cursor-not-allowed btn-animated">
                    <svg class="w-5 h-5 inline-block -mt-1 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m12.728 0l-.707.707M12 21v-1m-6.364-1.636l.707-.707M6 12a6 6 0 1112 0 6 6 0 01-12 0z"></path></svg>
                    Gunakan Clue (Sisa: <span id="clue-count">3</span>)
                </button>
            </div>
        </div>
        {{-- Modal Persiapan Game --}}
        <div id="preparation-modal" class="hidden fixed inset-0 modal-bg flex items-center justify-center z-50 p-4">
            <div class="bg-white dark:bg-gray-800 modal-content shadow-xl p-8 text-center transform transition-all animate-fade-in-up max-w-md w-full">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Selamat Datang di NusantaraQuest!</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    Anda akan dihadapkan pada serangkaian pertanyaan tentang budaya Indonesia.<br>
                    Seret dan letakkan jawaban yang benar ke dalam kotak yang tersedia.<br>
                    Selamat bermain dan semoga berhasil!
                </p>
                <button id="start-game-btn" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg btn-animated text-xl">
                    Mulai Sekarang!
                </button>
            </div>
        </div>
        {{-- Modal Game Over --}}
        <div id="game-over-modal" class="hidden fixed inset-0 modal-bg flex items-center justify-center z-50 p-4">
            <div id="modal-content" class="bg-white dark:bg-gray-800 modal-content shadow-xl p-8 text-center transform transition-all opacity-0 -translate-y-10">
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
        <div id="confirm-exit-modal" class="hidden fixed inset-0 modal-bg flex items-center justify-center z-50 p-4">
            <div class="bg-white dark:bg-gray-800 modal-content shadow-xl p-8 text-center transform transition-all animate-fade-in-up">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Peringatan</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">Apakah Anda yakin ingin keluar? Skor saat ini akan disimpan.</p>
                <div class="flex justify-center space-x-4">
                    <button id="cancel-exit-btn" class="px-6 py-2 rounded-lg bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold btn-animated">Batal</button>
                    <button id="confirm-exit-btn" class="px-6 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white font-semibold btn-animated">Ya, Keluar</button>
                </div>
            </div>
        </div>
        {{-- Loading Indicator --}}
        <div id="loading-overlay" class="hidden fixed inset-0 modal-bg flex-col items-center justify-center z-[100]">
            <div class="w-16 h-16 border-4 border-t-red-500 border-gray-200 rounded-full animate-spin"></div>
            <p id="loading-text" class="text-white text-lg mt-4">Memuat...</p>
        </div>
        {{-- Loading Indicator Saat Jawaban Diproses --}}
        <div id="answer-loading" class="hidden fixed inset-0 flex items-center justify-center z-[110]">
            <div class="bg-black/60 rounded-full p-6 flex flex-col items-center">
                <div class="w-10 h-10 border-4 border-t-yellow-400 border-yellow-200 rounded-full animate-spin"></div>
                <span class="text-yellow-200 mt-3 font-semibold">Memeriksa jawaban...</span>
            </div>
        </div>

    </div>
    @push('scripts')
        {{-- Axios CDN untuk request API --}}
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="{{ asset('js/game.js') }}" defer></script>
        <script>
        // Tampilkan indikator loading saat jawaban sedang diproses
        window.showAnswerLoading = function(show = true) {
            const el = document.getElementById('answer-loading');
            if (el) el.classList.toggle('hidden', !show);
        }
        </script>
    @endpush

    {{-- Audio background khusus game --}}
    <audio id="bg-music" src="{{ asset('audio/game-theme.mp3') }}" autoplay loop></audio>
    {{-- SFX --}}
    <audio id="sfx-correct" src="{{ asset('audio/sfx-correct.mp3') }}"></audio>
    <audio id="sfx-wrong" src="{{ asset('audio/sfx-wrong.mp3') }}"></audio>
    <audio id="sfx-timer" src="{{ asset('audio/sfx-timer.mp3') }}"></audio>
    <audio id="sfx-yay" src="{{ asset('audio/sfx-yay.mp3') }}"></audio>
    <script>
        // Unlock audio SFX di semua browser setelah interaksi user pertama
        function unlockAllSfx() {
            var sfxIds = ['sfx-correct', 'sfx-wrong', 'sfx-timer', 'sfx-yay'];
            sfxIds.forEach(function(id) {
                var audio = document.getElementById(id);
                if (audio) {
                    audio.volume = 1.0;
                    // Play & pause untuk unlock di browser
                    try {
                        audio.play().then(() => {
                            audio.pause();
                            audio.currentTime = 0;
                        }).catch(()=>{});
                    } catch(e) {}
                }
            });
            document.removeEventListener('click', unlockAllSfx);
            document.removeEventListener('touchstart', unlockAllSfx);
            document.removeEventListener('keydown', unlockAllSfx);
        }
        document.addEventListener('click', unlockAllSfx);
        document.addEventListener('touchstart', unlockAllSfx);
        document.addEventListener('keydown', unlockAllSfx);

        // Fungsi untuk memainkan SFX
        function playSfx(id) {
            var sfx = document.getElementById(id);
            if (sfx) {
                sfx.currentTime = 0;
                sfx.play();
            }
        }

        // --- Contoh pemanggilan dari logika game Anda ---
        // playSfx('sfx-correct'); // saat jawaban benar
        // playSfx('sfx-wrong');   // saat jawaban salah
        // playSfx('sfx-timer');   // saat timer menyentuh detik ke 10
        // playSfx('sfx-yay');     // saat game selesai dan skor muncul
    </script>

</x-app-layout>