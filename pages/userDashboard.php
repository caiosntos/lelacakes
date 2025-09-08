<?php
session_start();
include '../includes/navbar.php';
?>


<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />  
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Minha Conta - Lela Cakes</title>
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
  <body class="bg-gradient-to-br from-white via-white to-white font-sans">
    <nav
      class="fixed w-full top-0 z-50 bg-white border-b border-gray-200 shadow-lg"
    >
      <div class="max-w-7xl mx-auto px-8">
        <div class="flex justify-between items-center h-20">
          <div class="flex items-center">
            <a
              href="../index.php"
              class="flex items-center space-x-3 text-3xl font-bold"
            >
              <i class="bi bi-cake2 text-4xl text-red-500"></i>
              <span
                class="font-serif bg-gradient-to-r from-red-500 to-red-700 to-cake-gold bg-clip-text text-transparent"
                >Lela Cakes</span
              >
            </a>
          </div>
          <div class="flex items-center space-x-8">
            <a
              href="../index.php"
              class="text-gray-700 hover:text-red-500 px-4 py-2 rounded-xl text-lg font-medium transition-all duration-300 hover:bg-white hover:shadow-md"
              >Início</a
            >
            <a
              href="catalogo.php"
              class="text-gray-700 hover:text-red-500 px-4 py-2 rounded-xl text-lg font-medium transition-all duration-300 hover:bg-white hover:shadow-md"
              >Catálogo</a
            >
            <a
              href="montebolo.php"
              class="text-gray-700 hover:text-red-500 px-4 py-2 rounded-xl text-lg font-medium transition-all duration-300 hover:bg-white hover:shadow-md"
              >Monte seu Bolo</a
            >
            <div
              class="text-gray-700 hover:text-cake-red p-2 rounded-xl transition-all duration-300 hover:bg-white/70 relative"
            >
              <a href="checkout.php" class="bi bi-cart text-2xl relative">
                <span
                  id="cart-count"
                  class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center hidden"
                  >0</span
                >
              </a>
            </div>
            <div class="relative">
              <button
                id="userMenuButton"
                class="text-gray-700 hover:text-red-500 p-2 rounded-xl transition-all duration-300 hover:bg-white/70 bi bi-person text-2xl"
              ></button>
              <div
                id="userDropdown"
                class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50 hidden"
              >
                <a
                 href="<?php
                    if(isset($_SESSION['role'])){
                      if($_SESSION['role'] === 'admin'){
                        echo 'admin.php';
                      }else{
                        echo 'userDashboard.php';
                      }
                    } else {
                        echo 'login.php';
                      }
                      ?>"
                  class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-red-500 transition-colors"
                >
                  <i class="bi bi-person-circle mr-3"></i>
                  Minha conta
                </a>
                <button
                  onclick="window.location.href='../backend/controllers/logout.php'"
                  class="flex items-center w-full px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-red-500 transition-colors"
                >
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
              <i
                class="bi bi-arrow-left text-xl text-gray-600 mr-3 cursor-pointer hover:text-red-500 transition-colors"
              ></i>
              <h1 class="text-xl font-semibold text-gray-800">Minha conta</h1>
            </div>

            <nav class="space-y-2">
              <button
                onclick="showSection('cadastro')"
                id="nav-cadastro"
                class="w-full flex items-center p-3 rounded-xl bg-red-50 text-red-600 border-l-4 border-red-500 hover:bg-red-100 transition-colors"
              >
                <i class="bi bi-person-badge w-5 h-5 mr-3"></i>
                <span class="font-medium">Meu Cadastro</span>
              </button>
              <button
                onclick="showSection('pedidos')"
                id="nav-pedidos"
                class="w-full flex items-center p-3 rounded-xl text-red-700 hover:bg-red-50 hover:text-red-500 transition-colors"
              >
                <i class="bi bi-bag w-5 h-5 mr-3"></i>
                <span>Meus pedidos</span>
              </button>
              <button
                onclick="showSection('endereco')"
                id="nav-endereco"
                class="w-full flex items-center p-3 rounded-xl text-red-700 hover:bg-red-50 hover:text-red-500 transition-colors"
              >
                <i class="bi bi-geo-alt w-5 h-5 mr-3"></i>
                <span>Meu endereço</span>
              </button>
              <button
                onclick="window.location.href='../backend/controllers/logout.php'"
                class="w-full flex items-center p-3 rounded-xl text-red-700 hover:bg-red-50 hover:text-red-500 transition-colors"
              >
                <i class="bi bi-box-arrow-right w-5 h-5 mr-3"></i>
                <span>Sair</span>
              </button>
            </nav>
          </div>
          <div class="flex-1 bg-white rounded-2xl shadow-lg p-8">
            <div id="section-cadastro" class="section-content">
              <h2 class="text-xl font-semibold text-gray-800 mb-8">
                Meu cadastro - Conta Pessoal
              </h2>
              <form class="space-y-6">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2"
                    >Nome completo</label
                  >
                  <input
                    type="text"
                    value="<?php echo htmlspecialchars($_SESSION['usuario']['nome'] ?? ''); ?>"
                    class="w-full p-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                    readonly
                  />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"
                      >CPF</label
                    >
                    <input
                      type="text"
                      value="<?php echo htmlspecialchars($_SESSION['usuario']['cpf'] ?? ''); ?>"
                      class="w-full p-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                      readonly
                    />
                  </div> 
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"
                      >E-mail</label
                    >
                    <input
                      type="email"
                      value="<?php echo htmlspecialchars($_SESSION['usuario']['email'] ?? ''); ?>"
                      class="w-full p-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                      readonly
                    />
                    <button
                      type="button"
                      class="text-red-500 text-sm hover:text-red-600 transition-colors mt-1"
                    >
                      Alterar e-mail
                    </button>
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"
                      >Telefone</label
                    >
                    <input
                      type="tel"
                      id="telefone"
                      value="<?php echo htmlspecialchars($_SESSION['usuario']['telefone'] ?? ''); ?>"
                      class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                    />
                  </div>
                </div>
                <div class="flex justify-end space-x-4 pt-6">
                  <button
                    type="button"
                    class="px-6 py-3 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors font-medium"
                  >
                    Excluir minha conta
                  </button>
                  <button
                    type="submit"
                    class="px-8 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors font-medium shadow-lg"
                  >
                    SALVAR
                  </button>
                  </div>
                </form>
            </div>

            <div id="section-pedidos" class="section-content hidden">
              <h2 class="text-xl font-semibold text-gray-800 mb-8">
                Meus Pedidos
              </h2>

              <div class="mb-6 flex flex-wrap gap-4">
                <select
                  id="ordenarP"
                  onchange="filtrarPorStatus(this.value)"
                  class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none"
                >
                  <option value="todos">Todos os pedidos</option>
                  <option value="em-preparo">Em preparo</option>
                  <option value="entregues">Entregues</option>
                  <option value="cancelados">Cancelados</option>
                </select>
                <input
                  type="date"
                  class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none"
                />
              </div>
              <div class="space-y-4">
                <div
                  class="border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow"
                >
                  <div class="flex justify-between items-start mb-4">
                    <div>
                      <h3 class="font-semibold text-gray-800">Pedido #12345</h3>
                      <p class="text-sm text-gray-600">
                        Realizado em 15/12/2024
                      </p>
                    </div>
                    <span
                      class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium"
                      >Entregue</span
                    >
                  </div>

                  <div class="flex items-center mb-4">
                    <img src="" alt="Bolo" class="w-15 h-15 rounded-lg mr-4" />
                    <div class="flex-1">
                      <h4 class="font-medium text-gray-800">
                        Bolo de Chocolate com Morango
                      </h4>
                      <p class="text-sm text-gray-600">
                        Massa de chocolate, recheio de brigadeiro, cobertura de
                        chantilly
                      </p>
                      <p class="text-sm text-gray-600">Quantidade: 1</p>
                    </div>
                    <div class="text-right">
                      <p class="font-semibold text-gray-800">R$ 89,90</p>
                    </div>
                  </div>

                  <div
                    class="flex justify-between items-center pt-4 border-t border-gray-100"
                  >
                    <div class="text-sm text-gray-600">
                      <p><strong>Total:</strong> R$ 89,90</p>
                    </div>
                    <div class="flex space-x-2">
                      <button
                        class="px-4 py-2 text-red-600 border border-red-600 rounded-lg hover:bg-red-50 transition-colors text-sm"
                      >
                        Ver detalhes
                      </button>
                      <button
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm"
                      >
                        Pedir novamente
                      </button>
                    </div>
                  </div>
                </div>
                <div
                  class="border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow"
                >
                  <div class="flex justify-between items-start mb-4" data-status="em-andamento">
                    <div>
                      <h3 class="font-semibold text-gray-800">Pedido #12344</h3>
                      <p class="text-sm text-gray-600">
                        Realizado em 10/12/2024
                      </p>
                    </div>
                    <span
                      class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm font-medium"
                      >Em preparo</span
                    >
                  </div>

                  <div class="flex items-center mb-4">
                    <img src="" alt="Bolo" class="w-15 h-15 rounded-lg mr-4" />
                    <div class="flex-1">
                      <h4 class="font-medium text-gray-800">Torta de Limão</h4>
                      <p class="text-sm text-gray-600">
                        Massa amanteigada, creme de limão, merengue
                      </p>
                      <p class="text-sm text-gray-600">Quantidade: 2</p>
                    </div>
                    <div class="text-right">
                      <p class="font-semibold text-gray-800">R$ 129,80</p>
                    </div>
                  </div>

                  <div
                    class="flex justify-between items-center pt-4 border-t border-gray-100"
                  >
                    <div class="text-sm text-gray-600">
                      <p><strong>Total:</strong> R$ 129,80</p>
                    </div>
                    <div class="flex space-x-2">
                      <button
                        class="px-4 py-2 text-red-600 border border-red-600 rounded-lg hover:bg-red-50 transition-colors text-sm"
                      >
                        Ver detalhes
                      </button>
                      <button
                        class="px-4 py-2 bg-gray-400 text-white rounded-lg cursor-not-allowed text-sm"
                        disabled
                      >
                        Cancelar pedido
                      </button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div id="section-endereco" class="section-content hidden">
              <div class="flex justify-between items-center mb-8">
                <h2 class="text-xl font-semibold text-gray-800">
                  Meus Endereços
                </h2>
                <button
                  onclick="toggleAddressForm()"
                  class="flex items-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors"
                >
                  <i class="bi bi-plus-circle mr-2"></i>
                  Alterar endereço
                </button>
              </div>
              <div class="space-y-4 mb-6">
                <div class="border border-gray-200 rounded-xl p-6 relative">
                  <div class="flex justify-between items-start">
                    <div class="flex-1">
                      <div class="flex items-center mb-2">
                        <span
                          class="px-2 py-1 bg-red-100 text-red-700 rounded text-xs font-medium mr-3"
                          >Principal</span
                        >
                        <span
                          class="px-2 py-1 bg-gray-100 text-gray-700 rounded text-xs font-medium"
                          >Casa</span
                        >
                      </div>
                      <h3 class="font-semibold text-gray-800 mb-2">
                        Casa - Endereço Principal
                      </h3>
                      <p class="text-gray-600 text-sm mb-1">
                        Rua das Flores, 123 - Apto 45
                      </p>
                      <p class="text-gray-600 text-sm mb-1">
                        Centro - Joinville/SC
                      </p>
                      <p class="text-gray-600 text-sm">CEP: 89200-000</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
