<?php

include_once('datosConexion.php');

$mysqli = mysqli_connect($host, $user, $password, $database, $port);

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "<br/>";
}

?>