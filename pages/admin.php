<?php
session_start();
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
    <?php include '../includes/navbar.php'; ?>
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
        onclick="window.location.href='../backend/controllers/logout.php'"
          class="w-full flex items-center p-3 rounded-xl text-red-700 hover:bg-red-50 hover:text-red-500 transition-colors"
        >
          <i class="bi bi-box-arrow-right w-5 h-5 mr-3"></i>
          <span>Sair</span>
        </button>
      </nav>
    </div>
  </body>
</html> 
