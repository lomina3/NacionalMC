<?php

include_once('../controller/conexion.php');

if (!isset($_SESSION)) {
    session_start();
}
include("../controller/eventos.php");

$idEventos = "";
$titulo = "";
$descripcion = "";
$fecha = "";
$hora = "";
$precio = "";
$foto = "";
$tipo = "";
$archivo = "";
$lista = array();
$evento = new Evento();


if ($resultado == '1' && $_POST <> NULL) { //ADMIN PAGINA DE MODIFICACIONES & REGISTROS NUEVOS

    $modExitosa = $evento->validar($_POST);

    if ($modExitosa != "Modificación exitosa!") {
        echo ("<script>
        alert('" . $modExitosa . "');
        window.location='../view/Aeventosmod.html';
        </script>");
    } else {
        echo ("<script>
        alert('" . $modExitosa . "');
        window.location='../view/admin/Aeventos.html';
        </script>");
        die();
    }

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $precio = $_POST['precio'];
    $tipo = $_POST['tipo'];
    $foto = $_POST['ImagenEvento'];
    $archivo = isset($_POST['archivo']) ? "on" : "off";

} else {

    $lista = $evento->imprimir_eventos();




    //descripcion
    //$hora = "";
    //$precio = "";
}


?>