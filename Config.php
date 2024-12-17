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
