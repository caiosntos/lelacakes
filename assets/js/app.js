//SweetAlert para deletar conta
const deleteBtn = document.getElementById("btnDeleteAccount");
const deleteForm = document.getElementById("deleteAccountForm");

if (deleteBtn && deleteForm) {
  deleteBtn.addEventListener("click", function () {
    Swal.fire({
      title: "Tem certeza?",
      text: "Essa ação não pode ser desfeita!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#6b7280",
      confirmButtonText: "Sim, excluir!",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        deleteForm.submit();
      }
    });
  });
}

document.addEventListener("DOMContentLoaded", function () {
  const btnPedido = document.getElementById("btnPedido"); // botão "Realizar Pedido"

  btnPedido.addEventListener("click", function () {
    const numeroPedido = Math.floor(1000 + Math.random() * 9000);

    const sabor = document.getElementById("selected-sabor").innerText;
    const recheio = document.getElementById("selected-recheio").innerText;
    const topo = document.getElementById("selected-topo").innerText;
    const decoracao = document.getElementById("selected-decoracao").innerText;

    Swal.fire({
      title: `Pedido #${numeroPedido} realizado!
      Agora aguarde o retorno do seu orçamento!`,
      html: `
        <div style="text-align:left">
          <p><b>Sabor:</b> ${sabor}</p>
          <p><b>Recheio:</b> ${recheio}</p>
          <p><b>Topo:</b> ${topo}</p>
          <p><b>Decoração:</b> ${decoracao}</p>
        </div>
      `,
      icon: "success",
      confirmButtonText: "OK",
      confirmButtonColor: "#d33",
    });
  });
});

//O que controla os slides do site
let currentSlide = 0;
const slides = document.querySelectorAll("#carousel > div");
const indicators = document.querySelectorAll(".indicator");
const totalSlides = slides.length;

function showSlide(n) {
  const carousel = document.getElementById("carousel");
  currentSlide = (n + totalSlides) % totalSlides;
  carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
  indicators.forEach((indicator, index) => {
    if (index === currentSlide) {
      indicator.classList.remove("opacity-50");
      indicator.classList.add("opacity-100");
    } else {
      indicator.classList.remove("opacity-100");
      indicator.classList.add("opacity-50");
    }
  });
}

function nextSlide() {
  showSlide(currentSlide + 1);
}

function prevSlide() {
  showSlide(currentSlide - 1);
}

function goToSlide(n) {
  showSlide(n);
}

setInterval(nextSlide, 5000);
function scrollToTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}
window.addEventListener("scroll", function () {
  const backToTop = document.querySelector(".back-to-top");
  if (window.pageYOffset > 300) {
    backToTop.classList.add("visible");
  } else {
    backToTop.classList.remove("visible");
  }
});
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute("href"));
    if (target) {
      target.scrollIntoView({ behavior: "smooth" });
    }
  });
});

//Gerencia pagina de catalogo e seuas modais
function ordenarProdutos(ordem) {
  let container = document.getElementById("catalogo");
  let produtos = Array.from(container.getElementsByClassName("produto"));

  produtos.sort((a, b) => {
    let precoA = parseFloat(a.getAttribute("data-preco"));
    let precoB = parseFloat(b.getAttribute("data-preco"));
    return ordem === "asc" ? precoA - precoB : precoB - precoA;
  });
  produtos.forEach((produto) => container.appendChild(produto));
}

let currentProduct = null;
let cart = [];

// Função para atualizar contador do carrinho no navbar (disponível globalmente)
function updateCartCount() {
  const savedCart = localStorage.getItem('lelacakes_cart');
  const cartCount = document.getElementById("cart-count");
  
  if (cartCount) {
    if (savedCart) {
      try {
        const cart = JSON.parse(savedCart);
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        if (totalItems > 0) {
          cartCount.textContent = totalItems;
          cartCount.classList.remove("hidden");
        } else {
          cartCount.classList.add("hidden");
        }
      } catch (e) {
        cartCount.classList.add("hidden");
      }
    } else {
      cartCount.classList.add("hidden");
    }
  }
}

// Carregar carrinho do localStorage ao iniciar
function loadCart() {
  const savedCart = localStorage.getItem('lelacakes_cart');
  if (savedCart) {
    try {
      cart = JSON.parse(savedCart);
    } catch (e) {
      cart = [];
    }
  }
}

// Salvar carrinho no localStorage
function saveCart() {
  localStorage.setItem('lelacakes_cart', JSON.stringify(cart));
}

// Inicializar carrinho ao carregar a página (apenas para catálogo)
function initializeCatalogCart() {
  loadCart();
  updateCartCount();
}

// Inicialização geral - só para catálogo
if (typeof window !== 'undefined') {
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function() {
      // Só inicializar se não for página de checkout
      if (!document.getElementById('cart-items-container')) {
        initializeCatalogCart();
      }
    });
  } else {
    // Só inicializar se não for página de checkout
    if (!document.getElementById('cart-items-container')) {
      initializeCatalogCart();
    }
  }
}

