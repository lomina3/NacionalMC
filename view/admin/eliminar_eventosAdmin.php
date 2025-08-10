<?php
include_once('../controller/Conexion.php');
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $login = $_SESSION['email'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eventos | Nacional Music Club</title>
    <link rel="icon" href="./assets/images/favicons/favicon.ico" type="image/png">
    <link rel="apple-touch-icon" sizes="152x152" href="./assets/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="./assets/images/favicons/apple-touch-icon.png/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="./assets/images/favicons/apple-touch-icon.pngfavicon-16x16.png">
    <link rel="manifest" href="./assets/images/favicons/apple-touch-icon.png/site.webmanifest">
    <link rel="mask-icon" href="./assets/images/favicons/apple-touch-icon.png/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/exito.css">
    <link rel="stylesheet" href="./assets/css/event.css">

    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>
    <script src="./assets/js/idioma.js" type="application/javascript"></script>
</head>

<body>

    <header>
        <a href="../" class="logo"><img src="assets/images/logoBlanco.png" width="24%" alt="Nacional Music Club"></a>

        <nav class="navigation">
            <ul class="show">
                <?php
                if (!isset($_SESSION['email'])) {

                    echo '<li><a href="login.php"><i class="fa-solid fa-user"></i></a></li>';
                }
                ?>
                <li><i id="menuToggle">
                        <input type="checkbox" />
                        <span></span>
                        <span></span>
                        <span></span>
                        <ul id="menu">
                            <div class="elements">
                                <?php
                                if (isset($_SESSION['email'])) {

                                    // Verifica si es admin
                                    $resultado = $_SESSION['admin'];
                                    if ($resultado == 1) {
                                        // El admin ha iniciado sesión, mostrar el enlace para acceder al panel
                                        echo '<li><i class="fa-solid fa-user-tie"></i><a id="logoutButton" data-traduccion="cerrar_sesion" href="Apanel.php" style="font-size: medium;">Panel de administración</a></li>';
                                        echo "<hr>";
                                    }
                                }
                                ?>
                                <li><i class="fa-solid fa-ticket"></i><a data-traduccion="eventos"
                                        href="eventos.php">Eventos</a>
                                </li>
                                <li><i class="fa-solid fa-champagne-glasses"></i><a data-traduccion="fiestas_privadas"
                                        href="fiestas_privadas.php">Fiestas
                                        Privadas</a></li>
                                <li><i class="fa-solid fa-phone"></i><a data-traduccion="contactanos"
                                        href="contacto.php">Contáctanos</a></li>
                                <?php
                                if (!isset($_SESSION['email'])) {
                                    echo "<hr>";
                                    // El usuario no tiene iniciada sesion, monstrar boton de iniciar sesion.
                                    echo '<li><i class="fa-solid fa-right-to-bracket"></i><a id="logoutButton" data-traduccion="cerrar_sesion" href="login.php">Iniciar sesión</a></li>';
                                }
                                ?>


                                <?php
                                if (isset($_SESSION['email'])) {
                                    echo "<hr>";
                                    // El usuario ha iniciado sesión, mostrar el enlace para cerrar sesión y carrito
                                    echo '<li><i class="fa-solid fa-cart-shopping"></i><a data-traduccion="carrito" href="carrito.php">Carrito</a> </li>';
                                    echo '<li><i class="fa-solid fa-right-from-bracket"></i><a id="logoutButton" data-traduccion="cerrar_sesion" href="../model/logout.php" onclick="cerrarSesion()">Cerrar sesión</a></li>';
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
        if (isset($_SESSION['email'])) {

            // Verifica si no eses admin
            $resultado = $_SESSION['admin'];
            if ($resultado == 1) {

                ?>

                <?php
                include('../model/Aeventoseliminar.php');
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
                                echo "<a href='./Aeventoseliminar.php?idEvento=" . $event['idEventos'] . "&img=" . $img . "&titulo=" . $event['titulo'] . "&dia=" . $dia . "&mes=" . $mes . "&hora=" . $hora . "&desc=" . $event['descripcion'] . "&precio=" . $event['precio'] . "&pasado=" . $pasado . "'
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
                            echo "<a href='../model/Aeventoseliminar.php?idEvento=" . $event['idEventos'] . "&img=" . $img . "&titulo=" . $event['titulo'] . "&dia=" . $dia . "&mes=" . $mes . "&hora=" . $hora . "&desc=" . $event['descripcion'] . "&precio=" . $event['precio'] . "&pasado=" . $pasado . "'
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



                        $resultado = "";
                        // Verifica que hay una sesión activa
                        if (isset($_SESSION['email']) && isset($_SESSION['password'])) {


                            $resultado = $_SESSION['admin'];

                        }

                        echo "</div></div>";
                    }

                }
                ?>

                <?php
            } else {
                echo '
                    <div class="checkout-rojo">
                    <h1 data-traduccion="mensaje_exitoso_2">No tienes permisos para acceder a este sitio.</h1>
                      <br>
                      <br>
                      <br>
                      <br>
                    <a href="../" data-traduccion="wip_back">Volver a la pagina principal</a>
                    </div>
                    ';
            }
        } else {
            echo '
                <div class="checkout-rojo">
				<h1 data-traduccion="mensaje_exitoso_2">No tienes permisos para acceder a este sitio.</h1>
          		<br>
          		<br>
          		<br>
          		<br>
                <a href="../" data-traduccion="wip_back">Volver a la pagina principal</a>
                </div>
                ';
        }
        ?>
    </main>

</body>

</html>