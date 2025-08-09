<?php

session_start();

//var_dump($_POST);
//echo "<br>";

include("../controller/controlador.php");
include("../controller/login.php");

if ($_SESSION["carrito"]<>NULL) {
    $_POST['tempCarrito'] = $_SESSION["carrito"];
}

$correoElectronico = "";
$login = new Login();
$_SESSION['loggedin'] = false;
$validado = $login->validar($_POST);


if ($validado == false) {
    $correoElectronico = $_POST['email'];
    echo ("<script>
        alert('No existe esta combinación de usuario y contraseña');      
        window.location='../view/login.php';
        </script>");

} else if ($_SESSION['admin'] == 1) {
    $_SESSION['loggedin'] = true;
    unset($_SESSION['carrito']);
    //var_dump($_SESSION);
    header("Location: ../view/index.php");
    die;
} else if ($_SESSION['admin'] == 0) {
    $_SESSION['loggedin'] = true;
    unset($_SESSION['carrito']);
    //var_dump($_SESSION);
    header("Location: ../view/index.php");
    die;
} else {
    echo ("<script>
        alert('Ups! Algo ha ido mal, prueba de nuevo');      
        window.location='../view/login.php';
        </script>");
}

?>