-- Cria o banco de dados se ele não existir.
CREATE DATABASE IF NOT EXISTS estoque;

-- Seleciona o banco de dados para usar.
USE estoque;

-- Tabela para armazenar os dados dos usuários.
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

-- Tabela para armazenar os dados dos produtos.
CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sku VARCHAR(50) NULL UNIQUE,
    categoria VARCHAR(100) NULL,
    quantidade INT NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    fornecedor VARCHAR(255) NULL,
    descricao TEXT NULL,
    imagem VARCHAR(255) NULL,
    usuario_id INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);