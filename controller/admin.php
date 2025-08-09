<?php
include('Conexion.php');

function comprobacionAdmin($login, $contrasena) {
    global $mysqli;

    $admin = "SELECT userAdmin FROM usuario WHERE correoElectronico='$login' AND hashContrasena='$contrasena'";
    $resultado = $mysqli->query($admin);

    if (!$resultado) {
        // Manejo de error en la consulta
        echo "Error en la consulta: " . $mysqli->error;
        return null;
    }

    return $resultado->fetch_assoc()['userAdmin'];
}
?>
