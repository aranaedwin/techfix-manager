--Creamo la base de datos si no existe
CREATE DATABASE IF NOT EXISTS techfix_manager;

--Le decimos a mysql que vamos a usar esa base de datos
USE techfix_manager;

--creamos la tabla de clientes con calidad profesional
CREATE TABLE clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    correo VARCHAR(100) NULL,
    direccion VARCHAR(255) NULL,
    estado TINYINT(1) DEFAULT 1,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);