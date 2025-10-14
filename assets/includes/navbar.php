<?php
session_start();
$myAccountLink = "../pages/login.php";

if (isset($_SESSION["usuario"]) && isset($_SESSION["usuario"]["role"])) {
    if ($_SESSION["usuario"]["role"] === "admin") {
        $myAccountLink = "../pages/admin.php";
    } else {
        $myAccountLink = "../pages/userDashboard.php";
    }
}
?>
    
    <nav
      class="fixed w-full top-0 z-[60] bg-white border-b border-gray-200 shadow-lg"
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
                class="font-heading bg-gradient-to-r from-red-500 to-red-700 to-cake-gold bg-clip-text text-transparent"
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
              href="../pages/catalogo.php"
              class="text-gray-700 hover:text-red-500 px-4 py-2 rounded-xl text-lg font-medium transition-all duration-300 hover:bg-white hover:shadow-md"
              >Catálogo</a
            >
            <a
              href="../pages/montebolo.php"
              class="text-gray-700 hover:text-red-500 px-4 py-2 rounded-xl text-lg font-medium transition-all duration-300 hover:bg-white hover:shadow-md"
              >Monte seu Bolo</a
            >
            <div
              class="text-gray-700 hover:text-cake-red p-2 rounded-xl transition-all duration-300 hover:bg-white/70 relative"
            >
              <a href="../pages/checkout.php" class="bi bi-cart text-2xl relative z-10 cursor-pointer">
                <span
                  id="cart-count"
                  class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center hidden"
                  >0</span
                >
              </a>
            </div>
           <div class="relative">
          <?php if (!isset($_SESSION['usuario'])): ?>
            <a href="../pages/login.php" class="bg-gradient-to-r from-red-500 to-red-600 text-white px-8 py-3 rounded-full font-semibold hover:shadow-xl transition-all">Login</a>
          <?php else: ?>
            <button id="userMenuButton" class="text-gray-700 hover:text-red-500 p-2 rounded-xl bi bi-person text-2xl relative z-10 cursor-pointer"></button>
            <div id="userDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50 hidden">
              <a href="<?= $myAccountLink ?>"
                 class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-red-500 transition-colors">
                <i class="bi bi-person-circle mr-3"></i> Minha conta
              </a>
              <button onclick="window.location.href='../backend/controllers/logout.php'"
                      class="flex items-center w-full px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-red-500 transition-colors">
                <i class="bi bi-box-arrow-right mr-3"></i> Sair
              </button>
            </div>
          <?php endif; ?>
        </div>
          </div>
        </div>
      </div>
    </nav>