function openModal(button) {
  const productCard = button.closest(".produto");
  const image = productCard.querySelector("img").src;
  const title = productCard.querySelector("h5").textContent;
  const description = productCard.querySelector("p").textContent;
  const price = parseFloat(productCard.dataset.preco);
  const id = productCard.dataset.id;

  currentProduct = { id, image, title, description, price };

  document.getElementById("modal-image").src = image;
  document.getElementById("modal-title").textContent = title;
  document.getElementById("modal-description").textContent = description;
  document.getElementById("modal-price").textContent = `R$ ${price.toFixed(2).replace('.', ',')}`;
  document.getElementById("quantity").value = 1;
  updateTotal();

  const modal = document.getElementById("cart-modal");
  modal.classList.remove("hidden");
  modal.classList.add("flex");
  setTimeout(() => {
    modal.querySelector(".bg-white").style.transform = "scale(1)";
  }, 10);
}

function closeModal() {
  const modal = document.getElementById("cart-modal");
  modal.querySelector(".bg-white").style.transform = "scale(0.95)";
  setTimeout(() => {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  }, 200);
}

function increaseQuantity() {
  const quantityInput = document.getElementById("quantity");
  let currentValue = parseInt(quantityInput.value);
  if (currentValue < 99) {
    quantityInput.value = currentValue + 1;
    updateTotal();
  }
}

function decreaseQuantity() {
  const quantityInput = document.getElementById("quantity");
  let currentValue = parseInt(quantityInput.value);
  if (currentValue > 1) {
    quantityInput.value = currentValue - 1;
    updateTotal();
  }
}

function updateTotal() {
  const quantity = parseInt(document.getElementById("quantity").value);
  const total = currentProduct.price * quantity;
  document.getElementById("modal-total").textContent = `R$ ${total.toFixed(2).replace('.', ',')}`;
}

function addToCart() {
  if (!currentProduct) {
    console.error('Nenhum produto selecionado');
    return;
  }
  
  const quantity = parseInt(document.getElementById("quantity").value) || 1;
  console.log('Adicionando ao carrinho:', currentProduct, 'Quantidade:', quantity);
  
  // Garantir que cart é um array
  if (!Array.isArray(cart)) {
    cart = [];
  }
  
  const existingItem = cart.find((item) => item.id === currentProduct.id);

  if (existingItem) {
    existingItem.quantity += quantity;
    console.log('Item existente atualizado:', existingItem);
  } else {
    const newItem = {
      id: currentProduct.id,
      title: currentProduct.title,
      description: currentProduct.description,
      price: parseFloat(currentProduct.price),
      image: currentProduct.image,
      quantity: quantity
    };
    cart.push(newItem);
    console.log('Novo item adicionado:', newItem);
  }

  console.log('Carrinho após adicionar:', cart);
  saveCart();
  updateCartCount(); // Atualizar contador no navbar
  showSuccessMessage();
  closeModal();
}

// updateCartCount agora é uma função global definida acima
// Esta função local só é usada internamente quando necessário
function updateLocalCartCount() {
  const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
  updateCartCount(); // Usa a função global
}

function showSuccessMessage() {
  const notification = document.createElement("div");
  notification.className =
    "fixed top-24 right-8 bg-green-500 text-white px-6 py-4 rounded-2xl shadow-xl z-[110] transform translate-x-full transition-transform duration-300";
  notification.innerHTML = `
        <div class="flex items-center space-x-3">
            <i class="bi bi-check-circle text-xl"></i>
            <span class="font-semibold">Produto adicionado ao carrinho!</span>
        </div>
    `;

  document.body.appendChild(notification);

  setTimeout(() => {
    notification.style.transform = "translateX(0)";
  }, 10);

  setTimeout(() => {
    notification.style.transform = "translateX(100%)";
    setTimeout(() => {
      document.body.removeChild(notification);
    }, 300);
  }, 3000);
}

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("quantity").addEventListener("input", updateTotal);
  document.getElementById("cart-modal").addEventListener("click", function (e) {
    if (e.target === this) closeModal();
  });
  document.addEventListener("keydown", function (e) {
    if (
      e.key === "Escape" &&
      !document.getElementById("cart-modal").classList.contains("hidden")
    ) {
      closeModal();
    }
  });
});

function scrollToTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}

function ordenarProdutos(criteria) {
  const container = document.getElementById("catalogo");
  const produtos = Array.from(container.children);

  produtos.sort((a, b) => {
    const priceA = parseInt(a.dataset.preco);
    const priceB = parseInt(b.dataset.preco);
    switch (criteria) {
      case "asc":
        return priceA - priceB;
      case "desc":
        return priceB - priceA;
      default:
        return 0;
    }
  });

  produtos.forEach((produto) => container.appendChild(produto));
}

//Gerencia pagina de checkout
let checkoutCart = [];

