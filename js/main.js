/*
    Aguardamos o carregamento completo do DOM (Document Object Model)
    antes de rodar o script. Isso evita erros de "elemento não encontrado".
*/
document.addEventListener('DOMContentLoaded', () => {
    
    // ==========================================
    // 1. CONTROLE DO MENU MOBILE (OFF-CANVAS)
    // ==========================================
    
    // Seleção dos elementos do DOM pelo ID
    const btnMenuOpen = document.getElementById('btn-menu-open');     // Botão Hamburguer
    const btnMenuClose = document.getElementById('btn-menu-close');   // Botão 'X' dentro do menu
    const mobileMenu = document.getElementById('mobile-menu');        // O container do menu
    const mobileOverlay = document.getElementById('mobile-menu-overlay'); // O fundo escuro

    /**
     * Função: toggleMenu
     * Responsável por abrir ou fechar o menu lateral.
     * Adiciona/Remove a classe CSS 'open' e mostra/esconde o overlay.
     */
    function toggleMenu() {
        // Verifica se o menu já está aberto
        const isOpen = mobileMenu.classList.contains('open');
        
        if (isOpen) {
            // Se estiver aberto, fecha
            mobileMenu.classList.remove('open');
            mobileOverlay.classList.add('hidden');
        } else {
            // Se estiver fechado, abre
            mobileMenu.classList.add('open');
            mobileOverlay.classList.remove('hidden');
        }
    }

    // Adiciona os ouvintes de evento (Listeners) aos botões
    // O 'if' garante que o código não quebre se o elemento não existir na página
    if(btnMenuOpen) btnMenuOpen.addEventListener('click', toggleMenu);
    if(btnMenuClose) btnMenuClose.addEventListener('click', toggleMenu);
    
    // Permite fechar o menu clicando na parte escura (Overlay)
    if(mobileOverlay) mobileOverlay.addEventListener('click', toggleMenu);


    // ==========================================
    // 2. CONTROLE DO MODAL DE LOGIN
    // ==========================================
    
    const loginModal = document.getElementById('login-modal');
    const btnLoginOpen = document.getElementById('btn-login-open'); // Botão no Header Desktop
    const btnLoginClose = document.getElementById('btn-login-close'); // Botão 'X' do Modal
    const loginOverlay = document.getElementById('login-overlay');    // Fundo escuro do Modal
    
    // Seleciona TODOS os botões que devem abrir o login (ex: dentro do menu mobile)
    const mobileLoginTriggers = document.querySelectorAll('.btn-login-trigger');

    /**
     * Função: toggleLogin
     * Alterna a visibilidade do modal de login.
     * Também verifica se o menu mobile está aberto e o fecha para evitar sobreposição.
     */
    function toggleLogin() {
        // A classe 'hidden' é utilitária do Tailwind (display: none)
        loginModal.classList.toggle('hidden');
        
        // Se o menu lateral estiver aberto quando o usuário tentar logar, fechamos o menu
        if (mobileMenu && mobileMenu.classList.contains('open')) {
            toggleMenu();
        }
    }

    // Event Listeners para o Login
    if(btnLoginOpen) btnLoginOpen.addEventListener('click', toggleLogin);
    if(btnLoginClose) btnLoginClose.addEventListener('click', toggleLogin);
    if(loginOverlay) loginOverlay.addEventListener('click', toggleLogin);
    
    // Adiciona o evento de clique para cada botão de login encontrado no menu mobile
    mobileLoginTriggers.forEach(btn => {
        btn.addEventListener('click', toggleLogin);
    });

    // Log de confirmação para o desenvolvedor ver no Console do navegador (F12)
    console.log("Sistema Prombox Frontend Carregado com Sucesso ✅");
});