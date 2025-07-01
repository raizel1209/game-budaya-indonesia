// Menunggu seluruh konten halaman dimuat sebelum menjalankan skrip
document.addEventListener('DOMContentLoaded', () => {

    // === 1. SELEKSI SEMUA ELEMEN DOM ===
    // Elemen-elemen ini menghubungkan JavaScript dengan HTML
    const livesEl = document.getElementById('lives');
    const scoreEl = document.getElementById('score');
    const timerEl = document.getElementById('timer');
    const questionTextEl = document.getElementById('question-text');
    const dropZoneEl = document.getElementById('drop-zone');
    const optionsContainerEl = document.getElementById('options-container');
    const clueBtn = document.getElementById('clue-btn');
    const clueCountEl = document.getElementById('clue-count');

    // Modal Game Over
    const gameOverModal = document.getElementById('game-over-modal');
    const finalScoreEl = document.getElementById('final-score');
    const restartBtn = document.getElementById('restart-btn');

    // === 2. INISIALISASI STATE GAME ===
    // Variabel untuk menyimpan kondisi game saat ini
    let questions = []; // Array untuk menampung semua pertanyaan dari API
    let currentQuestionIndex = 0;
    let score = 0;
    let lives = 5;
    let clueCount = 3;
    let timerInterval; // Untuk menyimpan interval timer
    let timeLeft = 30; // Waktu per pertanyaan

    // === 3. FUNGSI-FUNGSI UTAMA GAME ===

    /**
     * Mengambil pertanyaan dari API Laravel
     */
    async function fetchQuestions() {
        try {
            const response = await fetch('/api/questions');
            if (!response.ok) {
                throw new Error('Gagal memuat pertanyaan!');
            }
            questions = await response.json();
            // Jika berhasil, mulai tampilkan pertanyaan pertama
            displayNextQuestion();
        } catch (error) {
            questionTextEl.textContent = 'Terjadi kesalahan saat memuat game. Coba refresh halaman.';
            console.error(error);
        }
    }

    /**
     * Menampilkan pertanyaan dan pilihan jawaban berikutnya
     */
    function displayNextQuestion() {
        // Hentikan game jika nyawa habis atau soal selesai
        if (lives <= 0 || currentQuestionIndex >= questions.length) {
            endGame();
            return;
        }

        // Reset drop zone
        dropZoneEl.innerHTML = '<span class="text-gray-500 text-lg">Letakkan Jawabanmu di Sini</span>';
        dropZoneEl.classList.remove('border-green-500', 'border-red-500', 'bg-green-100', 'bg-red-100');
        
        const currentQuestion = questions[currentQuestionIndex];
        questionTextEl.textContent = currentQuestion.question_text;
        optionsContainerEl.innerHTML = ''; // Kosongkan pilihan jawaban sebelumnya

        // Acak urutan pilihan jawaban
        const shuffledOptions = [...currentQuestion.options].sort(() => Math.random() - 0.5);

        shuffledOptions.forEach(optionText => {
            const optionEl = document.createElement('div');
            optionEl.textContent = optionText;
            optionEl.className = 'draggable bg-white p-4 rounded-lg shadow-md cursor-grab active:cursor-grabbing border-2 border-gray-200 select-none transition-transform transform hover:scale-105';
            optionEl.draggable = true;
            // Simpan data jawaban pada elemen itu sendiri
            optionEl.dataset.answer = optionText;
            optionEl.addEventListener('dragstart', handleDragStart);
            optionsContainerEl.appendChild(optionEl);
        });

        startTimer();
    }

    /**
     * Memeriksa jawaban yang di-drop oleh user
     */
    function checkAnswer(droppedAnswer) {
        clearInterval(timerInterval); // Hentikan timer
        const correctAnswer = questions[currentQuestionIndex].correct_answer;

        if (droppedAnswer === correctAnswer) {
            // Jawaban Benar
            score += 10;
            dropZoneEl.innerHTML = `<span class="font-bold text-green-700">BENAR!</span>`;
            dropZoneEl.classList.add('border-green-500', 'bg-green-100');
        } else {
            // Jawaban Salah
            lives--;
            dropZoneEl.innerHTML = `<span class="font-bold text-red-700">SALAH! Jawaban: ${correctAnswer}</span>`;
            dropZoneEl.classList.add('border-red-500', 'bg-red-100');
        }

        updateUI();
        currentQuestionIndex++;

        // Jeda sejenak sebelum ke pertanyaan berikutnya
        setTimeout(displayNextQuestion, 2000);
    }

    /**
     * Mengakhiri permainan
     */
    function endGame() {
        clearInterval(timerInterval);
        finalScoreEl.textContent = score;
        gameOverModal.classList.remove('hidden');
        saveScoreToServer(score);
    }

    /**
     * Menyimpan skor ke server via API
     */
    async function saveScoreToServer(finalScore) {
        // Ambil CSRF token dari meta tag
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        try {
            await fetch('/api/scores', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ score: finalScore })
            });
            console.log('Skor berhasil disimpan.');
        } catch (error) {
            console.error('Gagal menyimpan skor:', error);
        }
    }

    // === 4. FUNGSI-FUNGSI PEMBANTU (TIMER, UI, DRAG & DROP) ===

    function startTimer() {
        timeLeft = 30;
        timerEl.textContent = timeLeft;
        timerInterval = setInterval(() => {
            timeLeft--;
            timerEl.textContent = timeLeft;
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                checkAnswer(null); // Anggap jawaban salah jika waktu habis
            }
        }, 1000);
    }

    function updateUI() {
        scoreEl.textContent = score;
        // Update tampilan nyawa (hati)
        livesEl.innerHTML = '';
        for (let i = 0; i < 5; i++) {
            const heartIcon = document.createElement('span');
            heartIcon.textContent = i < lives ? '❤️' : '🖤';
            heartIcon.className = 'text-2xl';
            livesEl.appendChild(heartIcon);
        }
    }

    function handleClueClick() {
        if (clueCount > 0 && questions.length > 0) {
            clueCount--;
            clueCountEl.textContent = clueCount;
            
            const correctAnswerText = questions[currentQuestionIndex].correct_answer;
            const allOptions = document.querySelectorAll('.draggable');

            allOptions.forEach(option => {
                if (option.dataset.answer === correctAnswerText) {
                    // Beri highlight pada jawaban yang benar
                    option.classList.add('bg-yellow-300', 'border-yellow-500', 'scale-110');
                    setTimeout(() => {
                        option.classList.remove('bg-yellow-300', 'border-yellow-500', 'scale-110');
                    }, 1500); // Highlight selama 1.5 detik
                }
            });

            if (clueCount === 0) {
                clueBtn.disabled = true;
            }
        }
    }
    
    // Fungsi untuk event drag & drop
    function handleDragStart(e) {
        e.dataTransfer.setData('text/plain', e.target.dataset.answer);
    }

    function handleDragOver(e) {
        e.preventDefault(); // Wajib agar event drop bisa berjalan
    }



    function handleDrop(e) {
        e.preventDefault();
        const droppedAnswer = e.dataTransfer.getData('text/plain');
        const draggedEl = document.querySelector(`[data-answer="${droppedAnswer}"]`);
        
        // Pindahkan elemen yang di-drag ke dalam drop zone
        dropZoneEl.innerHTML = '';
        dropZoneEl.appendChild(draggedEl);
        draggedEl.className = 'bg-blue-200 p-4 rounded-lg shadow-inner'; // Ubah style setelah di-drop
        
        checkAnswer(droppedAnswer);
    }
    
    // Fungsi untuk memulai game dari awal
    function initGame() {
        currentQuestionIndex = 0;
        score = 0;
        lives = 5;
        clueCount = 3;

        clueBtn.disabled = false;
        clueCountEl.textContent = clueCount;
        gameOverModal.classList.add('hidden');
        
        updateUI();
        fetchQuestions();
    }

    // === 5. EVENT LISTENERS ===
    // Menempelkan fungsi ke event pada elemen HTML
    dropZoneEl.addEventListener('dragover', handleDragOver);
    dropZoneEl.addEventListener('drop', handleDrop);
    clueBtn.addEventListener('click', handleClueClick);
    restartBtn.addEventListener('click', initGame);

    // === 6. MULAI GAME ===
    // Panggil fungsi initGame untuk pertama kali saat halaman dimuat
    initGame();
});