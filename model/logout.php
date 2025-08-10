<?php

session_start();

$loggedout = session_destroy();


if($loggedout){
    echo ("<script>
        alert('Sesión cerrada con éxito');
        window.location='../view/index.php';
        </script>");
}
