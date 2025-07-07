CREATE DATABASE IF NOT EXISTS inventario;
USE inventario;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS maquinaria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion TEXT,
    imagen VARCHAR(255),
    ubicacion VARCHAR(100),
    fecha_adquisicion DATE,
    estado VARCHAR(50),
    modelo VARCHAR(100),
    anio INT,
    numero_serie VARCHAR(100)
);

INSERT INTO usuarios (username, password) VALUES ('admin', SHA2('admin123', 256));
