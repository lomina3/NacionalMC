<?php
include_once('../controller/conexion.php');
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['contrasena'])) {
  $login = $_SESSION['email'];
}

// Cargar el carrito para la vista
include('../model/carrito_read.php'); // define $actual según tu usuario
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
    <a href="./index.php" class="logo"><img src="./assets/images/logos/logoBlanco.png" width="24%"
        alt="Nacional Music Club"></a>

    <nav class="navigation">
      <ul class="show">
        <?php if (!isset($_SESSION['email'])): ?>
          <li><a href="./login.php"><i class="fa-solid fa-user"></i></a></li>
        <?php endif; ?>
        <li>
          <div id="language-selector" class="hidden">
            <select id="list" class="language-select" onchange="cambiarIdioma(this.value)">
              <option id="es" class="seleccionado" value="es" selected="selected"> 🇪🇸 ES</option>
              <option id="en" class="" value="en"> 🇺🇸 US</option>
              <option id="it" class="" value="it"> 🇮🇹 IT</option>
            </select>
          </div>
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
                <li><i class="fa-solid fa-ticket"></i><a data-traduccion="eventos" href="./eventos.php">Eventos</a></li>
                <li><i class="fa-solid fa-champagne-glasses"></i><a data-traduccion="fiestas_privadas"
                    href="./fiestas_privadas.php">Fiestas Privadas</a></li>
                <li><i class="fa-solid fa-cart-shopping"></i><a data-traduccion="carrito"
                    href="./carrito.php">Carrito</a></li>
                <li><i class="fa-solid fa-phone"></i><a data-traduccion="contactanos"
                    href="./contacto.php">Contáctanos</a></li>

                <?php if (isset($_SESSION['email'])): ?>
                  <li><i class="fa-solid fa-right-from-bracket"></i><a id="logoutButton" data-traduccion="cerrar_sesion"
                      href="../model/logout.php" onclick="cerrarSesion()">Cerrar Sesión</a></li>
                <?php endif; ?>
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
            $total = 0.0;

            if (empty($actual)) {
              echo '<li class="items"><div class="infoWrap"><p>Tu carrito está vacío</p></div></li>';
            } else {
              foreach ($actual as $info) {
                $titulo = htmlspecialchars($info[0]);
                $precioN = (float) $info[1]; // total línea numérico
                $precio = number_format($precioN, 2, ',', '.') . ' €';
                $total += $precioN;
                $imgPath = './assets/images/' . htmlspecialchars($info[2]);
                $fecha = htmlspecialchars($info[3] . ' ' . $info[4]);
                $id = (int) $info[5];

                echo '
                  <li class="items">
                    <div class="infoWrap">
                      <div class="seccionCarrito">
                        <img src="' . $imgPath . '" class="itemImg" alt="' . $titulo . '"/>
                        <h3>' . $titulo . '</h3>
                        <p class="itemNumber">' . $fecha . '</p>
                      </div>
                      <div class="prodTotal seccionCarrito">
                        <p>' . $precio . '</p>
                      </div>
                      <div class="seccionCarrito removeWrap">
                        <a href="../model/carrito_remove.php?id=' . $id . '" class="btn-eliminar" data-id="' . $id . '">
                          <button class="eliminar" type="button"><i class="fa-solid fa-trash"></i></button>
                        </a>
                      </div>
                    </div>
                  </li>
                ';
              }
            }
            ?>
          </ul>
        </div>

        <div class="subtotal cf">
          <ul>
            <li class="totalRow final">
              <span class="label">Total</span>
              <span class="value"><?= number_format($total, 2, ',', '.') . ' €' ?></span>
            </li>
            <li class="totalRow">
              <?php if (isset($_SESSION['email'])): ?>
                <?php if ($total > 0): ?>
                  <a href="metodo_pago.php?usuario=<?= urlencode($_SESSION['email']) ?>" class="btn continuar">Comprar</a>
                <?php else: ?>
                  <button class="btn continuar" disabled>Comprar</button>
                <?php endif; ?>
              <?php else: ?>
                <p>Por favor, iniciar sesión para continuar</p>
              <?php endif; ?>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </main>

  <script src="./assets/js/carrito.js"></script>
</body>

</html>