<?php

class Login
{
    public function validar($datos)
    {
        include_once 'controlador.php';

        $correoElectronico = addslashes(strtolower($datos['email'] ?? ''));
        $hashContrasena = addslashes($datos['password'] ?? '');

        $consulta = "SELECT * FROM usuario WHERE correoElectronico = '$correoElectronico' AND hashContrasena = '$hashContrasena' LIMIT 1";
        $DB = new db();
        $resultado = $DB->leer($consulta);

        if ($resultado !== null) {
            $usuario = $resultado[0];

            // Guardar información del usuario en sesión
            $_SESSION['email'] = $usuario['correoElectronico'];
            $_SESSION['password'] = $usuario['hashContrasena'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['apellidos'] = $usuario['apellidos'];
            $_SESSION['admin'] = $usuario['userAdmin'];

            // Guardar carrito temporal en BD si existe
            if (!empty($datos["tempCarrito"])) {
                $tempCarrito = $datos["tempCarrito"];
                $this->actualizarCarrito($correoElectronico, $tempCarrito);
            }

            return true; // Login válido
        }

        return false; // Usuario o contraseña incorrectos
    }

    public function actualizarCarrito($correoElectronico, $tempCarrito)
    {
        $DB = new db();
        $entradasExistentes = $DB->leer("SELECT * FROM entrada_usuario WHERE Usuario_correoElectronico = '$correoElectronico'");

        if ($entradasExistentes !== null) {
            foreach ($tempCarrito as $entrada => $valor) {
                $resultado = $DB->leer("SELECT * FROM entrada_usuario WHERE Eventos_idEventos='$entrada' AND Usuario_correoElectronico='$correoElectronico'");
                if ($resultado === null) {
                    $DB->escribir("INSERT INTO entrada_usuario (Eventos_idEventos, Usuario_correoElectronico) VALUES ('$entrada', '$correoElectronico')");
                }
            }
        } else {
            foreach ($tempCarrito as $entrada) {
                $DB->escribir("INSERT INTO entrada_usuario (Eventos_idEventos, Usuario_correoElectronico) VALUES ('$entrada', '$correoElectronico')");
            }
        }
    }
}
