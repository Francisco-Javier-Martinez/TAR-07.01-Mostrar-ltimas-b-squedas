<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>JaviGame - Inicio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="pantalla-inicio">
    <nav>
        <h1>JAVIGAME</h1>
        <h2>Bienvenido, <?php echo $_SESSION['nombre']; ?></h2>
        <a href="index.php?controlador=usuario&metodo=cerrarSesion">Cerrar Sesión</a>
    </nav>
    <header>
        <h1>Catálogo de Minijuegos</h1>
    </header>
    <main>
        <!-- si hay minijuegos en cookies los mostramos -->
        <section id="ultimos-juegos">
        <?php
            if(!empty($_COOKIE)) {
                echo "<h3>Último juego jugado:</h3>";
                foreach($_COOKIE as $nombre => $valor){
                    //strpos sirve para buscar una subcadena dentro de una cadena
                    if(strpos($nombre, 'Juego') !== false){
                        echo "<div class='juego-reciente'>";
                        echo "<p>" . $valor . "</p>";
                        echo "</div>";
                    }
                }
            }
        ?>
    </section>
        <!-- mostramos los minijuegos -->
        <?php
        //si es un array es que hay minijuegos si no monstrare el mensaje de error
        if (is_array($datos)) {
            foreach ($datos as $minijuego) {
                ?>
                <section>
                    <h2><?php echo $minijuego['nombre']; ?></h2>
                    <p><?php echo $minijuego['genero']; ?></p>
                    <p>Temática: <?php echo $minijuego['tematica']; ?></p>
                    <p>Desarrollador: <?php echo $minijuego['desarrollador']; ?></p>
                    <p>Clasificación: PEGI <?php echo $minijuego['clasificacion']; ?></p>
                    <p>
                        Modo: 
                        <?php 
                            if($minijuego['cooperativo'] == '1'){
                                echo "Single Player";
                            } else {
                                echo "Multiplayer";
                            }
                        ?>
                    </p>
                    <a href="index.php?controlador=minijuego&metodo=jugar&idMini=<?php echo $minijuego['idMinijuego']; ?>">Ir a la pagina del jeugo</a>
                </section>
                <?php
            }
        } else {
            echo "<p>" . $datos . "</p>";
        }
        ?>
    </main>
</body>
</html>