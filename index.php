<?php
session_start();

// --- Conexión a la base de datos ---
require_once __DIR__ . '/controller/conexion.php';

// --- Modelos ---
require_once __DIR__ . '/model/eventos.php';

// Inicializar variables
$login = '';
$resultado = "";

// Si el usuario está logueado
if (isset($_SESSION['email']) && isset($_SESSION['contrasena'])) {
    $login = $_SESSION['email'];
}

// --- Obtener evento destacado ---
$titulo = $descripcion = $dia = $mes = $hora = $img = "";

$query = "SELECT * FROM eventos WHERE idEventos='4'";
if ($result = mysqli_query($mysqli, $query)) {
    if ($evento = mysqli_fetch_assoc($result)) {
        $titulo = $evento['titulo'];
        $descripcion = $evento['descripcion'];
        $dia = date('d', strtotime($evento['fecha']));
        $mes = date('M', strtotime($evento['fecha']));
        $hora = date('H', strtotime($evento['fecha']));
        $img = "./assets/images/" . $evento['foto'];
    }
    mysqli_free_result($result);
} else {
    die("Error en la consulta de eventos: " . mysqli_error($mysqli));
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./view/assets/images/favicons/N_blanca.png" type="image/png">
    <title>Inicio | Nacional Music Club</title>

    <link rel="stylesheet" href="./view/assets/css/style.css">
    <link rel="stylesheet" href="./view/assets/css/header.css">
    <link rel="stylesheet" href="./view/assets/css/footer.css">
    <link rel="stylesheet" href="./view/assets/css/index.css">
    <link rel="stylesheet" href="./view/assets/css/cookies.css">

    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>
    <script src="./view/assets/js/index.js" type="application/javascript"></script>
    <script src="./view/assets/js/cookies.js" type="application/javascript"></script>
</head>

<body>

<header>
    <a href="./index.php" class="logo"><img src="./view/assets/images/logos/logoBlanco.png" width="24%"
            alt="Nacional Music Club"></a>

    <nav class="navigation">
        <ul class="show">
            <?php if (!isset($_SESSION['email'])): ?>
                <li><a href="./view/login.php"><i class="fa-solid fa-user"></i></a></li>
            <?php endif; ?>
            <li>
                <div id="language-icon" onclick="toggleLanguageSelector()">
                    <i class="fa-solid fa-earth-europe"></i>
                </div>
                <div id="language-selector" class="hidden">
                    <select id="list" class="language-select" onchange="cambiarUbicacion(this.value)">
                        <option value="es" selected> 🇪🇸 ES</option>
                        <option value="en"> 🇬🇧 EN</option>
                        <option value="it"> 🇮🇹 IT</option>
                        <option value="de"> 🇩🇪 DE</option>
                        <option value="fr"> 🇫🇷 FR</option>
                    </select>
                </div>
            </li>
            <li><i id="menuToggle">
                <input type="checkbox" />
                <span></span><span></span><span></span>
                <ul id="menu">
                    <div class="elements">
                        <li><i class="fa-solid fa-ticket"></i><a href="./view/eventos.php">Eventos</a></li>
                        <li><i class="fa-solid fa-champagne-glasses"></i><a href="./view/fiestas_privadas.php">Fiestas Privadas</a></li>
                        <li><i class="fa-solid fa-cart-shopping"></i><a href="./view/carrito.php">Carrito</a></li>
                        <li><i class="fa-solid fa-phone"></i><a href="./view/contacto.php">Contáctanos</a></li>
                        <?php if (isset($_SESSION['email'])): ?>
                            <li><i class="fa-solid fa-right-from-bracket"></i>
                                <a id="logoutButton" href="./model/logout.php" onclick="cerrarSesion()">Cerrar Sesión</a>
                            </li>
                        <?php endif; ?>
                    </div>
                </ul>
            </i></li>
        </ul>
    </nav>
</header>

<script src="/view/assets/js/idioma.js" type="application/javascript"></script>

<section class="video-container">
    <video width="100%" height="auto" autoplay loop muted disablepictureinpicture>
        <source src="./view/assets/videos/Main.mp4" type="video/mp4">
        Tu navegador no soporta el elemento de video.
    </video>
</section>

<main class="main">
    <h1 class="evento-destacado-titulo">Evento Destacado</h1>
    <div class="evento-destacado">
        <div class="evento-destacado2">
            <div class="evento-tarjeta swiper-slide">
                <div class="evento-img"><img id="evento-imagen" src="<?= $img ?>"></div>
                <div class="evento-contenido">
                    <div class="evento-titulo"><?= $titulo ?></div>
                    <div class="evento-texto"><?= $descripcion ?></div>
                    <span class="evento-fecha"><?= "$dia $mes 2023 - $hora:00" ?></span>
                    <a href="./view/eventos.php">
                        <button type="button" class="relative inline-flex items-center px-12 py-3 overflow-hidden text-lg font-medium text-indigo-600 border-2 border-indigo-600 rounded-full hover:text-white group hover:bg-gray-50">
                            <span class="absolute left-0 block w-full h-0 transition-all bg-indigo-600 opacity-100 group-hover:h-full top-1/2 group-hover:top-0 duration-300 ease"></span>
                            <span class="absolute right-0 flex items-center justify-start w-10 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
                                <svg class="w-5 h-5 transform rotate-180" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                </svg>
                            </span>
                            <span class="relative" id="event-button">Ver más</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Parallax y cookies -->
    <div class="parallax" id="parallax">
        <div class="parallax-container">
            <div class="parallax-bg"></div>
            <div class="content-container">
                <div class="content">
                    <h1>Conócenos más</h1>
                    <p>Más que una discoteca, ubicado en el corazón de Almería, Nacional Music Club es una apuesta a una experiencia única que redefine el entretenimiento nocturno. Sumérgete en un mundo vibrante con música contagiosa, luces cautivadoras y un ambiente sofisticado que eleva la diversión y la celebración a nuevas alturas. Además de ser un espacio de primer nivel, somos un punto de encuentro para aquellos que buscan autenticidad y diversidad musical. Descubre noches inolvidables en el epicentro de la escena de la diversión en Almería.</p>
                </div>
            </div>
        </div>

        <div class="media" id="cookie-notice">
            <div class="media__body">
                <p>Utilizamos cookies para ofrecerte la mejor experiencia en nuestra web.
                    Para mas información visita nuestra <a href="./view/cookies.php">Pólitica de Cookies</a>
                </p>
            </div>
            <button type="button" id="cookies_button">Aceptar y cerrar</button>
        </div>
    </div>

    <a href="#principio"><i class="fa-solid fa-angle-up" id="flecha_up"></i></a>
</main>

<footer class="site-footer">
    <img class="logo_n" src="./assets/images/favicons/N_simpleBlanca.png" width="24%" alt="NacionalMC">
    <div class="container">
        <div class="row1">
            <section class="footer-section">
                <ul class="footer-links">
                    <li><a href="./view/politica_privacidad.php" data-traduccion="politica_privacidad">POLÍTICA DE
                            PRIVACIDAD</a></li>
                    <li><a href="./view/cookies.php" data-traduccion="cookies">AVISO DE COOKIES</a></li>
                    <li><a href="./view/terms.php" data-traduccion="terminos_condiciones">TÉRMINOS Y CONDICIONES</a></li>
                </ul>
            </section>
        </div>
    </div>

    <div class="container">
        <hr>
        <div class="row2">
            <section class="footer-bot">
                <p class="copyright-text" data-traduccion="derechos_reservados">
                    Copyright © 2024 Todos los Derechos Reservados
                </p>
                <ul class="social-icons">
                    <li><a class="facebook" href="https://www.facebook.com/Nacionalmc/" target="_blank"><i
                                class="fa-brands fa-facebook"></i></a></li>
                    <li><a class="instagram" href="https://www.instagram.com/nacionalmusicclub/" target="_blank"><i
                                class="fa-brands fa-instagram"></i></a></li>
                    <li><a class="whatsapp" href="https://chat.whatsapp.com/BzvCFMnx9jB2A3Xb5dHSRf" target="_blank"><i
                                class="fa-brands fa-whatsapp"></i></a></li>
                </ul>
            </section>
        </div>
    </div>
</footer>

</body>
</html>
