<?php

require '../Config.php';

// Definir o nome da sessão
session_name('POMAR');

session_start();

// Salvar o nome da página na variável de sessão
$_SESSION['page'] = "POLICIES";

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
    <meta property="og:title" content="Privacy Policy - Pomar do Brasil">
    <meta property="og:description" content="XXXXXXXXXXXXXXXXXX">
    <meta property="og:image" content="../img/logo-original.png">
    <meta property="og:url" content="https://www.pomardobrasil.com.br/privacy-policy">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Pomar do Brasil">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Privacy Policy - Pomar do Brasil">
    <meta name="twitter:description" content="XXXXXXXXXXXXXXXXXXXXX">
    <meta name="twitter:image" content="../img/logo-original.png">

    <title>Privacy Policy - Pomar do Brasil</title>
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

    <section id="privacy-policy" class="nunito">
        <div class="container">
            <h1>Política de Privacidade</h1>
            <p>
                Este site utiliza serviços que funcionam junto com a estrutura da página. Eventualmente através de
                formulários, banners ou elementos de nossa página, alguns dados podem ser coletados. Seus dados são
                usados para gerar análises comerciais para nós e as empresas envolvidas e/ou melhoria do serviço,
                trabalhando em conformidade com a LEI Nº 13.709 de 2018 – Lei Geral de Proteção de Dados Pessoais
                (LGPD).
            </p>
            <p>Tratamos seus Dados Pessoais, para que seja possível estabelecer a nossa relação comercial como serviço
                ao consumidor,
                atendimentos, comunicações direcionadas, interação com nossa rede ou personalização de suas
                preferências.
            </p>
            <p>
                <strong>Temos o compromisso de proteger a privacidade dos usuários.</strong> A base legal para o
                tratamento dos dados é o
                consentimento e
                está no cumprimento da obrigação legal.
            </p>
            <p>Os dados eventualmente são obtidos através de:</p>
            <p><strong>Formulários</strong></p>
            <p>
                Hoje, já como pequena empresa, atendemos a uma gama de estabelecimentos comerciais, disponibilizando
                o serviço
                de
                entrega em domicílio, além de estarmos presentes nas melhores redes de supermercados em todo o
                Estado de
                Sergipe.
            </p>
            <p><strong>Cookies</strong></p>
            <p>Os dados informados a nós por meio de formulários podem ser usados para fins de envio de ofertas
                referentes ao nosso
                serviço. <strong>Você pode solicitar a remoção de seus dados de nossa base através dos nossos canais de
                    atendimento.</strong>
            </p>
            <p>São arquivos de texto muito pequenos colocados no seu computador pelos sites da internet que você visita.
                Eles são
                utilizados para permitir o funcionamento dos sites ou tornar o seu funcionamento mais eficaz, além de
                fornecer
                informações ao seu proprietário.</p>
            <p>O uso dos cookies é essencial para fornecer um serviço de qualidade para o usuário. <strong>O
                    gerenciamento dos
                    cookies é
                    possível utilizando a configuração do seu navegador de internet. Você também pode excluí-los quando
                    sair
                    do site,</strong> ou
                dependendo do seu navegador, programar para serem excluídos automaticamente.</p>
            <p>Quanto ao armazenamento, os dados pessoais que tratamos para as finalidades já apresentadas não devem ser
                mantidos por
                mais tempo do que o necessário. Avaliamos e respondemos prontamente à ocorrência de incidentes que
                possam comprometer
                seus Dados Pessoais.
            </p>
            <p>Você pode entrar em contato conosco para esclarecimentos e questionamentos sobre a presente Política de
                Privacidade.</p>

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

</body>

</html>