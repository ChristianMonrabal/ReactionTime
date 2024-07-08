-- Crear la base de datos
CREATE DATABASE ReactionTime;

-- Seleccionar la base de datos
USE ReactionTime;

-- Crear la tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE tiempos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    tiempo INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

select * from tiempos;
