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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Aviso de Cookies | Nacional Music Club</title>
    <link rel="icon" href="./assets/images/favicons/N_simpleBlanca.png" type="image/png">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/info.css">

    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>
    <script src="./assets/js/idioma.js" type="application/javascript"></script>
</head>

<body>

    <header>
        <script src="./assets/js/template_header.js"></script>
    </header>

    <main class="main">

        <div class="content" id="content">
            <h1 id="terms-title">AVISO DE COOKIES</h1>
            <h2>1. Introducción</h2>
            <p>
                Bienvenido a Nacional Music Club. Esta Política de Cookies explica cómo utilizamos cookies y
                tecnologías similares en nuestro sitio web.
            </p>
            <h2>2. ¿Qué son las cookies?</h2>
            <p>
                Las cookies son pequeños archivos de texto que se almacenan en tu dispositivo cuando visitas un sitio
                web. Estas cookies contienen información que se utiliza para mejorar tu experiencia de navegación.
            </p>
            <h2>3. ¿Cómo utilizamos las cookies?</h2>
            <p>
                En Nacional Music Club, utilizamos cookies con el objetivo de:
                <br>
                - Mantener la Sesión Iniciada: Utilizamos cookies para garantizar que puedas acceder a áreas seguras y
                mantener tu sesión iniciada durante tu visita.
                <br>
                - Idioma Seleccionado: Almacenamos cookies para recordar el idioma que has seleccionado para
                personalizar tu experiencia de navegación.
                <br>
                - Carrito de Compras: Utilizamos cookies para gestionar el carrito de compras y recordar los artículos
                que has seleccionado. Esto incluye la capacidad de fusionar el carrito anterior con la cuenta después de
                iniciar sesión.
            </p>
            <h2>4. Consentimiento del Usuario</h2>
            <p>
                Al utilizar nuestro sitio web, aceptas el uso de cookies de acuerdo con esta Política de Cookies. Si no
                estás de acuerdo con el uso de cookies, puedes ajustar la configuración de tu navegador para
                deshabilitarlas.
            </p>
            <h2>5. Configuración de Cookies</h2>
            <p>
                Puedes gestionar la configuración de las cookies a través de la configuración de tu navegador. Ten en
                cuenta que deshabilitar ciertas cookies puede afectar la funcionalidad del sitio web.
            </p>
            <h2>6. Cambios en la Política de Cookies</h2>
            <p>
                Nos reservamos el derecho de realizar cambios en esta Política de Cookies. Cualquier cambio será
                publicado en esta página, por lo que te recomendamos revisarla periódicamente.
            </p>
            <h2>7. Contacto</h2>
            <p>
                Si tienes preguntas sobre nuestra Política de Cookies, por favor contáctanos a través de este <a
                    href="./contacto.php" id="enlace">enlace.</a>
            </p>
            <br>
            Fecha de última actualización: 13 de enero de 2024

        </div>

    </main>

    <footer class="site-footer">
        <script src="./assets/js/template_footer.js"></script>
    </footer>

</body>

</html>