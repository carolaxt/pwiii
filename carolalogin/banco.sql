CREATE DATABASE carolabanco;
USE carolabanco;
CREATE TABLE usuarios (
    id    INT AUTO_INCREMENT PRIMARY KEY,
    nome  VARCHAR(50)  NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(32)  NOT NULL
)