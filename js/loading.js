var fundoLoader = document.getElementById("fundo-loader");
var loader = document.getElementById("loader");

setTimeout(function() {
    loader.style.transition = "opacity 1s"; // Adiciona uma transição de 1 segundo para suavizar a mudança de opacidade
    loader.style.opacity = "0";

    // Após a transição, defina o display para "none"
    setTimeout(function() {
        loader.style.display = "none";
        fundoLoader.style.display = "none";

        // Restaurar overflow padrão no body
        document.body.style.overflow = "auto";
    }, 700);
}, 1600); // Espera 1600 milissegundos para começar a ocultar o loader e o fundo