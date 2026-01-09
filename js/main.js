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

    console.log("Prombox JS Carregado v2.3 - Lógica Acumulativa");
});


// ==========================================
// 2. LÓGICA DE CÁLCULO DE COTAS (GLOBAL)
// ==========================================

// Preço unitário da cota
const PRICE_PER_QUOTA = 0.99;

/**
 * Função: adjustManual
 * Aumenta ou diminui a quantidade manualmente pelos botões +/-
 * @param {number} change - Valor a adicionar (1) ou subtrair (-1)
 */
function adjustManual(change) {
    const manualInput = document.getElementById('manualQty');
    
    if(!manualInput) return; // Segurança caso o input não exista

    // Pega o valor atual, converte para inteiro e soma a mudança
    let currentVal = parseInt(manualInput.value) || 0;
    let newVal = currentVal + change;

    // Impede números negativos ou zero
    if(newVal < 1) newVal = 1;
    
    // Atualiza o input visualmente
    manualInput.value = newVal;

    // Recalcula o total
    updateTotal();
    
    // Remove a seleção visual dos "pacotes" para evitar confusão visual
    document.querySelectorAll('.quota-option-card').forEach(card => {
        card.classList.remove('selected');
    });
}

/**
 * Função: selectQuota (MODO ACUMULATIVO)
 * Chamada ao clicar nos cards de pacotes (05, 10, 50, 100 cotas)
 * Agora soma a quantidade clicada ao valor atual em vez de substituir.
 * @param {number} qty - Quantidade do pacote a adicionar
 * @param {number} fixedPrice - (Ignorado no modo acumulativo)
 */
function selectQuota(qty, fixedPrice = null) {
    const manualInput = document.getElementById('manualQty');
    
    if(manualInput) {
        // Pega o valor que já está lá (ou 0 se estiver vazio)
        let currentQty = parseInt(manualInput.value) || 0;
        
        // SOMA a nova quantidade
        let newQty = currentQty + qty;
        
        // Atualiza o campo
        manualInput.value = newQty;
        
        // Recalcula o preço total baseando-se na nova soma
        updateTotal();
    }

    // Efeito visual de clique rápido (feedback)
    // Removemos a classe 'selected' fixa porque o valor agora é dinâmico
    document.querySelectorAll('.quota-option-card').forEach(card => {
        card.classList.remove('selected');
    });
}

/**
 * Função: updateTotal
 * Faz a matemática: Quantidade * 0.99 e atualiza o texto do botão
 * @param {number|null} priceOverride - (Opcional) Sobrescreve o cálculo
 */
function updateTotal(priceOverride = null) {
    const manualInput = document.getElementById('manualQty');
    const btnDisplay = document.getElementById('btnTotalDisplay');
    
    if(!manualInput || !btnDisplay) return;

    const qty = parseInt(manualInput.value) || 1;
    let total = 0;

    if (priceOverride !== null) {
        total = priceOverride;
    } else {
        // Cálculo padrão: Qtd * Preço Unitário
        total = qty * PRICE_PER_QUOTA;
    }

    // Formata para Dinheiro Brasileiro (R$ 0,00) e atualiza o botão
    btnDisplay.textContent = total.toLocaleString('pt-BR', { 
        style: 'currency', 
        currency: 'BRL' 
    });
}