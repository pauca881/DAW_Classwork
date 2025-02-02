CREATE DATABASE academia_mvc;
USE academia_mvc;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    contraseña VARCHAR(255) NOT NULL
);

CREATE TABLE cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    fecha_inicio DATE NOT NULL,
    duracion INT NOT NULL
);

CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    curso_id INT,
    fecha_reserva TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (curso_id) REFERENCES cursos(id) ON DELETE CASCADE
);


INSERT INTO usuarios (nombre, email, contraseña) VALUES 
('Ana Pérez', 'ana@example.com', '123'), 
('Carlos López', 'carlos@example.com', '123'),
('Laura García', 'laura@example.com', '123');

INSERT INTO cursos (nombre, descripcion, fecha_inicio, duracion) VALUES 
('PHP Básico', 'Introducción a PHP y desarrollo web', '2024-03-01', 4),
('PHP Avanzado', 'Patrones de diseño y MVC en PHP', '2024-04-15', 6),
('Desarrollo con Laravel', 'Creación de aplicaciones con Laravel', '2024-05-10', 8);

INSERT INTO reservas (usuario_id, curso_id, fecha_reserva) VALUES 
(1, 2, NOW()),  -- Ana se inscribe en "PHP Avanzado"
(2, 1, NOW()),  -- Carlos se inscribe en "PHP Básico"
(3, 3, NOW());  -- Laura se inscribe en "Desarrollo con Laravel"
