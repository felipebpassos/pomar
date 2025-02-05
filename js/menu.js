const header = document.querySelector('header');
const toggleMenuButton = document.querySelector('.toggle-menu');
const menu = document.querySelector('.menu');
const menuLi = menu.querySelector('ul');
const menuSpans = menu.querySelectorAll('span');
const sections = document.querySelectorAll('section'); // Seleciona todas as seções

// Definição dos ícones
const barsIconHTML = '<i class="fas fa-bars"></i>';
const svgIconHTML = `
  <svg class="x" viewBox="0 0 12 12" style="height: 20px; width: 20px;">
    <path stroke="#fff" fill="#fff"
      d="M4.674 6L.344 1.05A.5.5 0 0 1 1.05.343L6 4.674l4.95-4.33a.5.5 0 0 1 .707.706L7.326 6l4.33 4.95a.5.5 0 0 1-.706.707L6 7.326l-4.95 4.33a.5.5 0 0 1-.707-.706L4.674 6z">
    </path>
  </svg>
`;

// Função para alternar o menu
toggleMenuButton.addEventListener('click', () => {
    const isOpen = menu.classList.toggle('invisible'); // Alterna a visibilidade do menu

    if (!isOpen) {
        // Abrir o menu
        sections.forEach(section => {
            section.classList.add('blur');
        });
        menuLi.classList.add('ativo');
        menuSpans.forEach(menuSpan => {
            menuSpan.classList.add('animate');
        });
        document.body.classList.add('overflow-hidden'); // Adiciona a classe 'overflow-hidden'
        toggleMenuButton.innerHTML = svgIconHTML; // Troca para o ícone SVG
    } else {
        // Fechar o menu
        sections.forEach(section => {
            section.classList.remove('blur');
        });
        menuLi.classList.remove('ativo');
        menuSpans.forEach(menuSpan => {
            menuSpan.classList.remove('animate');
        });
        document.body.classList.remove('overflow-hidden'); // Remove a classe 'overflow-hidden'
        toggleMenuButton.innerHTML = barsIconHTML; // Troca de volta para o ícone "bars"
    }
});

// Adicionar funcionalidade de redirecionamento ao clicar nos spans
menuSpans.forEach((menuSpan, index) => {
    menuSpan.addEventListener('click', () => {
        // URLs correspondentes
        const urls = [
            `${BASE_URL}`,                   // Início
            `${BASE_URL}a-empresa`,            // A Empresa
            `${BASE_URL}#produtos`,          // Produtos
            `${BASE_URL}processo-produtivo`, // Fabricação
            `${BASE_URL}receitas`,           // Receitas
            `#contato`                        // Contato
        ];

        // Redirecionar para a URL correspondente
        const targetURL = urls[index];
        if (targetURL.startsWith('#')) {
            // Scroll suave para seções na mesma página
            document.querySelector(targetURL).scrollIntoView({ behavior: 'smooth' });
        } else {
            // Redirecionar para outra página
            window.location.href = targetURL;
        }

        // Fechar o menu após o redirecionamento
        menu.classList.add('invisible');
        sections.forEach(section => {
            section.classList.remove('blur');
        });
        menuLi.classList.remove('ativo');
        menuSpans.forEach(menuSpan => {
            menuSpan.classList.remove('animate');
        });
        document.body.classList.remove('overflow-hidden'); // Remove a classe 'overflow-hidden'
        toggleMenuButton.innerHTML = barsIconHTML; // Troca de volta para o ícone "bars"
    });
});
