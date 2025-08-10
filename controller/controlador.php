<?php

class db
{
    private $host;
    private $user;
    private $password;
    private $database;

    function __construct()
    {
        include('DatosConexion.php');
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    function conectar()
    {
        $connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);

        if (mysqli_connect_errno()) {
            throw new Exception("Fallo al conectar a MySQL: " . mysqli_connect_error());
        }

        // Establecer el conjunto de caracteres a utf8
        mysqli_set_charset($connection, "utf8");

        return $connection;
    }

    function leer($consulta)
    {
        try {
            $conexion = $this->conectar();
            $resultado = mysqli_query($conexion, $consulta);

            if (!$resultado) {
                throw new Exception("Error en la consulta: " . mysqli_error($conexion));
            }

            $datos = array();
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $datos[] = $fila;
            }

            mysqli_free_result($resultado);
            mysqli_close($conexion);

            return $datos;

        } catch (Exception $e) {
            // Registrar el error en un archivo de log
            error_log($e->getMessage());
            return false;
        }
    }

    function escribir($consulta)
    {
        try {
            $conexion = $this->conectar();
            $resultado = mysqli_query($conexion, $consulta);

            if (!$resultado) {
                throw new Exception("Error en la escritura: " . mysqli_error($conexion));
            }

            $affectedRows = mysqli_affected_rows($conexion);
            mysqli_close($conexion);

            return $affectedRows;

        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    // Método adicional para consultas preparadas (seguridad contra inyección SQL)
    function ejecutarConsultaPreparada($sql, $params = array(), $tipos = "")
    {
        try {
            $conexion = $this->conectar();
            $stmt = mysqli_prepare($conexion, $sql);

            if (!$stmt) {
                throw new Exception("Error al preparar la consulta: " . mysqli_error($conexion));
            }

            if (!empty($params)) {
                if (empty($tipos)) {
                    $tipos = str_repeat("s", count($params)); // Por defecto todos como string
                }
                mysqli_stmt_bind_param($stmt, $tipos, ...$params);
            }

            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);

            if ($resultado) {
                $datos = array();
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $datos[] = $fila;
                }
                mysqli_free_result($resultado);
            } else {
                $datos = mysqli_stmt_affected_rows($stmt);
            }

            mysqli_stmt_close($stmt);
            mysqli_close($conexion);

            return $datos;

        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}