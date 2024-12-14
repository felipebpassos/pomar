document.addEventListener("DOMContentLoaded", () => {
    const produtosSection = document.querySelector("#produtos");

    let lastScrollTop = 0; // Para monitorar a direção do scroll
    let isScrollingToProdutos = false; // Para evitar loops de scroll automáticos

    window.addEventListener("scroll", () => {
        const scrollTop = window.scrollY || document.documentElement.scrollTop;
        const viewportHeight = window.innerHeight;
        const produtosRect = produtosSection.getBoundingClientRect();

        const produtosTop = scrollTop + produtosRect.top; // Posição real do topo da seção
        const produtosBottom = scrollTop + produtosRect.bottom; // Posição real do rodapé da seção

        const topOfPage = scrollTop; // Topo da página
        const bottomOfPage = scrollTop + viewportHeight; // Fundo visível da página

        const isProdutosPartiallyVisible =
            topOfPage < produtosTop && produtosTop < bottomOfPage && produtosBottom > bottomOfPage;

        // Condição para ativar o scroll: descendo e "produtos" está parcialmente visível
        if (
            !isScrollingToProdutos &&
            scrollTop > lastScrollTop &&
            isProdutosPartiallyVisible
        ) {
            isScrollingToProdutos = true;

            // Faz o scroll suave até o topo da seção "produtos"
            window.scrollTo({
                top: produtosTop,
                behavior: "smooth",
            });

            setTimeout(() => {
                isScrollingToProdutos = false; // Libera novamente o scroll manual após o movimento automático
            }, 1000); // Tempo para evitar conflitos
        }

        lastScrollTop = scrollTop; // Atualiza a posição do scroll para a próxima verificação
    });
});