// Carregar carrinho do localStorage na página de checkout
function loadCheckoutCart() {
  console.log('Carregando carrinho do checkout...');
  const savedCart = localStorage.getItem('lelacakes_cart');
  console.log('Carrinho salvo no localStorage:', savedCart);
  
  if (savedCart && savedCart.trim() !== '') {
    try {
      const parsedCart = JSON.parse(savedCart);
      console.log('Carrinho parseado:', parsedCart);
      
      // Validar que é um array
      if (Array.isArray(parsedCart)) {
        // Filtrar itens inválidos e validar estrutura
        checkoutCart = parsedCart.filter(item => {
          return item && 
                 item.id && 
                 item.title && 
                 typeof item.price === 'number' && 
                 typeof item.quantity === 'number' &&
                 item.quantity > 0;
        });
        
        console.log('Carrinho validado:', checkoutCart);
        console.log('Quantidade de itens válidos:', checkoutCart.length);
        
        if (checkoutCart.length > 0) {
          console.log('Carrinho tem itens, renderizando...');
          // Salvar carrinho validado de volta
          localStorage.setItem('lelacakes_cart', JSON.stringify(checkoutCart));
          renderCheckoutItems();
          updateCheckoutTotals();
          updateCartCountFromStorage();
        } else {
          console.log('Carrinho vazio após validação');
          checkoutCart = [];
          localStorage.removeItem('lelacakes_cart');
          checkEmptyCart();
          updateCheckoutTotals();
        }
      } else {
        console.error('Carrinho não é um array:', parsedCart);
        checkoutCart = [];
        localStorage.removeItem('lelacakes_cart');
        checkEmptyCart();
        updateCheckoutTotals();
      }
    } catch (e) {
      console.error('Erro ao carregar carrinho:', e);
      checkoutCart = [];
      localStorage.removeItem('lelacakes_cart');
      checkEmptyCart();
      updateCheckoutTotals();
    }
  } else {
    console.log('Nenhum carrinho encontrado no localStorage');
    checkoutCart = [];
    checkEmptyCart();
    updateCheckoutTotals();
  }
}

// Renderizar itens do carrinho no checkout
function renderCheckoutItems() {
  console.log('Renderizando itens do checkout...');
  const container = document.getElementById('cart-items-container');
  const cartGrid = document.getElementById('cart-grid');
  
  if (!container) {
    console.error('Container de itens não encontrado!');
    return;
  }
  
  console.log('Carrinho tem', checkoutCart.length, 'itens');
  
  if (checkoutCart.length === 0) {
    console.log('Carrinho vazio, chamando checkEmptyCart');
    checkEmptyCart();
    return;
  }
  
  // Mostrar grid se estava escondido
  if (cartGrid) {
    cartGrid.style.display = 'grid';
    cartGrid.classList.remove('hidden');
  }
  const emptyCart = document.getElementById('empty-cart');
  if (emptyCart) {
    emptyCart.style.display = 'none';
    emptyCart.classList.add('hidden');
  }
  
  container.innerHTML = '';
  
  checkoutCart.forEach((item, index) => {
    try {
      // Validar item antes de renderizar
      if (!item || !item.id || !item.title || typeof item.price !== 'number' || typeof item.quantity !== 'number') {
        console.warn('Item inválido ignorado:', item);
        return;
      }
      
      const itemId = `item-${item.id}-${index}`;
      const itemTotal = (parseFloat(item.price) * parseInt(item.quantity)).toFixed(2).replace('.', ',');
      const itemPrice = parseFloat(item.price).toFixed(2).replace('.', ',');
      
      // Função auxiliar para escapar HTML
      const escapeHtml = (text) => {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
      };
      
      const safeTitle = escapeHtml(item.title || '');
      const safeDescription = escapeHtml(item.description || '');
      const safeImage = item.image || 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=120&h=120&fit=crop';
      
      // Criar elemento usando createElement para evitar problemas com HTML
      const itemDiv = document.createElement('div');
      itemDiv.className = 'cart-item bg-white rounded-3xl shadow-xl p-6 transform hover:scale-[1.02] transition-all duration-300';
      itemDiv.setAttribute('data-item-id', item.id);
      itemDiv.setAttribute('data-item-index', index);
      itemDiv.id = itemId;
      
      itemDiv.innerHTML = `
        <div class="flex items-center space-x-6">
          <img
            src="${safeImage}"
            class="w-24 h-24 rounded-2xl object-cover shadow-lg"
            alt="${safeTitle}"
            onerror="this.src='https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=120&h=120&fit=crop'"
          />
          <div class="flex-1">
            <h3 class="text-2xl font-heading font-bold text-gray-800 mb-2">
              ${safeTitle}
            </h3>
            <p class="text-gray-600 mb-3">
              ${safeDescription}
            </p>
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-4">
                <button
                  onclick="updateCheckoutQuantity('${itemId}', -1)"
                  class="w-10 h-10 rounded-full bg-red-100 hover:bg-red-200 flex items-center justify-center text-red-500 font-bold transition-all duration-300"
                >
                  <i class="bi bi-dash"></i>
                </button>
                <span
                  id="qty-${itemId}"
                  class="text-xl font-bold text-gray-800 min-w-8 text-center"
                >${item.quantity}</span>
                <button
                  onclick="updateCheckoutQuantity('${itemId}', 1)"
                  class="w-10 h-10 rounded-full bg-red-100 hover:bg-red-200 flex items-center justify-center text-red-500 font-bold transition-all duration-300"
                >
                  <i class="bi bi-plus"></i>
                </button>
              </div>
              <div class="text-right">
                <p class="text-3xl font-bold bg-gradient-to-r from-red-500 to-red-700 bg-clip-text text-transparent item-total-price">R$ ${itemTotal}</p>
                <p class="text-sm text-gray-500">R$ ${itemPrice} cada</p>
                <button
                  onclick="removeCheckoutItem('${itemId}')"
                  class="text-red-400 hover:text-red-600 text-sm mt-1 transition-colors duration-300"
                >
                  <i class="bi bi-trash mr-1"></i> Remover
                </button>
              </div>
            </div>
          </div>
        </div>
      `;
      
      container.appendChild(itemDiv);
      console.log('Item renderizado:', item.title);
    } catch (e) {
      console.error('Erro ao renderizar item:', e, item);
    }
  });
  
  // Adicionar botão "Continue Comprando"
  const continueShoppingHTML = `
    <div class="text-center pt-6">
      <a
        href="catalogo.php"
        class="inline-flex items-center space-x-3 text-red-500 hover:text-red-600 font-semibold text-lg transition-all duration-300 hover:scale-105"
      >
        <i class="bi bi-arrow-left"></i>
        <span>Continue Comprando</span>
      </a>
    </div>
  `;
  container.innerHTML += continueShoppingHTML;
  
  console.log('Itens renderizados com sucesso');
}

