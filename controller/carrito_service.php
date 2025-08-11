<?php
include_once(__DIR__ . '/carrito_repository.php');

class CarritoService
{
    private CarritoRepository $repo;
    public function __construct()
    {
        $this->repo = new CarritoRepository();
    }

    // Devuelve el array $actual con el formato que usa tu view
    public function obtenerActual(string $email): array
    {
        $rows = $this->repo->fetchByUser($email);
        $actual = [];
        foreach ($rows as $r) {
            $totalLinea = (float) $r['precio'] * max(1, (int) $r['cantidad']);
            $actual[] = [
                $r['titulo'],            // [0] titulo
                $totalLinea,             // [1] precio total línea (número)
                $r['foto'],              // [2] imagen (nombre archivo)
                $r['fecha'],             // [3] fecha (YYYY-mm-dd)
                $r['hora'],              // [4] hora (HH:ii:ss)
                (int) $r['idEventos'],    // [5] id para eliminar
                // si un día quieres mostrar cantidad o unitario:
                // $r['cantidad'],        // [6] cantidad
                // $r['precio']           // [7] precio unitario
            ];
        }
        return $actual;
    }

    public function totalCarrito(array $actual): float
    {
        $t = 0.0;
        foreach ($actual as $it) {
            $t += (float) $it[1];
        }
        return $t;
    }

    public function add(string $email, int $idEventos): void
    {
        $this->repo->addOrInc($email, $idEventos);
    }
    public function dec(string $email, int $idEventos): void
    {
        $this->repo->decrementOrDelete($email, $idEventos);
    }
    public function remove(string $email, int $idEventos): void
    {
        $this->repo->deleteLine($email, $idEventos);
    }
}
