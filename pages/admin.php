<?php
include '../assets/includes/navbar.php';
require "../backend/controllers/ProductController.php"; 
require "../backend/controllers/AdminUserPanel.php"; 

?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Painel Administrativo - Lela Cakes</title>
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
              <i
                class="bi bi-shield-check text-xl text-red-500 mr-3"
              ></i>
              <h1 class="text-xl font-semibold text-gray-800">Painel Admin</h1>
            </div>

            <nav class="space-y-2">
              <button
                onclick="showSextion('addProduto')"
                id="nav-addProduto"
                class="w-full flex items-center p-3 rounded-xl bg-red-50 text-red-600 border-l-4 border-red-500 hover:bg-red-100 transition-colors"
              >
                <i class="bi bi-box-seam-fill w-5 h-5 mr-3"></i>
                <span class="font-medium">Produtos</span>
              </button>
              <button
                onclick="showSextion('pedidosAdmin')"
                id="nav-pedidosAdmin"
                class="w-full flex items-center p-3 rounded-xl text-red-700 hover:bg-red-50 hover:text-red-500 transition-colors"
              >
                <i class="bi bi-clipboard2-check w-5 h-5 mr-3"></i>
                <span>Pedidos</span>
              </button>
              <button
                onclick="showSextion('usuariosAdmin')"
                id="nav-usuariosAdmin"
                class="w-full flex items-center p-3 rounded-xl text-red-700 hover:bg-red-50 hover:text-red-500 transition-colors"
              >
                <i class="bi bi-people-fill w-5 h-5 mr-3"></i>
                <span>Usuários</span>
              </button>
              <button
                onclick="showSextion('configSite')"
                id="nav-configSite"
                class="w-full flex items-center p-3 rounded-xl text-red-700 hover:bg-red-50 hover:text-red-500 transition-colors"
              >
                <i class="bi bi-gear-fill w-5 h-5 mr-3"></i>
                <span>Configurações</span>
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
            <!-- Mensagens de Sucesso/Erro -->
            <?php if (isset($_GET['sucesso'])): ?>
              <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                <i class="bi bi-check-circle mr-2"></i>
                <?= htmlspecialchars($_GET['sucesso']) ?>
              </div>
            <?php endif; ?>
            
            <?php if (isset($_GET['erro'])): ?>
              <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                <i class="bi bi-exclamation-triangle mr-2"></i>
                <?= htmlspecialchars($_GET['erro']) ?>
              </div>
            <?php endif; ?>
            
            <!-- Seção Adicionar/Editar Produtos -->
            <div id="addProduto" class="section-content">
              <div class="flex justify-between items-center mb-8">
                <h2 class="text-xl font-semibold text-gray-800">
                  Gerenciar Produtos
                </h2>
                <button
                  onclick="toggleProductForm()"
                  class="flex items-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors"
                >
                  <i class="bi bi-plus-circle mr-2"></i>
                  Adicionar Produto
                </button>
              </div>

              <!-- Formulário de Produto -->
              <div id="product-form" class="hidden mb-8 p-6 bg-gray-50 rounded-xl">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Novo Produto</h3>
                <form class="space-y-4" action="../backend/controllers/RegisterProdController.php" method="POST">
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">Nome do Produto</label>
                      <input
                        type="text"
                        name="nomeproduto"
                        value="<?= htmlspecialchars($nome ?? '') ?>"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                        placeholder="Ex: Bolo de Chocolate"
                      />
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">Preço (R$)</label>
                      <input
                        type="number"
                        name="preco"
                        value="<?= htmlspecialchars($preco ?? '') ?>"
                        step="0.01"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                        placeholder="89.90"
                      />
                    </div>
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Descrição</label>
                    <textarea
                      name="descricao"
                      value="<?= htmlspecialchars($descricao ?? '') ?>"
                      class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all h-24"
                      placeholder="Descreva o produto..."
                    ></textarea>
                  </div>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">Categoria</label>
                      <select value="<?= htmlspecialchars($categoria ?? '') ?>" name="categoria-produto" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                      <option value="">Selecione uma categoria</option>
                      <option value="bolos" <?= ($categoria ?? '') === 'bolos' ? 'selected' : '' ?>>Bolos</option>
                      <option value="doces" <?= ($categoria ?? '') === 'doces' ? 'selected' : '' ?>>Doces</option>
                      </select>
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                      <select value="<?= htmlspecialchars($status_produtos ?? '') ?>" name="status" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                      <option value="ativo" <?= ($status_produtos ?? '') === 'ativo' ? 'selected' : '' ?>>Ativo</option>
                      <option value="inativo" <?= ($status_produtos ?? '') === 'inativo' ? 'selected' : '' ?>>Inativo</option>
                      </select>
                    </div>
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Imagem do Produto</label>
                    <input
                      type="file"
                      accept="image/*"
                      class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                    />
                  </div>
                  <div class="flex justify-end space-x-4 pt-4">
                    <button
                      type="button"
                      onclick="toggleProductForm()"
                      class="px-6 py-3 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors font-medium"
                    >
                      Cancelar
                    </button>
                    <button
                      type="submit"
                      class="px-8 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors font-medium shadow-lg"
                    >
                      Salvar Produto
                    </button>
                  </div>
                </form>
              </div>

           <div class="space-y-4">
                <?php if (!empty($produtos)): ?>
                    <?php foreach ($produtos as $produto): ?>
                        <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <img src="<?= htmlspecialchars($produto['imagem_url'] ?? '') ?>" 
                                        alt="<?= htmlspecialchars($produto['nome']) ?>" 
                                        class="w-16 h-16 rounded-lg mr-4 object-cover bg-gray-100" 
                                        onerror="this.src=''" />
                                    <div>
                                        <h3 class="font-semibold text-gray-800"><?= htmlspecialchars($produto['nome']) ?></h3>
                                        <p class="text-sm text-gray-600"><?= htmlspecialchars($produto['descricao']) ?></p>
                                        <p class="text-sm text-gray-500">Categoria: <?= htmlspecialchars($produto['categoria']) ?></p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-800 text-lg">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                                    <span class="inline-block mt-1 px-2 py-1 <?= strtolower($produto['status_produtos']) === 'ativo' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' ?> rounded text-xs font-medium">
                                        <?= ucfirst(strtolower($produto['status_produtos'])) ?>
                                    </span>
                                    <?php if ($produto['destaque'] == 1): ?>
                                        <span class="inline-block mt-1 ml-1 px-2 py-1 bg-yellow-100 text-yellow-700 rounded text-xs font-medium">
                                            ⭐ Destaque
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="flex justify-end space-x-2 pt-4 border-t border-gray-100">
                                <div class="w-20">
                                    <button
                                            onclick="abrirModalEdicao(<?= $produto['idproduto'] ?>, '<?= htmlspecialchars($produto['nome'], ENT_QUOTES) ?>', <?= $produto['preco'] ?>, '<?= htmlspecialchars($produto['status_produtos'], ENT_QUOTES) ?>')"
                                            class="w-full px-4 py-2 text-blue-600 border border-blue-600 rounded-lg hover:bg-blue-50 transition-colors text-sm font-medium">
                                        Editar
                                    </button>
                                </div>
                                <div class="w-20">
                                    <form method="POST" action="../backend/controllers/DeleteProductController.php">
                                        <input type="hidden" name="produto_id" value="<?= $produto['idproduto'] ?>">
                                        <button
                                                type="button"
                                                onclick="confirmarExclusao('<?= htmlspecialchars($produto['nome'], ENT_QUOTES) ?>', event)"
                                                class="w-full px-4 py-2 text-red-600 border border-red-600 rounded-lg hover:bg-red-50 transition-colors text-sm font-medium">
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="bg-white border border-gray-200 rounded-xl p-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Nenhum produto cadastrado</h3>
                        <p class="text-gray-500 mb-4">Comece adicionando seu primeiro produto.</p>
                    </div>
                <?php endif; ?>
            </div>
          </div>

            <!-- Seção Pedidos Admin -->
            <div id="pedidosAdmin" class="section-content hidden">
              <h2 class="text-xl font-semibold text-gray-800 mb-8">
                Gerenciar Pedidos
              </h2>

              <div class="mb-6 flex flex-wrap gap-4">
                <select
                  id="ordenarPedidos"
                  onchange="filtrarPedidosPorStatus(this.value)"
                  class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none"
                >
                  <option value="todos">Todos os pedidos</option>
                  <option value="pendente">Pendentes</option>
                  <option value="em-preparo">Em preparo</option>
                  <option value="pronto">Prontos</option>
                  <option value="entregue">Entregues</option>
                  <option value="cancelado">Cancelados</option>
                </select>
                <input
                  type="text"
                  placeholder="Buscar por cliente..."
                  class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none"
                />
              </div>

              <div class="space-y-4">
                <!-- Pedido Customizado (Bolo Personalizado) -->
                <div class="border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow bg-blue-50">
                  <div class="flex justify-between items-start mb-4">
                    <div>
                      <h3 class="font-semibold text-gray-800">Pedido #12346 - Bolo Customizado</h3>
                      <p class="text-sm text-gray-600">Cliente: Ana Costa</p>
                      <p class="text-sm text-gray-600">Realizado em 18/12/2024 às 16:45</p>
                    </div>
                    <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-sm font-medium">Aguardando Orçamento</span>
                  </div>

                  <div class="flex items-center mb-4">
                    <div class="flex-1">
                      <h4 class="font-medium text-gray-800">Bolo Personalizado</h4>
                      <p class="text-sm text-gray-600">
                        <strong>Sabor:</strong> Chocolate | 
                        <strong>Recheio:</strong> Brigadeiro | 
                        <strong>Topo:</strong> Flores | 
                        <strong>Decoração:</strong> Chantilly
                      </p>
                      <p class="text-sm text-gray-600">Quantidade: 1</p>
                    </div>
                    <div class="text-right">
                      <p class="font-semibold text-gray-800">A definir</p>
                    </div>
                  </div>

                  <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                    <div class="text-sm text-gray-600">
                      <p><strong>Status:</strong> Aguardando aprovação de orçamento</p>
                      <p><strong>Endereço:</strong> Rua das Palmeiras, 456 - Jardins</p>
                    </div>
                    <div class="flex space-x-2">
                      <button 
                        onclick="abrirModalOrcamento('12346')"
                        class="px-4 py-2 text-purple-600 border border-purple-600 rounded-lg hover:bg-purple-50 transition-colors text-sm"
                      >
                        Gerenciar Orçamento
                      </button>
                    </div>
                  </div>
                </div>

                <div class="border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow">
                  <div class="flex justify-between items-start mb-4">
                    <div>
                      <h3 class="font-semibold text-gray-800">Pedido #12345</h3>
                      <p class="text-sm text-gray-600">Cliente: Maria Silva</p>
                      <p class="text-sm text-gray-600">Realizado em 15/12/2024 às 14:30</p>
                    </div>
                    <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm font-medium">Em preparo</span>
                  </div>

                  <div class="flex items-center mb-4">
                    <div class="flex-1">
                      <h4 class="font-medium text-gray-800">Bolo de Chocolate com Morango</h4>
                      <p class="text-sm text-gray-600">Quantidade: 1</p>
                    </div>
                    <div class="text-right">
                      <p class="font-semibold text-gray-800">R$ 89,90</p>
                    </div>
                  </div>

                  <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                    <div class="text-sm text-gray-600">
                      <p><strong>Total:</strong> R$ 89,90</p>
                      <p><strong>Endereço:</strong> Rua das Flores, 123 - Centro</p>
                    </div>
                    <div class="flex space-x-2">
                      <button class="px-4 py-2 text-blue-600 border border-blue-600 rounded-lg hover:bg-blue-50 transition-colors text-sm">
                        Ver detalhes
                      </button>
                      <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors text-sm">
                        Marcar como pronto
                      </button>
                      <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm">
                        Cancelar
                      </button>
                    </div>
                  </div>
                </div>

                <div class="border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow">
                  <div class="flex justify-between items-start mb-4">
                    <div>
                      <h3 class="font-semibold text-gray-800">Pedido #12344</h3>
                      <p class="text-sm text-gray-600">Cliente: João Santos</p>
                      <p class="text-sm text-gray-600">Realizado em 10/12/2024 às 10:15</p>
                    </div>
                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">Entregue</span>
                  </div>

                  <div class="flex items-center mb-4">
                    <div class="flex-1">
                      <h4 class="font-medium text-gray-800">Docinhos Variados</h4>
                      <p class="text-sm text-gray-600">Quantidade: 2</p>
                    </div>
                    <div class="text-right">
                      <p class="font-semibold text-gray-800">R$ 90,00</p>
                    </div>
                  </div>

                  <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                    <div class="text-sm text-gray-600">
                      <p><strong>Total:</strong> R$ 90,00</p>
                      <p><strong>Entregue em:</strong> 12/12/2024 às 16:00</p>
                    </div>
                    <div class="flex space-x-2">
                      <button class="px-4 py-2 text-blue-600 border border-blue-600 rounded-lg hover:bg-blue-50 transition-colors text-sm">
                        Ver detalhes
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Seção Usuários Admin -->
            <div id="usuariosAdmin" class="section-content hidden">
              <div class="flex justify-between items-center mb-8">
                <h2 class="text-xl font-semibold text-gray-800">
                  Gerenciar Usuários
                </h2>
                <div class="flex space-x-2">
                  <input
                    type="text"
                    id="buscarUsuario"
                    placeholder="Buscar usuário..."
                    class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none"
                    onkeyup="filtrarUsuarios()"
                  />
                  <button class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                    <i class="bi bi-search"></i>
                  </button>
                </div>
              </div>

              <?php if (isset($erro_usuarios)): ?>
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                  <i class="bi bi-exclamation-triangle mr-2"></i>
                  <?= htmlspecialchars($erro_usuarios) ?>
                </div>
              <?php endif; ?>

              <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                  <thead>
                    <tr class="bg-gray-50">
                      <th class="border border-gray-200 px-4 py-3 text-left text-sm font-medium text-gray-700">ID</th>
                      <th class="border border-gray-200 px-4 py-3 text-left text-sm font-medium text-gray-700">Nome</th>
                      <th class="border border-gray-200 px-4 py-3 text-left text-sm font-medium text-gray-700">Email</th>
                      <th class="border border-gray-200 px-4 py-3 text-left text-sm font-medium text-gray-700">Telefone</th>
                      <th class="border border-gray-200 px-4 py-3 text-left text-sm font-medium text-gray-700">Tipo</th>
                      <th class="border border-gray-200 px-4 py-3 text-left text-sm font-medium text-gray-700">Ações</th>
                    </tr>
                  </thead>
                  <tbody id="tabelaUsuarios">
                    <?php if (empty($usuarios)): ?>
                      <tr>
                        <td colspan="7" class="border border-gray-200 px-4 py-8 text-center text-gray-500">
                          <i class="bi bi-person-x text-2xl mb-2 block"></i>
                          Nenhum usuário encontrado
                        </td>
                      </tr>
                    <?php else: ?>
                      <?php foreach ($usuarios as $usuario): ?>
                        <tr class="hover:bg-gray-50" data-nome="<?= strtolower(htmlspecialchars($usuario['nome'])) ?>" data-email="<?= strtolower(htmlspecialchars($usuario['email'])) ?>">
                          <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600"><?= htmlspecialchars($usuario['id']) ?></td>
                          <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600"><?= htmlspecialchars($usuario['nome']) ?></td>
                          <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600"><?= htmlspecialchars($usuario['email']) ?></td>
                          <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">
                            <?= $usuario['telefone'] ? htmlspecialchars($usuario['telefone']) : '-' ?>
                          </td>
                          <td class="border border-gray-200 px-4 py-3 text-sm">
                            <?php if ($usuario['role'] === 'admin'): ?>
                              <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-medium">Admin</span>
                            <?php else: ?>
                              <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs font-medium">Cliente</span>
                            <?php endif; ?>
                          </td>
                          <td class="border border-gray-200 px-4 py-3 text-sm">
                            <div class="flex space-x-2">
                              <button 
                                onclick="editarUsuario(<?= $usuario['id'] ?>)"
                                class="px-3 py-1 text-blue-600 border border-blue-600 rounded hover:bg-blue-50 transition-colors text-xs"
                              >
                                Editar
                              </button>
                              <?php if ($usuario['role'] !== 'admin'): ?>
                                <button 
                                  onclick="bloquearUsuario(<?= $usuario['id'] ?>)"
                                  class="px-3 py-1 text-red-600 border border-red-600 rounded hover:bg-red-50 transition-colors text-xs"
                                >
                                  Bloquear
                                </button>
                              <?php else: ?>
                                <button 
                                  class="px-3 py-1 text-gray-400 border border-gray-400 rounded cursor-not-allowed text-xs" 
                                  disabled
                                >
                                  Bloquear
                                </button>
                              <?php endif; ?>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>

              <!-- Estatísticas dos usuários -->
              <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                  <div class="flex items-center">
                    <i class="bi bi-people text-blue-600 text-2xl mr-3"></i>
                    <div>
                      <p class="text-sm text-blue-600 font-medium">Total de Usuários</p>
                      <p class="text-2xl font-bold text-blue-800"><?= count($usuarios) ?></p>
                    </div>
                  </div>
                </div>
                <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                  <div class="flex items-center">
                    <i class="bi bi-shield-check text-green-600 text-2xl mr-3"></i>
                    <div>
                      <p class="text-sm text-green-600 font-medium">Administradores</p>
                      <p class="text-2xl font-bold text-green-800">
                        <?= count(array_filter($usuarios, function($u) { return $u['role'] === 'admin'; })) ?>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                  <div class="flex items-center">
                    <i class="bi bi-person text-purple-600 text-2xl mr-3"></i>
                    <div>
                      <p class="text-sm text-purple-600 font-medium">Clientes</p>
                      <p class="text-2xl font-bold text-purple-800">
                        <?= count(array_filter($usuarios, function($u) { return $u['role'] === 'user'; })) ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Seção Configurações do Site -->
            <div id="configSite" class="section-content hidden">
              <h2 class="text-xl font-semibold text-gray-800 mb-8">
                Configurações do Site
              </h2>

              <div class="space-y-8">
                <!-- Informações da Empresa -->
                <div class="border border-gray-200 rounded-xl p-6">
                  <h3 class="text-lg font-semibold text-gray-800 mb-4">Informações da Empresa</h3>
                  <form class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                      <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nome da Empresa</label>
                        <input
                          type="text"
                          value="Lela Cakes"
                          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                        />
                      </div>
                      <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">CNPJ</label>
                        <input
                          type="text"
                          placeholder="00.000.000/0000-00"
                          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                        />
                      </div>
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">Descrição</label>
                      <textarea
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all h-24"
                        placeholder="Descreva sua empresa..."
                      >A melhor confeitaria de Joinville e Região!</textarea>
                    </div>
                  </form>
                </div>

                <!-- Contato -->
                <div class="border border-gray-200 rounded-xl p-6">
                  <h3 class="text-lg font-semibold text-gray-800 mb-4">Informações de Contato</h3>
                  <form class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                      <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Telefone</label>
                        <input
                          type="tel"
                          placeholder="(47) 99999-9999"
                          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                        />
                      </div>
                      <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">WhatsApp</label>
                        <input
                          type="tel"
                          placeholder="(47) 99999-9999"
                          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                        />
                      </div>
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                      <input
                        type="email"
                        placeholder="contato@lelacakes.com"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                      />
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">Endereço</label>
                      <textarea
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all h-20"
                        placeholder="Rua, número, bairro, cidade..."
                      ></textarea>
                    </div>
                  </form>
                </div>

                <!-- Redes Sociais -->
                <div class="border border-gray-200 rounded-xl p-6">
                  <h3 class="text-lg font-semibold text-gray-800 mb-4">Redes Sociais</h3>
                  <form class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                      <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Instagram</label>
                        <input
                          type="url"
                          placeholder="https://instagram.com/lelacakes"
                          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                        />
                      </div>
                      <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Facebook</label>
                        <input
                          type="url"
                          placeholder="https://facebook.com/lelacakes"
                          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                        />
                      </div>
                    </div>
                  </form>
                </div>

                <!-- Configurações de Entrega -->
                <div class="border border-gray-200 rounded-xl p-6">
                  <h3 class="text-lg font-semibold text-gray-800 mb-4">Configurações de Entrega</h3>
                  <form class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                      <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Taxa de Entrega (R$)</label>
                        <input
                          type="number"
                          step="0.01"
                          placeholder="5.00"
                          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                        />
                      </div>
                      <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pedido Mínimo (R$)</label>
                        <input
                          type="number"
                          step="0.01"
                          placeholder="30.00"
                          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                        />
                      </div>
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">Horário de Funcionamento</label>
                      <div class="grid grid-cols-2 gap-4">
                        <input
                          type="time"
                          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                        />
                        <input
                          type="time"
                          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                        />
                      </div>
                    </div>
                  </form>
                </div>

                <div class="flex justify-end pt-6">
                  <button class="px-8 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors font-medium shadow-lg">
                    Salvar Configurações
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal de Gerenciar Orçamento -->
    <div id="modalOrcamento" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
      <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl m-4">
        <div class="p-6">
          <!-- Header do Modal -->
          <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-800">Gerenciar Orçamento</h2>
            <button onclick="fecharModalOrcamento()" class="text-gray-500 hover:text-gray-700 text-2xl">
              <i class="bi bi-x"></i>
            </button>
          </div>

          <!-- Conteúdo do Modal -->
          <div id="conteudoOrcamento">
            <!-- Informações do Pedido -->
            <div class="mb-6">
              <h3 class="text-lg font-semibold text-gray-800 mb-3">Detalhes do Pedido</h3>
              <div class="bg-gray-50 p-4 rounded-lg">
                <p><strong>Pedido:</strong> #<span id="numeroPedido">12346</span></p>
                <p><strong>Cliente:</strong> <span id="nomeCliente">Ana Costa</span></p>
                <p><strong>Data:</strong> <span id="dataPedido">18/12/2024 às 16:45</span></p>
                <div class="mt-2">
                  <p><strong>Especificações:</strong></p>
                  <ul class="text-sm text-gray-600 ml-4">
                    <li>• Sabor: Chocolate</li>
                    <li>• Recheio: Brigadeiro</li>
                    <li>• Topo: Flores</li>
                    <li>• Decoração: Chantilly</li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- Formulário de Orçamento -->
            <div class="mb-6">
              <h3 class="text-lg font-semibold text-gray-800 mb-3">Definir Orçamento</h3>
              <div class="space-y-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">Valor do Orçamento (R$)</label>
                  <input 
                    type="number" 
                    id="valorOrcamento"
                    step="0.01"
                    min="0"
                    placeholder="Ex: 120.00"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none"
                  />
                </div>
                
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">Observações (opcional)</label>
                  <textarea 
                    id="observacoesOrcamento"
                    rows="3"
                    placeholder="Detalhes adicionais sobre o orçamento, tempo de preparo, etc."
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none resize-none"
                  ></textarea>
                </div>
              </div>
            </div>

            <!-- Status do Orçamento -->
            <div class="mb-6">
              <h3 class="text-lg font-semibold text-gray-800 mb-3">Status do Orçamento</h3>
              <div class="flex items-center space-x-4">
                <label class="flex items-center">
                  <input 
                    type="radio" 
                    name="statusOrcamento" 
                    value="pendente" 
                    checked
                    class="mr-2 text-red-500 focus:ring-red-500"
                  />
                  <span class="text-sm text-gray-700">Aguardando Aprovação</span>
                </label>
                <label class="flex items-center">
                  <input 
                    type="radio" 
                    name="statusOrcamento" 
                    value="aprovado"
                    class="mr-2 text-red-500 focus:ring-red-500"
                  />
                  <span class="text-sm text-gray-700">Aprovado pelo Cliente</span>
                </label>
                <label class="flex items-center">
                  <input 
                    type="radio" 
                    name="statusOrcamento" 
                    value="rejeitado"
                    class="mr-2 text-red-500 focus:ring-red-500"
                  />
                  <span class="text-sm text-gray-700">Rejeitado pelo Cliente</span>
                </label>
              </div>
            </div>

            <!-- Botões de Ação -->
            <div class="flex justify-end space-x-4 pt-4 border-t border-gray-200">
              <button 
                onclick="fecharModalOrcamento()" 
                class="px-6 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors"
              >
                Cancelar
              </button>
              <button 
                onclick="salvarOrcamento()" 
                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
              >
                Salvar Orçamento
              </button>
              <button 
                id="btnGerarPedido"
                onclick="gerarPedido()" 
                class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors opacity-50 cursor-not-allowed"
                disabled
              >
                Gerar Pedido
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal de Edição de Produto -->
    <div id="modalEdicao" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
      <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md m-4">
        <div class="p-6">
          <!-- Header do Modal -->
          <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-800">Editar Produto</h2>
            <button onclick="fecharModalEdicao()" class="text-gray-500 hover:text-gray-700 text-2xl">
              <i class="bi bi-x"></i>
            </button>
          </div>

          <!-- Formulário de Edição -->
          <form method="POST" action="../backend/controllers/EditProductController.php" id="formEdicao">
            <input type="hidden" name="produto_id" id="produto_id_edit" value="">
            
            <!-- Nome do Produto (somente leitura) -->
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-2">Produto</label>
              <input
                type="text"
                id="nome_produto_edit"
                class="w-full p-3 border border-gray-300 rounded-lg bg-gray-100 text-gray-600"
                readonly
              />
            </div>

            <!-- Novo Preço -->
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-2">Novo Preço (R$)</label>
              <input
                type="number"
                name="novo_preco"
                id="novo_preco_edit"
                step="0.01"
                min="0"
                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                placeholder="Ex: 89.90"
              />
            </div>

            <!-- Novo Status -->
            <div class="mb-6">
              <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
              <select
                name="novo_status"
                id="novo_status_edit"
                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
              >
                <option value="">Manter status atual</option>
                <option value="ativo">Ativo</option>
                <option value="inativo">Inativo</option>
              </select>
            </div>

            <!-- Botões de Ação -->
            <div class="flex justify-end space-x-4 pt-4 border-t border-gray-200">
              <button
                type="button"
                onclick="fecharModalEdicao()"
                class="px-6 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors"
              >
                Cancelar
              </button>
              <button
                type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
              >
                Salvar Alterações
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      // Função para abrir modal de orçamento
      function abrirModalOrcamento(pedidoId) {
        document.getElementById('modalOrcamento').classList.remove('hidden');
        document.getElementById('numeroPedido').textContent = pedidoId;
        
        // Resetar formulário
        document.getElementById('valorOrcamento').value = '';
        document.getElementById('observacoesOrcamento').value = '';
        document.querySelector('input[name="statusOrcamento"][value="pendente"]').checked = true;
        
        // Desabilitar botão gerar pedido inicialmente
        const btnGerarPedido = document.getElementById('btnGerarPedido');
        btnGerarPedido.disabled = true;
        btnGerarPedido.classList.add('opacity-50', 'cursor-not-allowed');
        btnGerarPedido.classList.remove('hover:bg-green-700');
      }

      // Função para fechar modal de orçamento
      function fecharModalOrcamento() {
        document.getElementById('modalOrcamento').classList.add('hidden');
      }

      // Função para salvar orçamento
      function salvarOrcamento() {
        const valor = document.getElementById('valorOrcamento').value;
        const observacoes = document.getElementById('observacoesOrcamento').value;
        const status = document.querySelector('input[name="statusOrcamento"]:checked').value;
        
        if (!valor || valor <= 0) {
          Swal.fire({
            icon: 'warning',
            title: 'Valor Inválido',
            text: 'Por favor, informe um valor válido para o orçamento.',
            confirmButtonColor: '#e53935'
          });
          return;
        }

        // Habilitar/desabilitar botão gerar pedido baseado no status
        const btnGerarPedido = document.getElementById('btnGerarPedido');
        if (status === 'aprovado') {
          btnGerarPedido.disabled = false;
          btnGerarPedido.classList.remove('opacity-50', 'cursor-not-allowed');
          btnGerarPedido.classList.add('hover:bg-green-700');
        } else {
          btnGerarPedido.disabled = true;
          btnGerarPedido.classList.add('opacity-50', 'cursor-not-allowed');
          btnGerarPedido.classList.remove('hover:bg-green-700');
        }

        Swal.fire({
          icon: 'success',
          title: 'Orçamento Salvo!',
          text: `Orçamento de R$ ${parseFloat(valor).toFixed(2)} foi salvo com status: ${status === 'pendente' ? 'Aguardando Aprovação' : status === 'aprovado' ? 'Aprovado' : 'Rejeitado'}`,
          confirmButtonColor: '#e53935'
        });
      }

      // Função para gerar pedido
      function gerarPedido() {
        const status = document.querySelector('input[name="statusOrcamento"]:checked').value;
        
        if (status !== 'aprovado') {
          Swal.fire({
            icon: 'warning',
            title: 'Orçamento Não Aprovado',
            text: 'O pedido só pode ser gerado após a aprovação do orçamento pelo cliente.',
            confirmButtonColor: '#e53935'
          });
          return;
        }

        Swal.fire({
          title: 'Gerar Pedido?',
          text: 'Isso irá criar um pedido oficial para produção. Confirmar?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#e53935',
          cancelButtonColor: '#6b7280',
          confirmButtonText: 'Sim, gerar pedido',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            // Simular geração do pedido
            Swal.fire({
              icon: 'success',
              title: 'Pedido Gerado!',
              text: 'O pedido foi gerado com sucesso e está agora em produção.',
              confirmButtonColor: '#e53935'
            }).then(() => {
              fecharModalOrcamento();
              // Atualizar a interface (recarregar página ou atualizar dinamicamente)
              location.reload();
            });
          }
        });
      }

      // Fechar modal ao clicar fora dele
      document.getElementById('modalOrcamento').addEventListener('click', function(e) {
        if (e.target === this) {
          fecharModalOrcamento();
        }
      });

      // Fechar modal com ESC
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          fecharModalOrcamento();
        }
      });
    </script>
  </body>
</html> 
