<?php
require_once __DIR__ . '/../bootstrap/init.php';
use \BookStore\Modelos\Pedido;

$carrito = new \BookStore\Modelos\Carrito();
$pedido = new Pedido();
$autenticacion = new \BookStore\Auth\Autenticacion();

//echo date('m-d-Y h:i:s', time()) . "<br>";
echo $carrito->existeCarrito($autenticacion->getId()) . "<br>";
echo $_POST['total'] . '.00';

try {
    $pedido->establecerPedido([
        'carrito_id' => $carrito->existeCarrito($autenticacion->getId()),
        'fecha_compra' => date('m-d-Y h:i:s', time()),
        'total' => $_POST['total'],
    ]);

    $carrito->actualizarEstadoCarrito($carrito->existeCarrito($autenticacion->getId()));

    $_SESSION['mensaje_exito'] = 'Su pedido se realizó correctamente';
    header("Location: ../index.php?s=home");
    exit;

} catch (Exception $e) {
    echo $e->getMessage();
    $_SESSION['mensaje_error'] = 'Su pedido no pudo realizarse, intentelo de nuevo más adelante o comuniquese con soporte';
//    header ("Location: ../index.php?s=ver-carrito");
//    exit;
}