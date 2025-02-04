<?php

require '../Config.php';

// Definir o nome da sessão
session_name('POMAR');

session_start();

// Salvar o nome da página na variável de sessão
$_SESSION['page'] = "RECEITAS";

// Obter o pool de conexões
$pool = getDatabasePool();
$conn = $pool->getConnection();

// Buscar os produtos no banco de dados
$sql = "SELECT id, nome, descricao, categoria, preco_unitario, url_img FROM produtos WHERE disponivel = 1";
$result = $conn->query($sql);

$produtos = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $produtos[] = $row;
    }
}

$produtosJson = json_encode($produtos);

// Liberar a conexão de volta para o pool
$pool->releaseConnection($conn);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description"
        content="Suco, doces, smothie, drinks? Com Polpas Pomar, você prepara as mais diversas receitas.">
    <meta name="keywords"
        content="pomar, polpa de fruta, sorvete, açaí, cupuaçu, cremoso, barato, comprar, online, fábrica, produção, varejo, atacado, melhor, nordeste, aracaju, sergipe">
    <meta name="author" content="Desenvolvido por Felipe Barreto Passos | Simplify Web">
    <meta property="og:title" content="Receitas - Pomar do Brasil">
    <meta property="og:description"
        content="Suco, doces, smothie, drinks? Com Polpas Pomar, você prepara as mais diversas receitas.">
    <meta property="og:image" content="../img/capa.png">
    <meta property="og:url" content="https://www.pomardobrasil.com.br/receitas">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Pomar do Brasil">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Receitas - Pomar do Brasil">
    <meta name="twitter:description"
        content="Suco, doces, smothie, drinks? Com Polpas Pomar, você prepara as mais diversas receitas.">
    <meta name="twitter:image" content="../img/capa.png">

    <title>Receitas - Pomar do Brasil</title>
    <link rel="icon" href="../img/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/texto.css">
    <link rel="stylesheet" href="../css/receitas.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script>
        // Passar a BASE_URL para o JavaScript
        const BASE_URL = "<?php echo BASE_URL; ?>";
        const produtos = <?php echo isset($produtosJson) ? $produtosJson : '[]'; ?>;
        const carrinho = JSON.parse(localStorage.getItem('carrinho')) || {};
    </script>
</head>

<body>

    <!-- Cabeçalho -->
    <?php include '../components/header.php' ?>

    <img id="receitas-bg" src="../img/receitas-bg.png" alt="Receitas-bg">

    <section id="producao" class="nunito">
        <div class="container">
            <h1>Receitas</h1>

            <div class="receitas-grid">
                <a href="/receita1" class="receita-card">
                    <div class="receita-imagem-container">
                        <img src="https://via.placeholder.com/300x200" alt="Brigadeiro de manga"
                            class="receita-imagem" />
                    </div>
                    <h3 class="receita-titulo">Brigadeiro de manga</h3>
                </a>
                <a href="/receita2" class="receita-card">
                    <div class="receita-imagem-container">
                        <img src="https://via.placeholder.com/300x200" alt="Panna Cotta de Coco com calda de morando"
                            class="receita-imagem" />
                    </div>
                    <h3 class="receita-titulo">Panna Cotta de Coco<br> com calda de morando</h3>
                </a>
                <a href="/receita3" class="receita-card">
                    <div class="receita-imagem-container">
                        <img src="https://via.placeholder.com/300x200" alt="Creme de maracujá com chocolate belga"
                            class="receita-imagem" />
                    </div>
                    <h3 class="receita-titulo">Creme de maracujá<br> com chocolate belga</h3>
                </a>
                <a href="/receita4" class="receita-card">
                    <div class="receita-imagem-container">
                        <img src="https://via.placeholder.com/300x200" alt="Bolo de fubá com calda de goiabada"
                            class="receita-imagem" />
                    </div>
                    <h3 class="receita-titulo">Bolo de fubá com<br> calda de goiabada</h3>
                </a>
                <a href="/receita5" class="receita-card">
                    <div class="receita-imagem-container">
                        <img src="https://via.placeholder.com/300x200" alt="Bolo de açaí Pomar"
                            class="receita-imagem" />
                    </div>
                    <h3 class="receita-titulo">Bolo de açaí Pomar</h3>
                </a>
                <a href="/receita6" class="receita-card">
                    <div class="receita-imagem-container">
                        <img src="https://via.placeholder.com/300x200" alt="Pudim de polpa de cupuaçu Pomar"
                            class="receita-imagem" />
                    </div>
                    <h3 class="receita-titulo">Pudim de polpa de<br> cupuaçu Pomar</h3>
                </a>
                <a href="/receita7" class="receita-card">
                    <div class="receita-imagem-container">
                        <img src="https://via.placeholder.com/300x200" alt="Geleia de mangaba diet"
                            class="receita-imagem" />
                    </div>
                    <h3 class="receita-titulo">Geleia de mangaba diet</h3>
                </a>
                <a href="/receita8" class="receita-card">
                    <div class="receita-imagem-container">
                        <img src="https://via.placeholder.com/300x200" alt="Frango oriental ao molho de tamarindo"
                            class="receita-imagem" />
                    </div>
                    <h3 class="receita-titulo">Frango oriental ao<br> molho de tamarindo</h3>
                </a>
                <a href="/receita9" class="receita-card">
                    <div class="receita-imagem-container">
                        <img src="https://via.placeholder.com/300x200" alt="Bolinho de tapioca com creme de mangaba"
                            class="receita-imagem" />
                    </div>
                    <h3 class="receita-titulo">Bolinho de tapioca<br> com creme de mangaba</h3>
                </a>
                <a href="/receita10" class="receita-card">
                    <div class="receita-imagem-container">
                        <img src="https://via.placeholder.com/300x200"
                            alt="Sopa de morango e gengibre com creme de limão siciliano" class="receita-imagem" />
                    </div>
                    <h3 class="receita-titulo">Sopa de morango e gengibre<br> com creme de limão siciliano</h3>
                </a>
            </div>

            <img src="../img/folha01.png" class="folha" alt="folha">

        </div>
    </section>

    <!-- FOOTER -->
    <?php include '../components/footer.php' ?>

    <!-- BOTÃO FLUTUANTE DE CARRINHO DE COMPRAS -->
    <?php include '../components/floating-cart.php' ?>

    <!-- MODAL COOKIES -->
    <?php include '../components/cookies-modal.php' ?>

    <!-- MENU -->
    <?php include '../components/menu.php' ?>

    <!-- CARRINHO DE COMPRAS -->
    <?php include '../components/cart.php' ?>

    <!-- JQUERY-3.6.4 -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- JAVASCRIPT BODY -->
    <script src="../js/menu.js"></script>
    <script src="../js/cart.js"></script>
    <script src="../js/cookies.js"></script>

</body>

</html>