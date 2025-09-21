<?php
?>


<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carrinho - Lela Cakes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../site/style.css" />
    <script src="../js/app.js" defer></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              "cake-red": "#e53935",
              "cake-cream": "#FFF5E6",
            },
            fontFamily: {
              serif: ["Playfair Display", "serif"],
              sans: ["Inter", "sans-serif"],
            },
          },
        },
      };
    </script>
  </head>
  <body class="bg-gradient-to-br from-white via-white to-white-50 font-sans">
    <?php include '../includes/navbar.php'; ?>
    <main class="pt-28 pb-16">
      <div class="max-w-6xl mx-auto px-8">
        <div class="mb-12 text-center">
          <h1 class="text-5xl font-serif font-bold text-gray-800 mb-4">
            Meu Carrinho
          </h1>
          <div
            class="w-20 h-1 bg-gradient-to-r from-red-500 to-red-700 mx-auto"
          ></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
          <div class="lg:col-span-2 space-y-6">
            <div
              class="bg-white rounded-3xl shadow-xl p-6 transform hover:scale-[1.02] transition-all duration-300"
            >
              <div class="flex items-center space-x-6">
                <img
                  src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=120&h=120&fit=crop"
                  class="w-24 h-24 rounded-2xl object-cover shadow-lg"
                  alt="Bolo de Chocolate"
                />
                <div class="flex-1">
                  <h3 class="text-2xl font-serif font-bold text-gray-800 mb-2">
                    Bolo de Chocolate
                  </h3>
                  <p class="text-gray-600 mb-3">
                    Delicioso bolo com cobertura cremosa
                  </p>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                      <button
                        onclick="updateQuantity('item1', -1)"
                        class="w-10 h-10 rounded-full bg-red-100 hover:bg-red-200 flex items-center justify-center text-red-500 font-bold transition-all duration-300"
                      >
                        <i class="bi bi-dash"></i>
                      </button>
                      <span
                        id="qty-item1"
                        class="text-xl font-bold text-gray-800 min-w-8 text-center"
                        >2</span
                      >
                      <button
                        onclick="updateQuantity('item1', 1)"
                        class="w-10 h-10 rounded-full bg-red-100 hover:bg-red-200 flex items-center justify-center text-red-500 font-bold transition-all duration-300"
                      >
                        <i class="bi bi-plus"></i>
                      </button>
                    </div>
                    <div class="text-right">
                      <p class="text-3xl font-bold gradient-text">R$50</p>
                      <button
                        onclick="removeItem('item1')"
                        class="text-red-400 hover:text-red-600 text-sm mt-1 transition-colors duration-300"
                      >
                        <i class="bi bi-trash mr-1"></i> Remover
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="bg-white rounded-3xl shadow-xl p-6 transform hover:scale-[1.02] transition-all duration-300"
            >
              <div class="flex items-center space-x-6">
                <img
                  src="https://images.unsplash.com/photo-1607478900766-efe13248b125?w=120&h=120&fit=crop"
                  class="w-24 h-24 rounded-2xl object-cover shadow-lg"
                  alt="Bolo de Rolo"
                />
                <div class="flex-1">
                  <h3 class="text-2xl font-serif font-bold text-gray-800 mb-2">
                    Bolo de Rolo
                  </h3>
                  <p class="text-gray-600 mb-3">
                    Tradicional bolo nordestino com goiabada
                  </p>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                      <button
                        onclick="updateQuantity('item2', -1)"
                        class="w-10 h-10 rounded-full bg-red-100 hover:bg-red-200 flex items-center justify-center text-red-500 font-bold transition-all duration-300"
                      >
                        <i class="bi bi-dash"></i>
                      </button>
                      <span
                        id="qty-item2"
                        class="text-xl font-bold text-gray-800 min-w-8 text-center"
                        >1</span
                      >
                      <button
                        onclick="updateQuantity('item2', 1)"
                        class="w-10 h-10 rounded-full bg-red-100 hover:bg-red-200 flex items-center justify-center text-red-500 font-bold transition-all duration-300"
                      >
                        <i class="bi bi-plus"></i>
                      </button>
                    </div>
                    <div class="text-right">
                      <p class="text-3xl font-bold gradient-text">R$3</p>
                      <button
                        onclick="removeItem('item2')"
                        class="text-red-400 hover:text-red-600 text-sm mt-1 transition-colors duration-300"
                      >
                        <i class="bi bi-trash mr-1"></i> Remover
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="bg-white rounded-3xl shadow-xl p-6 transform hover:scale-[1.02] transition-all duration-300"
            >
              <div class="flex items-center space-x-6">
                <img
                  src="https://images.unsplash.com/photo-1558961363-fa8fdf82db35?w=120&h=120&fit=crop"
                  class="w-24 h-24 rounded-2xl object-cover shadow-lg"
                  alt="Docinhos"
                />
                <div class="flex-1">
                  <h3 class="text-2xl font-serif font-bold text-gray-800 mb-2">
                    Docinhos Variados
                  </h3>
                  <p class="text-gray-600 mb-3">
                    Brigadeiro, beijinho e surpresa de uva
                  </p>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                      <button
                        onclick="updateQuantity('item3', -1)"
                        class="w-10 h-10 rounded-full bg-red-100 hover:bg-red-200 flex items-center justify-center text-red-500 font-bold transition-all duration-300"
                      >
                        <i class="bi bi-dash"></i>
                      </button>
                      <span
                        id="qty-item3"
                        class="text-xl font-bold text-gray-800 min-w-8 text-center"
                        >3</span
                      >
                      <button
                        onclick="updateQuantity('item3', 1)"
                        class="w-10 h-10 rounded-full bg-red-100 hover:bg-red-200 flex items-center justify-center text-red-500 font-bold transition-all duration-300"
                      >
                        <i class="bi bi-plus"></i>
                      </button>
                    </div>
                    <div class="text-right">
                      <p class="text-3xl font-bold gradient-text">R$15</p>
                      <button
                        onclick="removeItem('item3')"
                        class="text-red-400 hover:text-red-600 text-sm mt-1 transition-colors duration-300"
                      >
                        <i class="bi bi-trash mr-1"></i> Remover
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center pt-6">
              <a
                href="catalogo.php"
                class="inline-flex items-center space-x-3 text-red-500 hover:text-red-600 font-semibold text-lg transition-all duration-300 hover:scale-105"
              >
                <i class="bi bi-arrow-left"></i>
                <span>Continue Comprando</span>
              </a>
            </div>
          </div>
          <div class="space-y-8">
            <div class="bg-white rounded-3xl shadow-xl p-8 sticky top-32">
              <h2
                class="text-3xl font-serif font-bold text-gray-800 mb-6 flex items-center"
              >
                <i class="bi bi-calculator text-red-500 mr-4"></i>
                Resumo
              </h2>
              <div class="space-y-4 mb-6">
                <div class="flex justify-between text-lg text-gray-600">
                  <span>Subtotal (6 itens):</span>
                  <span id="subtotal">R$68</span>
                </div>
                <div class="flex justify-between text-lg text-gray-600">
                  <span>Taxa de entrega:</span>
                  <span>R$5</span>
                </div>
                <div class="flex justify-between text-lg text-green-600">
                  <span>Desconto:</span>
                  <span>-R$3</span>
                </div>
              </div>
              <div class="border-t-2 border-gray-200 pt-6 mb-8">
                <div class="flex justify-between items-center">
                  <span class="text-2xl font-bold text-gray-800">Total:</span>
                  <span id="total" class="text-3xl font-bold gradient-text"
                    >R$70</span
                  >
                </div>
              </div>
              <button
                onclick="proceedCheckout()"
                class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white py-4 rounded-2xl font-bold text-xl transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl mb-4"
              >
                <i class="bi bi-credit-card mr-3"></i>
                Finalizar Compra
              </button>
              <div
                class="bg-gradient-to-r from-green-50 to-green-100 rounded-2xl p-4 text-center"
              >
                <div
                  class="flex items-center justify-center space-x-2 text-green-600"
                >
                  <i class="bi bi-shield-check text-xl"></i>
                  <span class="font-semibold">Compra 100% Segura</span>
                </div>
                <p class="text-green-600 text-sm mt-1">
                  SSL e dados protegidos
                </p>
              </div>
            </div>
          </div>
        </div>
        <div id="empty-cart" class="hidden text-center py-20">
          <div class="max-w-md mx-auto">
            <div
              class="w-32 h-32 bg-gradient-to-r from-red-100 to-red-200 rounded-full flex items-center justify-center mx-auto mb-8"
            >
              <i class="bi bi-cart-x text-6xl text-red-400"></i>
            </div>
            <h2 class="text-3xl font-serif font-bold text-gray-800 mb-4">
              Seu carrinho está vazio
            </h2>
            <p class="text-gray-600 mb-8 text-lg">
              Que tal dar uma olhada em nossos deliciosos bolos e doces?
            </p>
            <a
              href="catalogo.php"
              class="inline-block bg-gradient-to-r from-red-500 to-red-600 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:from-red-600 hover:to-red-700 transform hover:scale-105 transition-all duration-300 shadow-lg"
            >
              <i class="bi bi-shop mr-3"></i>
              Ver Catálogo
            </a>
          </div>
        </div>
      </div>
    </main>
    <footer class="bg-gradient-to-br from-white text-red py-16 mt-20">
      <div class="max-w-7xl mx-auto px-8">
        <div class="text-center">
          <div class="flex justify-center space-x-8 mb-8">
            <a
              href="#"
              class="bg-red bg-opacity-10 hover:bg-red-500 p-4 rounded-full text-2xl transition-all duration-300 hover:scale-110"
            >
              <i class="bi bi-facebook"></i>
            </a>
            <a
              href="#"
              class="bg-red bg-opacity-10 hover:bg-red-500 p-4 rounded-full text-2xl transition-all duration-300 hover:scale-110"
            >
              <i class="bi bi-instagram"></i>
            </a>
            <a
              href="#"
              class="bg-red bg-opacity-10 hover:bg-red-500 p-4 rounded-full text-2xl transition-all duration-300 hover:scale-110"
            >
              <i class="bi bi-whatsapp"></i>
            </a>
          </div>
          <p class="text-gray-400 text-lg">
            &copy; 2025 Lela Cakes. Todos os direitos reservados.
          </p>
        </div>
      </div>
    </footer>
  </body>
</html> 
