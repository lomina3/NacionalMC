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
  <title> Carrito | Nacional Music Club</title>
  <link rel="icon" href="./assets/images/favicons/N_blanca.png" type="image/png">

  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/header.css">
  <link rel="stylesheet" href="./assets/css/carrito.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <script src="./assets/js/idioma.js" type="application/javascript"></script>
  <script src="./assets/js/carrito.js"></script>

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
            <select id="list" class="language-select" onchange="cambiarIdioma(this.value)">
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
                <li><i class="fa-solid fa-ticket"></i><a data-traduccion="eventos" href="./eventos.php">Eventos</a>
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
    <div class="tarjeta">
      <div class="wrap cf">
        <h1 class="tituloTicket">Nacional Music Club</h1>
        <div class="cabecera cf">
          <h1>Carrito</h1>
          <a href="./eventos.php" class="continuar">Seguir comprando</a>
        </div>
        <div class="carrito">
          <ul class="cartWrap">

            <?php
            include('../model/carrito.php');
            $total = 0;
            if ($actual == NULL) {
              echo 'Tu carrito está vacio';
            } else {
              foreach ($actual as $entrada => $info) {
                $titulo = $info[0];
                $precio = $info[1] . ",00 €";
                $total += $info[1];
                $img = "./assets/images/" . $info[2];
                $fecha = $info[3] . ' ' . $info[4];
                $id = $info[5];
                echo '
                  <li class="items">
                    <div class="infoWrap">
                      <div class="seccionCarrito">
                        <img src="' . $img . '" class="itemImg" />
                        <h3>' . $titulo . '</h3>
                        <p class="itemNumber">' . $fecha . '</p>
                        <h3></h3>
                      </div>
                      <div class="prodTotal seccionCarrito">
                        <p>' . $precio . '</p>
                      </div>
                      <div class="seccionCarrito removeWrap">
                        <a href="../model/eliminar.php?id=' . $id . '">
                          <button class="eliminar" id="eliminar1" type="submit"><i class="fa-solid fa-trash"></i></button>
                        </a>
                      </div>
                    </div>
                  </li>
                ';
              }
            }
            echo '
          </ul>
        </div>
        <div class="subtotal cf">
          <ul>
            <li class="totalRow final"><span class="label">Total</span><span class="value">' . $total . ',00 €</span></li>
            <li class="totalRow">
            ';
            if (isset($_SESSION['email'])) {
              echo '
              <a href="metodo_pago.php?usuario=' . $_SESSION['email'] . '" class="btn continuar">Comprar</a>
              ';
            } else {
              echo '<p> Por favor, inicar sesión para continuar</p>';
            }
            ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </main>
</body>

</html>