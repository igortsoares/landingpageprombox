<!DOCTYPE html>
<html lang="pt-BR">
<!-- 
    CABEÇALHO DA PÁGINA (HEAD)
    Contém configurações invisíveis, títulos e links para recursos externos.
-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prombox | Prêmios e Sorteios</title>
    
    <!-- 1. Tailwind CSS (Framework Visual) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- 2. Font Awesome (Ícones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- 3. Google Fonts (Tipografia) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- 4. Nosso CSS Personalizado -->
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">

    <!-- 
        5. ANIMAÇÃO DA FAIXA (Fixada aqui para garantir funcionamento)
        Ajuste para Loop Infinito Sem Gaps
    -->
    <style>
        @keyframes marquee-scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); } /* Move apenas metade (tamanho de 1 bloco de conteúdo) */
        }
        
        .animate-marquee {
            display: flex; /* Garante que o gap funcione */
            width: max-content; /* Garante que a div tenha a largura total do conteúdo */
            white-space: nowrap;
            animation: marquee-scroll 50s linear infinite; /* Mais lento (50s) */
        }

        /* Pausa a animação quando passa o mouse */
        .marquee-container:hover .animate-marquee {
            animation-play-state: paused;
        }
    </style>
</head>

<!-- CORPO DA PÁGINA (BODY) -->
<body class="text-slate-800 antialiased flex flex-col min-h-screen bg-slate-50 font-['Inter']">

    <!-- 
        === HEADER (CABEÇALHO) ===
    -->
    <header class="bg-slate-900 text-white sticky top-0 z-50 shadow-lg">
        <div class="container mx-auto px-4 h-16 flex items-center justify-between">
            
            <!-- ESQUERDA: Botão Menu Mobile & Logo -->
            <div class="flex items-center gap-4">
                <button id="btn-menu-open" class="lg:hidden text-2xl text-white focus:outline-none">
                    <i class="fa-solid fa-bars"></i>
                </button>
                
                <a href="#" class="flex items-center gap-2 group">
                    <img src="./assets/images/logo_prombox.png" alt="Logo Prombox" class="h-10 w-auto object-contain hover:opacity-90 transition-opacity">
                </a>
            </div>

            <!-- CENTRO: Navegação Desktop -->
            <nav class="hidden lg:flex gap-8 text-sm font-medium items-center h-full">
                <a href="#" class="text-primary font-bold hover:text-white transition">Início</a>
                <a href="#resultados" class="hover:text-primary transition">Resultados</a>
                
                <!-- Item com Dropdown (Box Vantagens) -->
                <div class="relative group h-full flex items-center">
                    <a href="#" class="hover:text-primary transition flex items-center gap-1">
                        Box Vantagens 
                        <i class="fa-solid fa-chevron-down text-[10px] opacity-70 group-hover:text-primary"></i>
                    </a>
                    
                    <div class="absolute top-16 left-0 w-56 bg-white rounded-b-xl shadow-2xl py-2 hidden group-hover:block border-t-4 border-primary text-left animate-fade-in-up">
                        <a href="#faq" class="block px-6 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary transition border-b border-slate-50 last:border-0 font-normal">
                            Perguntas Frequentes
                        </a>
                        <a href="#termos" class="block px-6 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary transition border-b border-slate-50 last:border-0 font-normal">
                            Termos de Uso
                        </a>
                        <a href="#regulamento" class="block px-6 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary transition font-normal">
                            Regulamento
                        </a>
                    </div>
                </div>

                <a href="#clube" class="hover:text-primary transition">Clube Box</a>
                <a href="#contato" class="hover:text-primary transition">Contato</a>
            </nav>

            <!-- DIREITA: Ações de Usuário -->
            <div class="flex items-center gap-4">
                <a href="#" class="hidden lg:flex items-center gap-2 text-sm font-semibold hover:text-primary transition">
                    <i class="fa-solid fa-receipt"></i> Meus Números
                </a>
                
                <button id="btn-login-open" class="bg-primary hover:bg-teal-600 text-white px-5 py-2 rounded-full text-xs md:text-sm font-bold transition flex items-center gap-2 shadow-lg shadow-teal-900/20 transform hover:-translate-y-0.5">
                    <i class="fa-regular fa-user"></i>
                    <span>Entrar ou Cadastrar</span>
                </button>
            </div>
        </div>
    </header>

    <!-- 
        === FAIXA DE NOTÍCIAS (TICKER) ===
        Conteúdo duplicado para garantir loop infinito sem gaps
    -->
    <div class="marquee-container bg-[#94014B] text-white py-2 overflow-hidden relative z-40 shadow-md border-b border-pink-700">
        <!-- Adicionei 'padding-right' para manter o espaçamento no final do bloco -->
        <div class="animate-marquee font-bold text-xs md:text-sm uppercase tracking-wider flex items-center gap-12 pr-12">
            
            <!-- BLOCO 1 (Original) -->
            <span class="flex items-center gap-2">
                <i class="fa-solid fa-trophy text-yellow-300"></i> Ganhador de Ontem: João Silva (SP) - R$ 5.000,00
            </span>
            <span class="flex items-center gap-2">
                <i class="fa-solid fa-fire text-yellow-300"></i> Sorteio da Ranger Rover Velar: Faltam apenas 10% das cotas!
            </span>
            <span class="flex items-center gap-2">
                <i class="fa-solid fa-star text-yellow-300"></i> Entre no nosso Grupo VIP e receba ofertas exclusivas
            </span>
            <span class="flex items-center gap-2">
                <i class="fa-solid fa-clock text-yellow-300"></i> Próximo resultado pela Loteria Federal às 19:00h
            </span>
             <span class="flex items-center gap-2">
                <i class="fa-solid fa-trophy text-yellow-300"></i> Ganhador de Ontem: Maria Souza (MG) - IPHONE 15 PRO
            </span>

            <!-- BLOCO 2 (Cópia Exata para o Loop) -->
            <span class="flex items-center gap-2">
                <i class="fa-solid fa-trophy text-yellow-300"></i> Ganhador de Ontem: João Silva (SP) - R$ 5.000,00
            </span>
            <span class="flex items-center gap-2">
                <i class="fa-solid fa-fire text-yellow-300"></i> Sorteio da Ranger Rover Velar: Faltam apenas 10% das cotas!
            </span>
            <span class="flex items-center gap-2">
                <i class="fa-solid fa-star text-yellow-300"></i> Entre no nosso Grupo VIP e receba ofertas exclusivas
            </span>
            <span class="flex items-center gap-2">
                <i class="fa-solid fa-clock text-yellow-300"></i> Próximo resultado pela Loteria Federal às 19:00h
            </span>
             <span class="flex items-center gap-2">
                <i class="fa-solid fa-trophy text-yellow-300"></i> Ganhador de Ontem: Maria Souza (MG) - IPHONE 15 PRO
            </span>

        </div>
    </div>

    <!-- 
        === MENU LATERAL MOBILE (OFF-CANVAS) ===
    -->
    <div id="mobile-menu-overlay" class="fixed inset-0 bg-black/60 z-[60] hidden backdrop-blur-sm transition-opacity"></div>
    
    <aside id="mobile-menu" class="fixed top-0 left-0 bottom-0 w-[280px] bg-white z-[70] shadow-2xl flex flex-col transform -translate-x-full transition-transform duration-300 ease-in-out">
        <div class="bg-slate-900 p-6 text-white">
            <div class="flex justify-between items-start mb-4">
                <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-lg font-bold">
                    <i class="fa-solid fa-user"></i>
                </div>
                <button id="btn-menu-close" class="text-slate-400 hover:text-white"><i class="fa-solid fa-xmark text-xl"></i></button>
            </div>
            <h3 class="font-bold text-lg">Bem-vindo!</h3>
            <p class="text-xs text-slate-400 mb-3">Faça login para ver seus números.</p>
            <button class="w-full bg-primary text-white py-2 rounded font-bold text-sm btn-login-trigger">Entrar ou Cadastrar</button>
        </div>

        <nav class="flex-1 overflow-y-auto py-2">
            <a href="#" class="flex items-center gap-3 px-6 py-4 hover:bg-slate-50 border-b border-slate-100 text-slate-700 font-medium">
                <i class="fa-solid fa-house text-primary w-5"></i> Início
            </a>
            <a href="#resultados" class="flex items-center gap-3 px-6 py-4 hover:bg-slate-50 border-b border-slate-100 text-slate-700 font-medium">
                <i class="fa-solid fa-trophy text-primary w-5"></i> Resultados
            </a>
            
            <div class="border-b border-slate-100 pb-2">
                <div class="px-6 py-4 text-slate-700 font-bold flex items-center gap-3">
                    <i class="fa-solid fa-box-open text-primary w-5"></i> Box Vantagens
                </div>
                <div class="pl-14 pr-6 space-y-3">
                    <a href="#faq" class="block text-sm text-slate-500 hover:text-primary">Perguntas Frequentes</a>
                    <a href="#termos" class="block text-sm text-slate-500 hover:text-primary">Termos de Uso</a>
                    <a href="#regulamento" class="block text-sm text-slate-500 hover:text-primary">Regulamento</a>
                </div>
            </div>

            <a href="#clube" class="flex items-center gap-3 px-6 py-4 hover:bg-slate-50 border-b border-slate-100 text-slate-700 font-medium">
                <i class="fa-solid fa-crown text-primary w-5"></i> Clube Box
            </a>
            <a href="#contato" class="flex items-center gap-3 px-6 py-4 hover:bg-slate-50 border-b border-slate-100 text-slate-700 font-medium">
                <i class="fa-brands fa-whatsapp text-primary w-5"></i> Contato
            </a>
        </nav>
        
        <div class="p-4 bg-slate-50 text-center text-xs text-slate-400">
            <p>Prombox v1.0.0</p>
        </div>
    </aside>

    <!-- 
        === SEÇÃO HERO (BANNER DESTAQUE) ===
    -->
    <section class="relative bg-slate-900 group h-[400px]">
        <div class="absolute inset-0 bg-slate-800 overflow-hidden">
             <img src="https://images.unsplash.com/photo-1565514020176-db76595d6666?q=80&w=2070" 
                 class="w-full h-full object-cover opacity-60 group-hover:scale-105 transition duration-700" alt="Banner">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>
        </div>
        
        <div class="relative container mx-auto px-4 h-full flex flex-col justify-end pb-12 text-white">
            <span class="bg-yellow-500 text-black text-xs font-bold px-2 py-1 rounded mb-2 w-max uppercase">Destaque</span>
            <h2 class="text-3xl md:text-5xl font-black mb-2 shadow-black drop-shadow-lg">RANGER ROVER VELAR</h2>
            <p class="text-sm md:text-xl font-medium opacity-90 mb-4 shadow-black drop-shadow-md">Ou leve R$ 400.000,00 na conta!</p>
            <button class="bg-primary hover:bg-teal-500 text-white font-bold py-3 px-8 rounded-lg shadow-lg w-max transition transform hover:-translate-y-1">
                PARTICIPAR AGORA
            </button>
        </div>
    </section>

    <!-- 
        === SEÇÃO: GRID DE SORTEIOS ===
    -->
    <main id="sorteios" class="container mx-auto px-4 py-12">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-slate-800 border-l-4 border-primary pl-3">Sorteios Ativos</h2>
            <a href="#" class="text-sm font-bold text-primary hover:underline">Ver todos <i class="fa-solid fa-arrow-right ml-1"></i></a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- CARD DE SORTEIO (Exemplo) -->
            <div class="raffle-card bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden group cursor-pointer relative hover:-translate-y-1 transition-transform duration-300">
                <div class="absolute top-3 left-3 bg-red-500 text-white text-[10px] font-bold px-2 py-1 rounded shadow-sm animate-pulse">🔥 ÚLTIMAS COTAS</div>
                
                <div class="h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?q=80&w=800" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                
                <div class="p-5">
                    <h3 class="font-bold text-lg text-slate-800 leading-tight mb-1">Porsche 911 Carrera</h3>
                    <p class="text-xs text-slate-500 mb-4">Loteria Federal</p>
                    
                    <div class="w-full bg-slate-100 rounded-full h-2 mb-2 overflow-hidden">
                        <div class="bg-red-500 h-2 rounded-full" style="width: 92%"></div>
                    </div>
                    
                    <div class="flex justify-between items-center mt-4 pt-4 border-t border-slate-100">
                        <div>
                            <span class="block text-[10px] text-slate-400 uppercase">Por apenas</span>
                            <span class="text-xl font-black text-primary">R$ 0,10</span>
                        </div>
                        <button class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-green-700 transition">COMPRAR</button>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- 
        === MODAL DE LOGIN ===
    -->
    <div id="login-modal" class="fixed inset-0 z-[100] hidden">
        <div id="login-overlay" class="absolute inset-0 bg-black/80 backdrop-blur-sm"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white w-full max-w-sm rounded-2xl p-6 shadow-2xl animate-fade-in-up">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-xl text-slate-800">Acesse sua conta</h3>
                <button id="btn-login-close" class="text-slate-400 hover:text-slate-800"><i class="fa-solid fa-xmark text-xl"></i></button>
            </div>
            <form class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Telefone</label>
                    <input type="tel" placeholder="(00) 00000-0000" class="w-full bg-slate-50 border border-slate-300 rounded-lg py-3 px-4 font-medium outline-none focus:ring-2 focus:ring-primary">
                </div>
                <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-3 rounded-lg">ENTRAR</button>
            </form>
        </div>
    </div>

    <!-- Script Principal -->
    <script src="js/main.js"></script>
</body>
</html>