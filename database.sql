CREATE DATABASE registro_coaching;

USE registro_estudiantes;

CREATE TABLE estudiantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    carrera VARCHAR(100) NOT NULL,
    cuatrimestre INT NOT NULL
);