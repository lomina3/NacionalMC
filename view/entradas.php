<?php
include_once('../controller/conexion.php');
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['email']) && isset($_SESSION['contrasena'])) {
    $login = $_SESSION['email'];
}

$id = $_GET['idEvento'];
$img = $_GET['img'];
$titulo = $_GET['titulo'];
$dia = $_GET['dia'];
$mes = $_GET['mes'];
$hora = $_GET['hora'];
$desc = $_GET['desc'];
$precio = $_GET['precio'];
$pasado = $_GET['pasado'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrada | Nacional Music Club</title>
    <link rel="icon" href="./assets/images/N_simple.png" type="image/png">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/entradas.css">

    <script src="./assets/js/idioma.js" type="application/javascript"></script>

    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>
</head>

<body>

    <header class="site-header" id="site-header">
        <?php include('./assets/templates/header.php'); ?>
    </header>

    <div class="main-content">

        <section class="event-details">

            <div class="event-image">
                <img id="event-image" src="<?php echo $img ?>" alt="Imagen del evento">
            </div>

            <div class="event-info">
                <h1>
                    <?php echo $titulo ?>
                </h1>
                <p class="event-date">
                    <?php echo $dia . ' ' . $mes . '<br>' . $hora . 'h' ?>
                </p>
                <p class="event-description">
                    <?php echo $desc ?>
                </p>
                <table class="ticket-info-table">
                    <tr id="ticket-price">
                        <td>Precio:</td>
                        <td>
                            <?php
                            $price = ($precio == 0) ? 'GRATIS' : $precio . '€';
                            echo $price
                                ?>
                        </td>
                    </tr>

                </table>

                <div class="last-column">

                    <div class="popup-container">
                        <i class="fa-solid fa-circle-info" onmouseover="showPopup()" onmouseout="hidePopup()"></i>
                        <div class="popup" id="infoPopup">
                            <p>Política de Nacional Music Club:</p>
                            <ul>
                                <li><strong>Reventa de Entradas:</strong> Queda estrictamente prohibida la reventa de
                                    entradas para nuestros eventos. Las entradas son intransferibles y solo se pueden
                                    adquirir a través de canales autorizados.</li>
                                <li><strong>Derecho de Admisión:</strong> El club se reserva el derecho de admisión. Nos
                                    reservamos el derecho de negar la entrada a cualquier persona que no cumpla con
                                    nuestras normas y políticas internas, sin necesidad de proporcionar explicaciones.
                                </li>
                                <li><strong>Edad Mínima:</strong> El acceso al club está restringido a personas mayores
                                    de edad. La entrada está prohibida a menores de 18 años, independientemente de la
                                    ocasión o evento.</li>
                                <li><strong>Conducta Pasada:</strong> Aquellas personas que hayan generado problemas en
                                    el pasado dentro de nuestras instalaciones podrían estar sujetas a restricciones de
                                    entrada. Nos esforzamos por mantener un ambiente seguro y agradable para todos
                                    nuestros clientes.</li>
                            </ul>

                        </div>

                        <?php
                        if ($pasado == false) {
                            echo '
                                <a href="../model/compras.php?idEvento=' . $id . '">
                                    <button class="cart-button">
                                        <span class="add-to-cart">Añadir al carrito</span>
                                        <span class="added">Añadido</span>
                                        <i class="fas fa-shopping-cart"></i>
                                        <i class="fas fa-wine-bottle"></i>
                                    </button>
                                </a>
                            ';
                        }
                        ?>
                    </div>

                </div>

            </div>

        </section>

    </div>

    <script src="./assets/js/entradas.js"></script>

</body>

</html>