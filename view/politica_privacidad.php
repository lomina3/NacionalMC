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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Política de Privacidad | Nacional Music Club</title>
    <link rel="icon" href="./assets/images/favicons/N_simpleBlanca.png" type="image/png">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/info.css">

    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>
    <script src="./assets/js/idioma.js" type="application/javascript"></script>

</head>

<body>

    <header class="site-header" id="site-header">
        <?php include('./assets/templates/header.php'); ?>
    </header>

    <main class="main">

        <div class="content" id="content">
            <h1 id="priv-title">POLÍTICAS DE PRIVACIDAD</h1>
            <p>
                Bienvenido/a a Nacional Music Club. Entendemos la importancia de la
                privacidad y nos comprometemos a proteger la información personal que
                compartes con nosotros. Esta Política de Privacidad describe cómo
                recopilamos, utilizamos y compartimos tu información cuando visitas
                Nacional Music Club y/o utilizas nuestros servicios.
            </p>
            <h2>Responsable del tratamiento</h2>
            <p>
                Denominación Social: Tenostitlan S.L.<br>
                Domicilio Social: Calle Marqués de Comillas, 18, 04004, Almería, España<br>
                CIF: B04815916<br>
                Email: soporte@nacionalmusicclub.es<br>
            </p>
            <h2>1. Información que Recopilamos</h2>
            <p>
                1.1 Información de Registro: Cuando te registras en Nacional Music Club,
                recopilamos tu nombre, apellidos y dirección de correo electrónico.
                <br>
                1.2 Información de Pago: Si decides realizar compras a través de nuestra
                página web, también recopilaremos la información de pago necesaria para
                procesar la transacción.
                <br>
                1.3 Información de Uso: Recopilamos información sobre cómo interactúas
                con nuestra página web, como las páginas que visitas, el tiempo que
                pasas en ellas y otros datos de comportamiento.
            </p>
            <h2>2. Uso de la Información</h2>
            <p>
                2.1 Procesamiento de Pagos: Utilizamos la información de pago para
                procesar tus compras y reservas de manera segura a través de pasarelas
                de pago confiables.
                <br>
                2.2 Comunicaciones: Utilizamos tu dirección de correo electrónico para
                enviarte información sobre tu cuenta, transacciones y actualizaciones
                relevantes.
                <br>
                2.3 Mejora de Servicios: Analizamos la información de uso para mejorar
                la funcionalidad y el rendimiento de nuestra página web.
            </p>
            <h2>3. Compartir Información</h2>
            <p>
                3.1 Terceros de Confianza: Compartimos tu información con terceros de
                confianza, como proveedores de servicios de pago, solo cuando es
                necesario para cumplir con tus transacciones.
                <br>
                3.2 Requisitos Legales: Revelamos información cuando creemos de buena
                fe que es necesario cumplir con la ley o proteger nuestros derechos
                legales.
            </p>
            <h2>4. Cookies y Tecnologías Similares</h2>
            <p>
                Utilizamos cookies y tecnologías similares para mejorar la experiencia
                del usuario y recopilar información sobre el uso de nuestra página web.
                Puedes gestionar las preferencias de cookies en la configuración de tu
                navegador.
            </p>
            <h2>5. Seguridad de la Información</h2>
            <p>
                Tomamos medidas para proteger la información personal de los usuarios,
                pero ninguna transmisión de datos por Internet o almacenamiento
                electrónico es 100% segura. Hacemos todo lo posible para garantizar la
                seguridad de tu información, pero no podemos garantizar su seguridad
                absoluta.
            </p>
            <h2>6. Cambios en la Política de Privacidad</h2>
            <p>
                Nos reservamos el derecho de actualizar esta Política de Privacidad en
                cualquier momento. Te recomendamos revisar periódicamente esta página
                para estar al tanto de cualquier cambio.
            </p>
        </div>
    </main>

    <footer class="site-footer" id="site-footer">
        <?php include('./assets/templates/footer.php'); ?>
    </footer>

</body>

</html>