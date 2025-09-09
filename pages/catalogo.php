<?php
session_start();
?>


<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catálogo - Lela Cakes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />
    <script src="../js/app.js" defer></script>
    <link rel="stylesheet" href="../site/site.css" />
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

  <body class="bg-gradient-to-br from-white via-white to-white font-sans">
    <?php include '../includes/navbar.php'; ?>
    <div
      id="cart-modal"
      class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[100] hidden items-center justify-center"
    >
      <div
        class="bg-white rounded-3xl shadow-2xl max-w-md w-full mx-4 transform scale-95 transition-all duration-300"
      >
        <div
          class="flex items-center justify-between p-6 border-b border-gray-200"
        >
          <h3 class="text-2xl font-serif font-bold text-gray-800">
            Adicionar ao Carrinho
          </h3>
          <button
            onclick="closeModal()"
            class="text-gray-400 hover:text-gray-600 text-2xl transition-colors duration-300"
          >
            <i class="bi bi-x-lg"></i>
          </button>
        </div>
        <div class="p-6">
          <div class="flex items-center space-x-4 mb-6">
            <img
              id="modal-image"
              src=""
              alt=""
              class="w-20 h-20 rounded-2xl object-cover"
            />
            <div>
              <h4
                id="modal-title"
                class="text-xl font-serif font-bold text-gray-800 mb-1"
              ></h4>
              <p id="modal-description" class="text-gray-600 text-sm"></p>
            </div>
          </div>
          <div
            class="bg-gradient-to-r from-red-50 to-red-100 rounded-2xl p-4 mb-6"
          >
            <div class="flex items-center justify-between">
              <span class="text-gray-700 font-medium">Preço unitário:</span>
              <span
                id="modal-price"
                class="text-2xl font-bold bg-gradient-to-r from-red-500 to-red-700 bg-clip-text text-transparent"
              ></span>
            </div>
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-3"
              >Quantidade:</label
            >
            <div class="flex items-center justify-center space-x-4">
              <button
                onclick="decreaseQuantity()"
                class="w-10 h-10 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center text-xl font-bold transition-all duration-300"
              >
                <i class="bi bi-dash"></i>
              </button>
              <input
                type="number"
                id="quantity"
                value="1"
                min="1"
                max="99"
                class="w-16 text-center text-xl font-bold border-2 border-gray-200 rounded-xl py-2 focus:border-red-500 focus:outline-none transition-all duration-300"
              />
              <button
                onclick="increaseQuantity()"
                class="w-10 h-10 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center text-xl font-bold transition-all duration-300"
              >
                <i class="bi bi-plus"></i>
              </button>
            </div>
          </div>
          <div
            class="bg-gradient-to-r from-red-500 to-red-600 rounded-2xl p-4 mb-6"
          >
            <div class="flex items-center justify-between text-white">
              <span class="text-lg font-semibold">Total:</span>
              <span id="modal-total" class="text-2xl font-bold"></span>
            </div>
          </div>
          <div class="flex space-x-3">
            <button
              onclick="closeModal()"
              class="flex-1 bg-gray-200 text-gray-700 py-3 rounded-xl font-semibold hover:bg-gray-300 transition-all duration-300"
            >
              Cancelar
            </button>
            <button
              onclick="addToCart()"
              class="flex-1 bg-gradient-to-r from-red-500 to-red-600 text-white py-3 rounded-xl font-semibold hover:from-red-600 hover:to-red-700 transform hover:scale-105 transition-all duration-300"
            >
              <i class="bi bi-cart-plus mr-2"></i>
              Adicionar
            </button>
          </div>
        </div>
      </div>
    </div>

    <main class="pt-28 pb-16">
      <div class="max-w-7xl mx-auto px-8">
        <nav class="mb-8" aria-label="breadcrumb">
          <ol class="flex items-center space-x-2 text-sm">
            <li>
              <a
                href="../index.php"
                class="text-gray-500 hover:text-red-500 transition-colors duration-300 uppercase tracking-wide font-medium"
                >Página Principal</a
              >
            </li>
            <li class="text-gray-400">
              <i class="bi bi-chevron-right"></i>
            </li>
            <li
              class="text-cake-black uppercase tracking-wide font-medium"
              aria-current="page"
            >
              Catálogo
            </li>
          </ol>
        </nav>
        <div
          class="flex justify-between items-center mb-12 pb-6 border-b-2 border-gradient-to-r from-cake-pink/20 to-cake-gold/20"
        >
          <div>
            <h1 class="text-5xl font-serif font-bold text-gray-800 mb-2">
              Catálogo Pronta Entrega
            </h1>
            <div
              class="w-20 h-1 bg-gradient-to-r from-red-500 to-red-700"
            ></div>
          </div>
          <div
            class="flex items-center space-x-4 bg-white/70 backdrop-blur-sm rounded-2xl px-6 py-4 shadow-lg"
          >
            <label
              for="ordenar"
              class="text-gray-700 font-semibold uppercase tracking-wide text-sm"
              >Ordenar por:</label
            >
            <select
              id="ordenar"
              class="bg-transparent border-2 border-gray-200 rounded-xl px-4 py-2 text-gray-700 font-medium focus:border-cake-pink focus:outline-none transition-all duration-300 cursor-pointer hover:border-cake-pink/50"
              onchange="ordenarProdutos(this.value)"
            >
              <option value="novidades">Novidades</option>
              <option value="asc">Mais baratos</option>
              <option value="desc">Mais caros</option>
            </select>
          </div>
        </div>

        <div class="grid grid-cols-3 gap-8" id="catalogo">
          <div
            class="produto group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transform hover:-translate-y-3 transition-all duration-500"
            data-preco="25"
          >
            <div class="relative overflow-hidden">
              <img
                src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=400&h=300&fit=crop"
                class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-700"
                alt="Bolo de Chocolate"
              />
              <div
                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"
              ></div>
              <div
                class="absolute top-4 right-4 bg-gradient-to-r from-cake-red to-red-400 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg"
              >
                Destaque
              </div>
            </div>
            <div class="p-8">
              <h5
                class="text-2xl font-serif font-bold text-gray-800 mb-3 group-hover:text-red-500 transition-colors duration-300"
              >
                Bolo de chocolate
              </h5>
              <p class="text-gray-600 mb-4 leading-relaxed">
                Bolo com cobertura e recheio de chocolate cremoso e irresistível
              </p>
              <div class="flex items-center justify-between">
                <p
                  class="text-3xl font-bold bg-gradient-to-r from-red-500 to-red-700 bg-clip-text text-transparent"
                >
                  R$25
                </p>
                <button
                  onclick="openModal(this)"
                  class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-3 rounded-full font-semibold transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl"
                >
                  <i class="bi bi-cart-plus mr-2"></i>Add to Cart
                </button>
              </div>
            </div>
          </div>
          <div
            class="produto group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transform hover:-translate-y-3 transition-all duration-500"
            data-preco="3"
          >
            <div class="relative overflow-hidden">
              <img
                src="https://images.unsplash.com/photo-1607478900766-efe13248b125?w=400&h=300&fit=crop"
                class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-700"
                alt="Bolo de rolo"
              />
              <div
                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"
              ></div>
              <div
                class="absolute top-4 right-4 bg-gradient-to-r from-green-400 to-green-500 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg"
              >
                Tradicional
              </div>
            </div>
            <div class="p-8">
              <h5
                class="text-2xl font-serif font-bold text-gray-800 mb-3 group-hover:text-red-500 transition-colors duration-300"
              >
                Bolo de rolo
              </h5>
              <p class="text-gray-600 mb-4 leading-relaxed">
                Bolo típico nordestino com doce de goiaba artesanal
              </p>
              <div class="flex items-center justify-between">
                <p
                  class="text-3xl font-bold bg-gradient-to-r from-red-500 to-red-700 bg-clip-text text-transparent"
                >
                  R$3
                </p>
                <button
                  onclick="openModal(this)"
                  class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-3 rounded-full font-semibold transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl"
                >
                  <i class="bi bi-cart-plus mr-2"></i>Add to Cart
                </button>
              </div>
            </div>
          </div>
          <div
            class="produto group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transform hover:-translate-y-3 transition-all duration-500"
            data-preco="5"
          >
            <div class="relative overflow-hidden">
              <img
                src="https://images.unsplash.com/photo-1558961363-fa8fdf82db35?w=400&h=300&fit=crop"
                class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-700"
                alt="Docinhos"
              />
              <div
                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"
              ></div>
              <div
                class="absolute top-4 right-4 bg-gradient-to-r from-purple-400 to-purple-500 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg"
              >
                Variados
              </div>
            </div>
            <div class="p-8">
              <h5
                class="text-2xl font-serif font-bold text-gray-800 mb-3 group-hover:text-red-500 transition-colors duration-300"
              >
                Docinhos
              </h5>
              <p class="text-gray-600 mb-4 leading-relaxed">
                Brigadeiros, beijinho, surpresa de uva e outros deliciosos doces
              </p>
              <div class="flex items-center justify-between">
                <p
                  class="text-3xl font-bold bg-gradient-to-r from-red-500 to-red-700 bg-clip-text text-transparent"
                >
                  R$5
                </p>
                <button
                  onclick="openModal(this)"
                  class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-3 rounded-full font-semibold transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl"
                >
                  <i class="bi bi-cart-plus mr-2"></i>Add to Cart
                </button>
              </div>
            </div>
          </div>
        </div>

        <div
          class="mt-20 text-center bg-gradient-to-r from-red-500 to-red-600 rounded-3xl p-12"
        >
          <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8">
            <h3 class="text-4xl font-serif font-bold text-white mb-4">
              Não encontrou o que procura?
            </h3>
            <p class="text-white/90 text-xl mb-8 leading-relaxed">
              Monte seu bolo personalizado ou entre em contato para pedidos
              especiais!
            </p>
            <div class="flex justify-center space-x-6">
              <a
                href="montebolo.php"
                class="bg-white text-red-500 px-8 py-4 rounded-full font-bold text-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300"
                >Monte seu Bolo</a
              >
              <a
                href="#"
                class="border-2 border-white text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-red-500 transition-all duration-300"
                >Entre em Contato</a
              >
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer class="bg-gradient-to-br from-white text-red py-16">
      <div class="max-w-7xl mx-auto px-8">
        <div class="text-center">
          <div class="flex justify-center space-x-8 mb-8">
            <a
              href="https://www.facebook.com"
              target="_blank"
              class="bg-red bg-opacity-10 hover:bg-red-500 p-4 rounded-full text-2xl transition-all duration-300 hover:scale-110"
            >
              <i class="bi bi-facebook"></i>
            </a>
            <a
              href="https://www.twitter.com"
              target="_blank"
              class="bg-red bg-opacity-10 hover:bg-red-500 p-4 rounded-full text-2xl transition-all duration-300 hover:scale-110"
            >
              <i class="bi bi-twitter"></i>
            </a>
            <a
              href="https://www.instagram.com"
              target="_blank"
              class="bg-red bg-opacity-10 hover:bg-red-500 p-4 rounded-full text-2xl transition-all duration-300 hover:scale-110"
            >
              <i class="bi bi-instagram"></i>
            </a>
            <a
              href="https://www.linkedin.com"
              target="_blank"
              class="bg-red bg-opacity-10 hover:bg-red-500 p-4 rounded-full text-2xl transition-all duration-300 hover:scale-110"
            >
              <i class="bi bi-linkedin"></i>
            </a>
          </div>
          <p class="text-gray-400 text-lg">
            &copy; 2025 Lela Cakes. Todos os direitos reservados.
          </p>
        </div>
      </div>
    </footer>

    <button
      onclick="scrollToTop()"
      class="back-to-top fixed bottom-8 right-8 bg-gradient-to-r from-cake-pink to-orange-400 text-white p-4 rounded-full shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300 opacity-0"
    >
      <i class="bi bi-arrow-up-circle text-2xl"></i>
    </button>
  </body>
</html> 
