<?php
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
    <script src="../js/app.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../site/style.css" />
    <script>
      // JavaScript para o dropdown do usuário
      document.addEventListener('DOMContentLoaded', function() {
        const userMenuButton = document.getElementById('userMenuButton');
        const userDropdown = document.getElementById('userDropdown');
        
        if (userMenuButton && userDropdown) {
          userMenuButton.addEventListener('click', function(e) {
            e.stopPropagation();
            userDropdown.classList.toggle('hidden');
          });
          
          document.addEventListener('click', function(e) {
            if (!userMenuButton.contains(e.target) && !userDropdown.contains(e.target)) {
              userDropdown.classList.add('hidden');
            }
          });
        }
      });
    </script>
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

  <body class="bg-gradient-to-br from-orange-50 via-white to-pink-50 font-sans">
    <?php include('../includes/navbar.php'); ?>
    
    <div class="pt-24 pb-16">
      <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-12">
          <h1 class="text-6xl font-heading font-bold text-gray-800 mb-4">
            Monte Seu Bolo
          </h1>
          <div
            class="w-32 h-1 bg-gradient-to-r from-red-500 to-red-400 mx-auto mb-6"
          ></div>
          <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Crie o bolo perfeito para sua ocasião especial. Personalize cada
            detalhe e surpreenda a todos!
          </p>
        </div>
        <div class="flex justify-center mb-12">
          <div class="flex items-center space-x-4">
            <div
              class="step-indicator active flex items-center justify-center w-12 h-12 rounded-full font-bold text-lg"
            >
              1
            </div>
            <div class="w-16 h-1 bg-gray-300"></div>
            <div
              class="step-indicator flex items-center justify-center w-12 h-12 rounded-full font-bold text-lg bg-gray-300"
            >
              2
            </div>
            <div class="w-16 h-1 bg-gray-300"></div>
            <div
              class="step-indicator flex items-center justify-center w-12 h-12 rounded-full font-bold text-lg bg-gray-300"
            >
              3
            </div>
            <div class="w-16 h-1 bg-gray-300"></div>
            <div
              class="step-indicator flex items-center justify-center w-12 h-12 rounded-full font-bold text-lg bg-gray-300"
            >
              4
            </div>
          </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
          <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-3xl shadow-xl p-8">
              <div class="flex items-center mb-6">
                <div
                  class="bg-red-500 text-white rounded-full w-10 h-10 flex items-center justify-center font-bold text-lg mr-4"
                >
                  1
                </div>
                <h2 class="text-3xl font-heading font-bold text-gray-800">
                  Escolha o Sabor do Bolo
                </h2>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div
                  class="option-card bg-white border-2 border-gray-200 rounded-xl p-6 text-center selected"
                  onclick="selectOption(this, 'sabor', 'chocolate')"
                >
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Chocolate
                  </h3>
                  <p class="text-gray-600 text-sm">
                    Massa de chocolate com cacau premium
                  </p>
                  <div
                    class="mt-3 text-xs text-gray-500 uppercase tracking-wide"
                  >
                    Tradicional
                  </div>
                </div>
                <div
                  class="option-card bg-white border-2 border-gray-200 rounded-xl p-6 text-center"
                  onclick="selectOption(this, 'sabor', 'morango')"
                >
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Morango
                  </h3>
                  <p class="text-gray-600 text-sm">
                    Massa suave com essência de morango
                  </p>
                  <div
                    class="mt-3 text-xs text-gray-500 uppercase tracking-wide"
                  >
                    Frutado
                  </div>
                </div>
                <div
                  class="option-card bg-white border-2 border-gray-200 rounded-xl p-6 text-center"
                  onclick="selectOption(this, 'sabor', 'redvelvet')"
                >
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Red Velvet
                  </h3>
                  <p class="text-gray-600 text-sm">
                    Massa aveludada com toque de cacau
                  </p>
                  <div
                    class="mt-3 text-xs text-gray-500 uppercase tracking-wide"
                  >
                    Premium
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-white rounded-3xl shadow-xl p-8">
              <div class="flex items-center mb-6">
                <div
                  class="bg-gray-300 text-gray-600 rounded-full w-10 h-10 flex items-center justify-center font-bold text-lg mr-4"
                >
                  2
                </div>
                <h2 class="text-3xl font-heading font-bold text-gray-400">
                  Recheio
                </h2>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-3 gap-4 opacity-50">
                <div
                  class="option-card bg-white border-2 border-gray-200 rounded-xl p-6 text-center"
                >
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Brigadeiro
                  </h3>
                  <p class="text-gray-600 text-sm">
                    Creme de chocolate brasileiro tradicional
                  </p>
                  <div
                    class="mt-3 text-xs text-gray-500 uppercase tracking-wide"
                  >
                    Clássico
                  </div>
                </div>
                <div
                  class="option-card bg-white border-2 border-gray-200 rounded-xl p-6 text-center"
                >
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Prestígio
                  </h3>
                  <p class="text-gray-600 text-sm">
                    Coco fresco com chocolate belga
                  </p>
                  <div
                    class="mt-3 text-xs text-gray-500 uppercase tracking-wide"
                  >
                    Especial
                  </div>
                </div>
                <div
                  class="option-card bg-white border-2 border-gray-200 rounded-xl p-6 text-center"
                >
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Ganache
                  </h3>
                  <p class="text-gray-600 text-sm">
                    Chocolate meio amargo com creme
                  </p>
                  <div
                    class="mt-3 text-xs text-gray-500 uppercase tracking-wide"
                  >
                    Premium
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-white rounded-3xl shadow-xl p-8">
              <div class="flex items-center mb-6">
                <div
                  class="bg-gray-300 text-gray-600 rounded-full w-10 h-10 flex items-center justify-center font-bold text-lg mr-4"
                >
                  3
                </div>
                <h2 class="text-3xl font-heading font-bold text-gray-400">
                  Topo
                </h2>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-3 gap-4 opacity-50">
                <div
                  class="option-card bg-white border-2 border-gray-200 rounded-xl p-6 text-center"
                >
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Flores
                  </h3>
                  <p class="text-gray-600 text-sm">
                    Decoração floral em pasta americana
                  </p>
                  <div
                    class="mt-3 text-xs text-gray-500 uppercase tracking-wide"
                  >
                    Elegante
                  </div>
                </div>
                <div
                  class="option-card bg-white border-2 border-gray-200 rounded-xl p-6 text-center"
                >
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Frutas
                  </h3>
                  <p class="text-gray-600 text-sm">
                    Frutas frescas selecionadas
                  </p>
                  <div
                    class="mt-3 text-xs text-gray-500 uppercase tracking-wide"
                  >
                    Natural
                  </div>
                </div>
                <div
                  class="option-card bg-white border-2 border-gray-200 rounded-xl p-6 text-center"
                >
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Nozes
                  </h3>
                  <p class="text-gray-600 text-sm">
                    Mix de nozes e castanhas premium
                  </p>
                  <div
                    class="mt-3 text-xs text-gray-500 uppercase tracking-wide"
                  >
                    Gourmet
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-white rounded-3xl shadow-xl p-8">
              <div class="flex items-center mb-6">
                <div
                  class="bg-gray-300 text-gray-600 rounded-full w-10 h-10 flex items-center justify-center font-bold text-lg mr-4"
                >
                  4
                </div>
                <h2 class="text-3xl font-heading font-bold text-gray-400">
                  Decoração
                </h2>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-3 gap-4 opacity-50">
                <div
                  class="option-card bg-white border-2 border-gray-200 rounded-xl p-6 text-center"
                >
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Flores Comestíveis
                  </h3>
                  <p class="text-gray-600 text-sm">
                    Decoração com flores naturais comestíveis
                  </p>
                  <div
                    class="mt-3 text-xs text-gray-500 uppercase tracking-wide"
                  >
                    Artesanal
                  </div>
                </div>
                <div
                  class="option-card bg-white border-2 border-gray-200 rounded-xl p-6 text-center"
                >
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Customizado
                  </h3>
                  <p class="text-gray-600 text-sm">
                    Decoração personalizada conforme tema
                  </p>
                  <div
                    class="mt-3 text-xs text-gray-500 uppercase tracking-wide"
                  >
                    Exclusivo
                  </div>
                </div>
                <div
                  class="option-card bg-white border-2 border-gray-200 rounded-xl p-6 text-center"
                >
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Chantilly
                  </h3>
                  <p class="text-gray-600 text-sm">
                    Cobertura clássica de chantilly tradicional
                  </p>
                  <div
                    class="mt-3 text-xs text-gray-500 uppercase tracking-wide"
                  >
                    Tradicional
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="lg:col-span-1">
            <div class="bg-white rounded-3xl shadow-xl p-8 sticky top-32">
              <h3
                class="text-2xl font-heading font-bold text-gray-800 mb-6 text-center"
              >
                Seu Bolo Customizado
              </h3>

              <div class="space-y-4 mb-8">
                <div
                  class="flex justify-between items-center py-3 border-b border-gray-100"
                >
                  <span class="text-gray-600">Sabor:</span>
                  <span class="font-semibold text-gray-800" id="selected-sabor"
                    >Chocolate</span
                  >
                </div>
                <div
                  class="flex justify-between items-center py-3 border-b border-gray-100"
                >
                  <span class="text-gray-600">Recheio:</span>
                  <span
                    class="font-semibold text-gray-400"
                    id="selected-recheio"
                    >Não selecionado</span
                  >
                </div>
                <div
                  class="flex justify-between items-center py-3 border-b border-gray-100"
                >
                  <span class="text-gray-600">Topo:</span>
                  <span class="font-semibold text-gray-400" id="selected-topo"
                    >Não selecionado</span
                  >
                </div>
                <div
                  class="flex justify-between items-center py-3 border-b border-gray-100"
                >
                  <span class="text-gray-600">Decoração:</span>
                  <span
                    class="font-semibold text-gray-400"
                    id="selected-decoracao"
                    >Não selecionado</span
                  >
                </div>
              </div>
              <div class="text-center">
                <button
                  type="button"
                  id="btnPedido"
                  onclick="realizarPedido()"
                  class="w-full bg-gradient-to-r from-red-500 to-red-600 text-white px-8 py-4 rounded-full text-xl font-bold hover:shadow-xl transform hover:scale-105 transition-all duration-300 hover:from-red-600 hover:to-red-700 mb-4"
                >
                  Realizar Pedido
                </button>
                <p class="text-sm text-gray-500" id="statusPedido">
                  Complete todas as etapas para finalizar
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>