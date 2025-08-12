<?php
include_once('../controller/conexion.php');
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['contrasena'])) {
    $login = $_SESSION['email'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error 404 - Página no encontrada</title>
    <link rel="icon" href="./assets/images/N_simple.png" type="image/png">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/error.css">
</head>

<body>

     <div class="error-container">
        <img src="view/assets/images/logoDoradoCustom.png" width="17%" alt="Nacional Music Club">
        <h1 class="error-title">Error 404</h1>
        <p class="error-message" data-traduccion="error_message">Lo sentimos, la página que estás buscando no existe.</p>
            <p class="back-home" id="Volver" data-traduccion="error_back">Vuelve a la <a href="../" data-traduccion="error_back_link">página principal</a></p>
    </div>

</body>

</html>