<?php
// Lee las variables de entorno para conectar a la base de datos
$host = getenv('MYSQL_HOST') ?: 'localhost';
$user = getenv('MYSQL_USER') ?: 'root';
$password = getenv('MYSQL_PASSWORD') ?: '';
$database = getenv('MYSQL_DATABASE') ?: 'nacional';
$port = getenv('MYSQL_PORT') ?: 3306;

$mysqli = new mysqli($host, $user, $password, $database, $port);

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}
?>