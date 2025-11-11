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
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="../assets/site/style.css" />
    <script src="../assets/js/app.js" defer></script>
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
  <body class="bg-gradient-to-br from-white via-white to-white-50 font-sans">
    <?php include '../assets/includes/navbar.php'; ?>
    <main class="pt-28 pb-16">
      <div class="max-w-6xl mx-auto px-8">
        <div class="mb-12 text-center">
          <h1 class="text-5xl font-heading font-bold text-gray-800 mb-4">
            Meu Carrinho
          </h1>
          <div
            class="w-20 h-1 bg-gradient-to-r from-red-500 to-red-700 mx-auto"
          ></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12" id="cart-grid">
          <div class="lg:col-span-2 space-y-6" id="cart-items-container">
            <!-- Itens do carrinho serão inseridos aqui dinamicamente -->
          </div>
          <div class="space-y-8">
            <div class="bg-white rounded-3xl shadow-xl p-8 sticky top-32">
              <h2
                class="text-3xl font-heading font-bold text-gray-800 mb-6 flex items-center"
              >
                <i class="bi bi-calculator text-red-500 mr-4"></i>
                Resumo
              </h2>
              <div class="space-y-4 mb-6">
                <div class="flex justify-between text-lg text-gray-600">
                  <span id="subtotal-label">Subtotal (0 itens):</span>
                  <span id="subtotal">R$ 0,00</span>
                </div>
              </div>
              <div class="border-t-2 border-gray-200 pt-6 mb-8">
                <div class="flex justify-between items-center">
                  <span class="text-2xl font-bold text-gray-800">Total:</span>
                  <span id="total" class="text-3xl font-bold bg-gradient-to-r from-red-500 to-red-700 bg-clip-text text-transparent"
                    >R$ 0,00</span
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
            <h2 class="text-3xl font-heading font-bold text-gray-800 mb-4">
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
      <?php include '../assets/includes/footer.php'; ?>
    </main>
  </body>
</html> 
