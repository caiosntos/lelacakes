<?php session_start();
 ?>
 
  <!DOCTYPE html>
  <html lang="pt-BR">
    
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0"
      />
      <title>
        Login - Lela Cakes
      </title>
      <script src="https://cdn.tailwindcss.com">
      </script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      />
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap"
      rel="stylesheet" />
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="../js/app.js" defer>
      </script>
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
    
    <body class="bg-gradient-to-br from-white via-white to-white font-sans min-h-screen">
      <nav class="fixed w-full top-0 z-50 backdrop-blur-md bg-white/90 border-b border-white/30 shadow-lg">
        <div class="max-w-7xl mx-auto px-8">
          <div class="flex justify-between items-center h-20">
            <div class="flex items-center">
              <a href="../index.php" class="flex items-center space-x-3 text-3xl font-bold">
                <i class="bi bi-cake2 text-4xl text-cake-red">
                </i>
                <span class="font-serif from-red-500 text-cake-red">
                  Lela Cakes
                </span>
              </a>
            </div>
            <div class="flex items-center space-x-8">
              <a href="../index.php" class="text-gray-700 hover:text-red-500 px-4 py-2 rounded-xl text-lg font-medium transition-all duration-300 hover:bg-white hover:shadow-md">
                Início
              </a>
              <a href="catalogo.php" class="text-gray-700 hover:text-red-500 px-4 py-2 rounded-xl text-lg font-medium transition-all duration-300 hover:bg-white hover:shadow-md">
                Catálogo
              </a>
              <a href="montebolo.php" class="text-gray-700 hover:text-red-500 px-4 py-2 rounded-xl text-lg font-medium transition-all duration-300 hover:bg-white hover:shadow-md">
                Monte seu Bolo
              </a>
            </div>
          </div>
        </div>
      </nav>
      <div class="pt-28 pb-16">
        <div class="max-w-6xl mx-auto px-8">
          <div class="text-center mb-12">
            <h1 class="text-5xl font-serif font-bold text-gray-800 mb-4">
              Acesse sua conta
            </h1>
            <div class="w-24 h-1 bg-cake-red mx-auto">
            </div>
          </div>
          <div class="grid grid-cols-2 gap-12 items-start">
            <!-- Login -->
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl p-10 border border-white/50 hover:shadow-3xl transition-all duration-500">
              <div class="text-center mb-8">
                <div class="w-16 h-16 bg-cake-red rounded-full flex items-center justify-center mx-auto mb-4">
                  <i class="bi bi-person text-white text-2xl">
                  </i>
                </div>
                <h2 class="text-3xl font-serif font-bold text-gray-800">
                  Login
                </h2>
                <p class="text-gray-600 mt-2">
                  Bem-vindo de volta!
                </p>
              </div>
              <form action="../backend/controllers/AuthController.php" method="POST"
              class="space-y-6">
                <div>
                  <label class="block text-gray-700 font-semibold mb-3 text-lg">
                    E-mail
                  </label>
                  <input type="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>"
                  class="w-full px-6 py-4 border-2 border-gray-200 rounded-2xl focus:border-cake-red focus:outline-none transition-all duration-300 text-lg placeholder-gray-400 hover:border-cake-red/50"
                  placeholder="Digite seu E-mail" required />
                </div>
                <div>
                  <label class="block text-gray-700 font-semibold mb-3 text-lg">
                    Senha
                  </label>
                  <input type="password" name="senha" value="<?= htmlspecialchars($senha ?? '') ?>"
                  class="w-full px-6 py-4 border-2 border-gray-200 rounded-2xl focus:border-cake-red focus:outline-none transition-all duration-300 text-lg placeholder-gray-400 hover:border-cake-red/50"
                  placeholder="Digite sua senha" required />
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-bold py-4 rounded-2xl text-lg transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                  <i class="bi bi-box-arrow-in-right mr-2">
                  </i>
                  Entrar
                </button>
              </form>
              <div class="mt-8 pt-6 border-t border-gray-200">
                <p class="text-center text-gray-600 mb-4">
                  Esqueceu sua senha?
                </p>
                <a href="#" class="block text-center text-cake-red hover:text-red-700 font-medium transition-colors duration-300">
                  Clique aqui para recuperar
                </a>
              </div>
            </div>
              
              <?php if(isset($_GET['erro'])): ?>
              <script>
              Swal.fire({
                  icon: 'error',
                  title: 'Erro!',
                  text: '<?= $_GET['erro'] ?>',
                  confirmButtonText: 'OK',
                  confirmButtonColor: '#e53935'
              });
              </script>
              <?php endif; ?>

            <!-- Registro -->
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl p-10 border border-white/50 hover:shadow-3xl transition-all duration-500">
              <div class="text-center mb-8">
                <div class="w-16 h-16 bg-cake-red rounded-full flex items-center justify-center mx-auto mb-4">
                  <i class="bi bi-person-plus text-white text-2xl">
                  </i>
                </div>
                <h2 class="text-3xl font-serif font-bold text-gray-800">
                  Registro
                </h2>
                <p class="text-gray-600 mt-2">
                  Crie sua conta gratuitamente
                </p>
              </div>
              <form action="../backend/controllers/RegisterController.php" method="POST"
              class="space-y-6">
                <div>
                  <label for="email" class="block text-gray-700 font-semibold mb-3 text-lg">
                    E-mail
                  </label>
                  <input type="email" name="email" id="email" required class="w-full px-6 py-4 border-2 border-gray-200 rounded-2xl focus:border-cake-red focus:outline-none transition-all duration-300 text-lg placeholder-gray-400 hover:border-cake-red/50"
                  placeholder="Digite seu E-mail" />
                </div>
                <div class="grid grid-cols-2 gap-6">
                  <div>
                    <label for="nome" class="block text-gray-700 font-semibold mb-3">
                      Nome
                    </label>
                    <input type="text" name="nome" id="nome" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-cake-red focus:outline-none transition-all duration-300 placeholder-gray-400"
                    placeholder="Nome" />
                  </div>
                  <div>
                    <label for="senha" class="block text-gray-700 font-semibold mb-3">
                      Senha
                    </label>
                    <input type="password" id="senha" name="senha" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-cake-red focus:outline-none transition-all duration-300 placeholder-gray-400"
                    placeholder="Digite sua senha" />
                  </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                  <div>
                    <label for="CPF" class="block text-gray-700 font-semibold mb-3">
                      CPF
                    </label>
                    <input type="text" id="CPF" name="CPF" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-cake-red focus:outline-none transition-all duration-300 placeholder-gray-400"
                    placeholder="CPF" />
                  </div>
                  <div>
                    <label for="telefone" class="block text-gray-700 font-semibold mb-3">
                      Telefone
                    </label>
                    <input type="tel" id="telefone" name="telefone" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-cake-red focus:outline-none transition-all duration-300 placeholder-gray-400"
                    placeholder="(00) 0000-0000" />
                  </div>
                </div>
                <div>
                  <label for="endereco" class="block text-gray-700 font-semibold mb-3">
                    Endereço de Entrega
                  </label>
                  <input type="text" id="endereco" name="endereco" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-cake-red focus:outline-none transition-all duration-300 placeholder-gray-400"
                  placeholder="Digite seu endereço completo" />
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-bold py-4 rounded-2xl text-lg transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                  Salvar Registro
                </button>
                <div class="mt-8 pt-6 border-t border-gray-200">
                  <button type="button" class="w-full flex items-center justify-center px-6 py-4 border-2 border-gray-200 rounded-2xl hover:border-gray-300 hover:bg-gray-50 transition-all duration-300 group">
                    <img src="https://img.icons8.com/color/24/000000/google-logo.png" class="mr-3"
                    />
                    <span class="text-gray-700 font-medium group-hover:text-gray-800">
                      Conecte-se com Google
                    </span>
                </div>
              </form>
            </div>
            <button onclick="scrollToTop()" class="back-to-top fixed bottom-8 right-8 bg-gradient-to-r from-cake-pink to-orange-400 text-white p-4 rounded-full shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300 opacity-0">
              <i class="bi bi-arrow-up-circle text-2xl">
              </i>
            </button>
    </body>
  
  </html>