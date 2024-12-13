function showCategory(category, event) {
    // Certifique-se de que o evento foi recebido
    if (!event) {
        console.error("Evento não recebido");
        return;
    }

    // Lógica para alternar entre categorias
    document.querySelectorAll('.abas button').forEach(button => {
        button.classList.remove('active');
    });

    // Usar event.target para identificar o botão clicado
    event.target.classList.add('active');
    console.log(`Exibindo produtos da categoria: ${category}`);
}
