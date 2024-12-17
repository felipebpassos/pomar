<?php

require '../Config.php';

// Definir o nome da sessão
session_name('POMAR');

session_start();

// Salvar o nome da página na variável de sessão
$_SESSION['page'] = "PRODUCAO";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="XXXXXXXXXXXXXXXXXXX">
    <meta name="keywords"
        content="pomar, polpa de fruta, sorvete, açaí, cupuaçu, cremoso, barato, comprar, online, fábrica, produção, varejo, atacado, melhor, nordeste, aracaju, sergipe">
    <meta name="author" content="Desenvolvido por Felipe Barreto Passos | Simplify Web">
    <meta property="og:title" content="Processo Produtivo - Pomar do Brasil">
    <meta property="og:description" content="XXXXXXXXXXXXXXXXXX">
    <meta property="og:image" content="../img/logo-original.png">
    <meta property="og:url" content="https://www.pomardobrasil.com.br/processo-produtivo">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Pomar do Brasil">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Processo Produtivo - Pomar do Brasil">
    <meta name="twitter:description" content="XXXXXXXXXXXXXXXXXXXXX">
    <meta name="twitter:image" content="../img/logo-original.png">

    <title>Processo Produtivo - Pomar do Brasil</title>
    <link rel="icon" href="../img/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/texto.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script>
        // Passar a BASE_URL para o JavaScript
        const BASE_URL = "<?php echo BASE_URL; ?>";
    </script>
</head>

<body>

    <!-- Cabeçalho -->
    <?php include '../header.php' ?>

    <section id="producao" class="nunito">
        <div class="container">
            <h1>Os Passos dos Nossos Produtos<br>
                até Chegarem a Você</h1>
            <p>
                Feito em higiene absoluta da seleção até o produto final, nosso processo de fabricação responde a vários
                passos até chegarem a você, ou sua empresa.
            </p>
            <img class="diagrama-producao" src="../img/diagrama-producao.png" alt="diagrama">
            <p>Após a seleção, a fruta passa pela primeira lavagem, onde são retiradas as sujidades mais aparentes. Em
                seguida vem a sanitização, com imersão em água preparada com teores de cloro, para, então, chegar à
                terceira lavagem, o enxague.
            </p>
            <p>
                Através de uma esteira os frutos seguem para a despolpadeira. A tecnologia utilizada permite o máximo de
                extração da polpa e separação completa das sementes com rapidez e sem contato humano. Uma linha de tubos
                em aço inox conduz a polpa ao refinador para obtenção de um produto ainda mais homogêneo.
            </p>
            <p>Seguindo pela tubulação, a polpa refinada vai para o pasteurizador, onde é submetida a um choque térmico
                que elimina micro-organismos porventura existentes na fruta, garantindo um produto com maior
                durabilidade e sem perda de suas propriedades físico-químicas e sensoriais.
            </p>
            <p>
                Finalmente a polpa chega às envasadoras automáticas, que sanitizam a parte interna da embalagem plástica
                através da exposição a lâmpadas ultravioletas (bactericidas).
            </p>
            <p>
                Por fim as polpas são arrumadas em bandejas e seguem de imediato para a câmara de congelamento rápido,
                com temperatura de -20ºC. O maquinário utilizado na fabricação da polpa é esterilizado antes e após o
                seu uso, e todo o processo é acompanhado por testes de qualidade (sensorial, acidez, ºBrix) com o
                objetivo de disponibilizar ao consumidor um produto seguro e saboroso.
            </p>

            <div class="video-wrapper" onclick="playVideo()">
                <img src="../img/producao.png" alt="Pomar do Brasil | Processo Produtivo" class="video-thumbnail">
                <div class="play-icon">
                    <i class="fas fa-play"></i>
                </div>
                <video id="video" class="video-element" src="../videos/producao.mp4" controls></video>
            </div>

            <img src="../img/folha01.png" class="folha" alt="folha">

        </div>
    </section>

    <!-- FOOTER -->
    <?php include '../footer.php' ?>

    <!-- MENU -->
    <div class="menu invisible">
        <button class="close-menu hidden">
            <svg class="x" viewBox="0 0 12 12" style="height: 20px; width: 20px;">
                <path stroke="rgb(180, 180, 180)" fill="rgb(180, 180, 180)"
                    d="M4.674 6L.344 1.05A.5.5 0 0 1 1.05.343L6 4.674l4.95-4.33a.5.5 0 0 1 .707.706L7.326 6l4.33 4.95a.5.5 0 0 1-.706.707L6 7.326l-4.95 4.33a.5.5 0 0 1-.707-.706L4.674 6z">
                </path>
            </svg>
        </button>
        <ul>
            <li><span>Início</span></li>
            <li><span>A Empresa</span></li>
            <li><span>Produtos</span></li>
            <li><span>Fabricação</span></li>
            <li><span>Receitas</span></li>
            <li><span>Contato</span></li>
        </ul>
    </div>

    <!-- JQUERY-3.6.4 -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- JAVASCRIPT BODY -->
    <script src="../js/menu.js"></script>
    <script src="../js/cart.js"></script>
    <script src="../js/videos.js"></script>

</body>

</html>