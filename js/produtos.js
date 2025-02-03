let activeCategory = 'Polpas'; // Categoria inicial

function removerAcentos(str) {
    return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "").replace(/ç/g, "c");
}

function filtrarEExibirProdutos() {
    const searchInput = document.querySelector('.pesquisar-produto input');
    const searchText = removerAcentos(searchInput.value.trim().toLowerCase());
    let produtosFiltrados;

    if (searchText) {
        produtosFiltrados = produtos.filter(produto =>
            removerAcentos(produto.nome.toLowerCase()).includes(searchText) ||
            removerAcentos(produto.categoria.toLowerCase()).includes(searchText) ||
            removerAcentos(produto.descricao.toLowerCase()).includes(searchText)
        );
    } else {
        produtosFiltrados = produtos.filter(produto => produto.categoria === activeCategory);
    }

    renderProdutos(produtosFiltrados);
    // Chamar a verificação após atualizar os produtos
    verificarVisibilidadeBotao();
}

function renderProdutos(produtosArray) {
    const produtosGrid = document.getElementById("produtos-grid");
    produtosGrid.innerHTML = "";

    produtosArray.forEach((produto) => {
        const produtoCard = document.createElement("div");
        produtoCard.classList.add("produto-card");
        produtoCard.innerHTML = `
          <img src="${BASE_URL}${produto.url_img}" alt="${produto.nome}">
          <h3>${produto.nome}</h3>
          <p>${produto.descricao}</p>
          <div class="produto-preco">
              <span>R$ ${Number(produto.preco_unitario).toFixed(2).replace('.', ',')}</span>
          </div>
          <div class="produto-controle">
              <button class="btn-remover" onclick="alterarQuantidade('${produto.id}', -1)">-</button>
              <span id="quantidade-${produto.id}">${carrinho[produto.id] || 0}</span>
              <button class="btn-adicionar" onclick="alterarQuantidade('${produto.id}', 1)">+</button>
          </div>`;
        produtosGrid.appendChild(produtoCard);
    });
}

function showCategory(category, event) {
    document.querySelectorAll(".abas button").forEach((button) => {
        button.classList.remove("active");
    });
    event.target.classList.add("active");
    activeCategory = category;
    filtrarEExibirProdutos();
    verificarVisibilidadeBotao();
}

document.querySelector('.pesquisar-produto input').addEventListener('input', filtrarEExibirProdutos);

// Inicializa exibindo os produtos
filtrarEExibirProdutos();

