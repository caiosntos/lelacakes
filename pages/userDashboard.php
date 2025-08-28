<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Conta - Lela Cakes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../site/style.css">
    <script src="../js/app.js" defer></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'cake-pink': '#FF6B9D',
                        'cake-cream': '#FFF5E6',
                        'cake-brown': '#8B4513',
                        'cake-gold': '#FFD700'
                    },
                    fontFamily: {
                        'serif': ['Playfair Display', 'serif'],
                        'sans': ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gradient-to-br from-white via-white to-white font-sans">
    <nav class="fixed w-full top-0 z-50 bg-white border-b border-gray-200 shadow-lgs">
        <div class="max-w-7xl mx-auto px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center">
                    <a href="../index.php" class="flex items-center space-x-3 text-3xl font-bold">
                        <i class="bi bi-cake2 text-4xl text-red-500"></i>
                        <span class="font-serif bg-gradient-to-r from-red-500 to-red-700 to-cake-gold bg-clip-text text-transparent">Lela Cakes</span>
                    </a>
                </div>
                <div class="flex items-center space-x-8">
                    <a href="../index.php" class="text-gray-700 hover:text-red-500 px-4 py-2 rounded-xl text-lg font-medium transition-all duration-300 hover:bg-white hover:shadow-md">Início</a>
                    <a href="catalogo.php" class="text-gray-700 hover:text-red-500 px-4 py-2 rounded-xl text-lg font-medium transition-all duration-300 hover:bg-white hover:shadow-md">Catálogo</a>
                    <a href="montebolo.php" class="text-gray-700 hover:text-red-500 px-4 py-2 rounded-xl text-lg font-medium transition-all duration-300 hover:bg-white hover:shadow-md">Monte seu Bolo</a>
                    <div class="text-gray-700 hover:text-cake-red p-2 rounded-xl transition-all duration-300 hover:bg-white/70 relative">
                        <a href="checkout.php" class="bi bi-cart text-2xl relative">
                            <span id="cart-count" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center hidden">0</span>
                        </a>
                    </div>
                 <div class="relative">
                        <button id="userMenuButton" class="text-gray-700 hover:text-red-500 p-2 rounded-xl transition-all duration-300 hover:bg-white/70 bi bi-person text-2xl"></button>
                        <div id="userDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50 hidden">
                            <a href="userDashboard.php" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-red-500 transition-colors">
                                <i class="bi bi-person-circle mr-3"></i>
                                Minha conta
                            </a>
                            <button onclick="logout()" class="flex items-center w-full px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-red-500 transition-colors">
                                <i class="bi bi-box-arrow-right mr-3"></i>
                                Sair
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="pt-20 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto p-8">
            <div class="flex gap-8">
                <div class="w-80 bg-white rounded-2xl shadow-lg p-6 h-fit">
                    <div class="flex items-center mb-6 pb-4 border-b border-gray-100">
                        <i class="bi bi-arrow-left text-xl text-gray-600 mr-3 cursor-pointer hover:text-red-500 transition-colors"></i>
                        <h1 class="text-xl font-semibold text-gray-800">Minha conta</h1>
                    </div>
                    
                    <nav class="space-y-2">
                        <a href="#" class="flex items-center p-3 rounded-xl bg-red-50 text-red-600 border-l-4 border-red-500 hover:bg-red-100 transition-colors">
                            <i class="bi bi-person-badge w-5 h-5 mr-3"></i>
                            <span class="font-medium">Meu Cadastro</span>
                        </a>
                        <a href="#" class="flex items-center p-3 rounded-xl text-red-700 hover:bg-red-50 hover:text-red-500 transition-colors">
                            <i class="bi bi-bag w-5 h-5 mr-3"></i>
                            <span>Meus pedidos</span>
                        </a>
                        <a href="#" class="flex items-center p-3 rounded-xl text-red-700 hover:bg-red-50 hover:text-red-500 transition-colors relative">
                            <i class="bi bi-geo-alt w-5 h-5 mr-3"></i>
                            <span>Meu endereço</span>
                        </a>
                        <a href="#" class="flex items-center p-3 rounded-xl text-red-700 hover:bg-red-50 hover:text-red-500 transition-colors">
                            <i class="bi bi-box-arrow-right w-5 h-5 mr-3"></i>
                            <span>Sair</span>
                        </a>
                    </nav>
                </div>

                <div class="flex-1 bg-white rounded-2xl shadow-lg p-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-8">Meu cadastro - Conta Pessoal</h2>
                    
                    <form class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nome completo</label>
                            <input 
                                type="text" 
                                value="CAIO GIOVANI SANTOS MADUREIRA" 
                                class="w-full p-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                                readonly
                            >
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Data de nascimento</label>
                                <input 
                                    type="text" 
                                    value="XXXXXXXX" 
                                    class="w-full p-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                                    readonly
                                >
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">CPF</label>
                                <input 
                                    type="text" 
                                    value="XXXXXXXX" 
                                    class="w-full p-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                                    readonly
                                >
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">RG</label>
                                <input 
                                    type="text" 
                                    value="0.000.000-0" 
                                    class="w-full p-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                                    readonly
                                >
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">E-mail</label>
                                <input 
                                    type="email" 
                                    value="XXXXXXXX" 
                                    class="w-full p-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                                    readonly
                                >
                                <button type="button" class="text-red-500 text-sm hover:text-red-600 transition-colors mt-1">
                                    Alterar e-mail
                                </button>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Telefone</label>
                                <input 
                                    type="tel" 
                                    value="XXXXXXXX" 
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                                >
                            </div>
                        </div>

                        <div>
                        <div class="flex justify-end space-x-4 pt-6">
                            <button 
                                type="button" 
                                class="px-6 py-3 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors font-medium">
                                Excluir minha conta
                            </button>
                            <button 
                                type="submit" 
                                class="px-8 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors font-medium shadow-lg">
                                SALVAR
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
