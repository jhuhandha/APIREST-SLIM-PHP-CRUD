<?php
declare(strict_types=1);

namespace App\Domain\Producto;

interface ProductoRepository {

    public function listar() : array;

    public function guardar(Producto $producto);

    public function obtener($id) : array;

    public function modificar(Producto $producto);

    public function cambiar_estado(int $id, int $estado);
}