var fundoLoader = document.getElementById("fundo-loader");
var loader = document.getElementById("loader");
var imgMangaba = document.querySelector(".img-mangaba");
var cta = document.getElementById("ctaPolpa");

// Verificar se é a primeira visita ou uma sessão anônima
if (!localStorage.getItem('loaderShown')) {
    localStorage.setItem('loaderShown', 'true'); // Marcar como visitado

    // Executar animação do loader
    setTimeout(function () {
        loader.style.transition = "opacity 1s";
        loader.style.opacity = "0";

        setTimeout(function () {
            loader.style.display = "none";
            fundoLoader.style.display = "none";
            document.body.style.overflow = "auto";

            // Aplica a classe .expand à .img-mangaba após o carregamento
            if (imgMangaba) {
                imgMangaba.classList.add("expand");

                // Aguarda 500ms antes de expandir o CTA
                setTimeout(function () {
                    cta.classList.add("expand");
                }, 500);
            }
        }, 700);
    }, 1600);
} else {
    // Ocultar imediatamente se já foi visitado
    loader.style.display = "none";
    fundoLoader.style.display = "none";
    document.body.style.overflow = "auto";

    // Aplica a classe .expand à .img-mangaba após o carregamento
    if (imgMangaba) {
        imgMangaba.classList.add("expand");

        // Aguarda 500ms antes de expandir o CTA
        setTimeout(function () {
            cta.classList.add("expand");
        }, 500);
    }
}