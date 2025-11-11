<?php
require "../backend/controllers/ProductController.php"; 
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
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <script src="../assets/js/app.js" defer></script>
    <link rel="stylesheet" href="../assets/site/style.css" />
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              "cake-red": "#e53935",
              "cake-cream": "#FFF5E6",
            },
            fontFamily: {
              'heading': ["Poppins", "sans-serif"],
              'sans': ["Inter", "sans-serif"],
            },
          },
        },
      };
    </script>
  </head>

  <body class="bg-gradient-to-br from-white via-white to-white font-sans">
    <?php include '../assets/includes/navbar.php'; ?>
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
          <h3 class="text-2xl font-heading font-bold text-gray-800">
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
                class="text-xl font-heading font-bold text-gray-800 mb-1"
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
            <h1 class="text-5xl font-heading font-bold text-gray-800 mb-2">
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
              <option value="asc">Mais baratos</option>
              <option value="desc">Mais caros</option>
            </select>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="catalogo">
          <?php if (!empty($produtos)): ?>
            <?php foreach ($produtos as $produto): ?>
              <?php if (strtolower($produto['status_produtos']) === 'ativo'): ?>
          <div
            class="produto group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transform hover:-translate-y-3 transition-all duration-500"
                  data-preco="<?= $produto['preco'] ?>"
                  data-id="<?= $produto['idproduto'] ?>"
          >
            <div class="relative overflow-hidden">
              <img
                      src="<?= !empty($produto['imagem_url']) ? htmlspecialchars($produto['imagem_url']) : 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=400&h=300&fit=crop' ?>"
                class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-700"
                      alt="<?= htmlspecialchars($produto['nome']) ?>"
                      onerror="this.src='https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=400&h=300&fit=crop'"
              />
              <div
                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"
              ></div>
                    <?php if ($produto['destaque'] == 1): ?>
              <div
                class="absolute top-4 right-4 bg-gradient-to-r from-cake-red to-red-400 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg"
              >
                Destaque
              </div>
                    <?php else: ?>
                      <div
                        class="absolute top-4 right-4 bg-gradient-to-r from-red-400 to-red-500 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg"
                      >
                        <?= ucfirst(htmlspecialchars($produto['categoria'])) ?>
              </div>
                    <?php endif; ?>
            </div>
            <div class="p-8">
              <h5
                class="text-2xl font-heading font-bold text-gray-800 mb-3 group-hover:text-red-500 transition-colors duration-300"
              >
                      <?= htmlspecialchars($produto['nome']) ?>
              </h5>
              <p class="text-gray-600 mb-4 leading-relaxed">
                      <?= htmlspecialchars($produto['descricao']) ?>
              </p>
              <div class="flex items-center justify-between">
                <p
                  class="text-2xl font-bold bg-gradient-to-r from-red-500 to-red-700 bg-clip-text text-transparent"
                >
                        R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                </p>
                <button
                  onclick="openModal(this)"
                  class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-4 py-2 rounded-full font-semibold transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl"
                >
                  <i class="bi bi-cart-plus mr-2"></i>Add ao carrinho
                </button>
              </div>
            </div>
          </div>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="col-span-full text-center py-16">
              <div class="bg-white rounded-3xl shadow-xl p-12">
                <svg class="mx-auto h-16 w-16 text-gray-400 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <h3 class="text-2xl font-heading font-bold text-gray-800 mb-4">
                  Nenhum produto disponível
                </h3>
                <p class="text-gray-600 text-lg mb-8">
                  Em breve teremos produtos incríveis para você!
                </p>
                <a
                  href="montebolo.php"
                  class="inline-block bg-gradient-to-r from-red-500 to-red-600 text-white px-8 py-4 rounded-full font-bold text-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300"
                >
                  Monte seu Bolo Personalizado
                </a>
              </div>
            </div>
          <?php endif; ?>
        </div>

        <div
          class="mt-20 text-center bg-gradient-to-r from-red-500 to-red-600 rounded-3xl p-12"
        >
          <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8">
            <h3 class="text-4xl font-heading font-bold text-white mb-4">
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
    <?php include '../assets/includes/footer.php'; ?>
    <button
      onclick="scrollToTop()"
      class="back-to-top fixed bottom-8 right-8 bg-gradient-to-r from-cake-pink to-orange-400 text-white p-4 rounded-full shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300 opacity-0"
    >
      <i class="bi bi-arrow-up-circle text-2xl"></i>
    </button>
  </body>
</html> 
