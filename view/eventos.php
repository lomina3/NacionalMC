<?php
// view/eventos.php
include_once('../controller/conexion.php');
if (!isset($_SESSION)) {
    session_start();
}

// Intenta usar password o contrasena, según qué hayas guardado en la sesión
$sessionEmail = isset($_SESSION['email']) ? $_SESSION['email'] : null;
$sessionPassword = $_SESSION['password'] ?? $_SESSION['contrasena'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eventos | Nacional Music Club</title>
    <link rel="icon" href="./assets/images/favicons/N_simpleBlanca.png" type="image/png">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/event.css">
    <link rel="stylesheet" href="./assets/css/contacto.css">

    <script src="./assets/js/idioma.js" type="application/javascript"></script>
    
    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>
</head>

<body>

    <header class="site-header" id="site-header">
        <?php include('./assets/templates/header.php'); ?>
    </header>

    <main class="main">
        <?php
        $resultado = 0;
        // Si hay sesión intentamos comprobar si es admin
        if (!empty($sessionEmail) && !empty($sessionPassword)) {
            include('../controller/admin.php');
            // Esta función es tuya; devuelve 1 si es admin
            $resultado = comprobacionAdmin($sessionEmail, $sessionPassword);
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
                            data-traduccion="anadir_evento">Añadir Evento</span>
                        <span class="absolute inset-0 border-2 border-blbg-black rounded-full"></span>
                    </button>
                </div>
            </form>
            <?php
        }

        // Cargamos la lista de eventos desde el modelo
        include('../model/eventos.php');

        if (empty($lista)) {
            echo '<p style="text-align:center;margin:2rem 0;">No hay eventos disponibles por ahora.</p>';
        } else {
            foreach ($lista as $tiempo => $tipo) {
                echo '<h3>' . htmlspecialchars($tiempo) . '</h3>';

                // Si $tipo es un array de subcategorías (pasados), la primera clave no será numérica
                $subcat = key($tipo);

                if (!is_numeric($subcat)) {
                    // Eventos Pasados: por temática
                    foreach ($tipo as $tema => $eventos) {
                        echo '<h4>' . htmlspecialchars($tema) . '</h4>';
                        echo '<div class="events-container"><div class="upcoming-events">';

                        foreach ($eventos as $event) {
                            $dia = date('d', strtotime($event['fecha']));
                            $mes = date('M', strtotime($event['fecha']));
                            $hora = date('H', strtotime($event['fecha']));
                            $img = "./assets/images/" . $event['foto'];
                            $pasado = true;

                            // Parámetros en URL
                            $link = './entradas.php'
                                . '?idEvento=' . urlencode($event['idEventos'])
                                . '&img=' . urlencode($img)
                                . '&titulo=' . urlencode($event['titulo'])
                                . '&dia=' . urlencode($dia)
                                . '&mes=' . urlencode($mes)
                                . '&hora=' . urlencode($hora)
                                . '&desc=' . urlencode($event['descripcion'])
                                . '&precio=' . urlencode($event['precio'])
                                . '&pasado=' . urlencode($pasado);

                            echo "<a href='{$link}' class='card-link' data-event='" . htmlspecialchars($event['idEventos']) . "'>
                                <div class='card' style='background-image:url(" . htmlspecialchars($img) . "); background-size:cover;'>
                                    <div class='card__header'><img src='./assets/images/N_simple.png' alt='Nacional' class='card__logo'></div>
                                    <div class='card__body'>
                                        <div class='card__date'>
                                            <span class='card__day'>" . htmlspecialchars($dia) . "</span>
                                            <span class='card__month'>" . htmlspecialchars($mes) . "</span>
                                        </div>
                                        <div class='card__event'>
                                            <span class='card__name'>" . htmlspecialchars($event['titulo']) . "</span>
                                        </div>
                                    </div>
                                </div>
                              </a>";
                        }
                        echo "</div></div>";
                    }

                } else {
                    // Próximos Eventos: array plano
                    echo '<div class="events-container"><div class="upcoming-events">';

                    // Si quieres orden ascendente por fecha futura, usa array_reverse dependiendo del ORDER BY
                    foreach ($tipo as $event) {
                        $dia = date('d', strtotime($event['fecha']));
                        $mes = date('M', strtotime($event['fecha']));
                        $hora = date('H', strtotime($event['fecha']));
                        $img = "./assets/images/" . $event['foto'];
                        $pasado = false;

                        $link = './entradas.php'
                            . '?idEvento=' . urlencode($event['idEventos'])
                            . '&img=' . urlencode($img)
                            . '&titulo=' . urlencode($event['titulo'])
                            . '&dia=' . urlencode($dia)
                            . '&mes=' . urlencode($mes)
                            . '&hora=' . urlencode($hora)
                            . '&desc=' . urlencode($event['descripcion'])
                            . '&precio=' . urlencode($event['precio'])
                            . '&pasado=' . urlencode($pasado);

                        echo "<a href='{$link}' class='card-link' data-event='" . htmlspecialchars($event['idEventos']) . "'>
                            <div class='card' style='background-image:url(" . htmlspecialchars($img) . "); background-size:cover;'>
                                <div class='card__header'><img src='./assets/images/N_simple.png' alt='Nacional' class='card__logo'></div>
                                <div class='card__body'>
                                    <div class='card__date'>
                                        <span class='card__day'>" . htmlspecialchars($dia) . "</span>
                                        <span class='card__month'>" . htmlspecialchars($mes) . "</span>
                                        <span class='card__month'>" . htmlspecialchars($hora) . " H</span>
                                    </div>
                                    <div class='card__event'>
                                        <span class='card__name'>" . htmlspecialchars($event['titulo']) . "</span>
                                    </div>
                                </div>
                            </div>
                          </a>";
                    }
                    echo "</div></div>";
                }
            }
        }
        ?>
    </main>

    <footer class="site-footer" id="site-footer">
        <?php include('./assets/templates/footer.php'); ?>
    </footer>

</body>

</html>