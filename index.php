<?php

require 'Config.php';

// Definir o nome da sessão
session_name('POMAR');

session_start();

// Salvar o nome da página na variável de sessão
$_SESSION['page'] = "HOME";

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
  <meta property="og:title" content="Pomar do Brasil - Polpas de Frutas 100% naturais">
  <meta property="og:description" content="XXXXXXXXXXXXXXXXXX">
  <meta property="og:image" content="./img/logo-original.png">
  <meta property="og:url" content="https://www.pomardobrasil.com.br">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Pomar do Brasil">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Pomar do Brasil - Polpas de Frutas 100% naturais">
  <meta name="twitter:description" content="XXXXXXXXXXXXXXXXXXXXX">
  <meta name="twitter:image" content="./img/logo-original.png">

  <title>Pomar do Brasil - Polpas de Frutas 100% naturais</title>
  <link rel="icon" href="./img/favicon.ico">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/fonts.css">
  <link rel="stylesheet" href="./css/styles.css">
  <link rel="stylesheet" href="./css/footer.css">
  <script src="./js/slides.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <script>
    // Passar a BASE_URL para o JavaScript
    const BASE_URL = "<?php echo BASE_URL; ?>";
  </script>
</head>

<body>

  <div id="fundo-loader">
    <div id="loader"></div>
  </div>

  <div class="progress-bar"></div>

  <!-- Cabeçalho -->
  <?php include 'header.php' ?>

  <!-- Hero Section -->
  <section class="hero">
    <div class="slider">
      <!-- Slide 1 -->
      <div class="slide active" id="slide-polpa">
        <img src="./img/bg.jpg" alt="Polpa" class="slide-bg">
        <img src="./img/mangaba-remove.png" alt="" class="img-mangaba" id="pomar-slide">
        <div class="slide-center">
          <div class="slide-content">
            <div class="subtitle">
              <h4 class="poppins-extrabold-italic red">POLPAS</h4>
            </div>
            <div class="slide-text">
              <div class="title">
                <h1 class="poppins-black-italic">100%&nbsp;&nbsp;DA<br><span>FRUTA!</span></h1>
              </div>
              <div class="description">
                <span class="step"><span class="stand-out">01</span> / 03</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel lectus et ligula tincidunt
                  luctus. Donec vitae vehicula justo, at vehicula ipsum.</p>
              </div>
            </div>
            <a href="#produtos"><button class="cta-button poppins-extrabold">FAÇA SEU PEDIDO</button></a>
          </div>
        </div>
      </div>
      <!-- Slide 2 -->
      <div class="slide" id="slide-acai">
        <img src="./img/slide2-bg.webp" alt="Açaí" class="slide-bg">
        <img src="./img/acai_banana.png" alt="" class="img-slide-main" id="acai-slide">
        <img src="./img/acai01.png" alt="" class="img-slide-flying levitar-horizontal fundo" id="acai1">
        <img src="./img/acai02.png" alt="" class="img-slide-flying levitar-vertical" id="acai2">
        <img src="./img/acai03.png" alt="" class="img-slide-flying levitar-vertical fundo" id="acai3">
        <img src="./img/acai-fruta.png" alt="" class="img-slide-bottom" id="acai-bottom">
        <div class="slide-center">
          <div class="slide-content">
            <div class="subtitle">
              <h4 class="poppins-extrabold-italic purple">AÇAÍ</h4>
            </div>
            <div class="slide-text">
              <div class="title">
                <h1 class="poppins-black-italic text-shaddow-heavy">O MAIS<br><span class="minor">CREMOSO!</span></h1>
              </div>
              <div class="description">
                <span class="step"><span class="stand-out">02</span> / 03</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel lectus et ligula tincidunt
                  luctus. Donec vitae vehicula justo, at vehicula ipsum.</p>
              </div>
            </div>
            <a href="#produtos"><button class="cta-button poppins-extrabold">FAÇA SEU PEDIDO</button></a>
          </div>
        </div>
      </div>
      <!-- Slide 3 -->
      <div class="slide" id="slide-sorvete">
        <img src="./img/slide4-bg.webp" alt="Sorvete" class="slide-bg">
        <img src="./img/avelã_removed.png" alt="" class="img-slide-main" id="sorvete-slide">
        <img src="./img/avela1.png" alt="" class="img-slide-flying levitar-vertical fundo" id="avela1">
        <img src="./img/avela2.png" alt="" class="img-slide-flying levitar-horizontal" id="avela2">
        <img src="./img/avela1.png" alt="" class="img-slide-flying levitar-vertical" id="avela3">
        <img src="./img/choco1.png" alt="" class="img-slide-flying levitar-vertical" id="choco1">
        <img src="./img/choco2.png" alt="" class="img-slide-flying levitar-horizontal fundo" id="choco2">
        <img src="./img/avelas-removebg.png" alt="" class="img-slide-bottom" id="avela-bottom">
        <div class="slide-center">
          <div class="slide-content">
            <div class="subtitle">
              <h4 class="poppins-extrabold-italic brown">SOVERTES</h4>
            </div>
            <div class="slide-text">
              <div class="title">
                <h1 class="poppins-black-italic text-shaddow-heavy">LEVEZA<br><span>E SABOR!</span></h1>
              </div>
              <div class="description">
                <span class="step"><span class="stand-out">03</span> / 03</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel lectus et ligula tincidunt
                  luctus. Donec vitae vehicula justo, at vehicula ipsum.</p>
              </div>
            </div>
            <a href="#produtos"><button class="cta-button poppins-extrabold">FAÇA SEU PEDIDO</button></a>
          </div>
        </div>
      </div>
    </div>
    <div class="slider-footer">
      <div class="slider-controls">
        <button class="angle-left"><i class="fas fa-chevron-left"></i></button>
        <div class="dot-controls">
          <button class="dot active"></button>
          <button class="dot"></button>
          <button class="dot"></button>
        </div>
        <button class="angle-right"><i class="fas fa-chevron-right"></i></button>
      </div>
      <ul class="redes">
        <li>
          <a href="https://wa.me/5579988723030?text=Olá,%20vim%20pelo%20site%20e%20gostaria%20de%20mais%20informações!"
            target="_blank" rel="noopener noreferrer">
            <i class="fab fa-whatsapp"></i>
          </a>
        </li>
        <li>
          <a href="https://www.instagram.com/pomarpolpasdefrutas/" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-instagram"></i>
          </a>
        </li>
        <li>
          <a href="https://www.facebook.com/profile.php?id=100063656633536" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-facebook"></i>
          </a>
        </li>
      </ul>
    </div>

  </section>

  <!-- Clientes/Brands Section -->
  <section class="clientes" id="clientes">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 brand-item">
          <img src="./img/brands/assai.png" alt="Assai">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 brand-item">
          <img src="./img/brands/gbarbosa.png" alt="GBarbosa">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 brand-item">
          <img src="./img/brands/bompreco.png" alt="Bompreço">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 brand-item">
          <img src="./img/brands/paodeacucar.png" alt="Pão de Açúcar">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 brand-item">
          <img src="./img/brands/sams.png" alt="Sams">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 brand-item">
          <img src="./img/brands/mercantil.png" alt="Mercantil">
        </div>
      </div>
    </div>
  </section>

  <!-- Produtos -->
  <section class="produtos" id="produtos">
    <div class="produtos-header">
      <div class="container">
        <div class="justify-between">
          <div class="abas">
            <button class="active" onclick="showCategory('polpas', event)">Polpas</button>
            <button onclick="showCategory('acai', event)">Açaí</button>
            <button onclick="showCategory('sorvetes', event)">Sorvetes</button>
          </div>
          <div class="pesquisar-produto">
            <input type="text" placeholder="Pesquisar produto">
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div id="produtos-grid" class="produtos-grid">
        <!-- Exemplo de produtos -->
        <div class="produto-card">
          <img src="https://via.placeholder.com/150" alt="Produto 1">
          <h3>Produto 1</h3>
          <p>Descrição do produto</p>
          <div class="produto-preco">
            <span>R$ 15,00</span>
          </div>
          <div class="produto-controle">
            <button class="btn-remover" onclick="alterarQuantidade('Produto 1', -1)">-</button>
            <span id="quantidade-Produto 1">0</span>
            <button class="btn-adicionar" onclick="alterarQuantidade('Produto 1', 1)">+</button>
          </div>
        </div>
        <div class="produto-card">
          <img src="https://via.placeholder.com/150" alt="Produto 2">
          <h3>Produto 2</h3>
          <p>Descrição do produto</p>
          <div class="produto-preco">
            <span>R$ 25,00</span>
          </div>
          <div class="produto-controle">
            <button class="btn-remover" onclick="alterarQuantidade('Produto 2', -1)">-</button>
            <span id="quantidade-Produto 2">0</span>
            <button class="btn-adicionar" onclick="alterarQuantidade('Produto 2', 1)">+</button>
          </div>
        </div>
        <div class="produto-card">
          <img src="https://via.placeholder.com/150" alt="Produto 3">
          <h3>Produto 3</h3>
          <p>Descrição do produto</p>
          <div class="produto-preco">
            <span>R$ 10,00</span>
          </div>
          <div class="produto-controle">
            <button class="btn-remover" onclick="alterarQuantidade('Produto 3', -1)">-</button>
            <span id="quantidade-Produto 3">0</span>
            <button class="btn-adicionar" onclick="alterarQuantidade('Produto 3', 1)">+</button>
          </div>
        </div>
        <div class="produto-card">
          <img src="https://via.placeholder.com/150" alt="Produto 4">
          <h3>Produto 4</h3>
          <p>Descrição do produto</p>
          <div class="produto-preco">
            <span>R$ 30,00</span>
          </div>
          <div class="produto-controle">
            <button class="btn-remover" onclick="alterarQuantidade('Produto 4', -1)">-</button>
            <span id="quantidade-Produto 4">0</span>
            <button class="btn-adicionar" onclick="alterarQuantidade('Produto 4', 1)">+</button>
          </div>
        </div>
        <div class="produto-card">
          <img src="https://via.placeholder.com/150" alt="Produto 5">
          <h3>Produto 5</h3>
          <p>Descrição do produto</p>
          <div class="produto-preco">
            <span>R$ 15,00</span>
          </div>
          <div class="produto-controle">
            <button class="btn-remover" onclick="alterarQuantidade('Produto 5', -1)">-</button>
            <span id="quantidade-Produto 5">0</span>
            <button class="btn-adicionar" onclick="alterarQuantidade('Produto 5', 1)">+</button>
          </div>
        </div>
        <div class="produto-card">
          <img src="https://via.placeholder.com/150" alt="Produto 6">
          <h3>Produto 6</h3>
          <p>Descrição do produto</p>
          <div class="produto-preco">
            <span>R$ 25,00</span>
          </div>
          <div class="produto-controle">
            <button class="btn-remover" onclick="alterarQuantidade('Produto 6', -1)">-</button>
            <span id="quantidade-Produto 6">0</span>
            <button class="btn-adicionar" onclick="alterarQuantidade('Produto 6', 1)">+</button>
          </div>
        </div>
        <div class="produto-card">
          <img src="https://via.placeholder.com/150" alt="Produto 7">
          <h3>Produto 7</h3>
          <p>Descrição do produto</p>
          <div class="produto-preco">
            <span>R$ 10,00</span>
          </div>
          <div class="produto-controle">
            <button class="btn-remover" onclick="alterarQuantidade('Produto 7', -1)">-</button>
            <span id="quantidade-Produto 7">0</span>
            <button class="btn-adicionar" onclick="alterarQuantidade('Produto 7', 1)">+</button>
          </div>
        </div>
        <div class="produto-card">
          <img src="https://via.placeholder.com/150" alt="Produto 8">
          <h3>Produto 8</h3>
          <p>Descrição do produto</p>
          <div class="produto-preco">
            <span>R$ 30,00</span>
          </div>
          <div class="produto-controle">
            <button class="btn-remover" onclick="alterarQuantidade('Produto 8', -1)">-</button>
            <span id="quantidade-Produto 8">0</span>
            <button class="btn-adicionar" onclick="alterarQuantidade('Produto 8', 1)">+</button>
          </div>
        </div>
        <div class="produto-card">
          <img src="https://via.placeholder.com/150" alt="Produto 9">
          <h3>Produto 9</h3>
          <p>Descrição do produto</p>
          <div class="produto-preco">
            <span>R$ 15,00</span>
          </div>
          <div class="produto-controle">
            <button class="btn-remover" onclick="alterarQuantidade('Produto 9', -1)">-</button>
            <span id="quantidade-Produto 9">0</span>
            <button class="btn-adicionar" onclick="alterarQuantidade('Produto 9', 1)">+</button>
          </div>
        </div>
        <div class="produto-card">
          <img src="https://via.placeholder.com/150" alt="Produto 10">
          <h3>Produto 10</h3>
          <p>Descrição do produto</p>
          <div class="produto-preco">
            <span>R$ 25,00</span>
          </div>
          <div class="produto-controle">
            <button class="btn-remover" onclick="alterarQuantidade('Produto 10', -1)">-</button>
            <span id="quantidade-Produto 10">0</span>
            <button class="btn-adicionar" onclick="alterarQuantidade('Produto 10', 1)">+</button>
          </div>
        </div>
        <div class="produto-card">
          <img src="https://via.placeholder.com/150" alt="Produto 11">
          <h3>Produto 11</h3>
          <p>Descrição do produto</p>
          <div class="produto-preco">
            <span>R$ 10,00</span>
          </div>
          <div class="produto-controle">
            <button class="btn-remover" onclick="alterarQuantidade('Produto 11', -1)">-</button>
            <span id="quantidade-Produto 11">0</span>
            <button class="btn-adicionar" onclick="alterarQuantidade('Produto 11', 1)">+</button>
          </div>
        </div>
        <div class="produto-card">
          <img src="https://via.placeholder.com/150" alt="Produto 12">
          <h3>Produto 12</h3>
          <p>Descrição do produto</p>
          <div class="produto-preco">
            <span>R$ 30,00</span>
          </div>
          <div class="produto-controle">
            <button class="btn-remover" onclick="alterarQuantidade('Produto 12', -1)">-</button>
            <span id="quantidade-Produto 12">0</span>
            <button class="btn-adicionar" onclick="alterarQuantidade('Produto 12', 1)">+</button>
          </div>
        </div>
      </div>
    </div>
    <div class="show-more-btn-container">
      <button id="show-more-btn" class="show-more-btn">Mostrar mais</button>
    </div>
  </section>

  <!-- FOOTER -->
  <?php include 'footer.php' ?>

  <div class="cookie-banner" id="cookieBanner">
    <a href="privacy-policy/">
      Este site utiliza cookies para oferecer a melhor experiência ao usuário.
    </a>
    <button class="close-button" onclick="closeCookieBanner()">×</button>
  </div>

  <!-- MENU -->
  <div class="menu invisible">
    <ul>
      <li><span>Início</span></li>
      <li><span>A Empresa</span></li>
      <li><span>Produtos</span></li>
      <li><span>Fabricação</span></li>
      <li><span>Receitas</span></li>
      <li><span>Contato</span></li>
    </ul>
  </div>

  <!-- Carrinho de Compras -->
  <div class="cart-overlay hidden"></div>
  <div class="cart-summary">
    <div class="cart-header">
      <h2>Seu Carrinho</h2>
      <button class="close-cart">&times;</button>
    </div>
    <div class="cart-items">
      <!-- Itens do carrinho serão listados aqui -->
      <p>Seu carrinho está vazio.</p>
    </div>
    <div class="cart-footer">
      <p>Total: R$ 0,00</p>
      <button class="checkout-button">Finalizar Compra</button>
    </div>
  </div>

  <!-- JQUERY-3.6.4 -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- JAVASCRIPT BODY -->
  <script src="./js/loading.js"></script>
  <script src="./js/menu.js"></script>
  <script src="./js/cart.js"></script>
  <script src="./js/scroll-to-produtos.js"></script>
  <script src="./js/produtos.js"></script>
  <script src="./js/mostrar-mais.js"></script>
  <script src="./js/cookies.js"></script>

</body>

</html>