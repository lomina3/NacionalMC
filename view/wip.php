<?php
include_once('../controller/Conexion.php');
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['contrasena'])) {
    $login = $_SESSION['email'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Página en Construcción | Nacional Music Club</title>
    <link rel="icon" href="./assets/images/N_simple.png" type="image/png">

    <link href="./assets/css/style.css" rel="stylesheet" />
    <link href="./assets/css/error.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">

        <div class="left-section">

            <video autoplay muted loop>
                <source src="./assets/videos/Anuncio.mp4" type="video/mp4">
                Tu navegador no soporta el tag de video.
            </video>

            <a href="./index.html" class="logo"><img src="./assets/images/N_simple.png" width="17%"
                    alt="Nacional Music Club"></a>

        </div>

        <div class="right-section">

            <div class="error-container">
                <h2 class="error-title">¡Ups! Página en Construcción</h2>
                <p class="error-message">Estamos trabajando en esta sección. Pronto estará disponible.</p>
                <p class="back-home"><a href="./index.php">Volver a la página principal</a></p>
            </div>

        </div>
    </div>

</body>

</html>