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

function openModal(button) {
  const productCard = button.closest(".produto");
  const image = productCard.querySelector("img").src;
  const title = productCard.querySelector("h5").textContent;
  const description = productCard.querySelector("p").textContent;
  const price = parseInt(productCard.dataset.preco);

  currentProduct = { image, title, description, price };

  document.getElementById("modal-image").src = image;
  document.getElementById("modal-title").textContent = title;
  document.getElementById("modal-description").textContent = description;
  document.getElementById("modal-price").textContent = `R$${price}`;
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
  document.getElementById("modal-total").textContent = `R$${total}`;
}

function addToCart() {
  const quantity = parseInt(document.getElementById("quantity").value);
  const existingItem = cart.find((item) => item.title === currentProduct.title);

  if (existingItem) {
    existingItem.quantity += quantity;
  } else {
    cart.push({ ...currentProduct, quantity });
  }

  updateCartCount();
  showSuccessMessage();
  closeModal();
}

function updateCartCount() {
  const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
  const cartCount = document.getElementById("cart-count");

  if (totalItems > 0) {
    cartCount.textContent = totalItems;
    cartCount.classList.remove("hidden");
  } else {
    cartCount.classList.add("hidden");
  }
}

function showSuccessMessage() {
  const notification = document.createElement("div");
  notification.className =
    "fixed top-24 right-8 bg-green-500 text-white px-6 py-4 rounded-2xl shadow-xl z-[110] transform translate-x-full transition-transform duration-300";
  notification.inne.php = `
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
const items = {
  item1: { name: "Bolo de Chocolate", price: 25, qty: 2 },
  item2: { name: "Bolo de Rolo", price: 3, qty: 1 },
  item3: { name: "Docinhos Variados", price: 5, qty: 3 },
};

function updateQuantity(itemId, change) {
  const currentQty = parseInt(
    document.getElementById(`qty-${itemId}`).textContent
  );
  const newQty = Math.max(1, currentQty + change);
  document.getElementById(`qty-${itemId}`).textContent = newQty;
  items[itemId].qty = newQty;

  const qtyElement = document.getElementById(`qty-${itemId}`);
  qtyElement.style.transform = "scale(1.2)";
  qtyElement.style.color = "#ef4444";

  setTimeout(() => {
    qtyElement.style.transform = "scale(1)";
    qtyElement.style.color = "";
  }, 200);

  updateTotals();
}

function removeItem(itemId) {
  const itemElement = document
    .getElementById(`qty-${itemId}`)
    .closest(".bg-white");
  itemElement.style.transform = "translateX(-100%)";
  itemElement.style.opacity = "0";

  setTimeout(() => {
    itemElement.remove();
    delete items[itemId];
    updateTotals();
    checkEmptyCart();
  }, 300);

  showNotification("Item removido do carrinho", "error");
}

function updateTotals() {
  let subtotal = 0;
  let totalItems = 0;

  Object.values(items).forEach((item) => {
    subtotal += item.price * item.qty;
    totalItems += item.qty;
  });

  const delivery = 5;
  const discount = 3;
  const total = subtotal + delivery - discount;

  document.getElementById("subtotal").textContent = `R$${subtotal}`;
  document.getElementById("total").textContent = `R$${total}`;
}

function checkEmptyCart() {
  if (Object.keys(items).length === 0) {
    document.querySelector(".grid").style.display = "none";
    document.getElementById("empty-cart").classList.remove("hidden");
  }
}

function proceedCheckout() {
  showNotification("Redirecionando para o checkout...", "success");
  setTimeout(() => {
    alert("Redirecionando para página de checkout...");
  }, 1500);
}

function showNotification(message, type = "success") {
  const bgColor = type === "success" ? "bg-green-500" : "bg-red-500";
  const icon = type === "success" ? "bi-check-circle" : "bi-x-circle";

  const notification = document.createElement("div");
  notification.className = `fixed top-24 right-8 ${bgColor} text-white px-6 py-4 rounded-2xl shadow-xl z-50 transform translate-x-full transition-transform duration-300`;
  notification.inne.php = `
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
const userMenuButton = document.getElementById("userMenuButton");
const userDropdown = document.getElementById("userDropdown");

if (userMenuButton && userDropdown) {
  userMenuButton.addEventListener("click", () => {
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
}

//Gerencia a pagina monte o seu bolo.
let selections = {
  sabor: "chocolate",
  recheio: null,
  topo: null,
  decoracao: null,
};

function selectOption(element, category, value) {
  const siblings = element.parentElement.children;
  for (let sibling of siblings) {
    sibling.classList.remove("selected");
  }
  element.classList.add("selected");
  selections[category] = value;
  const summaryElement = document.getElementById(`selected-${category}`);
  summaryElement.textContent = value.charAt(0).toUpperCase() + value.slice(1);
  summaryElement.classList.remove("text-gray-400");
  summaryElement.classList.add("text-gray-800");
  updateStepIndicators();
}

function updateStepIndicators() {
  const indicators = document.querySelectorAll(".step-indicator");
  let completedSteps = 0;
  if (selections.sabor) completedSteps++;
  if (selections.recheio) completedSteps++;
  if (selections.topo) completedSteps++;
  if (selections.decoracao) completedSteps++;
  indicators.forEach((indicator, index) => {
    indicator.classList.remove("active", "completed");
    if (index < completedSteps) {
      indicator.classList.add("completed");
    } else if (index === completedSteps) {
      indicator.classList.add("active");
    }
  });
  updateSectionStates();
}

function updateSectionStates() {
  if (selections.sabor) {
    enableSection(2);
  }
  if (selections.recheio) {
    enableSection(3);
  }
  if (selections.topo) {
    enableSection(4);
  }
}

function enableSection(stepNumber) {
  const sections = document.querySelectorAll(
    ".bg-white.rounded-3xl.shadow-xl.p-8"
  );
  const section = sections[stepNumber - 1];
  const stepIndicator = section.querySelector(".bg-gray-300");
  const title = section.querySelector(".text-gray-400");
  const options = section.querySelector(".opacity-50");
  if (stepIndicator) {
    stepIndicator.classList.remove("bg-gray-300", "text-gray-600");
    stepIndicator.classList.add("bg-red-500", "text-white");
  }
  if (title) {
    title.classList.remove("text-gray-400");
    title.classList.add("text-gray-800");
  }
  if (options) {
    options.classList.remove("opacity-50");
    const optionCards = options.querySelectorAll(".option-card");
    optionCards.forEach((card) => {
      card.style.pointerEvents = "auto";
      card.addEventListener("click", function () {
        const category =
          stepNumber === 2
            ? "recheio"
            : stepNumber === 3
            ? "topo"
            : "decoracao";
        const value = this.querySelector("h3")
          .textContent.toLowerCase()
          .replace(" ", "");
        selectOption(this, category, value);
      });
    });
  }
}

updateStepIndicators();

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
document.addEventListener("DOMContentLoaded", function () {
  const userMenuButton = document.getElementById("userMenuButton");
  const userDropdown = document.getElementById("userDropdown");

  if (userMenuButton && userDropdown) {
    userMenuButton.addEventListener("click", function (e) {
      e.preventDefault();
      userDropdown.classList.toggle("hidden");
    });

    document.addEventListener("click", function (e) {
      if (
        !userMenuButton.contains(e.target) &&
        !userDropdown.contains(e.target)
      ) {
        userDropdown.classList.add("hidden");
      }
    });
  }
});

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
