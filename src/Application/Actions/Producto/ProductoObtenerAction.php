<?php 
declare(strict_types=1);

namespace App\Application\Actions\Producto;

use Psr\Http\Message\ResponseInterface as Response;

class ProductoObtenerAction extends ProductoAction {

    protected function action(): Response 
    {
        $id = $this->resolveArg("id");
        $datos = $this->productoRepository->obtener($id);
        return $this->respondWithData($datos);
    }
}

