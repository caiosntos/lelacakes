  <?php
include '../assets/includes/navbar.php';
require_once "../backend/controllers/AuthManager.php";
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
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../assets/site/style.css" />
    <script src="../assets/js/app.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <div class="pt-20 min-h-screen bg-gray-50">
      <div class="max-w-7xl mx-auto p-8">
        <div class="flex gap-8">
          <div class="w-80 bg-white rounded-2xl shadow-lg p-6 h-fit">
            <div class="flex items-center mb-6 pb-4 border-b border-gray-100">
              <a
                href="../index.php"
                class="bi bi-arrow-left text-xl text-gray-600 mr-3 cursor-pointer hover:text-red-500 transition-colors"
              ></a>
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
                <label class="block text-sm font-medium text-gray-700 mb-2">Nome completo</label>
                <input
                  type="text"
                  value="<?php echo htmlspecialchars($_SESSION['usuario']['nome'] ?? ''); ?>"
                  class="w-full p-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                  readonly
                />
              </div>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">CPF</label>
                  <input
                    type="text"
                    value="<?php echo htmlspecialchars($_SESSION['usuario']['cpf'] ?? ''); ?>"
                    class="w-full p-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                    readonly
                  />
                </div> 

                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">E-mail</label>
                  <input
                    type="email"
                    value="<?php echo htmlspecialchars($_SESSION['usuario']['email'] ?? ''); ?>"
                    class="w-full p-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                    readonly
                  />
                </div>

                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">Telefone</label>
                  <input
                    type="tel"
                    id="telefone"
                    value="<?php echo htmlspecialchars($_SESSION['usuario']['telefone'] ?? ''); ?>"
                    class="w-full p-3 bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                    readonly
                  />
                </div>

                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">Senha</label>
                  <input
                    type="password"
                    value="********"
                    class="w-full p-3 bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                    readonly
                  />
                  <a
                    href="redefinirSenha.php"
                    class="text-red-500 text-sm hover:text-red-600 transition-colors mt-1 block"
                  >
                    Alterar senha
                  </a>
                </div>
              </div> <!-- fecha grid corretamente -->
            </form>
            <form id="deleteAccountForm" action="../backend/controllers/DeleteAccount.php" method="POST">
              <div class="flex justify-end space-x-4 pt-6">
                <button
                  type="button"
                  id="btnDeleteAccount"
                  class="px-6 py-3 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors font-medium"
                >
                  Excluir minha conta
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
              </div>
              <div class="space-y-4">
                <div
                  class="border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow pedido-card"
                  data-status="entregues"
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
                        onclick="abrirModalDetalhes('12345')"
                        class="px-4 py-2 text-red-600 border border-red-600 rounded-lg hover:bg-red-50 transition-colors text-sm"
                      >
                        Ver detalhes
                      </button>
                    </div>
                  </div>
                </div>
                <div
                  class="border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow pedido-card"
                  data-status="em-preparo"
                >
                  <div class="flex justify-between items-start mb-4">
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
                        onclick="abrirModalDetalhes('12344')"
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
                  onclick="abrirModalEndereco()"
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

                      <!-- TAGS: principal / tipo -->
                      <div class="flex items-center mb-2">
                        <span class="px-2 py-1 bg-red-100 text-red-700 rounded text-xs font-medium mr-3">
                          Principal
                        </span>
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 rounded text-xs font-medium">
                          Casa
                        </span>
                      </div>

                      <!-- TÍTULO -->
                      <h3 class="font-semibold text-gray-800 mb-2">
                      Endereço Principal
                      </h3>

                      <!-- ENDEREÇO -->
                      <p class="text-gray-600 text-sm mb-1">
                        <?= htmlspecialchars($endereco) ?> <?= $numero ? ", Nº $numero" : "" ?>
                      </p>

                      <!-- CIDADE E ESTADO -->
                      <p class="text-gray-600 text-sm mb-1">
                        <?= htmlspecialchars($cidade) ?> - <?= htmlspecialchars($estado) ?>
                      </p>

                      <!-- CEP -->
                      <p class="text-gray-600 text-sm">
                        CEP: <?= htmlspecialchars($cep) ?>
                      </p>

                    </div>
                  </div>
                </div>
              </div>
            </div>

        <div id="modalEndereco" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
          <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md m-4">
            <div class="p-6">

              <!-- Header -->
              <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800">Editar Endereço</h2>
                <button onclick="fecharModalEndereco()" class="text-gray-500 hover:text-gray-700 text-2xl">
                  <i class="bi bi-x"></i>
                </button>
              </div>

              <!-- Formulário -->
              <form method="POST" action="../backend/controllers/AddressController.php" id="formEndereco">
                
                <!-- ENDEREÇO -->
                <div class="mb-4">
                  <label class="block text-sm font-medium text-gray-700 mb-2">Endereço</label>
                  <input
                    type="text"
                    name="endereco"
                    id="endereco_edit"
                    value="<?= htmlspecialchars($endereco) ?>"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                    placeholder="Ex: Rua das Flores"
                  />
                </div>

                <!-- NÚMERO -->
                <div class="mb-4">
                  <label class="block text-sm font-medium text-gray-700 mb-2">Número</label>
                  <input
                    type="text"
                    name="numero"
                    id="numero_edit"
                    value="<?= htmlspecialchars($numero) ?>"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                    placeholder="Ex: 123"
                  />
                </div>

                <!-- CIDADE -->
                <div class="mb-4">
                  <label class="block text-sm font-medium text-gray-700 mb-2">Cidade</label>
                  <input
                    type="text"
                    name="cidade"
                    id="cidade_edit"
                    value="<?= htmlspecialchars($cidade) ?>"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                    placeholder="Ex: Joinville"
                  />
                </div>

                <!-- ESTADO -->
                <div class="mb-4">
                  <label class="block text-sm font-medium text-gray-700 mb-2">Estado</label>
                  <input
                    type="text"
                    name="estado"
                    id="estado_edit"
                    maxlength="2"
                    value="<?= htmlspecialchars($estado) ?>"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all uppercase"
                    placeholder="SC"
                  />
                </div>

                <!-- CEP -->
                <div class="mb-6">
                  <label class="block text-sm font-medium text-gray-700 mb-2">CEP</label>
                  <input
                    type="text"
                    name="cep"
                    id="cep_edit"
                    maxlength="9"
                    value="<?= htmlspecialchars($cep) ?>"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                    placeholder="00000-000"
                  />
                </div>

                <!-- Botões -->
                <div class="flex justify-end space-x-4 pt-4 border-t border-gray-200">
                  <button
                    type="button"
                    onclick="fecharModalEndereco()"
                    class="px-6 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors"
                  >
                    Cancelar
                  </button>
                  <button
                    type="submit"
                    class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors"
                  >
                    Salvar Alterações
                  </button>
                </div>

              </form>
            </div>
          </div>
        </div>

    <!-- Modal de Detalhes do Pedido -->
    <div id="modalDetalhes" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
      <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto m-4">
        <div class="p-6">
          <!-- Header do Modal -->
          <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-800">Detalhes do Pedido</h2>
            <button onclick="fecharModalDetalhes()" class="text-gray-500 hover:text-gray-700 text-2xl">
              <i class="bi bi-x"></i>
            </button>
          </div>

          <!-- Conteúdo do Modal -->
          <div id="conteudoDetalhes">
            <!-- Será preenchido dinamicamente pelo JavaScript -->
          </div>
        </div>
      </div>
    </div>

    <script>
      // Função para abrir modal de detalhes
      function abrirModalDetalhes(pedidoId) {
        const modal = document.getElementById('modalDetalhes');
        const conteudo = document.getElementById('conteudoDetalhes');
        
        // Dados dos pedidos (simulados)
        const dadosPedidos = {
          '12345': {
            numero: '12345',
            data: '15/12/2024',
            status: 'Entregue',
            statusClass: 'bg-green-100 text-green-700',
            total: 'R$ 89,90',
            endereco: {
              nome: 'Casa - Endereço Principal',
              rua: 'Rua das Flores, 123 - Apto 45',
              cidade: 'Centro - Joinville/SC',
              cep: '89200-000'
            },
            produtos: [
              {
                nome: 'Bolo de Chocolate com Morango',
                descricao: 'Massa de chocolate, recheio de brigadeiro, cobertura de chantilly',
                quantidade: 1,
                preco: 'R$ 89,90',
                imagem: '../img/cf8691ab-7ea7-4f4a-88b6-429984a24641.jpg'
              }
            ],
            observacoes: 'Entregar após as 14h. Tocar a campainha.',
            pagamento: 'Dinheiro',
            entrega: '15/12/2024 às 15:30'
          },
          '12344': {  
            numero: '12344',
            data: '10/12/2024',
            status: 'Em preparo',
            statusClass: 'bg-yellow-100 text-yellow-700',
            total: 'R$ 129,80',
            endereco: {
              nome: 'Casa - Endereço Principal',
              rua: 'Rua das Flores, 123 - Apto 45',
              cidade: 'Centro - Joinville/SC',
              cep: '89200-000'
            },
            produtos: [
              {
                nome: 'Torta de Limão',
                descricao: 'Massa amanteigada, creme de limão, merengue',
                quantidade: 2,
                preco: 'R$ 129,80',
                imagem: '../img/julia-peretiatko-oXfOK1ymtPU-unsplash.jpg'
              }
            ],
            observacoes: 'Sem açúcar refinado. Usar açúcar demerara.',
            pagamento: 'PIX',
            entrega: '12/12/2024 às 16:00'
          }
        };

        const pedido = dadosPedidos[pedidoId];
        if (!pedido) return;

        conteudo.innerHTML = `
          <!-- Informações Gerais -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="bg-gray-50 p-4 rounded-lg">
              <h3 class="font-semibold text-gray-800 mb-3">Informações do Pedido</h3>
              <div class="space-y-2 text-sm">
                <p><strong>Número:</strong> #${pedido.numero}</p>
                <p><strong>Data:</strong> ${pedido.data}</p>
                <p><strong>Status:</strong> <span class="px-2 py-1 rounded-full text-xs font-medium ${pedido.statusClass}">${pedido.status}</span></p>
                <p><strong>Total:</strong> ${pedido.total}</p>
                <p><strong>Pagamento:</strong> ${pedido.pagamento}</p>
              </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg">
              <h3 class="font-semibold text-gray-800 mb-3">Endereço de Entrega</h3>
              <div class="space-y-1 text-sm">
                <p><strong>${pedido.endereco.nome}</strong></p>
                <p>${pedido.endereco.rua}</p>
                <p>${pedido.endereco.cidade}</p>
                <p>CEP: ${pedido.endereco.cep}</p>
              </div>
            </div>
          </div>

          <!-- Produtos -->
          <div class="mb-6">
            <h3 class="font-semibold text-gray-800 mb-4">Produtos</h3>
            <div class="space-y-4">
              ${pedido.produtos.map(produto => `
                <div class="flex items-center space-x-4 p-4 border border-gray-200 rounded-lg">
                  <img src="${produto.imagem}" alt="${produto.nome}" class="w-16 h-16 object-cover rounded-lg">
                  <div class="flex-1">
                    <h4 class="font-medium text-gray-800">${produto.nome}</h4>
                    <p class="text-sm text-gray-600">${produto.descricao}</p>
                    <p class="text-sm text-gray-600">Quantidade: ${produto.quantidade}</p>
                  </div>
                  <div class="text-right">
                    <p class="font-semibold text-gray-800">${produto.preco}</p>
                  </div>
                </div>
              `).join('')}
            </div>
          </div>

          <!-- Botões de Ação -->
          <div class="flex justify-end space-x-4 mt-6 pt-6 border-t border-gray-200">
            <button onclick="fecharModalDetalhes()" class="px-6 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
              Fechar
            </button>
            ${pedido.status === 'Entregue' ? `
              <button class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                Pedir Novamente
              </button>
            ` : `
              <button class="px-6 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors">
                Cancelar Pedido
              </button>
            `}
          </div>
        `;

        modal.classList.remove('hidden');
      }

      // Função para fechar modal de detalhes
      function fecharModalDetalhes() {
        document.getElementById('modalDetalhes').classList.add('hidden');
      }

      // Fechar modal ao clicar fora dele
      document.getElementById('modalDetalhes').addEventListener('click', function(e) {
        if (e.target === this) {
          fecharModalDetalhes();
        }
      });

      // Fechar modal com ESC
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          fecharModalDetalhes();
        }
      });
    </script>
  </body>
</html>