// Atualizar quantidade de um item no checkout
function updateCheckoutQuantity(itemId, change) {
  const itemElement = document.getElementById(itemId);
  if (!itemElement) return;
  
  const itemIndex = parseInt(itemElement.dataset.itemIndex);
  const item = checkoutCart[itemIndex];
  
  if (!item) return;
  
  const newQty = Math.max(1, item.quantity + change);
  item.quantity = newQty;
  
  // Atualizar quantidade no localStorage e sincronizar checkoutCart
  const savedCart = localStorage.getItem('lelacakes_cart');
  if (savedCart) {
    const cart = JSON.parse(savedCart);
    const cartItem = cart.find(cartItem => cartItem.id === item.id);
    if (cartItem) {
      cartItem.quantity = newQty;
      localStorage.setItem('lelacakes_cart', JSON.stringify(cart));
      // Sincronizar checkoutCart com o localStorage
      checkoutCart[itemIndex].quantity = newQty;
    }
  }
  
  // Atualizar contador no navbar
  updateCartCountFromStorage();
  
  // Atualizar quantidade no DOM com animação
  const qtyElement = document.getElementById(`qty-${itemId}`);
  if (qtyElement) {
    qtyElement.style.transform = "scale(1.2)";
    qtyElement.style.color = "#ef4444";
    qtyElement.textContent = newQty;
    
    setTimeout(() => {
      qtyElement.style.transform = "scale(1)";
      qtyElement.style.color = "";
    }, 200);
  }
  
  // Atualizar preço total do item
  const itemTotal = (item.price * newQty).toFixed(2).replace('.', ',');
  const priceElement = itemElement.querySelector('.item-total-price');
  if (priceElement) {
    priceElement.textContent = `R$ ${itemTotal}`;
  }
  
  // Atualizar totais
  updateCheckoutTotals();
}

// Função auxiliar para atualizar contador do carrinho no navbar
function updateCartCountFromStorage() {
  updateCartCount(); // Usa a função global
}

// Remover item do checkout
function removeCheckoutItem(itemId) {
  const itemElement = document.getElementById(itemId);
  if (!itemElement) return;
  
  const itemIndex = parseInt(itemElement.dataset.itemIndex);
  const item = checkoutCart[itemIndex];
  
  if (!item) return;
  
  // Animação de remoção
  itemElement.style.transform = "translateX(-100%)";
  itemElement.style.opacity = "0";
  
  setTimeout(() => {
    // Remover do carrinho
    checkoutCart = checkoutCart.filter((_, index) => index !== itemIndex);
    
    // Atualizar localStorage
    localStorage.setItem('lelacakes_cart', JSON.stringify(checkoutCart));
    
    // Atualizar contador no navbar
    updateCartCountFromStorage();
    
    // Re-renderizar
    renderCheckoutItems();
    updateCheckoutTotals();
    checkEmptyCart();
  }, 300);
  
  showNotification("Item removido do carrinho", "error");
}

