<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();
include_once(__DIR__ . '/conexion.php'); // debe exponer $mysqli

class CarritoRepository
{
    public function fetchByUser(string $email): array
    {
        global $mysqli;
        $sql = "
            SELECT e.idEventos, e.titulo, e.precio, e.foto,
                   DATE(e.fecha) AS fecha_d, TIME(e.fecha) AS hora_t,
                   eu.cantidad
            FROM entrada_usuario eu
            INNER JOIN eventos e ON e.idEventos = eu.Eventos_idEventos
            WHERE eu.Usuario_correoElectronico = ?
            ORDER BY e.fecha DESC, e.idEventos DESC
        ";
        $out = [];
        if ($st = $mysqli->prepare($sql)) {
            $st->bind_param('s', $email);
            $st->execute();
            $res = $st->get_result();
            while ($r = $res->fetch_assoc()) {
                $out[] = [
                    'idEventos' => (int) $r['idEventos'],
                    'titulo' => $r['titulo'],
                    'precio' => (float) $r['precio'], // tu BD lo guarda como VARCHAR
                    'foto' => $r['foto'],
                    'fecha' => $r['fecha_d'],
                    'hora' => $r['hora_t'],
                    'cantidad' => (int) $r['cantidad'],
                ];
            }
            $st->close();
        }
        return $out;
    }

    public function addOrInc(string $email, int $idEventos): void
    {
        global $mysqli;
        $sel = "SELECT cantidad FROM entrada_usuario WHERE Eventos_idEventos=? AND Usuario_correoElectronico=?";
        if ($s = $mysqli->prepare($sel)) {
            $s->bind_param('is', $idEventos, $email);
            $s->execute();
            $s->bind_result($cant);
            if ($s->fetch()) {
                $s->close();
                $upd = "UPDATE entrada_usuario SET cantidad=cantidad+1 WHERE Eventos_idEventos=? AND Usuario_correoElectronico=?";
                if ($u = $mysqli->prepare($upd)) {
                    $u->bind_param('is', $idEventos, $email);
                    $u->execute();
                    $u->close();
                }
            } else {
                $s->close();
                $ins = "INSERT INTO entrada_usuario (Eventos_idEventos, cantidad, Usuario_correoElectronico) VALUES (?,1,?)";
                if ($i = $mysqli->prepare($ins)) {
                    $i->bind_param('is', $idEventos, $email);
                    $i->execute();
                    $i->close();
                }
            }
        }
    }

    public function decrementOrDelete(string $email, int $idEventos): void
    {
        global $mysqli;
        // resta 1; si queda 0, elimina
        $upd = "UPDATE entrada_usuario SET cantidad=cantidad-1 WHERE Eventos_idEventos=? AND Usuario_correoElectronico=? AND cantidad>1";
        if ($u = $mysqli->prepare($upd)) {
            $u->bind_param('is', $idEventos, $email);
            $u->execute();
            $u->close();
        }

        $del = "DELETE FROM entrada_usuario WHERE Eventos_idEventos=? AND Usuario_correoElectronico=? AND cantidad<=1";
        if ($d = $mysqli->prepare($del)) {
            $d->bind_param('is', $idEventos, $email);
            $d->execute();
            $d->close();
        }
    }

    public function deleteLine(string $email, int $idEventos): void
    {
        global $mysqli;
        $del = "DELETE FROM entrada_usuario WHERE Eventos_idEventos=? AND Usuario_correoElectronico=? LIMIT 1";
        if ($d = $mysqli->prepare($del)) {
            $d->bind_param('is', $idEventos, $email);
            $d->execute();
            $d->close();
        }
    }
}
