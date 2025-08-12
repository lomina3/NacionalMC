<?php
// model/eventos.php

include_once(__DIR__ . '/../controller/conexion.php');
if (!isset($_SESSION)) {
    session_start();
}
include_once(__DIR__ . '/../controller/eventos.php');

$evento = new Evento();
$lista = [];

// $resultado lo define la vista antes de incluir este modelo.
// Aseguramos valor por defecto si no existe.
if (!isset($resultado)) {
    $resultado = 0;
}

if ($resultado == 1 && !empty($_POST)) {
    // ADMIN: crear/modificar evento
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
} else {
    // Carga para vista pública
    $lista = $evento->imprimir_eventos();
}
