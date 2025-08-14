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

    <script src="./assets/js/idioma.js" type="application/javascript"></script>

    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>
</head>

<body>

    <header class="site-header" id="site-header">
        <?php include('./assets/templates/header.php'); ?>
    </header>

     <main class="main">

        <div class="content" id="content">
        <h1 id="priv-title" data-traduccion="politica_privacidad_titulo">POLÍTICAS DE PRIVACIDAD</h1>
            <p data-traduccion="politica_privacidad_0">
                Bienvenido/a a Nacional Music Club. Entendemos la importancia de la
                privacidad y nos comprometemos a proteger la información personal que
                compartes con nosotros. Esta Política de Privacidad describe cómo
                recopilamos, utilizamos y compartimos tu información cuando visitas
                Nacional Music Club y/o utilizas nuestros servicios.
            </p>
            <h2 data-traduccion="responsable_tratamiento">Responsable del tratamiento</h2>
            <p data-traduccion="rt_denominacion_social">
                Denominación Social: Tenostitlan S.L.
            </p>
            <p data-traduccion="rt_domicilio_social">
                Domicilio Social: Calle Marqués de Comillas, 18, 04004, Almería, España
            </p>
            <p data-traduccion="rt_cif">
                CIF: B04815916
            </p>
            <p data-traduccion="rt_email">
                Email: soporte@nacionalmusicclub.es
            </p>
            <h2 data-traduccion="politica_privacidad_subtitulo1">1. Información que Recopilamos</h2>
            <p data-traduccion="politica_privacidad_1.1">
                1.1 Información de Registro: Cuando te registras en Nacional Music Club,
                recopilamos tu nombre, apellidos y dirección de correo electrónico.
            </p>
            <p data-traduccion="politica_privacidad_1.2">
                1.2 Información de Pago: Si decides realizar compras a través de nuestra
                página web, también recopilaremos la información de pago necesaria para
                procesar la transacción.
            </p>
            <p data-traduccion="politica_privacidad_1.3">
                1.3 Información de Uso: Recopilamos información sobre cómo interactúas
                con nuestra página web, como las páginas que visitas, el tiempo que
                pasas en ellas y otros datos de comportamiento.
            </p>
            <h2 data-traduccion="politica_privacidad_subtitulo2">2. Uso de la Información</h2>
            <p data-traduccion="politica_privacidad_2.1">
                2.1 Procesamiento de Pagos: Utilizamos la información de pago para
                procesar tus compras y reservas de manera segura a través de pasarelas
                de pago confiables.
            <p data-traduccion="politica_privacidad_2.2">
                2.2 Comunicaciones: Utilizamos tu dirección de correo electrónico para
                enviarte información sobre tu cuenta, transacciones y actualizaciones
                relevantes.
            </p>
            <p data-traduccion="politica_privacidad_2.3">
                2.3 Mejora de Servicios: Analizamos la información de uso para mejorar
                la funcionalidad y el rendimiento de nuestra página web.
            </p>
            <h2 data-traduccion="politica_privacidad_subtitulo3">3. Compartir Información</h2>
            <p data-traduccion="politica_privacidad_3.1">
                3.1 Terceros de Confianza: Compartimos tu información con terceros de
                confianza, como proveedores de servicios de pago, solo cuando es
                necesario para cumplir con tus transacciones.
            </p>
            <p data-traduccion="politica_privacidad_3.2">
                3.2 Requisitos Legales: Revelamos información cuando creemos de buena
                fe que es necesario cumplir con la ley o proteger nuestros derechos
                legales.
            </p>
            <h2 data-traduccion="politica_privacidad_subtitulo4">4. Cookies y Tecnologías Similares</h2>
            <p data-traduccion="politica_privacidad_4">
                Utilizamos cookies y tecnologías similares para mejorar la experiencia
                del usuario y recopilar información sobre el uso de nuestra página web.
                Puedes gestionar las preferencias de cookies en la configuración de tu
                navegador.
            </p>
            <h2 data-traduccion="politica_privacidad_subtitulo5">5. Seguridad de la Información</h2>
            <p data-traduccion="politica_privacidad_5">
                Tomamos medidas para proteger la información personal de los usuarios,
                pero ninguna transmisión de datos por Internet o almacenamiento
                electrónico es 100% segura. Hacemos todo lo posible para garantizar la
                seguridad de tu información, pero no podemos garantizar su seguridad
                absoluta.
            </p>
            <h2 data-traduccion="politica_privacidad_subtitulo6">6. Cambios en la Política de Privacidad</h2>
            <p data-traduccion="politica_privacidad_6">
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