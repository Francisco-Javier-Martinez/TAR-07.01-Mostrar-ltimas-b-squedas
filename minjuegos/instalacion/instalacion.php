<?php
    require_once '../config/config.php';
    try{
        // Crear una nueva conexión PDO
        $conexion = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BBDD, USUARIO, PASSWORD);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //script sql para crear las tablas e insertar los datos
        $sql="USE JaviGame;

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
            ('JaviAdmin', 'javi@game.com', '123456789'),
            ('GamerPro99', 'pro99@gmail.com', '123456789'),
            ('LunaAzul', 'luna@hotmail.com', '123456789'),
            ('TechWizard', 'wizard@outlook.com', '123456789'),
            ('PixelArt', 'pixel@art.es', '123456789');

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
            ('Código Enigma', 'Misterio', 'PuzzleMind', b'0', 7, 'Puzzle');";
            //si la ejecución del sql es correcta 
            //aqui antes lo haciamos con multi_query pero con pdo es exec que ejecuta multiples sentencias
            if($conexion->exec($sql)!==false){
                //borrar el archivo de instalación para que no se pueda volver a ejecutar
                /* unlink("instalacion.php"); */
                //redireccionar al index
                header("Location: ../index.php");
            }else{
                echo '<h1> Error al crear las tablas o insertar los datos</h1>';
            }

    }catch(PDOException $e){
        echo "Error de conexion: " . $e->getMessage();
    }



?>