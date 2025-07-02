<x-app-layout>
    <div class="py-12 bg-gray-100 dark:bg-gray-900 animate-fade-in">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white">Papan Peringkat</h1>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">Para Jawara Budaya NusantaraQuest</p>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($scores as $score)
                        @php
                            // Lewati iterasi ini jika karena suatu alasan data user tidak ada
                            if (!$score || !$score->user) continue;

                            $rank = $loop->iteration;
                            $rankClasses = '';
                            $rankIcon = '';

                            if ($rank == 1) {
                                $rankClasses = 'bg-yellow-50 dark:bg-yellow-400/10 border-l-4 border-yellow-400';
                                $rankIcon = '🥇';
                            } elseif ($rank == 2) {
                                $rankClasses = 'bg-gray-50 dark:bg-gray-500/10 border-l-4 border-gray-400';
                                $rankIcon = '🥈';
                            } elseif ($rank == 3) {
                                $rankClasses = 'bg-amber-50 dark:bg-amber-600/10 border-l-4 border-amber-600';
                                $rankIcon = '🥉';
                            }
                        @endphp

                        <li class="p-4 sm:p-6 flex items-center justify-between transition-colors hover:bg-gray-100 dark:hover:bg-gray-700/50 {{ $rankClasses }}">
                            <div class="flex items-center flex-grow">
                                <div class="text-xl font-bold w-12 text-center text-gray-500 dark:text-gray-400">
                                    <span class="text-2xl">{{ $rankIcon ?: $rank }}</span>
                                </div>
                                
                                <img class="h-12 w-12 rounded-full ml-4 shadow-md" 
                                     src="https://ui-avatars.com/api/?name={{ urlencode($score->user->name) }}&background=random&color=fff" 
                                     alt="Avatar {{ $score->user->name }}">
                                     
                                <div class="ml-4">
                                    <div class="text-lg font-bold text-gray-900 dark:text-white">
                                        {{ $score->user->name }}
                                    </div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        Bergabung pada {{ $score->user->created_at->format('d M Y') }}
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-xl font-bold text-red-600 dark:text-red-500 pl-4">
                                {{-- PERBAIKAN: Menggunakan $score->max_score sesuai data dari controller --}}
                                {{ $score->max_score }} Poin
                            </div>
                        </li>
                    @empty
                        <li class="p-8 text-center text-gray-500 dark:text-gray-400">
                            Belum ada skor yang tercatat. Jadilah yang pertama!
                        </li>
                    @endforelse
                </ul>
            </div>

             <div class="text-center mt-8 text-sm text-gray-500 dark:text-gray-400">
                <p>* Peringkat diurutkan berdasarkan skor tertinggi dari setiap pemain.</p>
            </div>
        </div>
    </div>
</x-app-layout>
