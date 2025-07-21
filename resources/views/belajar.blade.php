<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Belajar Bareng Yuk!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900 dark:text-gray-100">
                    <p class="mb-8 text-lg text-gray-600 dark:text-gray-400">
                        Mari perdalam wawasan kita tentang kekayaan budaya Indonesia. Klik pada salah satu kartu untuk melihat penjelasan lebih detail.
                    </p>

                    {{-- Loop untuk setiap kategori --}}
                    @foreach ($groupedQuestions as $category => $questions)
                        <div class="mb-12">
                            <h3 class="text-3xl font-bold text-red-700 border-b-2 border-red-200 pb-2 mb-6">
                                {{ $category }}
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                {{-- Loop untuk setiap pertanyaan dalam kategori --}}
                                @foreach ($questions as $question)
                                    {{-- Tombol kartu materi dengan data-attributes untuk vanilla JS --}}
                                    <button
                                        class="material-card bg-gray-50 dark:bg-gray-700 rounded-lg shadow-md overflow-hidden transform transition-transform hover:scale-105 text-left w-full cursor-pointer"
                                        data-title="{{ $question->correct_answer }}"
                                        data-text="{{ $question->description }}"
                                        data-image="{{ $question->image_path ? asset('images/' . $question->image_path) : '' }}"
                                    >
                                        @if ($question->image_path)
                                            <img src="{{ asset('images/' . $question->image_path) }}" alt="{{ $question->correct_answer }}" class="w-full h-48 object-cover">
                                        @else
                                            {{-- Placeholder jika tidak ada gambar --}}
                                            <div class="w-full h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </div>
                                        @endif
                                        <div class="p-4">
                                            <h4 class="font-bold text-xl text-gray-800 dark:text-gray-200 mb-2">{{ $question->correct_answer }}</h4>
                                            {{-- Teks di kartu tetap menggunakan question_text yang lebih pendek --}}
                                            <p class="text-gray-600 dark:text-gray-400 text-sm line-clamp-2">{{ $question->question_text }}</p>
                                        </div>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Modal Detail Materi (dikelola oleh Vanilla JS) -->
        <div id="material-modal" class="hidden fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-75 p-4 transition-opacity duration-300 opacity-0">
            <div id="modal-content" class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-full max-w-4xl max-h-[90vh] flex flex-col md:flex-row overflow-hidden transform transition-transform duration-300 scale-95">
                <!-- Kiri: Gambar Materi -->
                <div id="modal-image-container" class="w-full md:w-1/2 h-64 md:h-auto">
                    <img id="modal-image" src="" alt="" class="w-full h-full object-cover">
                </div>
                <!-- Kanan: Penjelasan Materi -->
                <div id="modal-text-container" class="w-full p-6 flex flex-col">
                    <div class="flex-grow overflow-y-auto pr-2">
                        <h3 id="modal-title" class="text-3xl font-bold text-gray-900 dark:text-white mb-4"></h3>
                        {{-- PERUBAHAN: Menambahkan kelas text-lg untuk memperbesar font --}}
                        <p id="modal-text" class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed"></p>
                    </div>
                    <!-- Tombol Tutup -->
                    <div class="mt-6 text-right">
                         <button id="modal-close-btn" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Seleksi elemen-elemen modal
            const modal = document.getElementById('material-modal');
            const modalContent = document.getElementById('modal-content');
            const modalImageContainer = document.getElementById('modal-image-container');
            const modalImage = document.getElementById('modal-image');
            const modalTextContainer = document.getElementById('modal-text-container');
            const modalTitle = document.getElementById('modal-title');
            const modalText = document.getElementById('modal-text');
            const closeModalBtn = document.getElementById('modal-close-btn');

            // Seleksi semua kartu materi
            const materialCards = document.querySelectorAll('.material-card');

            // Fungsi untuk membuka modal
            const openModal = (title, text, imageUrl) => {
                modalTitle.textContent = title;
                modalText.textContent = text;

                if (imageUrl) {
                    modalImage.src = imageUrl;
                    modalImage.alt = title;
                    modalImageContainer.style.display = 'block';
                    modalTextContainer.classList.remove('md:w-full');
                    modalTextContainer.classList.add('md:w-1/2');
                } else {
                    modalImageContainer.style.display = 'none';
                    modalTextContainer.classList.remove('md:w-1/2');
                    modalTextContainer.classList.add('md:w-full');
                }

                modal.classList.remove('hidden');
                modal.classList.add('flex');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    modalContent.classList.remove('scale-95');
                }, 10); // Jeda kecil untuk transisi
            };

            // Fungsi untuk menutup modal
            const closeModal = () => {
                modal.classList.add('opacity-0');
                modalContent.classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }, 300); // Sesuaikan dengan durasi transisi
            };

            // Tambahkan event listener ke setiap kartu
            materialCards.forEach(card => {
                card.addEventListener('click', () => {
                    const title = card.dataset.title;
                    const text = card.dataset.text;
                    const image = card.dataset.image;
                    openModal(title, text, image);
                });
            });

            // Event listener untuk tombol tutup
            closeModalBtn.addEventListener('click', closeModal);

            // Event listener untuk menutup modal saat klik di luar konten
            modal.addEventListener('click', (event) => {
                if (event.target === modal) {
                    closeModal();
                }
            });

            // Event listener untuk menutup modal dengan tombol Escape
            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
