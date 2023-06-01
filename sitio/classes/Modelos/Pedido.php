<?php
namespace BookStore\Modelos;
use BookStore\Database\DBConexion;
use PDO;
use BookStore\Auth\Autenticacion;
class Pedido
{
    protected ?int $pedido_id;
    protected ?int $carrito_id;
    protected ?int $fecha_compra;
    protected ?string $total;

    public function establecerPedido (array $data)
    {
        $db = DBConexion::getConexion();
        $query = "INSERT INTO pedidos_realizados (carrito_id, fecha_compra, total) 
                  VALUES (:carrito_id, :fecha_compra, :total)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'carrito_id' => $data['carrito_id'],
            'fecha_compra' => $data['fecha_compra'],
            'total' => $data['total'],
        ]);
    }

    public function getPedidosByIdUsuario (int $idUsuario) {
        $db = DBConexion::getConexion();
        $query = "SELECT * FROM pedidos_realizados p JOIN carrito c ON p.carrito_id = c.carrito_id JOIN usuarios u ON u.usuario_id = c.usuario_id WHERE u.usuario_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$idUsuario]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $prueba = $stmt->fetchAll();
        return count($prueba);
    }

    /**
     * @return int
     */
    public function getPedidoId(): int
    {
        return $this->pedido_id;
    }

    /**
     * @param int $pedido_id
     */
    public function setPedidoId(int $pedido_id): void
    {
        $this->pedido_id = $pedido_id;
    }

    /**
     * @return int
     */
    public function getCarritoId(): int
    {
        return $this->carrito_id;
    }

    /**
     * @param int $carrito_id
     */
    public function setCarritoId(int $carrito_id): void
    {
        $this->carrito_id = $carrito_id;
    }

    /**
     * @return int
     */
    public function getFechaCompra(): int
    {
        return $this->fecha_compra;
    }

    /**
     * @param int $fecha_creacion
     */
    public function setFechaCompra(int $fecha_compra): void
    {
        $this->fecha_compra = $fecha_compra;
    }

    /**
     * @return string
     */
    public function getTotal(): string
    {
        return $this->total;
    }

    /**
     * @param string $total
     */
    public function setTotal(string $total): void
    {
        $this->total = $total;
    }



}