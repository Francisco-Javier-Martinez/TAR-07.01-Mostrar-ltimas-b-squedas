CREATE DATABASE JaviGame;
USE JaviGame;

CREATE TABLE usuarios (
    idUsuario SMALLINT unsigned AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(50) not null unique,
    correo VARCHAR(50) NOT NULL UNIQUE,
    contrasena VARCHAR(60) NOT NULL
);

CREATE TABLE minijuegos (
    idMinijuego SMALLINT unsigned AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    tematica VARCHAR(50) NOT NULL,
    desarrollador VARCHAR(100) NOT NULL,
    cooperativo BIT(1) DEFAULT 0 NOT NULL,
    clasificacion tinyint unsigned NOT NULL,
    genero VARCHAR(50) NOT NULL,
    CONSTRAINT check_pegi CHECK (clasificacion IN (7, 16, 18))
);

USE JaviGame;

-- Inserción masiva en la tabla 'usuarios'
INSERT INTO usuarios (nombre, correo, contrasena) VALUES 
('JaviAdmin', 'javi@game.com', '$2y$10$e0MYzXyDx76Ezf6T6S5uE.6LqD0D/r5q/1u1u1u1u1u1u1u1u1u1u'),
('GamerPro99', 'pro99@gmail.com', '$2y$10$n8R9Q8w7e6r5t4y3u2i1o0p9a8s7d6f5g4h3j2k1l0m9n8b7v6c5x'),
('LunaAzul', 'luna@hotmail.com', '$2y$10$P5o4i3u2y1t0r9e8w7q6a5s4d3f2g1h0j9k8l7m6n5b4v3c2x1z0y'),
('TechWizard', 'wizard@outlook.com', '$2y$10$K7j8h9g0f1d2s3a4p5o6i7u8y9t0r1e2w3q4l5k6j7h8g9f0d1s2a'),
('PixelArt', 'pixel@art.es', '$2y$10$M1n2b3v4c5x6z7l8k9j0h1g2f3d4s5a6p7o8i9u0y1t2r3e4w5q6a');

-- Inserción masiva en la tabla 'minijuegos'
INSERT INTO minijuegos (nombre, tematica, desarrollador, cooperativo, clasificacion, genero) VALUES 
('Bosque Encantado', 'Fantasía', 'DreamStudio', b'1', 7, 'Aventura'),
('Cyber Strike', 'Futurista', 'NeoGames', b'0', 16, 'Shooter'),
('Terror en la Mina', 'Horror', 'DarkSoul Devs', b'1', 18, 'Survival Horror'),
('Granja Divertida', 'Simulación', 'GreenLeaf', b'0', 7, 'Estrategia'),
('Guerra de Tronos', 'Medieval', 'IronSword Inc', b'1', 18, 'RPG'),
('Velocidad Extrema', 'Carreras', 'NitroBoost', b'0', 7, 'Deportes'),
('Infiltración Zero', 'Espionaje', 'Shadow Soft', b'0', 16, 'Sigilo'),
('Mundo Bloque', 'Construcción', 'CubeCraft', b'1', 7, 'Sandbox'),
('Zombi Apocalypse', 'Post-apocalíptico', 'Survival HQ', b'1', 18, 'Acción'),
('Código Enigma', 'Misterio', 'PuzzleMind', b'0', 7, 'Puzzle');