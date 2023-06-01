<?php
require_once __DIR__ . '/../bootstrap/init.php';

$carrito = new \BookStore\Modelos\Carrito();
$autenticacion = new BookStore\Auth\Autenticacion();
$productoSeleccionado = (new \BookStore\Modelos\Producto)->buscarPorId($_POST['producto_id']);

    if(!$autenticacion->estaAutenticado()){
        $_SESSION['mensaje_error'] = 'Para poder agregar productos al carrito debe iniciar sesión con su cuenta';
        header("Location: ../index.php?s=iniciar-sesion");
        exit;
    }

try {
    if(!$carrito->existeCarrito($autenticacion->getId())){
    (new \BookStore\Modelos\Carrito())->crearCarrito([
        'usuario_id' => $autenticacion->getId(),
        'status' => 0,
        'fecha_creacion' => date('Y-m-d h:i:s', time()),
    ]);

    $carrito->agregarAlCarrito([
        'carrito_id' => ($carrito->existeCarrito($autenticacion->getId())),
        'producto_id' => $_POST['producto_id'],
        'cantidad' => 1,
        'descuento' => $productoSeleccionado->getPrecio() - $productoSeleccionado->getOferta(),
        'precio' => $productoSeleccionado->getOferta(),
    ]);
    } else {
        if(!$carrito->productoYaEstaEnCarrito($_POST['producto_id'])){
        $carrito->agregarAlCarrito([
            'carrito_id' => ($carrito->existeCarrito($autenticacion->getId())),
            'producto_id' => $_POST['producto_id'],
            'cantidad' => $carrito->devolverCantidadProducto($_POST['producto_id']) + 1,
            'descuento' => $productoSeleccionado->getPrecio() - $productoSeleccionado->getOferta(),
            'precio' => $productoSeleccionado->getOferta(),
        ]);
        } else {
            $cantidadProd = $carrito->devolverCantidadProducto($_POST['producto_id']);
            $idProd = $_POST['producto_id'];
            $carrito->actualizarCarrito($cantidadProd, $idProd);
        }

    }
    $_SESSION['mensaje_exito'] = 'El producto ' . "<b>" . $productoSeleccionado->getNombre() . "</b>" . ' se agregó correctamente al carrito';
    header("Location: ../index.php?s=producto-detalle&id=" . $productoSeleccionado->getProductoId());
    exit;
} catch (Exception $e){
//        var_dump($e->getMessage(), $e->getTrace());
//        var_dump(date('Y-m-d h:i:s', time()));
//    $_SESSION['mensaje_error'] = 'El producto no pudo añadirse al carrito, intentalo de nuevo más tarde';
//    header ("Location: ../index.php?s=home");
//    exit;
}

//header("Location: ../index.php?s=home");
//exit;