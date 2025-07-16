<x-guest-layout>
    <!-- Tambahkan Elemen Audio untuk Musik Latar -->
    <audio id="bg-music" src="{{ asset('audio/main-theme.mp3') }}" autoplay loop></audio>
    <script>
        document.addEventListener('click', function() {
            var audio = document.getElementById('bg-music');
            if (audio && audio.paused) audio.play();
        }, { once: true });
    </script>

    <div class="w-full flex flex-wrap min-h-[60vh]">

        <!-- Bagian Branding dengan Warna Merah Khas Indonesia -->
        <div class="w-full md:w-1/2 flex flex-col justify-center items-center p-12 bg-red-800 text-white rounded-l-2xl">
            <div class="text-center">
                <x-application-logo class="w-28 h-28 mx-auto mb-6" />
                <h1 class="text-4xl font-bold">NusantaraQuest</h1>
                <p class="text-white/80 mt-2">Jelajahi & Lestarikan Budaya Indonesia</p>
            </div>
        </div>

        <!-- Bagian Form dengan Warna Gelap Elegan -->
        <div class="w-full md:w-1/2 flex flex-col justify-center bg-gray-800 p-8 md:p-12 rounded-r-2xl">
            <h2 class="text-2xl font-bold text-white mb-6 text-center">Selamat Datang Kembali!</h2>
            
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-input-label for="email" value="Email" class="text-gray-400"/>
                    <x-text-input id="email" class="block mt-1 w-full bg-gray-700 text-white border-gray-600 focus:border-red-500 focus:ring-red-500" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password" value="Password" class="text-gray-400"/>
                    <x-text-input id="password" class="block mt-1 w-full bg-gray-700 text-white border-gray-600 focus:border-red-500 focus:ring-red-500" type="password" name="password" required/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded bg-gray-700 border-transparent text-red-600 focus:ring-red-500" name="remember">
                        <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-400 hover:text-white" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div class="flex flex-col items-center mt-6">
                    <x-primary-button class="w-full justify-center py-3 text-base btn-animated bg-gray-200 text-gray-800 hover:bg-white focus:bg-white active:bg-gray-300">
                        {{ __('Log In') }}
                    </x-primary-button>
                    <p class="mt-4 text-sm text-gray-400">
                        Belum punya akun? <a href="{{ route('register') }}" class="font-medium text-red-500 hover:underline">Daftar di sini</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
