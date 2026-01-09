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

    console.log("Prombox JS Carregado v2.2 - Com Calculadora");
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
    
    // Remove a seleção visual dos "pacotes" (já que agora é um valor manual)
    document.querySelectorAll('.quota-option-card').forEach(card => {
        card.classList.remove('selected');
    });
}

/**
 * Função: selectQuota
 * Chamada ao clicar nos cards de pacotes (05, 10, 50, 100 cotas)
 * @param {number} qty - Quantidade do pacote
 * @param {number} fixedPrice - (Opcional) Preço fixo se tiver desconto
 */
function selectQuota(qty, fixedPrice = null) {
    const manualInput = document.getElementById('manualQty');
    
    if(manualInput) {
        manualInput.value = qty;
        // Se foi passado um preço fixo, usamos ele, senão recalcula
        updateTotal(fixedPrice);
    }

    // Atualiza visualmente qual card está selecionado
    document.querySelectorAll('.quota-option-card').forEach(card => {
        card.classList.remove('selected');
        
        // Verifica se o texto do card bate com a quantidade clicada
        // Ex: Pega "+05", remove o "+", vira 5.
        const cardText = card.querySelector('span').innerText.replace('+', '');
        const cardQty = parseInt(cardText);
        
        if(cardQty === qty) {
            card.classList.add('selected');
        }
    });
}

/**
 * Função: updateTotal
 * Faz a matemática: Quantidade * 0.99 e atualiza o texto do botão
 * @param {number|null} priceOverride - Se fornecido, usa esse preço em vez de calcular
 */
function updateTotal(priceOverride = null) {
    const manualInput = document.getElementById('manualQty');
    const btnDisplay = document.getElementById('btnTotalDisplay');
    
    if(!manualInput || !btnDisplay) return;

    const qty = parseInt(manualInput.value) || 1;
    let total = 0;

    if (priceOverride !== null) {
        // Se veio um preço pronto do pacote, usa ele
        total = priceOverride;
    } else {
        // Senão, calcula: Quantidade * R$ 0,99
        total = qty * PRICE_PER_QUOTA;
    }

    // Formata para Dinheiro Brasileiro (R$ 0,00) e atualiza o botão
    btnDisplay.textContent = total.toLocaleString('pt-BR', { 
        style: 'currency', 
        currency: 'BRL' 
    });
}