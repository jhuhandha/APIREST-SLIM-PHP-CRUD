<?php

declare(strict_types=1);

namespace App\Domain\Producto;

use JsonSerializable;

class Producto implements JsonSerializable
{
    private $id;
    private $nombre;
    private $precio;
    private $cantidad;
    private $categoria_id;
    private $estado;

    public function __GET($attr){
        return $this->$attr;
    }

    function __construct(?int $id, string $nombre, int $precio, int $cantidad, int $categoria_id, ?int $estado)
    {
        $this->id = $id;
        $this->nombre = ucfirst(strip_tags($nombre));
        $this->precio = $precio;
        $this->cantidad = $cantidad;
        $this->categoria_id = $categoria_id;
        $this->estado = $estado;
    }

    public function jsonSerialize()
    {
        return [
            "id" => $this->id,
            "nombre_producto" => $this->nombre,
            "precio" => $this->precio,
            "cantidad" => $this->cantidad,
            "categoria_id" => $this->categoria_id,
            "estado" => $this->estado
        ];
    }
}