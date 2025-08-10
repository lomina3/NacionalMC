<?php

class Contacto
{
    //FORMULARIO CONTACTO
    public function contactar($datos)
    {
        $error = "";
        $nombre = addslashes($datos['nombre']);
        $apellidos = addslashes($datos['apellidos']);
        $telefono = addslashes($datos['number']);
        $correo = $datos['email'];
        $mensaje = addslashes($datos['message']);
        
        $consulta = "SELECT correoElectronico FROM contacto";
		$DB = new db();
        $resultado = $DB->leer($consulta);
        $nacional = $resultado[0];
        $emailNacional = $nacional['correoElectronico'];

        print_r($emailNacional);

        $emailSubject = 'Recibiste un mensaje nuevo de la página web de Nacional';
        $headers = ['From' => $correo, 'Reply-To' => $correo, 'Content-type' => 'text/html; charset=utf-8'];
        $bodyParagraphs = ["Nombre: {$nombre} {$apellidos}", "Correo: {$correo}", "Teléfono: {$telefono}","Message: {$mensaje}"];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (!mail($emailNacional, $emailSubject, $body, $headers)) {
            $error = 'Ups, algo falló. Intentalo más tarde.';
        }
        return $error;
    }
}
