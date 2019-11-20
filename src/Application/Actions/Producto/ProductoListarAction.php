<?php 
declare(strict_types=1);

namespace App\Application\Actions\Producto;

use Psr\Http\Message\ResponseInterface as Response;

class ProductoListarAction extends ProductoAction {

    protected function action(): Response 
    {
        $datos = $this->productoRepository->listar();

        $this->logger->info("Producto of id ".json_encode($datos)." was viewed.");

        return $this->respondWithData($datos);
    }
}

