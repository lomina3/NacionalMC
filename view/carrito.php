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
  <title> Entradas | Nacional Music Club</title>
  <link rel="icon" href="./assets/images/N_simple.png" type="image/png">

  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/header.css">
  <link rel="stylesheet" href="./assets/css/carrito.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <script src="./assets/js/idioma.js"></script>
  <script src="./assets/js/carrito.js"></script>

</head>

<body>

  <header class="site-header" id="site-header">
    <?php include('./assets/templates/header.php'); ?>
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

            <li class="items">
              <div class="infoWrap">
                <div class="seccionCarrito">
                  <img src="./assets/images/NocheVieja_2023.png" class="itemImg" />
                  <h3>Noche Vieja 2023</h3>
                  <p class="itemNumber">#QUE-007544-002</p>
                  <h3></h3>
                  <p class="stockStatus">Disponible</p>
                </div>
                <div class="prodTotal seccionCarrito">
                  <p>15.00€</p>
                </div>
                <div class="seccionCarrito removeWrap">
                  <button class="eliminar" id="eliminar1" type="submit"><i class="fa-solid fa-trash"></i></button>
                </div>
              </div>
            </li>

            <li class="items">
              <div class="infoWrap">
                <div class="seccionCarrito">
                  <img src="./assets/images/NocheVieja_2023.png" class="itemImg" />
                  <h3>Noche Vieja 2023</h3>
                  <p class="itemNumber">#QUE-007544-002</p>
                  <h3></h3>
                  <p class="stockStatus">Disponible</p>
                </div>
                <div class="prodTotal seccionCarrito">
                  <p>15.00€</p>
                </div>
                <div class="seccionCarrito removeWrap">
                  <button class="eliminar" id="eliminar2" type="submit"><i class="fa-solid fa-trash"></i></button>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="subtotal cf">
          <ul>
            <li class="totalRow final"><span class="label">Total</span><span class="value">30.00€</span></li>
            <li class="totalRow"><a href="./pagoExitoso.php" class="btn continuar">Comprar</a></li>
          </ul>
        </div>
      </div>
    </div>
  </main>
</body>

</html>