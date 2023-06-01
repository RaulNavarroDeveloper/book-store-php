<?php
require_once __DIR__ . '/../bootstrap/init.php';
use BookStore\Modelos\Producto;

$carrito = new \BookStore\Modelos\Carrito();
$productoSeleccionado = (new Producto())->buscarPorId($_POST['producto_id']);

try {
    $carrito->borrarProductoCarrito($_POST['producto_id']);
    $_SESSION['mensaje_exito'] = 'El producto ' . "<b>" . $productoSeleccionado->getNombre() . "</b>" . ' se eliminó del carrito';
    header("Location: ../index.php?s=ver-carrito");
    exit;
} catch (Exception $e){

}