// Atualizar totais do checkout
function updateCheckoutTotals() {
  let subtotal = 0;
  let totalItems = 0;
  
  checkoutCart.forEach((item) => {
    subtotal += item.price * item.quantity;
    totalItems += item.quantity;
  });
  

  const total = subtotal;
  
  const subtotalElement = document.getElementById("subtotal");
  const subtotalLabelElement = document.getElementById("subtotal-label");
  const totalElement = document.getElementById("total");
  
  if (subtotalElement) {
    subtotalElement.textContent = `R$ ${subtotal.toFixed(2).replace('.', ',')}`;
  }
  
  if (subtotalLabelElement) {
    subtotalLabelElement.textContent = `Subtotal (${totalItems} ${totalItems === 1 ? 'item' : 'itens'}):`;
  }
  
  if (totalElement) {
    totalElement.textContent = `R$ ${total.toFixed(2).replace('.', ',')}`;
  }
  
  // Mostrar/ocultar desconto
  const discountRow = document.getElementById("discount-row");
  if (discountRow) {
    if (discount > 0) {
      discountRow.classList.remove("hidden");
      const discountElement = document.getElementById("discount");
      if (discountElement) {
        discountElement.textContent = `-R$ ${discount.toFixed(2).replace('.', ',')}`;
      }
    } else {
      discountRow.classList.add("hidden");
    }
  }
}

// Verificar se o carrinho está vazio
function checkEmptyCart() {
  console.log('Verificando se carrinho está vazio...', checkoutCart.length);
  const cartGrid = document.getElementById('cart-grid');
  const emptyCart = document.getElementById('empty-cart');
  const container = document.getElementById('cart-items-container');
  
  console.log('Elementos encontrados:', {
    cartGrid: !!cartGrid,
    emptyCart: !!emptyCart,
    container: !!container,
    cartLength: checkoutCart ? checkoutCart.length : 0
  });
  
  // Sempre garantir que temos um array válido
  const isEmpty = !Array.isArray(checkoutCart) || checkoutCart.length === 0;
  
  if (isEmpty) {
    console.log('Carrinho vazio - escondendo grid e mostrando mensagem');
    
    // Esconder o grid com os itens e resumo
    if (cartGrid) {
      cartGrid.style.display = 'none';
      cartGrid.classList.add('hidden');
      console.log('Grid escondido');
    }
    
    // Mostrar mensagem de carrinho vazio
    if (emptyCart) {
      emptyCart.style.display = 'block';
      emptyCart.classList.remove('hidden');
      console.log('Mensagem de carrinho vazio mostrada');
    }
    
    // Limpar container de itens
    if (container) {
      container.innerHTML = '';
    }
  } else {
    console.log('Carrinho tem itens - mostrando grid e escondendo mensagem');
    
    // Mostrar o grid com os itens
    if (cartGrid) {
      cartGrid.style.display = 'grid';
      cartGrid.classList.remove('hidden');
      console.log('Grid mostrado');
    }
    
    // Esconder mensagem de carrinho vazio
    if (emptyCart) {
      emptyCart.style.display = 'none';
      emptyCart.classList.add('hidden');
      console.log('Mensagem de carrinho vazio escondida');
    }
  }
}

// Finalizar compra
function proceedCheckout() {
  if (checkoutCart.length === 0) {
    showNotification("Adicione itens ao carrinho antes de finalizar", "error");
    return;
  }
  
  showNotification("Redirecionando para finalização...", "success");
  // Aqui você pode redirecionar para uma página de pagamento ou processar o pedido
  // window.location.href = 'pagamento.php';
}

// Inicializar checkout quando a página carregar
function initializeCheckoutPage() {
  console.log('DOM carregado, inicializando checkout...');
  
  // Atualizar contador do carrinho em todas as páginas
  updateCartCount();
  
  // Verificar se estamos na página de checkout
  const checkoutContainer = document.getElementById('cart-items-container');
  const emptyCartDiv = document.getElementById('empty-cart');
  const cartGrid = document.getElementById('cart-grid');
  
  if (checkoutContainer) {
    console.log('Página de checkout detectada, carregando carrinho...');
    
    // Garantir estado inicial correto
    // Por padrão, mostrar empty-cart e esconder grid até carregar dados
    if (emptyCartDiv) {
      // Não fazer nada - já está hidden por padrão no HTML
    }
    if (cartGrid) {
      // Grid já está visível por padrão, mas vamos verificar
    }
    
    // Carregar carrinho imediatamente
    loadCheckoutCart();
  } else {
    console.log('Não é página de checkout');
  }
}

// Event listener único para checkout
if (typeof window !== 'undefined') {
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeCheckoutPage);
  } else {
    // DOM já carregado
    initializeCheckoutPage();
  }
}

function showNotification(message, type = "success") {
  const bgColor = type === "success" ? "bg-green-500" : "bg-red-500";
  const icon = type === "success" ? "bi-check-circle" : "bi-x-circle";

  const notification = document.createElement("div");
  notification.className = `fixed top-24 right-8 ${bgColor} text-white px-6 py-4 rounded-2xl shadow-xl z-50 transform translate-x-full transition-transform duration-300`;
  notification.innerHTML = `
        <div class="flex items-center space-x-3">
            <i class="bi ${icon} text-xl"></i>
            <span class="font-semibold">${message}</span>
        </div>
    `;

  document.body.appendChild(notification);

  setTimeout(() => {
    notification.style.transform = "translateX(0)";
  }, 10);

  setTimeout(() => {
    notification.style.transform = "translateX(100%)";
    setTimeout(() => {
      if (document.body.contains(notification)) {
        document.body.removeChild(notification);
      }
    }, 300);
  }, 3000);
}

