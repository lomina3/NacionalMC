<?php

// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// --- Includes absolutos basados en __DIR__ ---
require_once __DIR__ . '/../controller/conexion.php';
require_once __DIR__ . '/../controller/eventos.php';

// Inicialización de variables
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

// Instancia de la clase Evento
$evento = new Evento();

// --- Lógica para admin: modificaciones y registros nuevos ---
if (isset($resultado) && $resultado == '1' && !empty($_POST)) {

    $modExitosa = $evento->validar($_POST);

    if ($modExitosa !== "Modificación exitosa!") {
        echo "<script>
            alert('" . addslashes($modExitosa) . "');
            window.location='" . __DIR__ . "/../view/Aeventosmod.html';
        </script>";
    } else {
        echo "<script>
            alert('" . addslashes($modExitosa) . "');
            window.location='" . __DIR__ . "/../view/admin/Aeventos.html';
        </script>";
        die();
    }

    // Asignar variables desde POST
    $titulo = $_POST['titulo'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $fecha = $_POST['fecha'] ?? '';
    $hora = $_POST['hora'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $foto = $_POST['ImagenEvento'] ?? '';
    $archivo = isset($_POST['archivo']) ? "on" : "off";

} else {
    // Obtener lista de eventos para mostrar
    $lista = $evento->imprimir_eventos();
}

?>
