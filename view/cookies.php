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
    <title> Aviso de Cookies | Nacional Music Club</title>
    <link rel="icon" href="./assets/images/favicons/N_simpleBlanca.png" type="image/png">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/info.css">

    <script src="./assets/js/idioma.js" type="application/javascript"></script>

    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>
</head>

<body>

    <header class="site-header" id="site-header">
        <?php include('./assets/templates/header.php'); ?>
    </header>

    <main class="main">

        <div class="content" id="content">
        <h1 id="terms-title" data-traduccion="cookies_titulo">AVISO DE COOKIES</h1>
            <h2 data-traduccion="cookies_1_subtitulo">1. Introducción</h2>
            <p data-traduccion="cookies_1">
                Bienvenido a Nacional Music Club. Esta Política de Cookies explica cómo utilizamos cookies y
                tecnologías similares en nuestro sitio web.
            </p>
            <h2 data-traduccion="cookies_2_subtitulo">2. ¿Qué son las cookies?</h2>
            <p data-traduccion="cookies_2">
                Las cookies son pequeños archivos de texto que se almacenan en tu dispositivo cuando visitas un sitio
                web. Estas cookies contienen información que se utiliza para mejorar tu experiencia de navegación.
            </p>
            <h2 data-traduccion="cookies_3_subtitulo">3. ¿Cómo utilizamos las cookies?</h2>
            <p data-traduccion="cookies_3.1">
                En Nacional Music Club, utilizamos cookies con el objetivo de:
            </p>
            <p data-traduccion="cookies_3.2">
                - Mantener la Sesión Iniciada: Utilizamos cookies para garantizar que puedas acceder a áreas seguras y
                mantener tu sesión iniciada durante tu visita.
            </p>
            <p data-traduccion="cookies_3.3">
                - Idioma Seleccionado: Almacenamos cookies para recordar el idioma que has seleccionado para
                personalizar tu experiencia de navegación.
            </p>
            <p data-traduccion="cookies_3.4">
                - Carrito de Compras: Utilizamos cookies para gestionar el carrito de compras y recordar los artículos
                que has seleccionado. Esto incluye la capacidad de fusionar el carrito anterior con la cuenta después de
                iniciar sesión.
            </p>
            <h2 data-traduccion="cookies_4_subtitulo">4. Consentimiento del Usuario</h2>
            <p data-traduccion="cookies_4">
                Al utilizar nuestro sitio web, aceptas el uso de cookies de acuerdo con esta Política de Cookies. Si no
                estás de acuerdo con el uso de cookies, puedes ajustar la configuración de tu navegador para
                deshabilitarlas.
            </p>
            <h2 data-traduccion="cookies_5_subtitulo">5. Configuración de Cookies</h2>
            <p data-traduccion="cookies_5">
                Puedes gestionar la configuración de las cookies a través de la configuración de tu navegador. Ten en
                cuenta que deshabilitar ciertas cookies puede afectar la funcionalidad del sitio web.
            </p>
            <h2 data-traduccion="cookies_6_subtitulo">6. Cambios en la Política de Cookies</h2>
            <p data-traduccion="cookies_6">
                Nos reservamos el derecho de realizar cambios en esta Política de Cookies. Cualquier cambio será
                publicado en esta página, por lo que te recomendamos revisarla periódicamente.
            </p>
            <h2 data-traduccion="cookies_7_subtitulo">7. Contacto</h2>
            <p data-traduccion="cookies_7">
                Si tienes preguntas sobre nuestra Política de Cookies, por favor contáctanos a través de este <a
                    href="./contacto.html" id="enlace" data-traduccion="cookies_7_link">enlace.</a>
            </p>
            <br>
            <p data-traduccion="cookies_fecha_ultima">
                Fecha de última actualización: 13 de enero de 2024
            </p>
        </div>

    </main>

    <footer class="site-footer" id="site-footer">
        <?php include('./assets/templates/footer.php'); ?>
    </footer>

</body>

</html>