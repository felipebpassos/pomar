document.addEventListener("DOMContentLoaded", function () {
    const cookieBanner = document.getElementById("cookieBanner");

    // Verifica se o cookie foi aceito
    if (!document.cookie.split("; ").some(row => row.includes("aceitou_cookies=true"))) {
        cookieBanner.style.display = "flex"; // Exibe o banner se o cookie não existir
    }

    // Função para fechar o banner e salvar o cookie com validade de 1 mês
    window.closeCookieBanner = function () {
        let expires = new Date();
        expires.setMonth(expires.getMonth() + 1);

        document.cookie = `aceitou_cookies=true; path=/; expires=${expires.toUTCString()}; SameSite=Lax`;
        cookieBanner.style.display = "none";
    };
});
