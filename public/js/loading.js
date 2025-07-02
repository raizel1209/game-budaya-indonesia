document.addEventListener('DOMContentLoaded', function () {
    const loadingOverlay = document.getElementById('loading-overlay');

    function showLoading() {
        if (loadingOverlay) {
            loadingOverlay.classList.remove('hidden', 'opacity-0');
            loadingOverlay.classList.add('flex', 'opacity-100');
        }
    }

    function hideLoading() {
        if (loadingOverlay) {
            loadingOverlay.classList.add('opacity-0');
            setTimeout(() => {
                loadingOverlay.classList.add('hidden');
                loadingOverlay.classList.remove('flex');
            }, 300);
        }
    }

    document.querySelectorAll('a, button[type="submit"], form').forEach(element => {
        const eventType = element.tagName === 'FORM' ? 'submit' : 'click';

        element.addEventListener(eventType, function (e) {
            // PERBAIKAN: Jika ini adalah link keluar di halaman game,
            // biarkan game.js yang menangani logika loading.
            if (e.currentTarget.classList.contains('exit-game-check') && document.getElementById('game-box')) {
                return; // Jangan lakukan apa-apa
            }
            
            if (element.target === '_blank' || element.getAttribute('href')?.startsWith('#')) {
                return;
            }
            showLoading();
        });
    });

    window.addEventListener('pageshow', function (event) {
        if (event.persisted) {
            hideLoading();
        }
    });
    
    hideLoading();
});
