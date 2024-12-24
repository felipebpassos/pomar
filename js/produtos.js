// Função para exibir produtos da categoria selecionada
function exibirProdutosDaCategoria(category) {
    const produtosGrid = document.getElementById("produtos-grid");
    produtosGrid.innerHTML = ""; // Limpa os produtos anteriores

    // Filtra os produtos pela categoria
    const produtosFiltrados = produtos.filter((produto) => produto.categoria === category);

    // Renderiza os produtos filtrados
    produtosFiltrados.forEach((produto) => {
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
        <span id="quantidade-${produto.id}">0</span>
        <button class="btn-adicionar" onclick="alterarQuantidade('${produto.id}', 1)">+</button>
      </div>
    `;
        produtosGrid.appendChild(produtoCard);
    });
}

// Função para alternar entre categorias
function showCategory(category, event) {
    if (!event) {
        console.error("Evento não recebido");
        return;
    }

    // Atualiza o estado das abas
    document.querySelectorAll(".abas button").forEach((button) => {
        button.classList.remove("active");
    });

    // Define a aba ativa
    event.target.classList.add("active");

    // Exibe produtos da categoria selecionada
    exibirProdutosDaCategoria(category);
}

// Inicializa exibindo a categoria "Polpas"
exibirProdutosDaCategoria("Polpas");
