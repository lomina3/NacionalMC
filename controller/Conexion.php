<?php

include_once('DatosConexion.php');

$mysqli = mysqli_connect($host, $user, $password, $database, port: 3306);

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "<br/>";
}

?>