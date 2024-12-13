CREATE DATABASE IF NOT EXISTS pomar
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE pomar;

-- Tabela de Produtos
CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco_unitario DECIMAL(10, 2) NOT NULL,
    disponivel BOOLEAN DEFAULT TRUE NOT NULL,
    categoria ENUM('Polpas', 'Açaí', 'Sorvetes') NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Tabela de Clientes
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo_cliente ENUM('Pessoa Física', 'Pessoa Jurídica') NOT NULL, -- Define o tipo de cliente
    email VARCHAR(150) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    -- Dados da Pessoa Física
    cpf VARCHAR(11) UNIQUE, -- CPF da pessoa física

    -- Dados da Pessoa Jurídica
    razao_social VARCHAR(255), -- Razão social para Pessoa Jurídica
    nome_fantasia VARCHAR(255), -- Nome fantasia para Pessoa Jurídica
    cnpj VARCHAR(14) UNIQUE, -- CNPJ para Pessoa Jurídica

    -- Dados do Representante da Pessoa Jurídica
    nome_representante VARCHAR(100), -- Nome do representante legal
    email_representante VARCHAR(150), -- Email do representante
    telefone_representante VARCHAR(15) -- Telefone do representante
) ENGINE=InnoDB;

-- Tabela de Vendas
CREATE TABLE vendas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    total DECIMAL(10, 2) NOT NULL,
    entrega BOOLEAN DEFAULT FALSE NOT NULL, -- Indica se a venda será entregue ou retirada
    cep VARCHAR(9) NOT NULL, -- Pode ser o CEP de origem ou de destino
    endereco TEXT, -- Endereço completo, utilizado caso a entrega seja escolhida
    numero VARCHAR(10), -- Número do endereço
    complemento VARCHAR(100), -- Complemento do endereço
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Tabela de Itens da Venda
CREATE TABLE itens_venda (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_venda INT,
    id_produto INT,
    quantidade INT NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_venda) REFERENCES vendas(id) ON DELETE CASCADE,
    FOREIGN KEY (id_produto) REFERENCES produtos(id) ON DELETE RESTRICT
) ENGINE=InnoDB;
