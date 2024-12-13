const cartButton = document.querySelector('.cart-button');
const cartSummary = document.querySelector('.cart-summary');
const cartOverlay = document.querySelector('.cart-overlay');
const closeCartButton = document.querySelector('.close-cart');

// Abrir o carrinho
cartButton.addEventListener('click', () => {
  cartSummary.classList.add('open');
  cartOverlay.classList.add('active');
  cartOverlay.classList.remove('hidden');
});

// Fechar o carrinho ao clicar no botão de fechar ou no overlay
function closeCart() {
  cartSummary.classList.remove('open');
  cartOverlay.classList.remove('active');
  cartOverlay.classList.add('hidden');
}

closeCartButton.addEventListener('click', closeCart);
cartOverlay.addEventListener('click', closeCart);

function updateCartCount(count) {
    const cartCount = document.querySelector('.cart-count');
    cartCount.setAttribute('data-count', count);
    cartCount.textContent = count;
}

// Exemplo: Atualizar para 5 itens
updateCartCount(0);

const carrinho = {};

function alterarQuantidade(produto, quantidade) {
  // Inicializa o produto no carrinho se não existir
  if (!carrinho[produto]) {
    carrinho[produto] = 0;
  }

  // Altera a quantidade, sem permitir valores negativos
  carrinho[produto] = Math.max(0, carrinho[produto] + quantidade);

  // Atualiza a interface
  document.getElementById(`quantidade-${produto}`).textContent = carrinho[produto];

  console.log(`Carrinho atualizado:`, carrinho);
}