document.addEventListener("DOMContentLoaded", function () {
  updateTotals();
});

// -------------------------------
// ⬇️ Dropdown do usuário
// -------------------------------
document.addEventListener("DOMContentLoaded", function() {
  const userMenuButton = document.getElementById("userMenuButton");
  const userDropdown = document.getElementById("userDropdown");

  console.log("userMenuButton:", userMenuButton);
  console.log("userDropdown:", userDropdown);

  if (userMenuButton && userDropdown) {
    userMenuButton.addEventListener("click", (e) => {
      console.log("Botão do usuário clicado!");
      e.preventDefault();
      e.stopPropagation();
      userDropdown.classList.toggle("hidden");
    });

    document.addEventListener("click", (event) => {
      if (
        !userMenuButton.contains(event.target) &&
        !userDropdown.contains(event.target)
      ) {
        userDropdown.classList.add("hidden");
      }
    });
  } else {
    console.log("Elementos do dropdown do usuário não encontrados");
  }
});

//Gerencia toda a dashboard do usuario com sua sidebar e seções igual a do admin. Nome da função diferente mas logica parecida.
function showSection(section) {
  document.querySelectorAll(".section-content").forEach((content) => {
    content.classList.add("hidden");
  });

  document.querySelectorAll('[id^="nav-"]').forEach((nav) => {
    nav.classList.remove(
      "bg-red-50",
      "text-red-600",
      "border-l-4",
      "border-red-500"
    );
    nav.classList.add("text-red-700");
    const span = nav.querySelector("span");
    if (span) span.classList.remove("font-medium");
  });

  document.getElementById(`section-${section}`).classList.remove("hidden");

  const activeNav = document.getElementById(`nav-${section}`);
  activeNav.classList.add(
    "bg-red-50",
    "text-red-600",
    "border-l-4",
    "border-red-500"
  );
  activeNav.classList.remove("text-red-700");
  const span = activeNav.querySelector("span");
  if (span) span.classList.add("font-medium");
}

function toggleAddressForm() {
  const form = document.getElementById("address-form");
  form.classList.toggle("hidden");
}

function validarFormularioEndereco(form) {
  const campos = form.querySelectorAll("input[required], select[required]");
  let valido = true;

  campos.forEach((campo) => {
    if (!campo.value.trim()) {
      campo.classList.add("border-red-500");
      valido = false;
    } else {
      campo.classList.remove("border-red-500");
    }
  });

  return valido;
}

// Função para alternar formulário de produto
function toggleProductForm() {
  const form = document.getElementById("product-form");
  form.classList.toggle("hidden");
}

// Função para filtrar pedidos por status
function filtrarPorStatus(status) {
  const pedidos = document.querySelectorAll(".pedido-card");

  pedidos.forEach((pedido) => {
    if (status === "todos" || pedido.dataset.status === status) {
      pedido.style.display = "block"; // mostra
    } else {
      pedido.style.display = "none"; // esconde
    }
  });
}

// Função para filtrar usuários
function filtrarUsuarios() {
  const termo = document.getElementById("buscarUsuario").value.toLowerCase();
  const linhas = document.querySelectorAll("#tabelaUsuarios tr");

  linhas.forEach((linha) => {
    const nome = linha.getAttribute("data-nome") || "";
    const email = linha.getAttribute("data-email") || "";

    if (nome.includes(termo) || email.includes(termo)) {
      linha.style.display = "";
    } else {
      linha.style.display = "none";
    }
  });
}

// Função para editar usuário
function editarUsuario(id) {
  if (confirm("Deseja editar este usuário?")) {
    // Implementar modal de edição ou redirecionar para página de edição
    console.log("Editando usuário ID:", id);
    // window.location.href = 'editar-usuario.php?id=' + id;
  }
}

// Função para bloquear usuário
function bloquearUsuario(id) {
  if (confirm("Tem certeza que deseja bloquear este usuário?")) {
    // Implementar requisição AJAX para bloquear usuário
    console.log("Bloqueando usuário ID:", id);

    // Exemplo de requisição AJAX
    fetch("bloquear-usuario.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ id: id }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          alert("Usuário bloqueado com sucesso!");
          location.reload(); // Recarregar a página para atualizar os dados
        } else {
          alert("Erro ao bloquear usuário: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Erro:", error);
        alert("Erro ao bloquear usuário");
      });
  }
}

