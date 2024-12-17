<?php

require '../Config.php';

// Definir o nome da sessão
session_name('POMAR');

session_start();

// Salvar o nome da página na variável de sessão
$_SESSION['page'] = "EMPRESA";

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
  <meta property="og:title" content="A Empresa - Pomar do Brasil">
  <meta property="og:description" content="XXXXXXXXXXXXXXXXXX">
  <meta property="og:image" content="../img/logo-original.png">
  <meta property="og:url" content="https://www.pomardobrasil.com.br/a-empresa">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Pomar do Brasil">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="A Empresa - Pomar do Brasil">
  <meta name="twitter:description" content="XXXXXXXXXXXXXXXXXXXXX">
  <meta name="twitter:image" content="../img/logo-original.png">

  <title>A Empresa - Pomar do Brasil</title>
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

  <section id="sobre" class="nunito">
    <div class="container">
      <h1>Conheça Nossa História, Evolução<br>
        e o Nosso Presente</h1>
      <p>
        A Pomar do Brasil Indústria e Comércio de Alimentos nasceu em 1996 como uma microempresa familiar produtora de
        polpas de fruta. Nossa história iniciou sem grandes metas a longo prazo, e com poucos recursos, mas sempre
        fundamentando na ideia de oferecer um produto de qualidade. Iniciamos nossas atividades numa estrutura bastante
        familiar, construindo um anexo à própria residência dos proprietários, com um maquinário de ínfima capacidade
        produtiva, e uma equipe composta por um funcionário e quatro familiares que distribuíam seu tempo entre
        atividades
        estudantis e a empresa.
      </p>
      <p>Começamos com um capital de giro obtido inicialmente de economias pessoais, e aos poucos fomos ampliado
        conforme
        adquiríamos mais recursos gerados pelas vendas e da disponibilização do pró-labore dos familiares.
      </p>

      <div class="bloco">
        <h2>Boas Novas Chegaram!</h2>
        <p>
          Tivemos uma aceitação notória dos produtos por parte dos consumidores, então começamos a ampliar nossa
          estrutura
          material, ampliando nosso maquinário, arriscando em financiamentos bancários, conquistando redes de
          supermercados,
          e até mesmo recebendo convite à exportar!
        </p>
        <p>Desse grande passo, em 2008, mudamos para uma sede ampla no Distrito Industrial de Aracaju, onde funcionamos
          hoje
          numa área construída de 2.200 m² e ampliamos cada vez mais nossa capacidade tecnológica, produtiva e de
          armazenamento frigorífico, o que garante uma boa estocagem de sua principal matéria-prima – frutas – na
          entressafra.</p>
      </div>

      <div class="bloco">
        <h2>Atualmente</h2>
        <p>
          Hoje, já como pequena empresa, atendemos a uma gama de estabelecimentos comerciais, disponibilizando o serviço
          de
          entrega em domicílio, além de estarmos presentes nas melhores redes de supermercados em todo o Estado de
          Sergipe.
        </p>
        <p><strong>Da natureza para a mesa</strong></p>
        <p>Atualmente são fabricadas polpas de 20 frutas: abacaxi, açaí, acerola, ameixa, cacau, cajá, caju, cupuaçu,
          goiaba,
          graviola, jenipapo, manga, mangaba, maracujá, morango, tamarindo, tangerina, umbu, umbu-cajá e uva.</p>
        <p>Com o objetivo de adquirir a matéria-prima das melhores fontes, selecionamos fornecedores que veem nos seus
          pomares um espaço de produção de alimentos saudáveis. Em função da variedade de polpas utilizamos frutos da
          região
          Nordeste, nossa principal fonte; da região Norte, onde se encontram açaí e cupuaçu de ótima qualidade, e das
          regiões Sul e Sudeste, de onde vêm uva, morango e ameixa.</p>
        <p> Os critérios para recepção da matéria-prima são bem rigorosos, a fim de garantir as características do fruto
          no
          que concerne à higiene, grau de maturação, °Brix e sabor.</p>
        <p>Temos orgulho de estar construindo aos poucos os alicerces de uma grande empresa, trazendo sempre em primeiro
          lugar aquilo que a motivou a dar os primeiros passos, oferecer produtos e serviços de qualidade.
        </p>
      </div>

      <div class="video-wrapper" onclick="playVideo()">
        <img src="../img/thumb-fabrica.png" alt="Pomar do Brasil | Fábrica" class="video-thumbnail">
        <div class="play-icon">
          <i class="fas fa-play"></i>
        </div>
        <video id="video" class="video-element" src="../videos/empresa.mp4" controls></video>
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