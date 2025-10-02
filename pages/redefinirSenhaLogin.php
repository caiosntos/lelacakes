<?php
include '../assets/includes/navbar.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Lela Cakes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

  <body class="bg-gradient-to-br from-white via-white to-white font-sans min-h-screen flex items-center justify-center">
    <!-- Container centralizado -->
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-8">
                Alterar Senha
        </h2>
        <form id="formAlterarSenha" action="../backend/controllers/ChangePasswordLogin.php" method="POST" class="space-y-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
            <input type="email" id="emailEsqueci" name="emailEsqueci"
                 class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500" 
                 placeholder="E-mail" required />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nova senha</label>
            <input type="password" id="novaSenhaEsqueci" name="novaSenhaEsqueci"
                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500"
                placeholder="Digite a nova senha" required />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Confirmar nova senha</label>
            <input type="password" id="confirmarSenhaEsqueci" name="confirmarSenhaEsqueci"
                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500"
                placeholder="Confirme a nova senha" required />
        </div>

        <div class="flex justify-end gap-2 mt-4">
            <a type="button" href="login.php" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 transition-colors">Cancelar</a>
            <button type="button" id="btnDeleteSenha"
                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
            Salvar
            </button>
        </div>
        </form>
    </div>
    <script>
      const deleteSenha = document.getElementById("btnDeleteSenha");
      const deleteSenhaForm = document.getElementById("formAlterarSenha");

      if (deleteSenha && deleteSenhaForm) {
        deleteSenha.addEventListener("click", function () {
          Swal.fire({
            title: "Tem certeza?",
            text: "Deseja realmente alterar sua senha? " + 
            "Após trocar a senha relogue no site novamente.",
            icon: "success",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#6b7280",
            confirmButtonText: "Sim, alterar!",
            cancelButtonText: "Cancelar",
          }).then((result) => {
            if (result.isConfirmed) {
              deleteSenhaForm.submit();
            }
          });
        });
      }
    </script>
  </body>
</html>
