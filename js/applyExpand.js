document.addEventListener("DOMContentLoaded", function () {
    var fundoLoader = document.getElementById("fundo-loader");
    var loader = document.getElementById("loader");
    var imgMangaba = document.querySelector(".img-mangaba");

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
            }
        }, 700);
    }, 1600);
});
