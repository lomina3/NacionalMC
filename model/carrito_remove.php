<?php
// model/carrito_remove.php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ../view/login.php');
    exit;
}
include_once('../controller/carritoService.php');

if (!empty($_GET['id'])) {
    (new carritoService())->remove($_SESSION['email'], (int) $_GET['id']);
}
header('Location: ../view/carrito.php');
exit;
