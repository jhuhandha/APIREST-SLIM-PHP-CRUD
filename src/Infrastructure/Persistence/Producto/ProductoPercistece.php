<?php 
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Producto;

use App\Infrastructure\DataBase;
use App\Domain\Producto\Producto;
use App\Domain\Producto\ProductoNotFoundException;
use App\Domain\Producto\ProductoRepository;
use PDO;

class ProductoPercistece implements ProductoRepository {

    private $db = null;
    function __construct()
    {
        $database = new DataBase();
        $this->db = $database->getConection();
    }

    public function listar() : array
    {
        $sql = "SELECT p.id, p.nombre, p.precio, p.cantidad, 
        p.categoria_id, p.estado, c.nombre as categoria
        FROM producto p 
        INNER JOIN categoria c ON (p.categoria_id = c.id)";

        try{
            $stm = $this->db->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            return null;
        }
    }

    public function guardar(Producto $producto) 
    {
        $sql = "INSERT INTO producto 
        (nombre, precio, cantidad, categoria_id)
         VALUE 
        (?, ?, ?, ?)";

        try{
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $producto->__GET("nombre"));
            $stm->bindValue(2, $producto->__GET("precio"));
            $stm->bindValue(3, $producto->__GET("cantidad"));
            $stm->bindValue(4, $producto->__GET("categoria_id"));

            return $stm->execute();
        }catch(Exception $e){
            return false;
        }
    }

    public function obtener($id) : array
    {
        $sql = "SELECT p.id, p.nombre, p.precio, p.cantidad, 
        p.categoria_id, p.estado, c.nombre as categoria
        FROM producto p 
        INNER JOIN categoria c ON (p.categoria_id = c.id)
        WHERE p.id = ?";

        try{
            $stm = $this->db->prepare($sql);
            $stm->bindParam(1, $id);
            $stm->execute();
            return $stm->fetch();
        }catch(Exception $e){
            return null;
        }
    }

    public function modificar(Producto $producto)
    {
        $sql = "UPDATE producto SET 
        nombre = ?, precio = ?, cantidad = ?, categoria_id = ?
        WHERE id = ?";

        try{
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $producto->__GET("nombre"));
            $stm->bindValue(2, $producto->__GET("precio"));
            $stm->bindValue(3, $producto->__GET("cantidad"));
            $stm->bindValue(4, $producto->__GET("categoria_id"));
            $stm->bindValue(5, $producto->__GET("id"));

            return $stm->execute();
        }catch(Exception $e){
            return false;
        }
    }

    public function cambiar_estado(int $id, int $estado)
    {
        $sql = "UPDATE producto SET 
        estado = ?
        WHERE id = ?";

        try{
            $stm = $this->db->prepare($sql);
            $stm->bindParam(1, $estado);
            $stm->bindParam(2, $id);

            return $stm->execute();
        }catch(Exception $e){
            return false;
        }
    }
}
