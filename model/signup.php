<?php

include("./controller/controlador.php");
include("./controller/signup.php");


$correoElectronico = "";
$nombre = "";
$apellidos = "";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $signup = new Signup();
    $validado = $signup->validar($_POST);

    if($validado !="")
    {
        echo "<div style='text-align:center;font-size:12px;color:white; background-color:gey;'>";
        echo $validado;
        echo "</div>";
    }else
    {
        header("Location: login.html");
        die;
    }

    $correoElectronico = $_POST['email'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
}

?>