<?php

include_once ('controlador.php');
include("./controller/contacto.php");

$mensaje = "";
$nombre = "";
$apellidos = "";
$telefono = "";
$correo = "";


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $contacto = new Contacto();

    if($_SESSION['admin']=='1') { //ADMIN PAGINA DE MODIFICACIONES

        $modExitosa = $contacto->validar($_POST);

        if($modExitosa !="")
        {
            echo "<div style='text-align:center;font-size:12px;color:white; background-color:gey;'>";
            echo $modExitosa;
            echo "</div>";
        }else
        {
            header('Location: modExitosa.html');
            die;
        }

    }else{ //FORMULARIO CONTACTO

        $mensajeEnviado = $contacto->contactar($_POST);

        if($mensajeEnviado !="")
        {
            echo "<div style='text-align:center;font-size:12px;color:white; background-color:gey;'>";
            echo $mensajeEnviado;
            echo "</div>";
        }else
        {
            header('Location: mensajeExitoso.html');
            die;
        }
    }

    $mensaje = $_POST['mensaje'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['email'];
}

?>
