<!DOCTYPE html>
<html lang="pt-BR">
<!-- 
    INDEX.PHP - ESTRUTURA PRINCIPAL PROMBOX
    Correção: Uso de classes CSS padronizadas para cores
-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prombox | Prêmios e Sorteios</title>
    
    <!-- 1. Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- 2. Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- 3. Google Fonts (Inter) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- 4. CSS PERSONALIZADO -->
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
</head>

<body class="bg-slate-50 antialiased flex flex-col min-h-screen font-['Inter']">

    <!-- === HEADER (FIXO) === -->
    <header class="bg-prombox-dark text-white sticky top-0 z-50 shadow-lg h-20 flex items-center">
        <div class="container mx-auto px-4 flex items-center justify-between w-full">
            
            <!-- ESQUERDA: Menu Mobile e Logo -->
            <div class="flex items-center gap-4 shrink-0">
                <button id="btn-menu-open" class="lg:hidden text-2xl text-white hover:text-prombox-yellow transition">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <a href="#" class="flex items-center">
                    <img src="./assets/images/logo_prombox.png" alt="Logo Prombox" class="h-10 md:h-12 w-auto object-contain hover:opacity-90 transition">
                </a>
            </div>

            <!-- CENTRO: Navegação Desktop -->
            <nav class="hidden lg:flex gap-8 items-center h-full justify-center flex-1 mx-4">
                <a href="#" class="nav-link active">Início</a>
                <a href="#resultados" class="nav-link">Resultados</a>
                
                <!-- Dropdown -->
                <div class="relative group h-full flex items-center">
                    <a href="#" class="nav-link flex items-center gap-1 py-6">
                        Box Vantagens 
                        <i class="fa-solid fa-chevron-down text-[10px] opacity-70 group-hover:text-yellow-400"></i>
                    </a>
                    <div class="dropdown-menu absolute top-full left-0 w-56 bg-white shadow-xl py-2 hidden group-hover:block rounded-b-lg animate-fade-in text-gray-800">
                        <a href="#faq" class="block px-6 py-3 hover:bg-slate-50 hover:text-prombox-pink transition font-medium text-sm">Perguntas Frequentes</a>
                        <a href="#termos" class="block px-6 py-3 hover:bg-slate-50 hover:text-prombox-pink transition font-medium text-sm">Termos de Uso</a>
                        <a href="#regulamento" class="block px-6 py-3 hover:bg-slate-50 hover:text-prombox-pink transition font-medium text-sm">Regulamento</a>
                    </div>
                </div>

                <a href="#clube" class="nav-link">Clube Box</a>
                <a href="#contato" class="nav-link">Contato</a>
            </nav>

            <!-- DIREITA: Botões -->
            <div class="flex items-center gap-4 shrink-0">
                <a href="#" class="hidden lg:flex items-center gap-2 text-sm font-semibold hover:text-yellow-400 transition text-white">
                    <i class="fa-solid fa-receipt"></i> Meus Números
                </a>
                <button id="btn-login-open" class="btn-primary-prombox px-4 md:px-6 py-2.5 rounded-full text-xs md:text-sm font-bold flex items-center gap-2">
                    <i class="fa-regular fa-user"></i>
                    <span>Entrar ou Cadastrar</span>
                </button>
            </div>
        </div>
    </header>

    <!-- === TICKER (Faixa de Notícias) === -->
    <div class="prombox-ticker-container">
        <div class="prombox-ticker-wrapper">
            <div class="flex items-center">
                <span class="ticker-item"><i class="fa-solid fa-trophy text-yellow-300"></i> Ganhador de Ontem: João Silva (SP) - R$ 5.000,00</span>
                <span class="ticker-item"><i class="fa-solid fa-fire text-yellow-300"></i> Sorteio da Ranger Rover: Últimas cotas!</span>
                <span class="ticker-item"><i class="fa-solid fa-star text-yellow-300"></i> Entre no Grupo VIP e receba ofertas</span>
                <span class="ticker-item"><i class="fa-solid fa-clock text-yellow-300"></i> Resultado pela Loteria Federal às 19h</span>
            </div>
            <!-- Duplicata para Loop -->
            <div class="flex items-center">
                <span class="ticker-item"><i class="fa-solid fa-trophy text-yellow-300"></i> Ganhador de Ontem: João Silva (SP) - R$ 5.000,00</span>
                <span class="ticker-item"><i class="fa-solid fa-fire text-yellow-300"></i> Sorteio da Ranger Rover: Últimas cotas!</span>
                <span class="ticker-item"><i class="fa-solid fa-star text-yellow-300"></i> Entre no Grupo VIP e receba ofertas</span>
                <span class="ticker-item"><i class="fa-solid fa-clock text-yellow-300"></i> Resultado pela Loteria Federal às 19h</span>
            </div>
        </div>
    </div>

    <!-- === SEÇÃO 1: BANNER E SELEÇÃO DE COTAS === -->
    <main class="py-8 md:py-12 bg-slate-50 relative z-10">
        <div class="container mx-auto px-4">
            
            <!-- 1. Banner Central -->
            <div class="w-full md:w-2/4 max-w-3xl mx-auto mb-8 md:mb-12">
                <div class="relative group rounded-2xl overflow-hidden shadow-2xl border-4 border-white transform transition duration-500 hover:scale-[1.01]">
                    <img src="./assets/images/banner_central.jpeg" 
                         alt="Sorteio Principal Prombox" 
                         class="w-full h-auto object-cover min-h-[200px] bg-slate-200"
                         onerror="this.src='https://placehold.co/1200x400/700138/white?text=Banner+Prombox';">
                    
                    <!-- Badge -->
                    <div class="absolute top-4 right-4 bg-prombox-yellow text-slate-900 font-black px-4 py-1 rounded-full shadow-lg text-xs md:text-sm animate-bounce">
                        🔥 CORRE QUE TÁ ACABANDO!
                    </div>
                </div>
            </div>

            <!-- 2. Área de Compra (Seleção de Cotas) -->
            <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
                
                <div class="bg-prombox-dark p-6 text-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-prombox-pink opacity-10"></div>
                    <h2 class="text-xl md:text-2xl font-bold text-white relative z-10">
                        ⚡ Escolha seus números da sorte
                    </h2>
                    <p class="text-slate-400 text-sm mt-1 relative z-10">Por apenas <span class="text-prombox-yellow font-bold text-lg">R$ 0,99</span> cada</p>
                </div>

                <div class="p-6 md:p-8">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 text-center">Pacotes Promocionais</p>
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                        <div onclick="selectQuota(5, 4.95)" class="quota-option-card group cursor-pointer border-2 border-slate-100 rounded-xl p-4 text-center transition-all duration-300 hover:border-prombox-pink hover:shadow-lg relative overflow-hidden bg-slate-50">
                            <span class="block text-2xl font-black text-slate-700 group-hover:text-prombox-pink transition-colors">+05</span>
                            <span class="text-[10px] text-slate-500 font-bold uppercase">Cotas</span>
                            <div class="absolute bottom-0 left-0 right-0 h-1 bg-prombox-pink transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                        </div>

                        <div onclick="selectQuota(10, 9.90)" class="quota-option-card cursor-pointer border-2 border-prombox-yellow bg-yellow-50/50 rounded-xl p-4 text-center transition-all duration-300 hover:shadow-lg relative overflow-hidden transform hover:-translate-y-1">
                            <div class="absolute top-0 right-0 bg-prombox-yellow text-[9px] font-bold px-2 py-0.5 text-slate-900 rounded-bl-lg">POPULAR</div>
                            <span class="block text-2xl font-black text-slate-800">+10</span>
                            <span class="text-[10px] text-slate-600 font-bold uppercase">Cotas</span>
                        </div>

                        <div onclick="selectQuota(50, 49.50)" class="quota-option-card group cursor-pointer border-2 border-slate-100 rounded-xl p-4 text-center transition-all duration-300 hover:border-prombox-pink hover:shadow-lg relative overflow-hidden bg-slate-50">
                            <span class="block text-2xl font-black text-slate-700 group-hover:text-prombox-pink transition-colors">+50</span>
                            <span class="text-[10px] text-slate-500 font-bold uppercase">Cotas</span>
                            <div class="absolute bottom-0 left-0 right-0 h-1 bg-prombox-pink transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                        </div>

                        <div onclick="selectQuota(100, 99.00)" class="quota-option-card group cursor-pointer border-2 border-slate-100 rounded-xl p-4 text-center transition-all duration-300 hover:border-prombox-pink hover:shadow-lg relative overflow-hidden bg-slate-50">
                            <span class="block text-2xl font-black text-slate-700 group-hover:text-prombox-pink transition-colors">+100</span>
                            <span class="text-[10px] text-slate-500 font-bold uppercase">Cotas</span>
                            <div class="absolute bottom-0 left-0 right-0 h-1 bg-prombox-pink transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                        </div>
                    </div>

                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200 flex flex-col md:flex-row items-center justify-between gap-6">
                        
                        <div class="flex items-center gap-4 w-full md:w-auto justify-center">
                            <button onclick="adjustManual(-1)" class="w-10 h-10 rounded-full bg-white border border-slate-300 text-slate-500 hover:text-prombox-pink hover:border-prombox-pink transition font-bold flex items-center justify-center shadow-sm">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <div class="text-center">
                                <input type="number" id="manualQty" value="1" class="w-20 text-center font-black text-2xl text-slate-800 bg-transparent border-none focus:ring-0 p-0" onchange="updateTotal()">
                                <span class="block text-[10px] text-slate-400 font-bold uppercase mt-[-4px]">Cotas</span>
                            </div>
                            <button onclick="adjustManual(1)" class="w-10 h-10 rounded-full bg-white border border-slate-300 text-slate-500 hover:text-prombox-pink hover:border-prombox-pink transition font-bold flex items-center justify-center shadow-sm">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>

                        <button class="w-full md:flex-1 bg-green-600 hover:bg-green-700 text-white font-bold text-lg py-4 px-6 rounded-xl shadow-lg hover:shadow-green-500/30 transition transform hover:-translate-y-1 flex items-center justify-center gap-3 group">
                            <span>PARTICIPAR</span>
                            <span class="bg-white/20 px-2 py-0.5 rounded text-sm group-hover:bg-white/30 transition" id="btnTotalDisplay">R$ 0,99</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>

                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- === MENU MOBILE (OFF-CANVAS) === -->
    <div id="mobile-menu-overlay" class="fixed inset-0 bg-black/60 z-[60] hidden backdrop-blur-sm transition-opacity"></div>
    <aside id="mobile-menu" class="fixed top-0 left-0 bottom-0 w-[280px] bg-white z-[70] shadow-2xl flex flex-col transform -translate-x-full transition-transform duration-300">
        <div class="bg-prombox-dark p-6 text-white relative">
            <button id="btn-menu-close" class="absolute top-4 right-4 text-slate-400 hover:text-white"><i class="fa-solid fa-xmark text-xl"></i></button>
            <div class="w-12 h-12 bg-prombox-pink rounded-full flex items-center justify-center text-xl font-bold mb-3 shadow-lg"><i class="fa-solid fa-user"></i></div>
            <h3 class="font-bold text-lg">Bem-vindo!</h3>
            <p class="text-xs text-slate-400 mb-3">Acesse sua conta para ver seus jogos.</p>
            <button class="w-full btn-primary-prombox py-2 rounded-lg font-bold text-sm btn-login-trigger">Entrar ou Cadastrar</button>
        </div>
        <nav class="flex-1 overflow-y-auto py-2">
            <a href="#" class="flex items-center gap-3 px-6 py-4 hover:bg-slate-50 border-b border-slate-100 text-prombox-pink font-bold"><i class="fa-solid fa-house w-5 text-center"></i> Início</a>
            <a href="#resultados" class="flex items-center gap-3 px-6 py-4 hover:bg-slate-50 border-b border-slate-100 text-slate-700 font-medium hover:text-prombox-pink"><i class="fa-solid fa-trophy w-5 text-center text-slate-400"></i> Resultados</a>
            <div class="border-b border-slate-100 pb-2 bg-slate-50/50">
                <div class="px-6 py-4 text-slate-800 font-bold flex items-center gap-3"><i class="fa-solid fa-box-open w-5 text-center text-slate-400"></i> Box Vantagens</div>
                <div class="pl-14 pr-6 space-y-3 pb-2">
                    <a href="#faq" class="block text-sm text-slate-500 hover:text-prombox-pink">Perguntas Frequentes</a>
                    <a href="#termos" class="block text-sm text-slate-500 hover:text-prombox-pink">Termos de Uso</a>
                    <a href="#regulamento" class="block text-sm text-slate-500 hover:text-prombox-pink">Regulamento</a>
                </div>
            </div>
            <a href="#clube" class="flex items-center gap-3 px-6 py-4 hover:bg-slate-50 border-b border-slate-100 text-slate-700 font-medium hover:text-prombox-pink"><i class="fa-solid fa-crown w-5 text-center text-slate-400"></i> Clube Box</a>
            <a href="#contato" class="flex items-center gap-3 px-6 py-4 hover:bg-slate-50 border-b border-slate-100 text-slate-700 font-medium hover:text-prombox-pink"><i class="fa-brands fa-whatsapp w-5 text-center text-slate-400"></i> Contato</a>
        </nav>
        <div class="p-4 bg-slate-50 text-center text-[10px] text-slate-400">&copy; 2024 Prombox.</div>
    </aside>

    <!-- === MODAL DE LOGIN === -->
    <div id="login-modal" class="fixed inset-0 z-[100] hidden">
        <div id="login-overlay" class="absolute inset-0 bg-black/80 backdrop-blur-sm cursor-pointer"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white w-full max-w-sm rounded-2xl p-6 shadow-2xl animate-fade-in">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-xl text-slate-800">Acesse sua conta</h3>
                <button id="btn-login-close" class="text-slate-400 hover:text-slate-800"><i class="fa-solid fa-xmark text-xl"></i></button>
            </div>
            <form class="space-y-4" onsubmit="event.preventDefault(); alert('Backend Login');">
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Telefone</label>
                    <input type="tel" placeholder="(00) 00000-0000" class="w-full bg-slate-50 border border-slate-300 rounded-lg py-3 px-4 font-medium outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition">
                </div>
                <button type="submit" class="w-full btn-primary-prombox py-3 rounded-lg font-bold shadow-lg">ENTRAR</button>
            </form>
        </div>
    </div>

    <!-- Script -->
    <script src="js/main.js"></script>
</body>
</html>