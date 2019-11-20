<?php

declare(strict_types=1);

namespace App\Application\Actions\Producto;

use App\Domain\Producto\Producto;
use Psr\Http\Message\ResponseInterface as Response;

class ProductoCrearAction extends ProductoAction
{

    protected function action(): Response
    {
        $campos = $this->getFormData();

        $datos = new Producto(
            0,
            $campos->nombre,
            $campos->precio,
            $campos->cantidad,
            $campos->categoria_id,
            1
        );

        $datos = $this->productoRepository->guardar($datos);

        return $this->respondWithData(["ok" => $datos]);
    }
}
