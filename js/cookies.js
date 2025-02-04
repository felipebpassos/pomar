document.addEventListener("DOMContentLoaded", function () {
    const cookieBanner = document.getElementById("cookieBanner");

    // Verifica se o cookie já foi aceito
    if (document.cookie.split("; ").find(row => row.startsWith("aceitou_cookies="))) {
        cookieBanner.style.display = "none";
    }

    // Função para fechar o banner e salvar o cookie com validade de 1 mês
    window.closeCookieBanner = function () {
        let expires = new Date();
        expires.setMonth(expires.getMonth() + 1); // Define a validade para 1 mês

        document.cookie = `aceitou_cookies=true; path=/; expires=${expires.toUTCString()}; SameSite=Lax`;
        cookieBanner.style.display = "none";
    };
});