// Função para mostrar seções (corrigindo o nome da função)
function showSextion(section) {
  document.querySelectorAll(".section-content").forEach((content) => {
    content.classList.add("hidden");
  });

  document.querySelectorAll('[id^="nav-"]').forEach((nav) => {
    nav.classList.remove(
      "bg-red-50",
      "text-red-600",
      "border-l-4",
      "border-red-500"
    );
    nav.classList.add("text-red-700");
    const span = nav.querySelector("span");
    if (span) span.classList.remove("font-medium");
  });

  document.getElementById(section).classList.remove("hidden");

  const activeNav = document.getElementById(`nav-${section}`);
  activeNav.classList.add(
    "bg-red-50",
    "text-red-600",
    "border-l-4",
    "border-red-500"
  );
  activeNav.classList.remove("text-red-700");
  const span = activeNav.querySelector("span");
  if (span) span.classList.add("font-medium");
}

// Função para confirmar exclusão
function confirmarExclusao(nomeProduto, event) {
  if (event) {
    event.preventDefault();
    event.stopPropagation();
  }
  
  Swal.fire({
    title: 'Confirmar Exclusão',
    html: `<p>Tem certeza que deseja excluir o produto:</p><strong>"${nomeProduto}"</strong><br><br><p class="text-red-600 text-sm">`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#e53935',
    cancelButtonColor: '#6b7280',
    confirmButtonText: 'Sim, excluir!',
    cancelButtonText: 'Cancelar',
    reverseButtons: true,
    focusCancel: true,
    allowOutsideClick: false,
    allowEscapeKey: true
  }).then((result) => {
    if (result.isConfirmed) {
      // Se confirmou, submeter o formulário
      const form = event.target.closest('form');
      if (form) {
        form.submit();
      }
    }
    // Se cancelou, não faz nada
  }).catch((error) => {
    console.error('Erro no Sweet Alert:', error);
  });
  
  // Retornar false para não submeter o formulário
  return false;
}

// Funções para página Monte seu Bolo
function selectOption(element, category, value) {
  // Remover seleção anterior da mesma categoria
  const parentSection = element.closest('.bg-white.rounded-3xl');
  if (parentSection) {
    parentSection.querySelectorAll('.option-card').forEach(card => {
      card.classList.remove('selected');
      card.classList.remove('border-red-500', 'bg-red-50');
      card.classList.add('border-gray-200');
    });
  }
  
  // Adicionar seleção atual
  element.classList.add('selected');
  element.classList.add('border-red-500', 'bg-red-50');
  element.classList.remove('border-gray-200');
  element.setAttribute('data-category', category);
  
  // Atualizar resumo
  updateSummary(category, value);
  
  // Atualizar indicadores de etapa
  updateStepIndicator(category);
}

function updateSummary(category, value) {
  // Formatar o valor para exibição (capitalizar primeira letra)
  let displayValue = value;
  if (value && value.length > 0) {
    displayValue = value.charAt(0).toUpperCase() + value.slice(1);
  }
  
  const elementId = `selected-${category}`;
  const element = document.getElementById(elementId);
  
  if (element) {
    element.textContent = displayValue;
    element.classList.remove('text-gray-400');
    element.classList.add('text-gray-800');
  }
}

function updateStepIndicator(category) {
  const stepMap = {
    'sabor': { step: 1, nextStep: 2 },
    'recheio': { step: 2, nextStep: 3 },
    'topo': { step: 3, nextStep: 4 },
    'decoracao': { step: 4, nextStep: null }
  };
  
  const stepInfo = stepMap[category];
  if (!stepInfo) return;
  
  // Ativar etapa atual
  const currentIndicator = document.getElementById(`step-${stepInfo.step}-indicator`);
  const currentTitle = document.getElementById(`step-${stepInfo.step}-title`);
  
  if (currentIndicator) {
    currentIndicator.classList.remove('bg-gray-300', 'text-gray-600');
    currentIndicator.classList.add('bg-red-500', 'text-white');
  }
  
  if (currentTitle) {
    currentTitle.classList.remove('text-gray-400');
    currentTitle.classList.add('text-gray-800');
  }
  
  // Ativar próxima etapa se existir
  if (stepInfo.nextStep) {
    const nextIndicator = document.getElementById(`step-${stepInfo.nextStep}-indicator`);
    const nextTitle = document.getElementById(`step-${stepInfo.nextStep}-title`);
    
    if (nextIndicator) {
      nextIndicator.classList.remove('bg-gray-300', 'text-gray-600');
      nextIndicator.classList.add('bg-gray-200', 'text-gray-500');
    }
    
    if (nextTitle) {
      nextTitle.classList.remove('text-gray-400');
      nextTitle.classList.add('text-gray-500');
    }
  }
  
  // Atualizar indicadores visuais no topo
  updateTopStepIndicators(stepInfo.step);
}

function updateTopStepIndicators(activeStep) {
  const indicators = document.querySelectorAll('.step-indicator');
  indicators.forEach((indicator, index) => {
    const stepNumber = index + 1;
    if (stepNumber <= activeStep) {
      indicator.classList.remove('bg-gray-300');
      indicator.classList.add('bg-red-500', 'text-white');
    } else {
      indicator.classList.remove('bg-red-500', 'text-white');
      indicator.classList.add('bg-gray-300');
    }
  });
}

