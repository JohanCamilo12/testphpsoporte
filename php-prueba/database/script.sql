CREATE DATABASE php_mybd_asignacion;

use php_mybd_asignacion;

CREATE TABLE trabajadores (
    id INT PRIMARY KEY,
    nombre VARCHAR(50),
    complejidad_acumulada INT DEFAULT 0
);

CREATE TABLE soportes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    descripcion VARCHAR(255),
    complejidad INT,
    id_trabajador INT,
    FOREIGN KEY (id_trabajador) REFERENCES trabajadores(id)
);

DESCRIBE soportes;
