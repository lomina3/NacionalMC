<?php

include("./controller/controlador.php");
include("./controller/fiestas.php");

$espacio = "";
$servicios = "";
$reservas = "";
$foto1 = "";
$foto2 = "";
$foto3 = "";


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $fiesta = new Fiesta();

    if($_SESSION['admin']=='1') { //ADMIN PAGINA DE MODIFICACIONES & REGISTROS NUEVOS

        $modExitosa = $fiesta->validar($_POST);
        
        if($modExitosa !="")
        {
            echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
            echo $modExitosa;
            echo "</div>";
        }else
        {
            header('Location: modExitosa.html');
            die;
        }

    }

    $espacio = $_POST['espacio'];
    $servicios = $_POST['servicios'];
    $reservas = $_POST['reservas'];
    $foto1 = $_POST['foto1'];
    $foto2 = $_POST['foto2'];
    $foto3 = $_POST['foto3'];
}

?>