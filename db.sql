-- Deleta o banco de dados existente (se existir)
DROP DATABASE IF EXISTS pomar;

CREATE DATABASE IF NOT EXISTS pomar
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

SELECT * FROM produtos;

USE pomar;

-- Criação da tabela de Produtos com o campo url_img
CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco_unitario DECIMAL(10, 2) NOT NULL,
    disponivel BOOLEAN DEFAULT TRUE NOT NULL,
    categoria ENUM('Polpas', 'Açaí', 'Sorvetes') NOT NULL,
    url_img VARCHAR(255), -- Campo para armazenar o URL da imagem
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

-- Inserir produtos na categoria "Polpas"
INSERT INTO produtos (nome, descricao, preco_unitario, url_img, categoria) VALUES
('Abacaxi', '100 gramas', 1.15, '/img/polpas/abacaxi.png', 'Polpas'),
('Açaí', '100 gramas', 1.90, '/img/polpas/acai.png', 'Polpas'),
('Acerola', '100 gramas', 1.10, '/img/polpas/acerola.png', 'Polpas'),
('Ameixa', '100 gramas', 2.28, '/img/polpas/ameixa.png', 'Polpas'),
('Cacau', '100 gramas', 1.49, '/img/polpas/cacau.png', 'Polpas'),
('Caja', '100 gramas', 2.34, '/img/polpas/caja.png', 'Polpas'),
('Caju', '100 gramas', 1.00, '/img/polpas/caju.png', 'Polpas'),
('Cupuacu', '100 gramas', 1.40, '/img/polpas/cupuacu.png', 'Polpas'),
('Goiaba', '100 gramas', 1.20, '/img/polpas/goiaba.png', 'Polpas'),
('Graviola', '100 gramas', 1.50, '/img/polpas/graviola.png', 'Polpas'),
('Jenipapo', '100 gramas', 0.80, '/img/polpas/jenipapo.png', 'Polpas'),
('Manga', '100 gramas', 1.00, '/img/polpas/manga.png', 'Polpas'),
('Mangaba', '100 gramas', 2.80, '/img/polpas/mangaba.png', 'Polpas'),
('Maracujá', '100 gramas', 2.90, '/img/polpas/maracuja.png', 'Polpas'),
('Morango', '100 gramas', 2.80, '/img/polpas/morango.png', 'Polpas'),
('Tamarino', '100 gramas', 0.88, '/img/polpas/tamarino.png', 'Polpas'),
('Tangerina', '100 gramas', 1.56, '/img/polpas/tangerina.png', 'Polpas'),
('Umbu', '100 gramas', 1.32, '/img/polpas/umbu.png', 'Polpas'),
('Umbu-cajá', '100 gramas', 1.32, '/img/polpas/umbu_caja.png', 'Polpas'),
('Uva', '100 gramas', 1.60, '/img/polpas/uva.png', 'Polpas');

-- Inserir produtos na categoria "Açaí"
INSERT INTO produtos (nome, descricao, preco_unitario, url_img, categoria) VALUES
('Açaí com banana', '1 litro', 21.00, '/img/acai/acai_banana.png', 'Açaí'),
('Açaí gold', '1 litro', 26.00, '/img/acai/acai_gold.png', 'Açaí'),
('Açaí com banana', '2 litros', 36.00, '/img/acai/acai_banana.png', 'Açaí'),
('Açaí gold', '2 litros', 42.00, '/img/acai/acai_gold.png', 'Açaí'),
('Açaí com banana', '5 litros', 69.00, '/img/acai/acai_banana.png', 'Açaí'),
('Açaí gold', '5 litros', 80.00, '/img/acai/acai_gold.png', 'Açaí'),
('Açaí com banana', '10 litros', 115.00, '/img/acai/acai_banana.png', 'Açaí'),
('Açaí gold', '10 litros', 120.00, '/img/acai/acai_gold.png', 'Açaí');

-- Inserir produtos na categoria "Sorvetes"
INSERT INTO produtos (nome, descricao, preco_unitario, url_img, categoria) VALUES
('Chocolate e Avelã', '1 litro', 30.00, '/img/sorvetes/avela.png', 'Sorvetes'),
('Chocolate', '1 litro', 22.00, '/img/sorvetes/chocolate.png', 'Sorvetes'),
('Coco', '1 litro', 27.00, '/img/sorvetes/coco.png', 'Sorvetes'),
('Cupuaçu', '1 litro', 22.00, '/img/sorvetes/cupuacu.png', 'Sorvetes'),
('Leite', '1 litro', 31.10, '/img/sorvetes/leite.png', 'Sorvetes'),
('Leite e Avelã', '1 litro', 30.00, '/img/sorvetes/leite-avela.png', 'Sorvetes'),
('Mangaba', '1 litro', 22.00, '/img/sorvetes/mangaba.png', 'Sorvetes'),
('Maracujá', '1 litro', 22.00, '/img/sorvetes/maracuja.png', 'Sorvetes'),
('Morango', '1 litro', 22.00, '/img/sorvetes/morango.png', 'Sorvetes'),
('Toffe', '1 litro', 27.00, '/img/sorvetes/avela.png', 'Sorvetes');

