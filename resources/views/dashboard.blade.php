<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="mb-6">
                        Selamat datang di Game Edukasi Budaya Indonesia. Uji pengetahuanmu tentang kekayaan budaya nusantara melalui permainan yang seru dan menantang. Siap untuk bermain?
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('game.play') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all">
                            Mulai Bermain Sekarang!
                        </a>
                        <a href="{{ route('scores.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                            Lihat Papan Skor
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>