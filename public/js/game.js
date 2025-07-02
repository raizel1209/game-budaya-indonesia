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

    async function fetchQuestions() {
        try {
            questionTextEl.textContent = 'Memuat pertanyaan baru...';
            const response = await fetch('/api/questions');
            if (!response.ok) throw new Error('Gagal memuat pertanyaan!');
            questions = await response.json();
            currentQuestionIndex = 0;
            displayNextQuestion();
        } catch (error) {
            questionTextEl.textContent = 'Gagal memuat game. Coba refresh halaman.';
            console.error(error);
        }
    }

    function displayNextQuestion() {
        if (lives <= 0) {
            endGame();
            return;
        }
        if (currentQuestionIndex >= questions.length) {
            fetchQuestions();
            return;
        }

        dropZoneEl.innerHTML = '<span class="text-white/80 text-lg font-semibold [text-shadow:0_1px_3px_rgba(0,0,0,0.6)]">Letakkan Jawabanmu di Sini</span>';
        dropZoneEl.className = 'border-4 border-dashed border-white/50 rounded-lg p-6 md:p-10 text-center mb-8 transition-all duration-300 bg-white/20';
        
        const currentQuestion = questions[currentQuestionIndex];
        
        questionTextEl.classList.remove('animate-fade-in');
        questionImageEl.style.opacity = '0';
        void questionTextEl.offsetWidth;
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
            
            optionEl.addEventListener('dragstart', (e) => {
                e.target.classList.add('opacity-75', 'scale-105', 'shadow-2xl', 'rotate-3');
                handleDragStart(e);
            });
            optionEl.addEventListener('dragend', (e) => {
                e.target.classList.remove('opacity-75', 'scale-105', 'shadow-2xl', 'rotate-3');
            });

            optionsContainerEl.appendChild(optionEl);
        });

        startTimer();
    }

    function checkAnswer(droppedAnswer) {
        clearInterval(timerInterval);
        const correctAnswer = questions[currentQuestionIndex].correct_answer;
        const isCorrect = droppedAnswer === correctAnswer;

        if (isCorrect) {
            score += 10;
        } else {
            lives--;
        }

        updateUI();
        currentQuestionIndex++;
        displayNextQuestion();
    }

    function endGame() {
        isGameRunning = false;
        clearInterval(timerInterval);
        
        // Alihkan ke halaman game over dengan skor sebagai parameter
        window.location.href = `/game-over?score=${score}`;
    }

    function startTimer() {
        timeLeft = 30;
        timerEl.textContent = timeLeft;
        timerEl.classList.remove('timer-warning');

        timerInterval = setInterval(() => {
            timeLeft--;
            timerEl.textContent = timeLeft;
            if (timeLeft <= 10) {
                timerEl.classList.add('timer-warning');
            }
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                checkAnswer(null);
            }
        }, 1000);
    }

    function updateUI() {
        scoreEl.textContent = score;
        livesEl.innerHTML = '';
        for (let i = 0; i < 5; i++) {
            const heartIcon = document.createElement('span');
            heartIcon.textContent = i < lives ? '❤️' : '🖤';
            heartIcon.className = 'text-2xl transition-all duration-300';
            livesEl.appendChild(heartIcon);
        }
    }

    function handleClueClick() {
        if (clueCount > 0 && questions.length > 0) {
            clueCount--;
            clueCountEl.textContent = clueCount;
            
            const clueText = questions[currentQuestionIndex].clue;
            alert(`Petunjuk: ${clueText}`);

            if (clueCount === 0) {
                clueBtn.disabled = true;
            }
        }
    }
    
    function handleDragStart(e) {
        e.dataTransfer.setData('text/plain', e.target.dataset.answer);
    }

    function handleDragOver(e) {
        e.preventDefault();
        dropZoneEl.classList.add('drop-zone-dragover');
    }

    function handleDragLeave() {
        dropZoneEl.classList.remove('drop-zone-dragover');
    }

    function handleDrop(e) {
        e.preventDefault();
        dropZoneEl.classList.remove('drop-zone-dragover');
        const droppedAnswer = e.dataTransfer.getData('text/plain');
        checkAnswer(droppedAnswer);
    }
    
    function initGame() {
        isGameRunning = true;
        currentQuestionIndex = 0;
        score = 0;
        lives = 5;
        clueCount = 3;

        clueBtn.disabled = false;
        clueCountEl.textContent = clueCount;
        
        updateUI();
        fetchQuestions();
    }

    // === EVENT LISTENERS ===
    dropZoneEl.addEventListener('dragover', handleDragOver);
    dropZoneEl.addEventListener('dragleave', handleDragLeave);
    dropZoneEl.addEventListener('drop', handleDrop);
    clueBtn.addEventListener('click', handleClueClick);
    
    // === MULAI GAME ===
    if (document.body.contains(document.getElementById('game-box'))) {
        initGame();
    }
});
