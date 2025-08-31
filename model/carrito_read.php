<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Incluye carritoService usando __DIR__
require_once(__DIR__ . '/../controller/carrito_service.php');

$actual = null;
if (isset($_SESSION['email'])) {
    $svc = new carritoService();
    $actual = $svc->obtenerActual($_SESSION['email']);
}