function realizarPedido() {
  const sabor = document.getElementById('selected-sabor').textContent;
  const recheio = document.getElementById('selected-recheio').textContent;
  const topo = document.getElementById('selected-topo').textContent;
  const decoracao = document.getElementById('selected-decoracao').textContent;
  
  // Verificar se todas as opções foram selecionadas
  if (recheio === 'Não selecionado' || topo === 'Não selecionado' || decoracao === 'Não selecionado') {
    Swal.fire({
      icon: 'warning',
      title: 'Etapas Incompletas',
      text: 'Por favor, complete todas as etapas antes de finalizar o pedido.',
      confirmButtonColor: '#e53935'
    });
    return;
  }
  
  const numeroPedido = Math.floor(1000 + Math.random() * 9000);
  
  Swal.fire({
    title: `Pedido #${numeroPedido} realizado!`,
    html: `
      <div style="text-align:left">
        <p><b>Sabor:</b> ${sabor}</p>
        <p><b>Recheio:</b> ${recheio}</p>
        <p><b>Topo:</b> ${topo}</p>
        <p><b>Decoração:</b> ${decoracao}</p>
      </div>
    `,
    icon: 'success',
    confirmButtonText: 'OK',
    confirmButtonColor: '#e53935',
  });
}

// Funções para modal de edição de produto
function abrirModalEdicao(produtoId, nomeProduto, precoAtual, statusAtual) {
  // Preencher os campos do modal
  document.getElementById('produto_id_edit').value = produtoId;
  document.getElementById('nome_produto_edit').value = nomeProduto;
  document.getElementById('novo_preco_edit').value = precoAtual;
  
  // Selecionar o status atual no select
  const selectStatus = document.getElementById('novo_status_edit');
  selectStatus.value = statusAtual;
  
  // Mostrar o modal
  document.getElementById('modalEdicao').classList.remove('hidden');
  
  // Focar no campo de preço
  setTimeout(() => {
    document.getElementById('novo_preco_edit').focus();
  }, 100);
}

function fecharModalEdicao() {
  // Limpar formulário
  document.getElementById('formEdicao').reset();
  document.getElementById('produto_id_edit').value = '';
  
  // Esconder o modal
  document.getElementById('modalEdicao').classList.add('hidden');
}

// Fechar modal de edição ao clicar fora dele
document.addEventListener('DOMContentLoaded', function() {
  const modalEdicao = document.getElementById('modalEdicao');
  if (modalEdicao) {
    modalEdicao.addEventListener('click', function(e) {
      if (e.target === this) {
        fecharModalEdicao();
      }
    });
  }
  
  // Fechar modal de edição com ESC
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      fecharModalEdicao();
    }
  });
});

// --------------------------
  // 8. Máscara de CPF
  // --------------------------
  const cpfInput = document.getElementById("CPF");

  if (cpfInput) {
    cpfInput.addEventListener("input", function (e) {
      let value = e.target.value.replace(/\D/g, "");
      
      if (value.length > 11) value = value.slice(0, 11);

      if (value.length > 9) {
        value = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{0,2}).*/, "$1.$2.$3-$4");
      } else if (value.length > 6) {
        value = value.replace(/^(\d{3})(\d{3})(\d{0,3})/, "$1.$2.$3");
      } else if (value.length > 3) {
        value = value.replace(/^(\d{3})(\d{0,3})/, "$1.$2");
      }
      e.target.value = value; 
    });
  }

    // --------------------------
  // 9. Máscara de telefone
  // --------------------------
  const telefoneInput = document.getElementById("telefone");

  if (telefoneInput) {
    telefoneInput.addEventListener("input", function (e) {
      let value = e.target.value.replace(/\D/g, ""); // remove tudo que não é número
      
      if (value.length > 11) value = value.slice(0, 11); // limita a 11 dígitos
      
      if (value.length > 10) {
        // formato (99) 99999-9999
        value = value.replace(/^(\d{2})(\d{5})(\d{4}).*/, "($1) $2-$3");
      } else if (value.length > 5) {
        // formato (99) 9999-9999
        value = value.replace(/^(\d{2})(\d{4})(\d{0,4}).*/, "($1) $2-$3");
      } else if (value.length > 2) {
        // formato (99) 9999
        value = value.replace(/^(\d{2})(\d{0,5})/, "($1) $2");
      } else {
        value = value.replace(/^(\d*)/, "($1");
      }
      e.target.value = value;
    });
  }

  function applyMaskCEP(input) {
  // Remove tudo que não for número
  let cep = input.value.replace(/\D/g, "");

  // Limita a 8 dígitos
  cep = cep.substring(0, 8);

  // Aplica a máscara: 00000-000
  if (cep.length > 5) {
    cep = cep.substring(0, 5) + "-" + cep.substring(5);
  }

  input.value = cep;
}
