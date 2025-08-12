<?php
include_once('../controller/conexion.php');
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION['email']) && isset($_SESSION['contrasena'])) {
  $login = $_SESSION['email'];
}

// Cargar el carrito para la vista (debe definir $actual para el usuario actual)
include('../model/carrito_read.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Carrito | Nacional Music Club</title>
  <link rel="icon" href="./assets/images/favicons/N_simpleBlanca.png" type="image/png">

  <!-- CSS -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/header.css">
  <link rel="stylesheet" href="./assets/css/carrito.css">

  <!-- Iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- JS de idioma (debe ir antes que el header/footer para que exista cambiarIdioma/toggleLanguageSelector) -->
  <script src="./assets/js/idioma.js" defer></script>

  <!-- Tu lógica del carrito -->
  <script src="./assets/js/carrito.js" defer></script>
</head>

<body>
  <!-- Header desde template -->
  <header class="site-header" id="site-header">
    <?php include('./assets/templates/header.php'); ?>
  </header>

  <main class="main">
    <div class="tarjeta">
      <div class="wrap cf">
        <h1 class="tituloTicket">Nacional Music Club</h1>

        <div class="cabecera cf">
          <h1 data-traduccion="carrito">Carrito</h1>
          <a href="./eventos.php" class="continuar">Seguir comprando</a>
          <!-- Si quieres traducir “Seguir comprando”, añade la clave "seguir_comprando" a tus JSON y cambia a:
               <a href="./eventos.php" class="continuar" data-traduccion="seguir_comprando"></a>
          -->
        </div>

        <div class="carrito">
          <ul class="cartWrap">
            <?php
            $total = 0.0;

            if (empty($actual)) {
              echo '<li class="items"><div class="infoWrap"><p>Tu carrito está vacío</p></div></li>';
              // Para traducirlo: crea "carrito_vacio" en los JSON y usa:
              // echo '<li class="items"><div class="infoWrap"><p data-traduccion="carrito_vacio"></p></div></li>';
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
              <span class="label" data-traduccion="total">Total</span>
              <span class="value"><?= number_format($total, 2, ',', '.') . ' €' ?></span>
            </li>
            <li class="totalRow">
              <?php if (isset($_SESSION['email'])): ?>
                <?php if ($total > 0): ?>
                  <a href="metodo_pago.php?usuario=<?= urlencode($_SESSION['email']) ?>" class="btn continuar">
                    Comprar
                  </a>
                  <!-- Si quieres traducir “Comprar”, añade "comprar" en los JSON y cambia a:
                       <a href="metodo_pago.php?usuario=<?= urlencode($_SESSION['email']) ?>" class="btn continuar" data-traduccion="comprar"></a>
                  -->
                <?php else: ?>
                  <button class="btn continuar" disabled>Comprar</button>
                <?php endif; ?>
              <?php else: ?>
                <p>Por favor, iniciar sesión para continuar</p>
                <!-- Para traducir: crea "inicia_sesion_para_continuar" en los JSON y usa data-traduccion -->
              <?php endif; ?>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </main>

  <!-- Footer desde template -->
  <footer class="site-footer" id="site-footer">
    <?php include('./assets/templates/footer.php'); ?>
  </footer>
</body>

</html>