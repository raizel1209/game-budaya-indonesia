<x-app-layout>
    <div class="py-12 bg-gray-100 dark:bg-gray-900 animate-fade-in">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white">Papan Peringkat</h1>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">Para Jawara Budaya NusantaraQuest</p>
            </div>

            <!-- Top 3 Players -->
            @if($scores->count() >= 3)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12 animate-stagger">
                <!-- 2nd Place -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-6 text-center border-b-4 border-gray-400 transform md:mt-8 card-animated">
                    <div class="text-5xl font-bold text-gray-400">2</div>
                    <img src="https://placehold.co/100x100/E2E8F0/4A5568?text={{ substr($scores[1]->user->name, 0, 1) }}" alt="Avatar" class="w-24 h-24 mx-auto rounded-full border-4 border-gray-400 mt-4">
                    <h3 class="mt-4 text-xl font-bold text-gray-900 dark:text-white">{{ $scores[1]->user->name }}</h3>
                    <p class="text-2xl font-semibold text-gray-700 dark:text-gray-300">{{ $scores[1]->max_score }} Poin</p>
                </div>
                <!-- 1st Place -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-2xl p-8 text-center border-b-4 border-yellow-400 transform md:scale-110 card-animated">
                    <div class="text-6xl font-bold text-yellow-400">1</div>
                    <img src="https://placehold.co/120x120/FBBF24/6B46C1?text={{ substr($scores[0]->user->name, 0, 1) }}" alt="Avatar" class="w-32 h-32 mx-auto rounded-full border-4 border-yellow-400 mt-4">
                    <h3 class="mt-4 text-2xl font-bold text-gray-900 dark:text-white">{{ $scores[0]->user->name }}</h3>
                    <p class="text-3xl font-semibold text-yellow-500">{{ $scores[0]->max_score }} Poin</p>
                </div>
                <!-- 3rd Place -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-6 text-center border-b-4 border-yellow-600 transform md:mt-8 card-animated">
                    <div class="text-5xl font-bold text-yellow-600">3</div>
                    <img src="https://placehold.co/100x100/FBD38D/805AD5?text={{ substr($scores[2]->user->name, 0, 1) }}" alt="Avatar" class="w-24 h-24 mx-auto rounded-full border-4 border-yellow-600 mt-4">
                    <h3 class="mt-4 text-xl font-bold text-gray-900 dark:text-white">{{ $scores[2]->user->name }}</h3>
                    <p class="text-2xl font-semibold text-gray-700 dark:text-gray-300">{{ $scores[2]->max_score }} Poin</p>
                </div>
            </div>
            @endif

            <!-- Peringkat Lainnya -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg animate-fade-in-up" style="animation-delay: 0.5s;">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($scores as $score)
                                @if($loop->iteration > 3)
                                <tr class="transition-colors hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                    <td class="px-6 py-4 whitespace-nowrap text-center w-16">
                                        <span class="text-lg font-bold text-gray-500 dark:text-gray-400">{{ $loop->iteration }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="https://placehold.co/40x40/CBD5E0/4A5568?text={{ substr($score->user->name, 0, 1) }}" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                    {{ $score->user->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <span class="text-sm font-semibold text-red-600 dark:text-red-500">{{ $score->max_score }} Poin</span>
                                    </td>
                                </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                        Belum ada skor yang tercatat. Jadilah yang pertama!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
