<?php
include '../includes/navbar.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Lela Cakes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

  <body class="bg-gradient-to-br from-white via-white to-white font-sans min-h-screen flex items-center justify-center">
    <!-- Container centralizado -->
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-8">
                Alterar Senha
        </h2>
      <form id="formAlterarSenha" action="../backend/controllers/ChangePassword.php" method="POST" class="space-y-3">
        <div>
          <input 
            type="password" 
            name="senha_atual" 
            id="senha_atual"
            placeholder="Senha atual" 
            required 
            class="w-full mb-10 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all" 
          />
          <div id="erro-senha-atual" class="text-red-500 text-sm hidden"></div>
        </div>
        
        <div>
          <input 
            type="password" 
            name="nova_senha" 
            id="nova_senha"
            placeholder="Nova senha" 
            required 
            class="w-full mb-3 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all" 
          />
          <div id="erro-nova-senha" class="text-red-500 text-sm hidden"></div>
          <div class="text-xs text-gray-500">Mínimo 6 caracteres</div>
        </div>
        
        <div>
          <input 
            type="password" 
            name="confirmar_senha" 
            id="confirmar_senha"
            placeholder="Confirmar nova senha" 
            required 
            class="w-full mb-3 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all" 
          />
          <div id="erro-confirmar-senha" class="text-red-500 text-sm hidden"></div>
        </div>

        <div class="flex justify-end gap-2 mt-4">
          <a type="button" href="userDashboard.php" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 transition-colors">Cancelar</a>
          <button type="button" id="btnDeleteSenha" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">Salvar</button>
        </div>
      </form>
    </div>
  </body>
</html>
