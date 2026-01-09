/*
    ARQUIVO JAVASCRIPT: PROMBOX
    Responsável pelas interações de clique, abertura de menus e LÓGICA DE CÁLCULO.
*/

document.addEventListener('DOMContentLoaded', () => {
    
    // ==========================================
    // 1. MENU MOBILE E MODAIS (Lógica de Interface)
    // ==========================================
    const btnMenuOpen = document.getElementById('btn-menu-open');
    const btnMenuClose = document.getElementById('btn-menu-close');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileOverlay = document.getElementById('mobile-menu-overlay');

    function toggleMenu() {
        if (!mobileMenu) return;
        const isOpen = mobileMenu.classList.contains('open');
        
        if (isOpen) {
            mobileMenu.classList.remove('open');
            mobileOverlay.classList.add('hidden');
        } else {
            mobileMenu.classList.add('open');
            mobileOverlay.classList.remove('hidden');
        }
    }

    if(btnMenuOpen) btnMenuOpen.addEventListener('click', toggleMenu);
    if(btnMenuClose) btnMenuClose.addEventListener('click', toggleMenu);
    if(mobileOverlay) mobileOverlay.addEventListener('click', toggleMenu);

    // Lógica do Modal de Login
    const loginModal = document.getElementById('login-modal');
    const btnLoginOpen = document.getElementById('btn-login-open');
    const btnLoginClose = document.getElementById('btn-login-close');
    const loginOverlay = document.getElementById('login-overlay');
    const mobileLoginTriggers = document.querySelectorAll('.btn-login-trigger');

    function toggleLogin() {
        if (!loginModal) return;
        loginModal.classList.toggle('hidden');
        if (mobileMenu && mobileMenu.classList.contains('open')) toggleMenu();
    }

    if(btnLoginOpen) btnLoginOpen.addEventListener('click', toggleLogin);
    if(btnLoginClose) btnLoginClose.addEventListener('click', toggleLogin);
    if(loginOverlay) loginOverlay.addEventListener('click', toggleLogin);
    mobileLoginTriggers.forEach(btn => btn.addEventListener('click', toggleLogin));

    console.log("Prombox JS Carregado v2.4 - Com Vídeos");
});


// ==========================================
// 2. LÓGICA DE CÁLCULO DE COTAS (GLOBAL)
// ==========================================

const PRICE_PER_QUOTA = 0.99;

function adjustManual(change) {
    const manualInput = document.getElementById('manualQty');
    if(!manualInput) return;

    let currentVal = parseInt(manualInput.value) || 0;
    let newVal = currentVal + change;

    if(newVal < 1) newVal = 1;
    
    manualInput.value = newVal;
    updateTotal();
    
    document.querySelectorAll('.quota-option-card').forEach(card => {
        card.classList.remove('selected');
    });
}

function selectQuota(qty, fixedPrice = null) {
    const manualInput = document.getElementById('manualQty');
    
    if(manualInput) {
        let currentQty = parseInt(manualInput.value) || 0;
        let newQty = currentQty + qty;
        
        manualInput.value = newQty;
        updateTotal();
    }

    document.querySelectorAll('.quota-option-card').forEach(card => {
        card.classList.remove('selected');
    });
}

function updateTotal(priceOverride = null) {
    const manualInput = document.getElementById('manualQty');
    const btnDisplay = document.getElementById('btnTotalDisplay');
    
    if(!manualInput || !btnDisplay) return;

    const qty = parseInt(manualInput.value) || 1;
    let total = 0;

    if (priceOverride !== null) {
        total = priceOverride;
    } else {
        total = qty * PRICE_PER_QUOTA;
    }

    btnDisplay.textContent = total.toLocaleString('pt-BR', { 
        style: 'currency', 
        currency: 'BRL' 
    });
}

// ==========================================
// 3. LÓGICA DE MODAL DE VÍDEO (YOUTUBE)
// ==========================================

/**
 * Abre o modal e insere o vídeo do YouTube
 * @param {string} videoId - O ID do vídeo (ex: dQw4w9WgXcQ)
 */
function openVideoModal(videoId) {
    const modal = document.getElementById('video-modal');
    const iframe = document.getElementById('youtube-player');
    
    // Monta a URL com autoplay e rel=0 (não mostrar vídeos relacionados)
    // Nota: Em dispositivos móveis, o autoplay pode ser bloqueado pelo navegador
    iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
    
    modal.classList.remove('hidden');
}

/**
 * Fecha o modal e para o vídeo
 */
function closeVideoModal() {
    const modal = document.getElementById('video-modal');
    const iframe = document.getElementById('youtube-player');
    
    modal.classList.add('hidden');
    // Limpa o src para parar o vídeo instantaneamente
    iframe.src = '';
}