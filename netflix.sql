CREATE TABLE filmes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    categoria VARCHAR(100),
    ano INT
);

CREATE TABLE series (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    temporadas INT,
    genero VARCHAR(100)
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    senha VARCHAR(100),
    plano VARCHAR(50)
);