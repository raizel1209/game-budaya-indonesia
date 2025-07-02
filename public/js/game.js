document.addEventListener('DOMContentLoaded', () => {

    // === 1. SELEKSI ELEMEN DOM ===
    const livesEl = document.getElementById('lives');
    const scoreEl = document.getElementById('score');
    const timerEl = document.getElementById('timer');
    const questionTextEl = document.getElementById('question-text');
    const questionImageEl = document.getElementById('question-image');
    const dropZoneEl = document.getElementById('drop-zone');
    const optionsContainerEl = document.getElementById('options-container');
    const clueBtn = document.getElementById('clue-btn');
    const clueCountEl = document.getElementById('clue-count');
    const gameOverModal = document.getElementById('game-over-modal');
    const finalScoreEl = document.getElementById('final-score');
    const restartBtn = document.getElementById('restart-btn');
    const preparationModal = document.getElementById('preparation-modal');
    const startGameBtn = document.getElementById('start-game-btn');
    const exitGameBtn = document.getElementById('exit-game-btn');
    const confirmExitModal = document.getElementById('confirm-exit-modal');
    const confirmExitBtn = document.getElementById('confirm-exit-btn');
    const cancelExitBtn = document.getElementById('cancel-exit-btn');
    const feedbackTextEl = document.getElementById('feedback-text');
    const feedbackContainerEl = document.getElementById('feedback-container');
    const correctAnswerEl = document.createElement('div');
    correctAnswerEl.id = 'correct-answer';
    correctAnswerEl.className = 'text-center mt-2 text-sm';
    
    // === 2. STATE GAME ===
    let questions = [];
    let currentQuestionIndex = 0;
    let score = 0;
    let lives = 5;
    let clueCount = 3;
    let timerInterval;
    let timeLeft = 30;
    let isGameRunning = false;

    // === 3. FUNGSI UTAMA ===

    /**
     * Mengambil pertanyaan dari API
     */
    async function fetchQuestions() {
        try {
            showLoading(true, 'Memuat pertanyaan baru...');
            const response = await fetch('/api/questions');
            if (!response.ok) throw new Error('Gagal memuat pertanyaan!');
            questions = await response.json();
            currentQuestionIndex = 0;
            isGameRunning = true;
            displayNextQuestion();
        } catch (error) {
            questionTextEl.textContent = 'Gagal memuat game. Coba refresh halaman.';
            console.error(error);
        } finally {
            showLoading(false);
        }
    }
    
    /**
     * Menampilkan pertanyaan berikutnya
     */
    function displayNextQuestion() {
        if (!isGameRunning) return;
        if (lives <= 0) {
            endGame();
            return;
        }
        // Jika pertanyaan habis, ambil lagi dari awal (atau fetch ulang)
        if (currentQuestionIndex >= questions.length) {
            currentQuestionIndex = 0; // Reset index untuk bermain lagi dengan soal yang sama
        }
        
        // Reset drop zone style
        dropZoneEl.className = 'border-4 border-dashed border-white/40 rounded-lg p-6 md:p-10 text-center mb-8 transition-all duration-300 bg-black/20 flex flex-col justify-center items-center min-h-[100px]';
        feedbackContainerEl.innerHTML = ''; // Hapus jawaban benar sebelumnya
        feedbackTextEl.textContent = 'Letakkan Jawabanmu di Sini';
        feedbackContainerEl.appendChild(feedbackTextEl);


        const currentQuestion = questions[currentQuestionIndex];
        
        questionTextEl.classList.remove('animate-fade-in');
        questionImageEl.style.opacity = '0';
        void questionTextEl.offsetWidth; // Trigger reflow
        questionTextEl.textContent = currentQuestion.question_text;
        questionTextEl.classList.add('animate-fade-in');

        if (currentQuestion.image_path) {
            questionImageEl.src = `/images/${currentQuestion.image_path}`;
            questionImageEl.style.display = 'block';
            setTimeout(() => questionImageEl.style.opacity = '1', 100);
        } else {
            questionImageEl.style.display = 'none';
        }

        optionsContainerEl.innerHTML = '';
        const shuffledOptions = [...currentQuestion.options].sort(() => Math.random() - 0.5);

        shuffledOptions.forEach((optionText, index) => {
            const optionEl = document.createElement('div');
            optionEl.textContent = optionText;
            optionEl.className = 'draggable bg-white dark:bg-gray-800 text-gray-800 dark:text-white p-4 rounded-lg shadow-lg cursor-grab active:cursor-grabbing border-2 border-transparent select-none transition-all duration-300 transform hover:scale-110 hover:shadow-2xl hover:border-red-500 active:scale-105 active:shadow-lg';
            optionEl.draggable = true;
            optionEl.dataset.answer = optionText;
            optionEl.style.opacity = '0';
            optionEl.style.animation = `fadeInUp 0.5s ease-out ${index * 0.1}s forwards`;
            
            optionEl.addEventListener('dragstart', handleDragStart);
            optionEl.addEventListener('dragend', (e) => {
                e.target.classList.remove('opacity-75', 'scale-105', 'shadow-2xl', 'rotate-3');
            });

            optionsContainerEl.appendChild(optionEl);
        });
        
        // Aktifkan kembali semua pilihan
        enableOptions(true);
        startTimer();
    }

    /**
     * Memeriksa jawaban yang diberikan oleh pemain
     */
    function checkAnswer(droppedAnswer) {
        clearInterval(timerInterval);
        const correctAnswer = questions[currentQuestionIndex].correct_answer;
        const isCorrect = droppedAnswer === correctAnswer;

        // Nonaktifkan pilihan jawaban sementara
        enableOptions(false);

        if (isCorrect) {
            score += 10;
            feedbackTextEl.textContent = 'BENAR!';
            dropZoneEl.classList.add('answer-correct');
        } else {
            lives--;
            feedbackTextEl.textContent = 'SALAH!';
            dropZoneEl.classList.add('answer-incorrect');
            
            // Tampilkan jawaban yang benar
            correctAnswerEl.innerHTML = `Jawaban yang benar: <strong class="text-green-400">${correctAnswer}</strong>`;
            feedbackContainerEl.appendChild(correctAnswerEl);

            const heartIcons = livesEl.getElementsByTagName('span');
            if (heartIcons[lives]) {
                heartIcons[lives].classList.add('heart-lost');
            }
        }

        updateUI();

        // Jeda sebelum lanjut ke pertanyaan berikutnya
        setTimeout(() => {
            currentQuestionIndex++;
            displayNextQuestion();
        }, 2000); // Jeda 2 detik
    }
    
    /**
     * Mengakhiri permainan dan menyimpan skor
     */
    async function endGame() {
        if (!isGameRunning) return;
        isGameRunning = false;
        clearInterval(timerInterval);

        try {
            showLoading(true, 'Menyimpan skormu...');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            await axios.post('/api/scores', {
                score: score
            }, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

        } catch (error) {
            console.error('Gagal menyimpan skor:', error);
            // Tetap lanjutkan ke halaman game over meskipun gagal simpan
        } finally {
            showLoading(false);
            // Redirect ke halaman game over
            window.location.href = `/game-over?score=${score}`;
        }
    }
    
    /**
     * Memulai timer
     */
    function startTimer() {
        timeLeft = 30;
        timerEl.textContent = timeLeft;
        timerEl.classList.remove('timer-warning', 'text-red-500');

        timerInterval = setInterval(() => {
            timeLeft--;
            timerEl.textContent = timeLeft;
            if (timeLeft <= 10) {
                timerEl.classList.add('timer-warning', 'text-red-500');
            }
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                checkAnswer(null); // Anggap salah jika waktu habis
            }
        }, 1000);
    }
    
    /**
     * Memperbarui tampilan UI (skor dan nyawa)
     */
    function updateUI() {
        scoreEl.textContent = score;
        livesEl.innerHTML = '';
        for (let i = 0; i < 5; i++) {
            const heartIcon = document.createElement('span');
            heartIcon.textContent = i < lives ? '❤️' : '🖤';
            heartIcon.className = 'text-2xl transition-all duration-300';
            if (i >= lives) {
                heartIcon.classList.add('opacity-50');
            }
            livesEl.appendChild(heartIcon);
        }
    }

    /**
     * Logika untuk tombol petunjuk (clue)
     */
    function handleClueClick() {
        if (clueCount > 0 && questions.length > 0 && isGameRunning) {
            clueCount--;
            clueCountEl.textContent = clueCount;
            
            const clueText = questions[currentQuestionIndex].clue;
            alert(`Petunjuk: ${clueText}`);

            if (clueCount === 0) {
                clueBtn.disabled = true;
            }
        }
    }
    
    // === 4. FUNGSI-FUNGSI PEMBANTU ===
    
    function handleDragStart(e) {
        if (!isGameRunning) return;
        e.dataTransfer.setData('text/plain', e.target.dataset.answer);
        e.dataTransfer.effectAllowed = 'move';
    }

    function handleDragOver(e) {
        e.preventDefault();
        if (!isGameRunning) return;
        e.dataTransfer.dropEffect = 'move';
        dropZoneEl.classList.add('drop-zone-dragover');
    }

    function handleDragLeave() {
        dropZoneEl.classList.remove('drop-zone-dragover');
    }

    function handleDrop(e) {
        e.preventDefault();
        if (!isGameRunning) return;
        dropZoneEl.classList.remove('drop-zone-dragover');
        const droppedAnswer = e.dataTransfer.getData('text/plain');
        checkAnswer(droppedAnswer);
    }

    function enableOptions(enabled) {
        optionsContainerEl.querySelectorAll('.draggable').forEach(opt => {
            opt.draggable = enabled;
            opt.style.pointerEvents = enabled ? 'auto' : 'none';
            opt.style.opacity = enabled ? '1' : '0.5';
            opt.classList.toggle('cursor-grab', enabled);
            opt.classList.toggle('cursor-not-allowed', !enabled);
        });
    }

    function showLoading(show, text = 'Memuat...') {
        const loadingOverlay = document.getElementById('loading-overlay');
        const loadingText = document.getElementById('loading-text');
        if (show) {
            if(loadingText) loadingText.textContent = text;
            loadingOverlay.classList.remove('hidden');
        } else {
            loadingOverlay.classList.add('hidden');
        }
    }
    
    /**
     * BARU: Menangani klik pada link navigasi saat game berjalan.
     */
    function setupNavigationListener() {
        let targetElement = null;

        document.body.addEventListener('click', (e) => {
            const linkOrForm = e.target.closest('.exit-game-check');
            if (linkOrForm && isGameRunning) {
                e.preventDefault();
                targetElement = linkOrForm;
                isExiting = true;
                confirmExitModal.classList.remove('hidden');
                confirmExitModal.classList.add('flex');
            }
        });

        confirmExitBtn.addEventListener('click', async () => {
            confirmExitModal.classList.add('hidden');
            confirmExitModal.classList.remove('flex');
            if (targetElement) {
                await endGame();
                if (targetElement.tagName === 'FORM') {
                    targetElement.submit();
                } else if (targetElement.href) {
                    window.location.href = targetElement.href;
                }
            }
            isExiting = false;
            targetElement = null;
        });

        cancelExitBtn.addEventListener('click', () => {
            confirmExitModal.classList.add('hidden');
            confirmExitModal.classList.remove('flex');
            isExiting = false;
            targetElement = null;
        });
    }

    /**
     * Inisialisasi Game
     */
    function initGame() {
        setupNavigationListener(); // Panggil listener navigasi
        // Tampilkan modal persiapan
        preparationModal.classList.remove('hidden');
        preparationModal.classList.add('flex');
    }

    function startGame() {
        preparationModal.classList.add('hidden');
        preparationModal.classList.remove('flex');

        isGameRunning = true;
        score = 0;
        lives = 5;
        clueCount = 3;
        
        clueBtn.disabled = false;
        clueCountEl.textContent = clueCount;
        
        updateUI();
        fetchQuestions();
    }
    
    // === 5. EVENT LISTENERS ===
    
    // Mulai game dari modal persiapan
    startGameBtn.addEventListener('click', startGame);

    // Event listener untuk drag & drop
    dropZoneEl.addEventListener('dragover', handleDragOver);
    dropZoneEl.addEventListener('dragleave', handleDragLeave);
    dropZoneEl.addEventListener('drop', handleDrop);
    
    // Event listener untuk tombol
    clueBtn.addEventListener('click', handleClueClick);
    restartBtn.addEventListener('click', () => window.location.href = '/play');
    exitGameBtn.addEventListener('click', () => {
        confirmExitModal.classList.remove('hidden');
        confirmExitModal.classList.add('flex');
    });

    // Event listener untuk modal konfirmasi keluar
    cancelExitBtn.addEventListener('click', () => {
        confirmExitModal.classList.add('hidden');
        confirmExitModal.classList.remove('flex');
    });

    confirmExitBtn.addEventListener('click', () => {
        confirmExitModal.classList.add('hidden');
        confirmExitModal.classList.remove('flex');
        endGame();
    });

    // === MULAI GAME ===
    // Cek apakah kita berada di halaman game
    if (document.getElementById('game-container')) {
        initGame();
    }
});