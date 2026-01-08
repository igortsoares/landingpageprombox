/*
    ARQUIVO JAVASCRIPT: PROMBOX
*/

document.addEventListener('DOMContentLoaded', () => {
    
    // ==========================================
    // 1. MENU MOBILE
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

    // ==========================================
    // 2. MODAL DE LOGIN
    // ==========================================
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

    console.log("Prombox JS Carregado v2.1");
});

// ==========================================
// 3. LÓGICA DE SELEÇÃO DE COTAS (GLOBAL)
// ==========================================
const PRICE_PER_QUOTA = 0.99;

// Seleciona um pacote rápido (botões)
function selectQuota(qty, priceOverride = null) {
    const manualInput = document.getElementById('manualQty');
    
    if(manualInput) {
        manualInput.value = qty;
        updateTotal(priceOverride);
    }

    // Atualiza visual dos botões
    document.querySelectorAll('.quota-option-card').forEach(card => {
        card.classList.remove('selected');
        // Lógica simples para detectar qual foi clicado visualmente
        // Em um app real, usaríamos IDs ou data-attributes
        const cardQty = parseInt(card.querySelector('span').innerText.replace('+',''));
        if(cardQty === qty) {
            card.classList.add('selected');
        }
    });
}

// Ajusta valor manualmente (+/-)
function adjustManual(change) {
    const manualInput = document.getElementById('manualQty');
    if(!manualInput) return;

    let newVal = parseInt(manualInput.value) + change;
    if(newVal < 1) newVal = 1;
    
    manualInput.value = newVal;
    updateTotal();
    
    // Remove seleção visual dos pacotes pois agora é manual
    document.querySelectorAll('.quota-option-card').forEach(card => card.classList.remove('selected'));
}

// Atualiza o total no botão
function updateTotal(fixedPrice = null) {
    const manualInput = document.getElementById('manualQty');
    const btnDisplay = document.getElementById('btnTotalDisplay');
    
    if(!manualInput || !btnDisplay) return;

    const qty = parseInt(manualInput.value) || 1;
    let total = 0;

    if (fixedPrice !== null) {
        total = fixedPrice;
    } else {
        total = qty * PRICE_PER_QUOTA;
    }

    // Formata para Real Brasileiro
    btnDisplay.textContent = total.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
}