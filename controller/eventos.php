<?php

class Evento
{

    private $error = "Por favor, rellene todos los campos.";

    //ADMIN MODS
    public function validar($datos)
    {
        foreach ($datos as $campo => $valor) {
            if ($campo != 'idEventos' && $campo != 'foto' && $campo != 'tipo') {  // PUEDEN SER VACIO SI ES UN REGISTRO NUEVO
                if (empty($valor)) {
                    $this->error .= "<br>" . $campo . " está vacio!";
                }
            }
        }

        if ($this->error == "Por favor, rellene todos los campos.") {
            //no error
            $this->error = $this->modificar($datos);
        }
        return $this->error;
    }

    public function modificar($datos)
    {
        include('controlador.php');

        $idEventos = isset($_POST['idEventos']) ? addslashes($_POST['idEventos']) : "";
        $titulo = addslashes($_POST['titulo']);
        $descripcion = addslashes($_POST['descripcion']);
        $date = $_POST['fecha'];
        $time = $_POST['hora'];
        $fecha = date('y-m-d H:i', strtotime("$date $time"));
        $precio = addslashes($_POST['precio']);
        $tipoEvento = $_POST['tipo'];
        $foto = isset($_POST['ImagenEvento']) ? addslashes($_POST['ImagenEvento']) : "";
        $archivo = isset($_POST['archivo']) ? $_POST['archivo'] : "";
        $arch = isset($_POST['archivo']) ? 1 : 0;

        if ($idEventos == "") {//NUEVO REGISTRO
            $consulta = "INSERT INTO eventos (titulo, descripcion, fecha, precio, tipoEvento, foto, archivo) values ('$titulo',  '$descripcion', '$fecha', '$precio', '$tipoEvento', '$foto', '$arch')";
        } else { //MODIFICACION
            $consulta = "UPDATE eventos";
            $consulta .= " SET titulo = '$titulo', descripcion = '$descripcion', fecha = '$fecha', precio = '$precio', tipoEvento = '$tipoEvento', foto = '$foto',  archivo ='$arch'";
            $consulta .= " WHERE idEvento = '$idEventos';";
        }

        $DB = new db();
        if ($DB->escribir($consulta) == false) {
            return "Error en la modificación. Por favor, prueba de nuevo";
        }
        return "Modificación exitosa!";
    }

    public function imprimir_eventos()
    {
        include('controlador.php');

        $consulta = "SELECT * FROM eventos WHERE archivo = '0' ORDER BY fecha DESC;";
        $DB = new db();
        $eventos = $DB->leer($consulta);

        if (!empty($eventos)) {
            $listas = array();
            $proximo = array();
            $pasado = array();
            $reggaeton = array();
            $tecno = array();
            $especial = array();
            foreach ($eventos as $evento) {
                date_default_timezone_set('Europe/Madrid');
                $ahora = date_create()->format('Y-m-d H:i:s');
                if ($evento['fecha'] > $ahora) {
                    array_push($proximo, $evento);
                    //Próximos Eventos
                } else if ($evento['tipoEvento'] == 'Reggaeton') {
                    array_push($reggaeton, $evento);
                    //eventos pasados reggaeton
                } else if ($evento['tipoEvento'] == 'Tecno') {
                    array_push($tecno, $evento);
                    //eventos pasados tecno
                } else {
                    array_push($especial, $evento);
                    //eventos pasados especiales
                }
            }

            $listas['Próximos Eventos'] = $proximo;
            $listas['Eventos Pasados'] = $pasado;

            $pasado['Reggaeton'] = $reggaeton;
            $pasado['Tecno'] = $tecno;
            $pasado['Eventos Especiales'] = $especial;

            return $listas;
        }
    }
}
