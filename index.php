<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lela Cakes - A melhor confeitaria de Joinville</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="js/app.js" defer></script>
    <link rel="stylesheet" href="site/style.css">
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

<body class="bg-gradient-to-br from-orange-50 via-white to-pink-50 font-sans">
    <nav class="fixed w-full top-0 z-50 bg-white border-b border-gray-200 shadow-lg">
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex items-center">
                <a href="index.php" class="flex items-center space-x-3 text-3xl font-bold">
                    <i class="bi bi-cake2 text-4xl text-red-500"></i>
                    <span class="font-serif gradient-text">Lela Cakes</span>
                </a>
            </div>
            
                <div class="flex items-center space-x-8">
                <a href="index.php" class="text-gray-700 hover:text-red-500 px-4 py-2 rounded-xl text-lg font-medium transition-all duration-300 hover:bg-white hover:shadow-md">Início</a>
                <a href="pages/catalogo.php" class="text-gray-700 hover:text-red-500 px-4 py-2 rounded-xl text-lg font-medium transition-all duration-300 hover:bg-white hover:shadow-md">Catálogo</a>
                <a href="pages/montebolo.php" class="text-gray-700 hover:text-red-500 px-4 py-2 rounded-xl text-lg font-medium transition-all duration-300 hover:bg-white hover:shadow-md">Monte seu Bolo</a>
                <a href="pages/login.php" class="bg-gradient-to-r from-red-500 to-red-600 text-white px-8 py-3 rounded-full font-semibold hover:shadow-xl transform hover:scale-105 transition-all duration-300 hover:from-red-600 hover:to-red-700">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="relative h-screen overflow-hidden mt-20">
        <div id="carousel" class="flex h-full carousel-container">
            <div class="min-w-full h-full relative">
                <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=1920&h=1080&fit=crop" 
                     class="absolute inset-0 w-full h-full object-cover"
                     alt="Lela Cakes Hero">
                <div class="absolute inset-0 bg-gradient-to-r from-black via-black to-transparent opacity-70"></div>
                <div class="relative z-10 flex items-center h-full">
                    <div class="max-w-7xl mx-auto px-8">
                        <div class="text-left text-white max-w-2xl">
                            <h1 class="text-7xl font-serif font-bold mb-6 leading-tight">
                                <span class="block">Lela</span>
                                <span class="block text-red-500">Cakes</span>
                            </h1>
                            <p class="text-2xl mb-8 text-gray-200 leading-relaxed">A melhor confeitaria de Joinville e Região!</p>
                            <a href="#" class="inline-block bg-gradient-to-r from-red-500 to-red-600 text-white px-10 py-4 rounded-full text-xl font-semibold hover:shadow-2xl transform hover:scale-105 transition-all duration-300 hover:from-red-600 hover:to-red-700">
                                Peça já!
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="min-w-full h-full relative">
                <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307?w=1920&h=1080&fit=crop" 
                     class="absolute inset-0 w-full h-full object-cover"
                     alt="Docinhos">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black to-transparent opacity-70"></div>
                <div class="relative z-10 flex items-center justify-center h-full">
                    <div class="text-center text-white max-w-3xl px-8">
                        <h1 class="text-6xl font-serif font-bold mb-6 text-shadow-lg">
                            Docinhos e muito mais!
                        </h1>
                        <a href="#" class="inline-block bg-gradient-to-r from-red-500 to-red-600 text-white px-10 py-4 rounded-full text-xl font-semibold hover:shadow-2xl transform hover:scale-105 transition-all duration-300 hover:from-red-600 hover:to-red-700 mt-4">
                            Confira
                        </a>
                    </div>
                </div>
            </div>
            <div class="min-w-full h-full relative">
                <img src="https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=1920&h=1080&fit=crop" 
                     class="absolute inset-0 w-full h-full object-cover"
                     alt="Bolos especiais">
                <div class="absolute inset-0 bg-gradient-to-l from-black via-black to-transparent opacity-70"></div>
                <div class="relative z-10 flex items-center justify-end h-full">
                    <div class="text-right text-white max-w-2xl px-8">
                        <h1 class="text-6xl font-serif font-bold mb-6 text-shadow-lg">
                            Sabores únicos para momentos especiais
                        </h1>
                        <p class="text-xl text-gray-200 mb-8">Criamos experiências doces inesquecíveis para suas celebrações mais importantes.</p>
                    </div>
                </div>
            </div>
        </div>
        <button onclick="prevSlide()" class="absolute left-8 top-1/2 transform -translate-y-1/2 glass text-white rounded-full p-4 transition-all duration-300 hover:bg-white hover:text-gray-800">
            <i class="bi bi-chevron-left text-2xl"></i>
        </button>
        <button onclick="nextSlide()" class="absolute right-8 top-1/2 transform -translate-y-1/2 glass text-white rounded-full p-4 transition-all duration-300 hover:bg-white hover:text-gray-800">
            <i class="bi bi-chevron-right text-2xl"></i>
        </button>
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3">
            <button onclick="goToSlide(0)" class="indicator w-4 h-4 rounded-full bg-white transition-all duration-300"></button>
            <button onclick="goToSlide(1)" class="indicator w-4 h-4 rounded-full bg-white opacity-50 transition-all duration-300"></button>
            <button onclick="goToSlide(2)" class="indicator w-4 h-4 rounded-full bg-white opacity-50 transition-all duration-300"></button>
        </div>
    </div>
    <section class="py-20 bg-gradient-to-b from-white to-orange-50">
        <div class="max-w-7xl mx-auto px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-serif font-bold text-gray-800 mb-4">Nossos Destaques</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-red-500 to-red-400 mx-auto"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                <div class="product-card group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-500">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=400&h=320&fit=crop" 
                             class="w-full h-80 object-cover transition-transform duration-500"
                             alt="Bolo de Chocolate">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-8 text-center">
                        <h3 class="text-2xl font-serif font-bold text-gray-800 mb-4">Bolo de Chocolate</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Irresistível bolo de chocolate com cobertura cremosa que derrete na boca. Perfeito para qualquer ocasião especial.</p>
                        <a href="#" class="inline-block bg-gradient-to-r from-red-600 to-red-700 text-white px-8 py-3 rounded-full font-medium hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                            Conheça →
                        </a>
                    </div>
                </div>
                <div class="product-card group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-500">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=400&h=320&fit=crop" 
                             class="w-full h-80 object-cover transition-transform duration-500"
                             alt="Bolo de Rolo">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-8 text-center">
                        <h3 class="text-2xl font-serif font-bold text-gray-800 mb-4">Bolo de Rolo</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Tradicional bolo de rolo pernambucano com doce de goiaba caseiro. Uma explosão de sabor em cada fatia.</p>
                        <a href="#" class="inline-block bg-gradient-to-r from-red-600 to-red-700 text-white px-8 py-3 rounded-full font-medium hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                            Conheça →
                        </a>
                    </div>
                </div>
                <div class="product-card group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-500">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307?w=400&h=320&fit=crop" 
                             class="w-full h-80 object-cover transition-transform duration-500"
                             alt="Docinhos">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-8 text-center">
                        <h3 class="text-2xl font-serif font-bold text-gray-800 mb-4">Docinhos</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Deliciosos docinhos artesanais feitos com muito carinho. Ideais para festas e comemorações especiais.</p>
                        <a href="#" class="inline-block bg-gradient-to-r from-red-600 to-red-700 text-white px-8 py-3 rounded-full font-medium hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                            Conheça →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20 bg-gradient-to-r from-red-400 via-red-600 to-red-700">
        <div class="max-w-4xl mx-auto text-center px-8">
            <div class="glass rounded-3xl p-12 shadow-2xl">
                <h2 class="text-5xl font-serif font-bold text-white mb-6">Monte também seu orçamento</h2>
                <p class="text-xl text-white mb-8 leading-relaxed opacity-90">Monte também seu orçamento para casamentos, aniversários e festas. Transformamos seus sonhos doces em realidade!</p>
                <a href="pages/montebolo.php" class="inline-block bg-white text-red-500 px-12 py-4 rounded-full text-xl font-bold hover:shadow-xl transform hover:scale-105 transition-all duration-300 hover:bg-gray-50">
                    Solicitar Pedido
                </a>
            </div>
        </div>
    </section>
    <footer class="bg-gradient-to-br from-white text-red py-16">
        <div class="max-w-7xl mx-auto px-8">
            <div class="text-center">
                <div class="flex justify-center space-x-8 mb-8">
                    <a href="https://www.facebook.com" target="_blank" class="bg-red bg-opacity-10 hover:bg-red-500 p-4 rounded-full text-2xl transition-all duration-300 hover:scale-110">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://www.twitter.com" target="_blank" class="bg-red bg-opacity-10 hover:bg-red-500 p-4 rounded-full text-2xl transition-all duration-300 hover:scale-110">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com" target="_blank" class="bg-red bg-opacity-10 hover:bg-red-500 p-4 rounded-full text-2xl transition-all duration-300 hover:scale-110">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://www.linkedin.com" target="_blank" class="bg-red bg-opacity-10 hover:bg-red-500 p-4 rounded-full text-2xl transition-all duration-300 hover:scale-110">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>
                <p class="text-gray-400 text-lg">&copy; 2025 Lela Cakes. Todos os direitos reservados.</p>
                <button onclick="scrollToTop()" class="back-to-top fixed bottom-8 right-8 bg-gradient-to-r from-red-500 to-red-400 text-white p-4 rounded-full shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300">
                    <i class="bi bi-arrow-up-circle text-2xl"></i>
                </button>
            </div>
        </div>
    </footer>
</body>
</html>