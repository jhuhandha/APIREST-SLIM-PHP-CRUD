<?php
declare(strict_types=1);

namespace App\Application\Actions\Producto;

use App\Application\Actions\Action;
use App\Domain\Producto\ProductoRepository;
use Psr\Log\LoggerInterface;

abstract class ProductoAction extends Action
{
    /**
     * @var ProductoRepository
     */
    protected $productoRepository;

    /**
     * @param LoggerInterface $logger
     * @param ProductoRepository  $productoRepository
     */
    public function __construct(LoggerInterface $logger, ProductoRepository $productoRepository)
    {
        parent::__construct($logger);
        $this->productoRepository = $productoRepository;
    }
}
