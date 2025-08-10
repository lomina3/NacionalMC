<?php
include_once('../controller/conexion.php');
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
    <title>Éxito! | Nacional Music Club</title>
    <link rel="icon" href="./assets/images/N_simple.png" type="image/png">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/pagoExitoso.css">

</head>

<body>

    <div class="paypal">

        <div class="paypal__header">
            <div class="paypal__logo-wrapper">
                <img src="./assets/images/N_simplenegra.png" alt="Nacional Music Club" class="paypal__logo">
            </div>

            <div class="paypal__header-info">
                <span class="paypal__date">25.12.2023</span> <!-- (fecha es una varible bbdd) -->
                <span class="paypal__ref">0f-113</span> <!-- (id es una varible bbdd) -->
            </div>
        </div>

        <div class="paypal__subheader-wrapper">
            <div class="paypal__subheader">
                <h1 class="paypal__username">Hola, Nacho</h1> <!-- (nombre es una varible bbdd) -->
                <span class="paypal__help-text">Has comprado 3 cosas:</span> <!-- (el numero es otra variable) -->
            </div>
        </div>

        <div class="paypal__cart">
            <h2 class="paypal__cart-title">Carrito:</h2>

            <ul class="paypal__cart-list">
                <li class="paypal__cart-item">
                    <span class="paypal__index">4</span> <!-- cantidad -->
                    <span class="paypal__item-name">Entrada año nuevo</span> <!-- nombre_item(variable) -->
                    <span class="paypal__item-price">80.00€</span> <!-- precio total, nºitems*precio_item(variable) -->
                </li>

                <!-- ejemplos -->

                <li class="paypal__cart-item">
                    <span class="paypal__index">1</span>
                    <span class="paypal__item-name">Botella + Cachimba</span>
                    <span class="paypal__item-price">25.00€</span>
                </li>

                <li class="paypal__cart-item">
                    <span class="paypal__index">1</span>
                    <span class="paypal__item-name">Mesa VIP</span>
                    <span class="paypal__item-price">95.00€</span>
                </li>

                <!-- fin ejemplos -->

                <li class="paypal__cart-item">
                    <span class="paypal__cart-total">Total</span>
                    <span class="paypal__item-price">200.00€</span> <!-- variable dinero + €(variable) -->
                </li>
            </ul>
        </div>

        <div class="paypal__footer">
            <p class="ticket_footer" id="confirmacion">Revisa tu correo electrónico para
                recibir la confirmación de compra.
            </p>

            <p class="ticket_footer" id="confirmacion">Si quieres seguir comprando pulsa
                <a href="./index.php">aquí.</a>
            </p>

            <h2 class="paypal__cart-title">¡Gracias por elegirnos!</h2>
        </div>
    </div>

</body>

</html>