<?php

declare(strict_types=1);

namespace App\Application\Actions\Producto;

use App\Domain\Producto\Producto;
use Psr\Http\Message\ResponseInterface as Response;

class ProductoModificarAction extends ProductoAction
{

    protected function action(): Response
    {
        $campos = $this->getFormData();

        $datos = new Producto(
            $campos->id,
            $campos->nombre,
            $campos->precio,
            $campos->cantidad,
            $campos->categoria_id,
            1
        );

        $datos = $this->productoRepository->modificar($datos);

        return $this->respondWithData(["ok" => $datos]);
    }
}
