<?php
// model/carrito_read.php
if (session_status() === PHP_SESSION_NONE)
    session_start();
include_once('../controller/CarritoService.php');

$actual = null;
if (isset($_SESSION['email'])) {
    $svc = new CarritoService();
    $actual = $svc->obtenerActual($_SESSION['email']);
}
