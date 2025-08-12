<?php
// controller/eventos.php

class Evento
{
    private $error = "Por favor, rellene todos los campos.";

    // Valida datos del formulario (para admin: crear/modificar)
    public function validar($datos)
    {
        // Campos obligatorios (para inserción/actualización)
        $obligatorios = ['titulo', 'descripcion', 'fecha', 'hora', 'precio'];
        foreach ($obligatorios as $campo) {
            if (!isset($datos[$campo]) || trim($datos[$campo]) === '') {
                $this->error .= "<br>" . $campo . " está vacío!";
            }
        }

        // Si no hay errores, pasamos a modificar/insertar
        if ($this->error === "Por favor, rellene todos los campos.") {
            $this->error = $this->modificar($datos);
        }
        return $this->error;
    }

    public function modificar($datos)
    {
        include_once(__DIR__ . '/controlador.php'); // Clase db()

        // Sanitizado básico (mantengo addslashes por compatibilidad con tu clase db)
        $idEventos = isset($_POST['idEventos']) ? addslashes($_POST['idEventos']) : "";
        $titulo = isset($_POST['titulo']) ? addslashes($_POST['titulo']) : "";
        $descripcion = isset($_POST['descripcion']) ? addslashes($_POST['descripcion']) : "";
        $date = isset($_POST['fecha']) ? $_POST['fecha'] : ""; // yyyy-mm-dd
        $time = isset($_POST['hora']) ? $_POST['hora'] : "";   // HH:ii
        $precio = isset($_POST['precio']) ? addslashes($_POST['precio']) : "";
        $tipoEvento = isset($_POST['tipo']) ? $_POST['tipo'] : null; // enum('Reggaeton','Tecno') o null
        $foto = isset($_POST['ImagenEvento']) ? addslashes($_POST['ImagenEvento']) : "";
        $arch = isset($_POST['archivo']) ? 1 : 0;

        // Fecha/hora correcta para MySQL: Y-m-d H:i:s
        $fecha = date('Y-m-d H:i:s', strtotime("$date $time"));

        if ($idEventos === "") {
            // NUEVO REGISTRO
            $consulta = "INSERT INTO eventos (titulo, descripcion, fecha, precio, tipoEvento, foto, archivo)
                         VALUES ('$titulo', '$descripcion', '$fecha', '$precio', " .
                ($tipoEvento !== null && $tipoEvento !== "" ? "'" . addslashes($tipoEvento) . "'" : "NULL") .
                ", '$foto', '$arch')";
        } else {
            // MODIFICAR EXISTENTE
            $consulta = "UPDATE eventos
                         SET titulo='$titulo',
                             descripcion='$descripcion',
                             fecha='$fecha',
                             precio='$precio',
                             tipoEvento=" . ($tipoEvento !== null && $tipoEvento !== "" ? "'" . addslashes($tipoEvento) . "'" : "NULL") . ",
                             foto='$foto',
                             archivo='$arch'
                         WHERE idEventos='$idEventos'";
        }

        $DB = new db();
        if ($DB->escribir($consulta) == false) {
            return "Error en la modificación. Por favor, prueba de nuevo";
        }
        return "Modificación exitosa!";
    }

    public function imprimir_eventos()
    {
        include_once(__DIR__ . '/controlador.php'); // Clase db()

        $consulta = "SELECT * FROM eventos WHERE archivo='0' ORDER BY fecha DESC";
        $DB = new db();
        $eventos = $DB->leer($consulta);

        if (empty($eventos))
            return [];

        date_default_timezone_set('Europe/Madrid');
        $ahora = date('Y-m-d H:i:s');

        $proximo = [];
        $reggaeton = [];
        $tecno = [];
        $especial = []; // cualquier otro tipo o NULL

        foreach ($eventos as $evento) {
            // Si fecha futura -> Próximos
            if ($evento['fecha'] > $ahora) {
                $proximo[] = $evento;
            } else {
                // Pasados por tipo
                if ($evento['tipoEvento'] === 'Reggaeton') {
                    $reggaeton[] = $evento;
                } elseif ($evento['tipoEvento'] === 'Tecno') {
                    $tecno[] = $evento;
                } else {
                    $especial[] = $evento;
                }
            }
        }

        $pasado = [
            'Reggaeton' => $reggaeton,
            'Tecno' => $tecno,
            'Eventos Especiales' => $especial,
        ];

        return [
            'Próximos Eventos' => $proximo,
            'Eventos Pasados' => $pasado,
        ];
    }
}
