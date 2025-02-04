// mostrar-mais.js

document.addEventListener("DOMContentLoaded", () => {
    const grid = document.querySelector("#produtos-grid");
    const botao = document.querySelector("#show-more-btn");
    const botaoContainer = document.querySelector(".show-more-btn-container");

    // Definir a função no escopo global
    window.verificarVisibilidadeBotao = function() {
        const produtos = grid.children.length;
        const larguraTela = window.innerWidth;

        if ((larguraTela > 768 && produtos > 8) ||
            (larguraTela <= 768 && larguraTela > 450 && produtos > 4) ||
            (larguraTela <= 450 && produtos > 6)) {
            botaoContainer.style.display = "block";
        } else {
            botaoContainer.style.display = "none";
        }
    }

    botao.addEventListener("click", () => {
        grid.style.maxHeight = "none";
        botaoContainer.style.display = "none";
    });

    // Chamadas iniciais
    window.verificarVisibilidadeBotao();
    window.addEventListener("resize", window.verificarVisibilidadeBotao);
});