<?php
class Signup
{
    private $error = "";

    public function existe($datos){

        include_once ('controlador.php');

        $correoElectronico = addslashes(strtolower($_POST['email']));
        $hashContrasena = addslashes($_POST['password']);

        $consulta = "SELECT * FROM usuario WHERE correoElectronico='$correoElectronico' AND hashContrasena='$hashContrasena'";
        $DB = new db();
        $resultado = $DB->leer($consulta);

        return $resultado <> NULL ? true : false;
    }

    public function validar($datos){

        foreach ($_POST as $campo => $valor) {
            if(empty($valor)){
                $this->error.= "<br>".$campo." está vacio!  ";
            }
        }
    
        $this->error.= !preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $_POST['email']) ? "Correo electrónico invalido.  " : "";
        $this->error.= is_numeric($_POST['nombre']) || is_numeric($_POST['apellidos']) ? "Nombre no puede ser numerico.  " : "";
        $this->error.= strstr($_POST['password'], " ") ? "La contraseña no puede contener espacios en blanco.  " : "";
        $this->error.= strlen($_POST['password'])< 8 ? "La contraseña debe contener mínimo 8 caracteres.  " : "";
        $this->error.= $_POST['password'] != $_POST['password2'] ? "Las contraseñas deben coincidir.  " : "";
        $this->error.= !preg_match('@[a-z]@', $_POST['password']) ? "La contraseña debe contener una letra en minúscula.  " : "";
        $this->error.= !preg_match('@[A-Z]@', $_POST['password']) ? "La contraseña debe contener una letra en mayúscula.  " : "";
        $this->error.= !preg_match('@[0-9]@', $_POST['password']) ? "La contraseña debe contener un número.  " : "";

        $cumple = new DateTime($_POST['fechaNacimiento']);
        $hoy = new DateTime();
        $edad = $hoy->diff($cumple)->format('%y');
        $this->error.= $edad < 18 ? "Lo sentimos, debes ser mayor de 18 años para registrarte  " : "";

        if($this->error == ""){
            //no error
            $this->error = $this->crear_usuario($datos);
        }
        return $this->error;
    }

    public function crear_usuario($datos)
    {
        include_once('controlador.php');
        $correoElectronico = addslashes(strtolower($datos['email']));
        $nombre = addslashes(ucfirst($datos['nombre']));
        $apellidos = addslashes(ucfirst($datos['apellidos']));
        $hashContrasena = addslashes($datos['password']);

        $consulta = "INSERT INTO usuario (correoElectronico, nombre, apellidos, hashContrasena, userAdmin)
                    values ('$correoElectronico', '$nombre', '$apellidos', '$hashContrasena', 0)";
        $DB = new db();
        if($DB->escribir($consulta) <> true){
            return "Error al registrar el usuario.";
        }
        return "Registro exitoso!";
    }
}
