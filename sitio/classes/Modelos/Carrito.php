<?php
namespace BookStore\Modelos;
use BookStore\Database\DBConexion;
use PDO;
use BookStore\Auth\Autenticacion;
class Carrito
{
protected int $carrito_id;
protected int $status;
protected int $session_id;
protected string $fecha_creacion;


public function crearCarrito (array $data)
    {
        $query = "INSERT INTO carrito (usuario_id, status, fecha_creacion)
                  VALUES (:usuario_id, :status, :fecha_creacion)";
        DBConexion::getConexion()->prepare($query)->execute([
            'usuario_id' => $data['usuario_id'],
            'status' => $data['status'],
            'fecha_creacion' => $data['fecha_creacion'],
        ]);
    }

public function existeCarrito (int $idUsuario)
{
    $db = DBConexion::getConexion();
    $query = "SELECT * FROM carrito WHERE usuario_id = ? AND status != 1";
    $stmt = $db->prepare($query);
    $stmt->execute([($idUsuario)]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
    $carrito = $stmt->fetchAll();
    $carritosCreados = count($carrito) - 1;
    return $carrito ? $carrito[$carritosCreados]->carrito_id : null;
}

public function agregarAlCarrito (array $data)
{
    $query = "INSERT INTO carrito_items (carrito_id, producto_id, cantidad, descuento, precio)
              VALUES (:carrito_id, :producto_id, :cantidad, :descuento, :precio)";
    DBConexion::getConexion()->prepare($query)->execute([
        'carrito_id' => $data['carrito_id'],
        'producto_id' => $data['producto_id'],
        'cantidad' => $data['cantidad'],
        'descuento' => $data['descuento'],
        'precio' => $data['precio'],
    ]);
}

public function actualizarCarrito ($cantidadActual, $idProducto)
{
    $cantidadActualizada = $cantidadActual + 1;
    $query = "UPDATE carrito_items
              SET cantidad = ?
              WHERE producto_id = ?;";
    DBConexion::getConexion()->prepare($query)->execute([$cantidadActualizada, $idProducto]);
}

public function devolverIdsProductosEnCarrito ()
{
    $autenticacion = (new Autenticacion())->getId();
    $db = DBConexion::getConexion();
    $query = "SELECT producto_id FROM carrito_items WHERE carrito_id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([($this->existeCarrito($autenticacion))]);
//    $stmt->setFetchMode(PDO::FETCH_COLUMN);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

public function devolverCantidadProducto(int $idProd)
{
    $db = DBConexion::getConexion();
    $query = "SELECT cantidad from carrito_items WHERE producto_id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$idProd]);
    return $stmt->fetch(PDO::FETCH_COLUMN);
}

public function productoYaEstaEnCarrito($idProducto)
    {
        $arrayProdCarrito = $this->devolverIdsProductosEnCarrito();
        foreach ($arrayProdCarrito as $id) {
            if ($id == $idProducto) return true;
        }
        return false;
    }

public function borrarProductoCarrito ($idProducto)
{
    $query = "DELETE FROM carrito_items
              WHERE producto_id = ?;";
    DBConexion::getConexion()->prepare($query)->execute([$idProducto]);
}

public function actualizarEstadoCarrito ($idCarrito) {
    $query = "UPDATE carrito
          SET status = ?
          WHERE carrito_id = ?";
    DBConexion::getConexion()->prepare($query)->execute([1, $idCarrito]);
}

public function devolverEstadoCarrito ($idCarrito)
{
    $db = DBConexion::getConexion();
    $query = "SELECT status from carrito WHERE carrito_id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$idCarrito]);
    return $stmt->fetch(PDO::FETCH_COLUMN);
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
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getSessionId(): int
    {
        return $this->session_id;
    }

    /**
     * @param int $session_id
     */
    public function setSessionId(int $session_id): void
    {
        $this->session_id = $session_id;
    }

    /**
     * @return string
     */
    public function getFechaCreacion(): string
    {
        return $this->fecha_creacion;
    }

    /**
     * @param string $fecha_creacion
     */
    public function setFechaCreacion(string $fecha_creacion): void
    {
        $this->fecha_creacion = $fecha_creacion;
    }




}