<?php
// model/carrito_read.php
if (session_status() === PHP_SESSION_NONE)
    session_start();
include_once('../controller/carritoService.php');

$actual = null;
if (isset($_SESSION['email'])) {
    $svc = new carritoService();
    $actual = $svc->obtenerActual($_SESSION['email']);
}
