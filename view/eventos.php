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
    <title>Eventos | Nacional Music Club</title>
    <link rel="icon" href="./assets/images/N_simple.png" type="image/png">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/event.css">
    <link rel="stylesheet" href="./assets/css/contacto.css">

    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>
    <script src="./assets/js/idioma.js" type="application/javascript"></script>
</head>

<body>

    <header>
        <a href="./index.php" class="logo"><img src="./assets/images/logoBlanco.png" width="24%"
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
                            <option id="en" class="" value="en"> 🇺🇸 US</option>
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


    <main class="main">
        <?php
        $resultado = "";
        // Verifica que hay una sesión activa
        if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
            include('../controller/admin.php');
            $resultado = comprobacionAdmin($_SESSION['email'], $_SESSION['password']);
        }
        if ($resultado == 1) {
            ?>
            <form action="../admin/añadir_eventosAdmin.php" accept-charset="UTF-8" method="post" autocomplete="on">
                <div class="button-box">
                    <button type="submit"
                        class="relative inline-flex px-5 py-3 overflow-hidden font-bold rounded-full group all-bg">
                        <span
                            class="w-32 h-32 rotate-45 translate-x-12 -translate-y-2 absolute left-0 top-0 bg-black opacity-[3%]"></span>
                        <span
                            class="absolute top-0 left-0 w-48 h-48 -mt-1 transition-all duration-500 ease-in-out rotate-45 -translate-x-56 -translate-y-24 bg-black opacity-100 group-hover:-translate-x-8"></span>
                        <span
                            class="relative w-full text-left text-blbg-black transition-colors duration-200 ease-in-out group-hover:text-gray-200"
                            data-traduccion="anadir_evento">Añadir
                            Evento</span>
                        <span class="absolute inset-0 border-2 border-blbg-black rounded-full"></span>
                    </button>
                </div>
            </form>
            <?php
        }
        ?>
        <?php
        include('../model/eventos.php');
        $titulo = '';
        foreach ($lista as $tiempo => $tipo) {
            print_r('<h3>' . $tiempo . '</h3>');

            $subcat = key($tipo);
            if (!is_numeric($subcat)) {
                foreach ($tipo as $tema => $eventos) {
                    echo '<h4>' . $tema . '<h4>';
                    echo '<div class="events-container">
                    <div class="upcoming-events">';

                    foreach ($eventos as $evento => $event) {

                        $dia = date('d', strtotime($event['fecha']));
                        $mes = date('M', strtotime($event['fecha']));
                        $hora = date('H', strtotime($event['fecha']));
                        $img = "./assets/images/" . $event['foto'];
                        $pasado = true;
                        echo "<a href='./entradas.php?idEvento=" . $event['idEventos'] . "&img=" . $img . "&titulo=" . $event['titulo'] . "&dia=" . $dia . "&mes=" . $mes . "&hora=" . $hora . "&desc=" . $event['descripcion'] . "&precio=" . $event['precio'] . "&pasado=" . $pasado . "'
                            class='card-link' data-event='" . $event['idEventos'] . "'>
                            <div class='card' style='background-image:url($img); background-size:cover;'>
                                <div class='card__header'><img src='./assets/images/N_simple.png' alt='Nacional' class='card__logo'></div>
                                <div class='card__body'>
                                    <div class='card__date'>
                                        <span class='card__day'>" . $dia . "</span>
                                        <span class='card__month'>" . $mes . "</span>
                                    </div>
                                    <div class='card__event'>
                                        <span class='card__name'>" . $event['titulo'] . "</span>
                                    </div>
                                </div>
                            </div>
                        </a>";
                    }
                    echo "</div></div>";
                }
            } else {
                echo '<div class="events-container">
                <div class="upcoming-events">';

                foreach (array_reverse($tipo) as $event) {

                    $dia = date('d', strtotime($event['fecha']));
                    $mes = date('M', strtotime($event['fecha']));
                    $hora = date('H', strtotime($event['fecha']));
                    $img = "./assets/images/" . $event['foto'];
                    $pasado = false;
                    echo "<a href='./entradas.php?idEvento=" . $event['idEventos'] . "&img=" . $img . "&titulo=" . $event['titulo'] . "&dia=" . $dia . "&mes=" . $mes . "&hora=" . $hora . "&desc=" . $event['descripcion'] . "&precio=" . $event['precio'] . "&pasado=" . $pasado . "'
                        class='card-link' data-event='" . $event['idEventos'] . "'>
                            <div class='card' style='background-image:url($img); background-size:cover;'>
                                <div class='card__header'><img src='./assets/images/N_simple.png' alt='Nacional' class='card__logo'></div>
                                <div class='card__body'>
                                    <div class='card__date'>
                                        <span class='card__day'>" . $dia . "</span>
                                        <span class='card__month'>" . $mes . "</span>
                                        <span class='card__month'>" . $hora . " H</span>
                                    </div>
                                    
                                    <div class='card__event'>
                                        <span class='card__name'>" . $event['titulo'] . "</span>
                                    </div>
                                </div>
                            </div>
                        </a>";
                }
                echo "</div></div>";
            }

        }
        ?>
    </main>

    <footer class="site-footer">
        <script src="./assets/js/template_footer.js"></script>
    </footer>

</body>

</html>