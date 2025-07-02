<x-guest-layout>
    <div class="w-full flex flex-wrap min-h-[60vh]">
        <!-- Bagian Form dengan Warna Gelap Elegan -->
        <div class="w-full md:w-1/2 flex flex-col justify-center bg-gray-900 p-8 md:p-12">
            <h2 class="text-2xl font-bold text-white mb-6 text-center">Buat Akun Baru</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <x-input-label for="name" value="Nama" class="text-gray-400"/>
                    <x-text-input id="name" class="block mt-1 w-full bg-gray-800 text-white border-gray-700 focus:border-red-500 focus:ring-red-500" type="text" name="name" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="email" value="Email" class="text-gray-400"/>
                    <x-text-input id="email" class="block mt-1 w-full bg-gray-800 text-white border-gray-700 focus:border-red-500 focus:ring-red-500" type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="password" value="Password" class="text-gray-400"/>
                    <x-text-input id="password" class="block mt-1 w-full bg-gray-800 text-white border-gray-700 focus:border-red-500 focus:ring-red-500" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="password_confirmation" value="Konfirmasi Password" class="text-gray-400"/>
                    <x-text-input id="password_confirmation" class="block mt-1 w-full bg-gray-800 text-white border-gray-700 focus:border-red-500 focus:ring-red-500" type="password" name="password_confirmation" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div class="flex flex-col items-center mt-6">
                    <x-primary-button class="w-full justify-center py-3 text-base btn-animated bg-red-700 hover:bg-red-600 focus:bg-red-600 active:bg-red-800 text-white">
                        {{ __('Register') }}
                    </x-primary-button>
                    <p class="mt-4 text-sm text-gray-400">
                        Sudah punya akun? <a href="{{ route('login') }}" class="font-medium text-red-500 hover:underline">Masuk di sini</a>
                    </p>
                </div>
            </form>
        </div>
        <!-- Bagian Branding dengan Warna Merah Khas Indonesia -->
        <div class="w-full md:w-1/2 flex-col justify-center items-center p-12 bg-red-800 text-white hidden md:flex">
            <div class="text-center">
                <x-application-logo class="w-28 h-28 mx-auto mb-6" />
                <h1 class="text-4xl font-bold">NusantaraQuest</h1>
                <p class="text-white/80 mt-2">Jelajahi & Lestarikan Budaya Indonesia</p>
            </div>
        </div>
    </div>
</x-guest-layout>
