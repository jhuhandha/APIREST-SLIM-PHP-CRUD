<?php
declare(strict_types=1);

namespace App\Domain\Producto;

use App\Domain\DomainException\DomainRecordNotFoundException;

class ProductoNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The producto you requested does not exist.';
}
