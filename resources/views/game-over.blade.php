<x-app-layout>
    {{-- Menambahkan script untuk animasi confetti --}}
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Animasi confetti saat halaman dimuat
                confetti({
                    particleCount: 150,
                    spread: 90,
                    origin: { y: 0.6 }
                });

                // Animasi angka skor
                const finalScoreEl = document.getElementById('final-score');
                const finalScore = parseInt(finalScoreEl.dataset.score, 10);
                let currentScore = 0;
                
                const updateScore = () => {
                    if (currentScore < finalScore) {
                        currentScore++;
                        finalScoreEl.textContent = currentScore;
                        requestAnimationFrame(updateScore);
                    } else {
                        finalScoreEl.textContent = finalScore;
                    }
                };

                updateScore();
            });
        </script>
    @endpush

    {{-- Latar belakang tematik --}}
    <div class="min-h-screen flex items-center justify-center p-4 bg-gray-100 dark:bg-gray-900 batik-bg">
        <div class="w-full max-w-lg text-center">
            
            {{-- Kartu Hasil --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-8 transform transition-all animate-fade-in-up relative overflow-hidden">
                
                {{-- Ornamen --}}
                <div class="absolute -top-10 -left-10 w-24 h-24 bg-red-500/10 rounded-full"></div>
                <div class="absolute -bottom-12 -right-8 w-32 h-32 bg-blue-500/10 rounded-full"></div>

                {{-- Ikon --}}
                <div class="mx-auto mb-4 text-yellow-400">
                    <svg class="w-24 h-24 mx-auto animate-pulse" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </div>

                <h2 class="text-2xl font-bold text-gray-600 dark:text-gray-300">Permainan Selesai!</h2>
                
                {{-- Skor Akhir --}}
                <p class="text-7xl sm:text-8xl font-black text-gray-800 dark:text-white my-4" 
                   id="final-score" 
                   data-score="{{ $score }}">
                   0
                </p>

                {{-- Pesan Motivasi --}}
                <p class="text-lg text-gray-700 dark:text-gray-400 mb-8">
                    @if($score >= 50)
                        Luar biasa! Pengetahuan budayamu sangat mengagumkan!
                    @elseif($score >= 20)
                        Kerja bagus! Teruslah belajar dan jelajahi kekayaan Indonesia.
                    @else
                        Jangan menyerah! Setiap perjalanan dimulai dengan satu langkah.
                    @endif
                </p>

                {{-- Tombol Aksi --}}
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('game.play') }}" class="w-full inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg btn-animated transition-all duration-300 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h5M20 20v-5h-5"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 9a9 9 0 0114.13-6.36M20 15a9 9 0 01-14.13 6.36"></path></svg>
                        Main Lagi
                    </a>
                    <a href="{{ route('scores.index') }}" class="w-full inline-flex items-center justify-center bg-gray-200 hover:bg-gray-300 text-gray-800 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white font-bold py-3 px-6 rounded-lg btn-animated transition-all duration-300 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Lihat Papan Skor
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
