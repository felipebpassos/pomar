document.addEventListener("DOMContentLoaded", () => {
    const grid = document.querySelector(".produtos-grid");
    const botao = document.querySelector("#show-more-btn");
    const botaoContainer = document.querySelector(".show-more-btn-container");

    botao.addEventListener("click", () => {
        // Define max-height como "none" para expandir completamente
        grid.style.maxHeight = "none";

        // Opcional: Remover o botão após expandir
        botao.style.display = "none";

        // Opcional: Remover o botão após expandir
        botaoContainer.style.display = "none";
    });
});
