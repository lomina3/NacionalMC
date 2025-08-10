<?php

include("./controller/controlador.php");
include("./controller/legal.php");

$privacidad = "";
$cookies = "";
$diseno = "";
$sitemap = "";
$tc = "";


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $legal = new Legal();

    if($_SESSION['admin']=='1') { //ADMIN PAGINA DE MODIFICACIONES & REGISTROS NUEVOS

        $modExitosa = $legal->validar($_POST);
        
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

    $privacidad = $_POST['privacidad'];
    $cookies = $_POST['cookies'];
    $diseno = $_POST['diseno'];
    $sitemap = $_POST['sitemap'];
    $tc = $_POST['tc'];
}

?>