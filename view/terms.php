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
    <title> Términos y Condiciones | Nacional Music Club</title>
    <link rel="icon" href="./assets/images/favicons/N_blanca.png" type="image/png">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/info.css">

    <script src="./assets/js/idioma.js" type="application/javascript" defer></script>

    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>
</head>

<body>

    <header class="site-header" id="site-header">
        <?php include('./assets/templates/header.php'); ?>
    </header>

    <main class="main">

        <div class="content" id="content">
            <h1 id="terms-title" data-traduccion="tc_titulo">TÉRMINOS Y CONDICIONES</h1>
            <p data-traduccion="tc_0">
                Bienvenido/a a Nacional Music Club. Antes de utilizar nuestros servicios,
                por favor, lee detenidamente los siguientes términos y condiciones.
                Al acceder y utilizar Nacional Music Club, aceptas cumplir con estos
                términos y condiciones. Si no estás de acuerdo con alguna parte de estos
                términos, te instamos a que no utilices nuestros servicios.
            </p>
            <h2 data-traduccion="tc_subtitulo1">1. Objeto y Alcance</h2>
            <p data-traduccion="tc_1">
                Estos términos y condiciones regulan el acceso y uso de los contenidos, productos y/o servicios
                ofrecidos en el sitio web de Nacional Music Club. Al acceder y utilizar nuestro sitio web, el usuario
                acepta expresamente los términos y condiciones aquí establecidos.
            </p>
            <h2 data-traduccion="tc_subtitulo2">2. Registro y Cuentas de Usuario</h2>
            <p data-traduccion="tc_2.1">
                2.1 Información de Registro: Para acceder a determinadas funciones de Nacional Music Club, el usuario
                deberá registrarse proporcionando información precisa, incluyendo nombre, apellidos y dirección de
                correo electrónico.
            </p>
            <p data-traduccion="tc_2.2">
                2.2 Responsabilidad del Usuario: El usuario es responsable de mantener la confidencialidad de su cuenta
                y contraseña. Cualquier actividad realizada desde la cuenta del usuario se considerará como realizada
                por él mismo.
            </p>
            <h2 data-traduccion="tc_subtitulo3">3. Compras y Reservas</h2>
            <p data-traduccion="tc_3.1">
                3.1 Transacciones: Al realizar compras o reservas a través de Nacional Music Club, el usuario acepta
                pagar todos los cargos asociados con dichas transacciones.
            </p>
            <p data-traduccion="tc_3.2">
                3.2 Información de Pago: Al proporcionar información de pago, el usuario garantiza tener el derecho
                legal de utilizar cualquier método de pago proporcionado.
            </p>
            <h2 data-traduccion="tc_subtitulo4">4. Uso Aceptable</h2>
            <p data-traduccion="tc_4.1">
                4.1 Uso Responsable: El usuario se compromete a utilizar Nacional Music Club de manera responsable y
                conforme a todas las leyes y regulaciones aplicables.
            </p>
            <p data-traduccion="tc_4.2">
                4.2 Contenido del Usuario: Al enviar contenido a nuestra plataforma, el usuario garantiza tener los
                derechos necesarios sobre dicho contenido y que no infringe los derechos de terceros.
            </p>
            <h2 data-traduccion="tc_subtitulo5">5. Privacidad</h2>
            <p data-traduccion="tc_5_inicio">
                Nuestra
                <a data-traduccion="tc_5_link" href="./politica_privacidad.php" id="enlace">política de privacidad</a>
                <span data-traduccion="tc_5_fin">
                    describe cómo recopilamos, utilizamos y compartimos la información. Al utilizar nuestros servicios,
                    el usuario acepta
                    las prácticas descritas en nuestra Política de Privacidad.
                </span>
            </p>
            <h2 data-traduccion="tc_subtitulo6">6. Modificaciones y Terminación</h2>
            <p data-traduccion="tc_6.1">
                6.1 Modificaciones: Nos reservamos el derecho de modificar estos Términos y Condiciones en cualquier
                momento. Las modificaciones entrarán en vigencia inmediatamente después de su publicación en Nacional
                Music Club.
            </p>
            <p data-traduccion="tc_6.2">
                6.2 Terminación de Servicios: Nos reservamos el derecho de suspender o terminar el acceso de cualquier
                usuario a Nacional Music Club en cualquier momento, por cualquier motivo y sin previo aviso.
            </p>
            <h2 data-traduccion="tc_subtitulo7">7. Limitación de Responsabilidad</h2>
            <p data-traduccion="tc_7">
                El uso de Nacional Music Club es bajo la responsabilidad del usuario. No garantizamos que el servicio
                sea ininterrumpido, seguro o libre de errores.
            </p>

            <p id="summary" data-traduccion="tc_summary">
                Estos términos y condiciones están sujetos a cambios, y cualquier modificación será publicada en el
                sitio web. El usuario se compromete a revisar periódicamente los términos y condiciones actualizados. El
                acceso y uso continuado de Nacional Music Club después de dichas modificaciones constituyen la
                aceptación de los nuevos términos y condiciones.
            </p>

        </div>

    </main>

    <footer class="site-footer" id="site-footer">
        <?php include('./assets/templates/footer.php'); ?>
    </footer>

</body>

</html>