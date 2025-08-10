<?php
include_once('../controller/conexion.php');
session_start();

$login = '';
$resultado = "";

if (isset($_SESSION['email']) && isset($_SESSION['contrasena'])) {
    $login = $_SESSION['email'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./assets/images/favicons/N_blanca.png" type="image/png">
    <title>Inicio | Nacional Music Club</title>

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/cookies.css">


    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>
    <script src="./assets/js/index.js" type="application/javascript"></script>
    <script src="./assets/js/cookies.js" type="application/javascript"></script>
</head>

<body>

    <header>
        <a href="./index.php" class="logo"><img src="./assets/images/logos/logoBlanco.png" width="24%"
                alt="Nacional Music Club"></a>

        <nav class="navigation">
            <ul class="show">
                <?php
                if (!isset($_SESSION['email'])) {

                    echo '<li><a href="./login.php"><i class="fa-solid fa-user"></i></a></li>';
                }
                ?>
                <li>
                    <div id="language-selector" class="hidden">
                        <select id="list" class="language-select" onchange="cambiarUbicacion(this.value)">
                            <option id="es" class="seleccionado" value="es" selected="selected"> 🇪🇸 ES</option>
                            <option id="en" class="" value="en"> 🇺🇸 EN</option>
                            <option id="it" class="" value="it"> 🇮🇹 IT</option>
                        </select>
                    </div>

                    <!-- Agrega el icono para mostrar/ocultar el selector -->
                    <div id="language-icon" onclick="toggleLanguageSelector()">
                        <i class="fa-solid fa-earth-europe"></i>
                    </div>
                </li>
                <li><i id="menuToggle">
                        <input type="checkbox" />
                        <span></span>
                        <span></span>
                        <span></span>
                        <ul id="menu">
                            <div class="elements">
                                <li><i class="fa-solid fa-ticket"></i><a data-traduccion="eventos"
                                        href="./eventos.php">Eventos</a>
                                </li>
                                <li><i class="fa-solid fa-champagne-glasses"></i><a data-traduccion="fiestas_privadas"
                                        href="./fiestas_privadas.php">Fiestas
                                        Privadas</a></li>
                                <li><i class="fa-solid fa-cart-shopping"></i><a data-traduccion="carrito"
                                        href="./carrito.php">Carrito</a>
                                </li>
                                <li><i class="fa-solid fa-phone"></i><a data-traduccion="contactanos"
                                        href="./contacto.php">Contáctanos</a></li>

                                <?php
                                if (isset($_SESSION['email'])) {
                                    // El usuario ha iniciado sesión, mostrar el enlace para cerrar sesión
                                    echo '<li><i class="fa-solid fa-right-from-bracket"></i><a id="logoutButton" data-traduccion="cerrar_sesion" href="../model/logout.php" onclick="cerrarSesion()">Cerrar Sesión</a></li>';
                                }
                                ?>
                            </div>
                        </ul>
                    </i>
                </li>
            </ul>
        </nav>
    </header>

    <script src="./assets/js/idioma.js" type="application/javascript"></script>

    <section class="video-container">
        <video width="100%" height="auto" autoplay loop muted disablepictureinpicture>
            <source src="./assets/videos/Main.mp4" type="video/mp4">
            Tu navegador no soporta el elemento de video.
        </video>
    </section>

    <main class="main">
        <?php
        include('../model/eventos.php');

        $query = "SELECT *  FROM eventos WHERE idEventos='4'";
        $result = mysqli_query($mysqli, $query);

        while ($evento = mysqli_fetch_array($result)) {
            $titulo = $evento['titulo'];
            $descripcion = $evento['descripcion'];
            $dia = date('d', strtotime($evento['fecha']));
            $mes = date('M', strtotime($evento['fecha']));
            $hora = date('H', strtotime($evento['fecha']));
            $img = "./assets/images/" . $evento['foto'];
        }

        echo '<h1 class="evento-destacado-titulo" data-traduccion="evento-destacado">Evento Destacado</h1>';
        echo '
            <div class="evento-destacado">
                <div class="evento-destacado2">
                    <div class="evento-tarjeta swiper-slide">
                        <div class="evento-img"><img id="evento-imagen" src=" ' . $img . ' "></div>
                        <div class="evento-contenido">
                            <div class="evento-titulo">' . $titulo . '</div>
                            <div class="evento-texto">' . $descripcion . '</div>
                            <span class="evento-fecha"> ' . $dia . ' ' . $mes . ' 2023 - ' . $hora . ':00</span>

                            <a href="./eventos.php?id=' . $idEvento . '">
                            <button type="button"
                                class="relative inline-flex items-center px-12 py-3 overflow-hidden text-lg font-medium text-indigo-600 border-2 border-indigo-600 rounded-full hover:text-white group hover:bg-gray-50">
                                <span
                                    class="absolute left-0 block w-full h-0 transition-all bg-indigo-600 opacity-100 group-hover:h-full top-1/2 group-hover:top-0 duration-300 ease"></span>
                                <span
                                    class="absolute right-0 flex items-center justify-start w-10 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
                                    <svg class="w-5 h-5 transform rotate-180" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7"></path>
                                    </svg>
                                </span>
                                <span class="relative" id="event-button">Ver más</span>
                            </button>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
        </div>
        ';
        ?>

        <div class="parallax" id="parallax">
            <div class="parallax-container">
                <div class="parallax-bg"></div>
                <div class="content-container">
                    <div class="content">
                        <h1 data-traduccion="conocenos_mas">Conócenos más</h1>
                        <p data-traduccion="descripcion_conocenos_mas">
                            Más que una discoteca, ubicado en el corazón de Almería, Nacional Music Club es una apuesta
                            a una experiencia única que redefine el entretenimiento nocturno. Sumérgete en un
                            mundo vibrante con música contagiosa, luces cautivadoras y un ambiente sofisticado que eleva
                            la diversión y la celebración a nuevas alturas.
                            Además de ser un espacio de primer nivel, somos un punto de encuentro para aquellos que
                            buscan autenticidad y diversidad musical. Descubre noches inolvidables en el epicentro de la
                            escena de la diversión en Almería.
                        </p>
                    </div>
                </div>
            </div>

            <div class="media" id="cookie-notice">

                <div class="media__body" data-traduccion="politica_cookies">
                    <p>Utilizamos cookies para ofrecerte la mejor experiencia en nuestra web.
                        Para mas información visita nuestra <a href="./cookies.php" data-traduccion="cookies"
                            id="enlace_cookies">Pólitica de Cookies</a>
                    </p>
                </div>

                <button type="button" id="cookies_button"
                    class="relative inline-flex items-center px-12 py-3 overflow-hidden text-lg font-medium text-indigo-600 border-2 border-indigo-600 rounded-full hover:text-white group hover:bg-gray-50">
                    <span
                        class="absolute left-0 block w-full h-0 transition-all bg-indigo-600 opacity-100 group-hover:h-full top-1/2 group-hover:top-0 duration-300 ease"></span>
                    <span
                        class="absolute right-0 flex items-center justify-start w-10 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
                        <svg class="w-5 h-5 transform rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7">
                            </path>
                        </svg>
                    </span>
                    <span class="relative" id="accept-cookies">Aceptar y cerrar</span>
                </button>
            </div>
            <a href="#principio"><i class="fa-solid fa-angle-up" id="flecha_up"></i></a>
    </main>

    <footer class="site-footer" id="site-footer"></footer>
    <script src="./assets/js/footer.js"></script>

</body>

</html>