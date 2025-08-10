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
    <title>Contactanos | Nacional Music Club</title>
    <link rel="icon" href="./assets/images/favicons/N_blanca.png" type="image/png">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/contacto.css">
    <link rel="stylesheet" href="./assets/css/info.css">

    <script src="./assets/js/idioma.js" type="application/javascript"></script>

    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>

</head>

<body>

    <header class="site-header" id="site-header">
        <?php include('./assets/templates/header.php'); ?>
    </header>

    <section class="video-container">
        <video width="100%" height="auto" autoplay loop muted disablepictureinpicture>
            <source src="./assets/videos/Anuncio.mp4" type="video/mp4">
            Tu navegador no soporta el elemento de video.
        </video>
        <div>
            <h10 class="titulo-texto">¿Quiénes somos?</h10>
            <p class="cuadro-texto">SOMOS NACIONAL</p>
        </div>
    </section>

    <main>

        <div class="content" id="content">
            <h1 id="terms-title">Sobre Nosotros</h1>
            <p class="sobre-nosotros">
                ¡Bienvenido a Nacional Music Club! Fundado con pasión y visión por Grupo Tendencia en 2018, somos una
                vibrante experiencia musical en el corazón de la ciudad.
                <br>
                En Nacional Music Club, fusionamos la pasión por la música con un ambiente excepcional para ofrecerte
                noches inolvidables. Desde eventos exclusivos hasta las últimas tendencias musicales, nuestra pista de
                baile es el escenario perfecto para disfrutar de la mejor música y vivir momentos memorables.
                <br>
                Ubicados estratégicamente en Almería, nos enorgullece ser parte integral de Grupo Tendencia, una
                organización dedicada a la creación de experiencias únicas. Con una visión vanguardista, buscamos
                trascender los límites de la vida nocturna, brindándote un espacio donde la música, la diversión y la
                sofisticación convergen.
                <br>
                Explora Nacional Music Club y descubre un lugar donde la música cobra vida y la energía contagiosa te
                envuelve. Únete a nosotros en esta travesía musical, donde cada noche es una oportunidad para crear
                recuerdos imborrables. ¡Esperamos verte pronto en la pista de baile!
            </p>

        </div>

        <div class="content" id="content">
            <h1>Contacto</h1>

            <section id="formulario">
                <!-- Formulario de contacto -->
                <h3 class="text-form">¿Tienes alguna pregunta o solicitud especial? Estaremos encantados de
                    responderlas.</h3>
                <form class="contacto-form" action="../model/contacto.php" method="post">
                    <div class="name-container">
                        <div id="name">
                            <label for="nombre" class="fontLabel" data-traduccion="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" required>
                        </div>
                        <div id="apellidos">
                            <label for="apellidos" class="fontLabel" data-traduccion="apellidos">Apellidos:</label>
                            <input type="text" id="apellidos" name="apellidos" required>
                        </div>
                    </div>

                    <div class="mail-container">
                        <label for="email" class="fontLabel" data-traduccion="mail">Correo Electrónico:</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="number-container">
                        <label for="number" class="fontLabel" data-traduccion="number">Nº Telefono:</label>
                        <input type="tel" id="number" name="number" pattern="[0-9]{9}" required>
                    </div>

                    <div class="message-container">
                        <label for="message">Mensaje:</label>
                        <textarea id="message" name="message" placeholder="Escribe tu mensaje aquí" rows="4"
                            required></textarea>
                    </div>

                    <div class="button-box">
                        <button type="submit"
                            class="relative inline-flex items-center justify-start px-5 py-3 overflow-hidden font-bold rounded-full group all-bg">
                            <span
                                class="w-32 h-32 rotate-45 translate-x-12 -translate-y-2 absolute left-0 top-0 bg-black opacity-[3%]"></span>
                            <span
                                class="absolute top-0 left-0 w-48 h-48 -mt-1 transition-all duration-500 ease-in-out rotate-45 -translate-x-56 -translate-y-24 bg-black opacity-100 group-hover:-translate-x-8"></span>
                            <span
                                class="relative w-full text-left text-blbg-black transition-colors duration-200 ease-in-out group-hover:text-gray-200"
                                data-traduccion="enviar-mensaje">Enviar</span>
                            <span class="absolute inset-0 border-2 border-blbg-black rounded-full"></span>
                            </a>
                    </div>
                </form>
            </section>

            <section id="informacion">
                <!-- Información de contacto -->
                <h2 class="informacion">Información de contacto</h2>
                <p>Nacional Music Club</p>
                <p>Dirección: Calle Marqués de Comillas, 18, 04004, Almería, España</p>
                <p>Teléfono: +34 619 829 828</p>
                <p>Email: soporte@nacionalmusicclub.es</p>
            </section>

            <section id="map">
                <h1>Encuéntranos</h1>
                <div class="inframe">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12772.974127565085!2d-2.4621256!3d36.8366432!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd707767c394d71f%3A0x78541020c325028b!2sNacional%20Music%20Club!5e0!3m2!1ses!2ses!4v1704941616246!5m2!1ses!2ses"
                        width="80%" height="auto" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </section>

        </div>
    </main>

    <footer class="site-footer" id="site-footer">
        <?php include('./assets/templates/footer.php'); ?>
    </footer>

</body>

</html>