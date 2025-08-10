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
    <title> Términos y Condiciones | Nacional Music Club</title>
    <link rel="icon" href="./assets/images/N_simple.png" type="image/png">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/info.css">

    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>
    <script src="./assets/js/idioma.js" type="application/javascript"></script>
</head>

<body>

    <header class="site-header" id="site-header"></header>
    <script src="./assets/js/header.js"></script>

    <main class="main">

        <div class="content" id="content">
            <h1 id="terms-title">TÉRMINOS Y CONDICIONES</h1>
            <p>
                Bienvenido/a a Nacional Music Club. Antes de utilizar nuestros servicios,
                por favor, lee detenidamente los siguientes términos y condiciones.
                Al acceder y utilizar Nacional Music Club, aceptas cumplir con estos
                términos y condiciones. Si no estás de acuerdo con alguna parte de estos
                términos, te instamos a que no utilices nuestros servicios.
            </p>
            <h2>1. Objeto y Alcance</h2>
            <p>
                Estos términos y condiciones regulan el acceso y uso de los contenidos, productos y/o servicios
                ofrecidos en el sitio web de Nacional Music Club. Al acceder y utilizar nuestro sitio web, el usuario
                acepta expresamente los términos y condiciones aquí establecidos.
            </p>
            <h2>2. Registro y Cuentas de Usuario</h2>
            <p>
                2.1 Información de Registro: Para acceder a determinadas funciones de Nacional Music Club, el usuario
                deberá registrarse proporcionando información precisa, incluyendo nombre, apellidos y dirección de
                correo electrónico.
                <br>
                2.2 Responsabilidad del Usuario: El usuario es responsable de mantener la confidencialidad de su cuenta
                y contraseña. Cualquier actividad realizada desde la cuenta del usuario se considerará como realizada
                por él mismo.
            </p>
            <h2>3. Compras y Reservas</h2>
            <p>
                3.1 Transacciones: Al realizar compras o reservas a través de Nacional Music Club, el usuario acepta
                pagar todos los cargos asociados con dichas transacciones.
                <br>
                3.2 Información de Pago: Al proporcionar información de pago, el usuario garantiza tener el derecho
                legal de utilizar cualquier método de pago proporcionado.
            </p>
            <h2>4. Uso Aceptable</h2>
            <p>
                4.1 Uso Responsable: El usuario se compromete a utilizar Nacional Music Club de manera responsable y
                conforme a todas las leyes y regulaciones aplicables.
                <br>
                4.2 Contenido del Usuario: Al enviar contenido a nuestra plataforma, el usuario garantiza tener los
                derechos necesarios sobre dicho contenido y que no infringe los derechos de terceros.
            </p>
            <h2>5. Privacidad</h2>
            <p>
                Nuestra <a href="./politica_privacidad.html" id="enlace">política de privacidad</a> describe cómo
                recopilamos, utilizamos y compartimos la información. Al utilizar nuestros servicios, el usuario acepta
                las prácticas descritas en nuestra Política de Privacidad.
            </p>
            <h2>6. Modificaciones y Terminación</h2>
            <p>
                6.1 Modificaciones: Nos reservamos el derecho de modificar estos Términos y Condiciones en cualquier
                momento. Las modificaciones entrarán en vigencia inmediatamente después de su publicación en Nacional
                Music Club.
                <br>
                6.2 Terminación de Servicios: Nos reservamos el derecho de suspender o terminar el acceso de cualquier
                usuario a Nacional Music Club en cualquier momento, por cualquier motivo y sin previo aviso.
            </p>
            <h2>7. Limitación de Responsabilidad</h2>
            <p>
                El uso de Nacional Music Club es bajo la responsabilidad del usuario. No garantizamos que el servicio
                sea ininterrumpido, seguro o libre de errores.
            </p>

            <p id="summary">
                Estos términos y condiciones están sujetos a cambios, y cualquier modificación será publicada en el
                sitio web. El usuario se compromete a revisar periódicamente los términos y condiciones actualizados. El
                acceso y uso continuado de Nacional Music Club después de dichas modificaciones constituyen la
                aceptación de los nuevos términos y condiciones.
            </p>

        </div>

    </main>

    <footer class="site-footer" id="site-footer"></footer>
    <script src="./assets/js/footer.js"></script>

</body>

</html>