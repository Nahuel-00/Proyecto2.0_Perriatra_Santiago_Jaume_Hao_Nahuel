DROP DATABASE IF EXISTS `db_perriatra`;
CREATE DATABASE db_perriatra;
USE db_perriatra;

-- Tabla: tbl_propietario
CREATE TABLE tbl_propietario (
    dni_propietario CHAR(9) PRIMARY KEY NOT NULL,
    nombre_propietario VARCHAR(20) NOT NULL,
    apellido_primario_propietario VARCHAR(35) NOT NULL,
    apellido_secundario_propietario VARCHAR(35) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    fecha_registro DATE NOT NULL
);

-- Tabla: tbl_veterinario
CREATE TABLE tbl_veterinario (
    dni_veterinario CHAR(9) PRIMARY KEY NOT NULL,
    nombre_veterinario VARCHAR(20) NOT NULL,
    apellido_primario_veterinario VARCHAR(35) NOT NULL,
    apellido_secundario_veterinario VARCHAR(35) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    fecha_contratacion DATE NOT NULL,
    activo BOOLEAN NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Tabla: tbl_especie
CREATE TABLE tbl_especie (
    id_especie INT AUTO_INCREMENT PRIMARY KEY,
    nombre_especie ENUM('mamifero', 'ave', 'pez', 'aracnido', 'insecto', 'reptil') NOT NULL
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
    dni_propietario CHAR(9) NOT NULL,
    dni_veterinario CHAR(9) NOT NULL,
    FOREIGN KEY (id_especie) REFERENCES tbl_especie(id_especie),
    FOREIGN KEY (dni_propietario) REFERENCES tbl_propietario(dni_propietario),
    FOREIGN KEY (dni_veterinario) REFERENCES tbl_veterinario(dni_veterinario)
);

-- Tabla: tbl_medicamento
CREATE TABLE tbl_medicamento (
    id_medicamento INT AUTO_INCREMENT PRIMARY KEY,
    nombre_medicamento VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    imagen VARCHAR(255) NOT NULL, -- ruta o nombre de archivo de la imagen
    dosis VARCHAR(100) NOT NULL,  -- ej: '5 ml cada 8 horas'
    id_especie INT,               -- especie a la que va dirigido (opcional)
    FOREIGN KEY (id_especie) REFERENCES tbl_especie(id_especie)
);



INSERT INTO `db_perriatra`.`tbl_especie` (`id_especie`, `nombre_especie`) VALUES ('1', 'mamifero');
INSERT INTO `db_perriatra`.`tbl_especie` (`id_especie`, `nombre_especie`) VALUES ('2', 'ave');
INSERT INTO `db_perriatra`.`tbl_especie` (`id_especie`, `nombre_especie`) VALUES ('3', 'pez');
INSERT INTO `db_perriatra`.`tbl_especie` (`id_especie`, `nombre_especie`) VALUES ('4', 'aracnido');
INSERT INTO `db_perriatra`.`tbl_especie` (`id_especie`, `nombre_especie`) VALUES ('5', 'insecto');
INSERT INTO `db_perriatra`.`tbl_especie` (`id_especie`, `nombre_especie`) VALUES ('6', 'reptil');
