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

const carrinho = JSON.parse(localStorage.getItem('carrinho')) || {};

// Atualiza a interface com os dados do carrinho
function atualizarInterfaceCarrinho() {
  for (const produtoId in carrinho) {
    const quantidadeElemento = document.getElementById(`quantidade-${produtoId}`);
    if (quantidadeElemento) {
      quantidadeElemento.textContent = carrinho[produtoId];
    }
  }

  atualizarResumoCarrinho();
}

// Altera a quantidade de um produto no carrinho
function alterarQuantidade(produtoId, quantidade) {
  if (!carrinho[produtoId]) {
    carrinho[produtoId] = 0;
  }

  carrinho[produtoId] = Math.max(0, carrinho[produtoId] + quantidade);

  if (carrinho[produtoId] === 0) {
    delete carrinho[produtoId]; // Remove o produto se a quantidade for zero
  }

  // Atualiza a interface
  const quantidadeElemento = document.getElementById(`quantidade-${produtoId}`);
  if (quantidadeElemento) {
    quantidadeElemento.textContent = carrinho[produtoId] || 0;
  }

  // Salva no localStorage
  localStorage.setItem('carrinho', JSON.stringify(carrinho));

  atualizarResumoCarrinho();
}

function atualizarResumoCarrinho() {
  const cartItemsContainer = document.querySelector('.cart-items');
  const cartFooter = document.querySelector('.cart-footer p');
  const cartCount = document.querySelector('.cart-count');
  let total = 0;

  cartItemsContainer.innerHTML = ''; // Limpa o conteúdo atual

  const produtosNoCarrinho = Object.keys(carrinho);

  produtosNoCarrinho.forEach((produtoId, index) => {
    const produtoInfo = produtos.find(p => p.id === produtoId);
    const quantidade = carrinho[produtoId];
    const subtotal = produtoInfo.preco_unitario * quantidade;
    total += subtotal;

    const item = document.createElement('div');
    item.classList.add('cart-item');

    // Adiciona a classe "last-item" ao último produto
    if (index === produtosNoCarrinho.length - 1) {
      item.classList.add('last-item');
    }

    item.innerHTML = `
      <div class="cart-item-content">
        <!-- Imagem do produto -->
        <img src="${BASE_URL}${produtoInfo.url_img}" alt="${produtoInfo.nome}" class="cart-item-image" />

        <!-- Detalhes do produto -->
        <div class="cart-item-details">
          <!-- Nome e descrição na mesma linha -->
          <div class="cart-item-title">
            <h3>${produtoInfo.nome}</h3> - <span>${produtoInfo.descricao}</span>
          </div>
          <p>Subtotal: R$ ${Number(subtotal).toFixed(2).replace('.', ',')}</p>
          <div class="cart-item-actions">
            <!-- Quantidade e botões -->
            <button class="btn-quantidade" onclick="alterarQuantidade('${produtoId}', -1)">-</button>
            <span id="quantidade-${produtoId}" class="quantidade">${quantidade}</span>
            <button class="btn-quantidade" onclick="alterarQuantidade('${produtoId}', 1)">+</button>
            <button class="btn-remove" onclick="removerProduto('${produtoId}')">🗑️</button>
          </div>
        </div>
      </div>
    `;

    cartItemsContainer.appendChild(item);
  });

  if (total === 0) {
    cartItemsContainer.innerHTML = '<p class="vazio-text">Seu carrinho está vazio.</p>';
  }

  cartFooter.textContent = `Total: R$ ${Number(total).toFixed(2).replace('.', ',')}`;

  // Atualiza o contador de itens únicos no carrinho
  const totalProdutosUnicos = produtosNoCarrinho.length;
  cartCount.setAttribute('data-count', totalProdutosUnicos);
  cartCount.textContent = totalProdutosUnicos;
}

// Remove um produto do carrinho
function removerProduto(produtoId) {
  delete carrinho[produtoId]; // Remove o produto do objeto carrinho

  // Salva no localStorage
  localStorage.setItem('carrinho', JSON.stringify(carrinho));

  // Atualiza a interface
  const quantidadeElemento = document.getElementById(`quantidade-${produtoId}`);
  if (quantidadeElemento) {
    quantidadeElemento.textContent = carrinho[produtoId] || 0;
  }

  // Atualiza a interface
  atualizarResumoCarrinho();
}

// Carrega o carrinho do localStorage ao iniciar
document.addEventListener('DOMContentLoaded', () => {
  atualizarInterfaceCarrinho();
});


