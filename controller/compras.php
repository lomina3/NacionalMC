<?php

class Compra
{
    public function anadir($id, $usuario)
    {
        include("../controller/controlador.php");

        $consulta = "SELECT * FROM entrada_usuario WHERE Eventos_idEventos='$id' AND Usuario_correoElectronico='$usuario'";
        $DB = new db();
        $resultado = $DB->leer($consulta);

        if($resultado<>NULL){
            $carrito = $resultado[0];
            $cantidad = $carrito['cantidad'];
            if($cantidad <10){
                $cantidad++;
                $consulta = "UPDATE entrada_usuario";
                $consulta.= " SET cantidad = '$cantidad'";
                $consulta.= " WHERE Eventos_idEventos = '$id' AND Usuario_correoElectronico = '$usuario';";
                $DB = new db();
                $ok = $DB->escribir($consulta);
                return $ok ? "Exito" : "Error";
            }else{
                return "Estás al limite";
            }
        }else{   
            $consulta = "INSERT INTO entrada_usuario (Eventos_idEventos, Usuario_correoElectronico)
            values ('$id', '$usuario')";
            $DB = new db();
            $ok = $DB->escribir($consulta);
            return $ok ? "Exito" : "Error";
        }
    }
}
