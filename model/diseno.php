<?php

include("./controller/controlador.php");
include("./controller/diseno.php");

$logo = "";
$videoIndex = "";
$videoLogin = "";
$conocenos = "";
$logoN = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $diseno = new Diseno();

    if ($_SESSION['admin'] == '1') { //ADMIN PAGINA DE MODIFICACIONES & REGISTROS NUEVOS

        $modExitosa = $diseno->validar($_POST);

        if ($modExitosa != "") {
            echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
            echo $modExitosa;
            echo "</div>";
        } else {
            header('Location: modExitosa.html');
            die;
        }

    }

    $logo = $_POST['logo'];
    $videoIndex = $_POST['videoIndex'];
    $videoLogin = $_POST['videoLogin'];
    $conocenos = $_POST['conocenos'];
    $logoN = $_POST['logoN'];
}

?>