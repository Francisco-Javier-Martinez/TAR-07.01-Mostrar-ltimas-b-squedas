<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Jugar - <?php echo $datos['nombre']; ?></title>
</head>
<body id="pantalla-juego2">
    <nav>
        <h1>JAVIGAME</h1>
        <a href="index.php?controlador=minijuego&metodo=obtenerMinijuegos">Volver al catálogo</a>
    </nav>

    <section>
        <?php
            echo "<h1>" . $_SESSION['nombre'] . ", estás a punto de jugar a:</h1>";
            echo "<h2>" . $datos['nombre'] . "</h2>";
        ?>
        <a href="">Jugar</a>
        <a href="index.php?controlador=minijuego&metodo=obtenerMinijuegos">Volver al catálogo</a>
    </section>
</body>
</html>