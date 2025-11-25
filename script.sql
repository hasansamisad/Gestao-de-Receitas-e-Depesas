-- filepath: gestao-receitas-despesas/script.sql
-- Criar schema
CREATE SCHEMA IF NOT EXISTS gestao_receitas_despesas 
    DEFAULT CHARACTER SET utf8mb4 
    COLLATE utf8mb4_unicode_ci;

USE gestao_receitas_despesas;

-- ============================
-- Tabela: categorias
-- ============================
CREATE TABLE IF NOT EXISTS categoria (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nome_categoria VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================
-- Tabela: lancamento
-- ============================
CREATE TABLE IF NOT EXISTS lancamento (
    id_lancamento INT AUTO_INCREMENT PRIMARY KEY,
    id_categoria INT NOT NULL,
    tipo ENUM('RECEITA', 'DESPESA') NOT NULL,
    valor DECIMAL(10,2) NOT NULL CHECK (valor > 0),
    data_lancamento TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    observacoes VARCHAR(255),

    INDEX (id_categoria),
    FOREIGN KEY (id_categoria)
        REFERENCES categoria(id_categoria)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================
-- Tabela: saldo
-- ============================
CREATE TABLE IF NOT EXISTS saldo (
    id_saldo INT PRIMARY KEY,
    saldo_total DECIMAL(10,2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserir saldo inicial
INSERT INTO saldo (id_saldo, saldo_total) VALUES (1, 0);