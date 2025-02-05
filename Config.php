<?php
// Config.php

// Carregar a biblioteca Dotenv
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

// Carregar as variáveis do arquivo .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Configurações gerais
define('BASE_URL', $_ENV['BASE_URL']);

// Credenciais fixas
$LOGIN_USER = $_ENV['LOGIN_USER'];
$LOGIN_PASS = $_ENV['LOGIN_PASS'];

// Definir o nome da sessão
session_name('POMAR');

session_start();

// Obter a URL atual e remover "/pomar/"
$current_url = str_replace("/pomar", "", $_SERVER['REQUEST_URI']);

// Definir a página com base na URL
if ($current_url === "/" || $current_url === "/index.php" || $current_url === "/#") {
    $_SESSION['page'] = "HOME";
} elseif ($current_url === "/a-empresa/") {
    $_SESSION['page'] = "EMPRESA";
} elseif ($current_url === "/processo-produtivo/") {
    $_SESSION['page'] = "PRODUCAO";
} elseif ($current_url === "/#produtos" || $current_url === "/index.php#produtos") {
    $_SESSION['page'] = "PRODUTOS";
} elseif ($current_url === "/receitas/") {
    $_SESSION['page'] = "RECEITAS";
} elseif ($current_url === "/privacy-policy/") {
    $_SESSION['page'] = "POLITICAS";
} else {
    $_SESSION['page'] = "DESCONHECIDO"; // Caso a URL não corresponda a nenhuma das opções
}

// Pool de conexões para o banco de dados
class DatabasePool {
    private $pool = [];
    private $maxConnections = 5;

    public function getConnection() {
        // Se houver conexão disponível no pool, reutilize-a
        if (!empty($this->pool)) {
            return array_pop($this->pool);
        }

        // Caso contrário, crie uma nova conexão
        $conn = new mysqli(
            $_ENV['DB_HOST'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASS'],
            $_ENV['DB_NAME'],
            $_ENV['DB_PORT']
        );

        if ($conn->connect_error) {
            die("Erro de conexão com o banco de dados: " . $conn->connect_error);
        }

        return $conn;
    }

    public function releaseConnection($conn) {
        // Se o pool ainda não atingiu o máximo, adicione a conexão ao pool
        if (count($this->pool) < $this->maxConnections) {
            $this->pool[] = $conn;
        } else {
            // Caso contrário, feche a conexão
            $conn->close();
        }
    }

    public function closeAll() {
        foreach ($this->pool as $conn) {
            $conn->close();
        }
        $this->pool = [];
    }
}

// Função global para obter o pool de conexões
function getDatabasePool() {
    static $pool = null;

    if ($pool === null) {
        $pool = new DatabasePool();
    }

    return $pool;
}

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