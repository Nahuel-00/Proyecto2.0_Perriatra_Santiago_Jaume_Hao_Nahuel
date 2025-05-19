DROP DATABASE IF EXISTS `db_perriatra`;
CREATE DATABASE db_perriatra;
USE db_perriatra;

-- Tabla: tbl_propietario
CREATE TABLE tbl_propietario (
    id_propietario INT AUTO_INCREMENT PRIMARY KEY,
    dni_propietario CHAR(9) NOT NULL,
    nombre VARCHAR(20) NOT NULL,
    apellido_primario VARCHAR(35) NOT NULL,
    apellido_secundario VARCHAR(35) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    fecha_registro DATE NOT NULL
);

-- Tabla: tbl_veterinario
CREATE TABLE tbl_veterinario (
    id_veterinario INT AUTO_INCREMENT PRIMARY KEY,
    dni_veterianrio CHAR(9) NOT NULL,
    nombre VARCHAR(20) NOT NULL,
    apellido_primario VARCHAR(35) NOT NULL,
    apellido_secundario VARCHAR(35) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    fecha_contratacion DATE NOT NULL,
    activo BOOLEAN NOT NULL
);

-- Tabla: tbl_especie
CREATE TABLE tbl_especie (
    id_especie INT AUTO_INCREMENT PRIMARY KEY,
    nombre_especie VARCHAR(100) NOT NULL,
    descripcion VARCHAR(250) NOT NULL
);

-- Tabla: tbl_raza
CREATE TABLE tbl_raza (
    id_raza INT AUTO_INCREMENT PRIMARY KEY,
    nombre_raza VARCHAR(50) NOT NULL,
    id_especie INT NOT NULL,
    FOREIGN KEY (id_especie) REFERENCES tbl_especie(id_especie)
);

-- Tabla: tbl_animal
CREATE TABLE tbl_animal (
    chip VARCHAR(20) PRIMARY KEY,
    nombre VARCHAR(25) NOT NULL,
    sexo ENUM('M', 'F') NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    peso DECIMAL(5,2) NOT NULL,
    vacunado BOOLEAN NOT NULL,
    id_especie INT NOT NULL,
    id_propietario INT NOT NULL,
    FOREIGN KEY (id_especie) REFERENCES tbl_especie(id_especie),
    FOREIGN KEY (id_propietario) REFERENCES tbl_propietario(id_propietario)
);

-- Tabla: tbl_medicamento
CREATE TABLE tbl_medicamento (
    id_medicamento INT AUTO_INCREMENT PRIMARY KEY,
    nombre_medicamento VARCHAR(50) NOT NULL,
    descripcion_medicamento VARCHAR(100) NOT NULL,
    uso_medicamento VARCHAR(100) NOT NULL,
    img VARCHAR(100) NOT NULL
);

-- Tabla: tbl_historial
CREATE TABLE tbl_historial (
    id_historial INT AUTO_INCREMENT PRIMARY KEY,
    fecha_historial DATE NOT NULL,
    diagnostico VARCHAR(350) NOT NULL,
    tratamiento VARCHAR(250) NOT NULL,
    observaciones VARCHAR(350) NOT NULL,
    chip VARCHAR(20) NOT NULL,
    id_veterinario INT NOT NULL,
    id_medicamento INT NOT NULL,
    FOREIGN KEY (chip) REFERENCES tbl_animal(chip),
    FOREIGN KEY (id_veterinario) REFERENCES tbl_veterinario(id_veterinario),
    FOREIGN KEY (id_medicamento) REFERENCES tbl_medicamento(id_medicamento)
);

-- Tabla: tbl_usuarios
CREATE TABLE tbl_usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(150) NOT NULL,
    contra_usuario VARCHAR(100) NOT NULL,
    email_usuario VARCHAR (100) NOT NULL,
    id_propietario INT,
    id_veterinario INT,
    FOREIGN KEY (id_propietario) REFERENCES tbl_propietario(id_propietario),
    FOREIGN KEY (id_veterinario) REFERENCES tbl_veterinario(id_veterinario)
);
