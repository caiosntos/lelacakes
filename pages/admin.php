<?php
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
              "cake-pink": "#FF6B9D",
              "cake-cream": "#FFF5E6",
              "cake-brown": "#8B4513",
              "cake-gold": "#FFD700",
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
                  href="userDashboard.php"
                  class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-red-500 transition-colors"
                >
                  <i class="bi bi-person-circle mr-3"></i>
                  Minha conta
                </a>
                <button
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
<div class="flex pt-20">
      <div class="fixed left-0 top-20 h-full w-80 bg-white shadow-xl border-r border-gray-200 z-40">
        <div class="p-6">
          <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800 font-serif">Admin</h2>
            <p class="text-gray-600 mt-1">Gerencie sua loja</p>
          </div>

      <nav class="space-y-2">
        <button
          onclick="showSextion('addProduto')"
          id="nav-addProduto"
          class="w-full flex items-center p-3 rounded-xl bg-red-50 text-red-600 border-l-4 border-red-500 hover:bg-red-100 transition-colors"
        >
          <i class="bi bi-box-seam-fill w-5 h-5 mr-3"></i>
          <span class="font-medium">Adicione ou Edite Produtos</span>
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
          onclick="showSextion('configSite')"
          id="nav-configSite"
          class="w-full flex items-center p-3 rounded-xl text-red-700 hover:bg-red-50 hover:text-red-500 transition-colors"
        >
          <i class="bi bi-gear-fill w-5 h-5 mr-3"></i>
          <span>Configurações do site</span>
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
          class="w-full flex items-center p-3 rounded-xl text-red-700 hover:bg-red-50 hover:text-red-500 transition-colors"
        >
          <i class="bi bi-box-arrow-right w-5 h-5 mr-3"></i>
          <span>Sair</span>
        </button>
      </nav>
    </div>
  </body>
</html> 
