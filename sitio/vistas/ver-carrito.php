<?php
    $autenticacion = (new \BookStore\Auth\Autenticacion());
    $carrito = (new \BookStore\Modelos\Carrito());
    $producto = (new \BookStore\Modelos\Producto());
    $subtotal = 0;
    $total = 0;
    $descuento = 0;
//echo $carrito->existeCarrito($autenticacion->getId());
?>
    <h1 class="mt-3 ms-5 mb-4">Mi carrito:</h1>
<?php
if($autenticacion->estaAutenticado() && count($carrito->devolverIdsProductosEnCarrito()) > 0){
//    if(count($carrito->devolverIdsProductosEnCarrito()) > 0){
?>
    <section class="d-flex justify-content-around w-100">
        <div class="resumen-productos mb-5">
<?php
if ($carrito->devolverEstadoCarrito($carrito->existeCarrito($autenticacion->getId())) != 1){
foreach($carrito->devolverIdsProductosEnCarrito() as $valor){
    $productoSeleccionado = $producto->buscarPorId($valor);
    $cantidadProd = $carrito->devolverCantidadProducto($valor);
    $subtotal += $productoSeleccionado->getPrecio() * $cantidadProd;
    $total += $productoSeleccionado->getOferta() * $cantidadProd;
    $descuento += ($productoSeleccionado->getPrecio() * $cantidadProd) - ($productoSeleccionado->getOferta() * $cantidadProd) ;

?>
        <div class="d-flex mb-4">
            <div class="div-item-carrito d-flex justify-content-around py-3">
                <img src="imgs/img-preview/<?= $productoSeleccionado->getImagenPreview()?>" width="100px" height="154px" alt="<?=htmlspecialchars($productoSeleccionado->getImagenAlt(), ENT_QUOTES)?>">
                <div class="div-info-carrito">
                    <p class=" p-nombre-carrito h5 fw-bold"><?=$productoSeleccionado->getNombre()?></p>
                    <p class=""><?= $productoSeleccionado->getAutor()?></p>
                    <div class="div-total-carrito">
                        <p class="h5">Total: <span class="fw-bold text-success">$<?=$productoSeleccionado->getOferta() * $cantidadProd?></span></p>
                    </div>
                </div>
                <div>
                    <span class="h5 me-2 text-success fw-bold">$<?= $productoSeleccionado->getOferta()?></span>
                    <span class="h5 text-decoration-line-through">$<?= $productoSeleccionado->getPrecio()?></span>
                </div>

                <div>
                    <p>Cantidad: <span><?=$cantidadProd?></span></p>
                </div>
            </div>

            <form action="acciones/carrito-borrar-producto.php" method="post" class="contenedor-borrar-producto d-flex justify-content-center align-items-center">
                <input type="hidden" name="producto_id" value="<?=$productoSeleccionado->getProductoId()?>">
                <button type="submit" class="btn-borrar w-100 h-100 py-3">
                <i class="fa-solid fa-trash-can h3 "></i>
                </button>
            </form>

        </div>

<?php
    }
}
?>
    </div>

    <div class="resumen-pagos">
        <h2 class="fw-bold text-center mt-3">Resumen</h2>
        <p class="text-center mt-3">Subtotal del pedido: <span>$<?=$subtotal;?></span></p>
        <p class="text-center">Descuento: <span>$<?=$descuento ?></span></p>
        <p class="text-center mt-3">Total: <span class="fw-bold">$<?=$total ?></span></p>
        <div class="d-flex justify-content-center">
        <form action="acciones/carrito-establecer-pedido.php" method="post">
            <input type="hidden" name="total" value="<?=$total?>">
            <button type="submit" class="btn btn-primary mt-4">Finalizar Compra</button>
        </form>
        </div>
    </div>

    </section>

<?php
//    }
    } else{
?>
    <p class="ms-4">No tienes productos en el carrito. Agrega alguno <a href="index.php?s=home">aquí</a></p>
<?php
}
?>
