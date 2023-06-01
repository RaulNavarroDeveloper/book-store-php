<?php
$productoSeleccionado = (new \BookStore\Modelos\Producto)->buscarPorId($_GET['id']);

$seleccionado = false;
?>

<section class="contenedor-detalles container">
    <div class="row mt-5">
        <figure class="figure-producto col-12 col-lg-3  order-1 text-center">
            <img src="imgs/<?= $productoSeleccionado->getImagen()?>" alt="<?= htmlspecialchars($productoSeleccionado->getImagenAlt(), ENT_QUOTES)?>" class="img-fluid text-center">
        </figure>
        
        <div class="col-12 col-lg-5 order-2 mt-3 mt-lg-0 row">
            <div class="detalle-nombre order-1 order-lg-1 ">
                <h1 class="fw-bold text-center text-lg-start"><?= $productoSeleccionado->getNombre()?></h1>
            </div>

            <div class="d-block d-sm-flex  justify-content-around d-lg-block order-3">
                <div class="detalle-autor order-lg-2 text-center text-sm-start mx-auto">
                    <p class="p-autor h4"><?= $productoSeleccionado->getAutor()?></p>
                </div>

                <div class="detalle-categoria d-flex justify-content-center align-items-center rounded-3 mb-3 order-lg-4 px-sm-3 px-lg-0 mx-auto mx-md-0">
                    <span class="fw-bold"><?= $productoSeleccionado->getCategoriaNombre()?></span>
                </div>
            </div>

            <div class="detalle-calificacion d-flex order-2 order-lg-3 justify-content-center justify-content-lg-start">
            <i class="fa-solid fa-star"></i>
                <p class="ms-1"><?=$productoSeleccionado->getCalificacion()?></p>
            </div>

            <div class="info-precio container col-12 col-lg-4 order-4 d-block d-lg-none mt-5">
                <div class="d-flex flex-row align-items-center mb-3">
                    <div class="precio me-3">
                        <span class="text-decoration-line-through h3">$<?= $productoSeleccionado->getPrecio()?></span>
                    </div>
                    <div class="descuento rounded-3 px-2 mw-100">
                        <p>-10% Exclusivo Web</p>
                    </div>
                </div>
                <div class="oferta mb-4 d-flex flex-row align-items-center justify-content-between">
                    <span class="h2 fw-bold">$<?= $productoSeleccionado->getOferta()?></span>
                    <p class="fs-5 fw-bold">Envío gratis</p>
                </div>

                <form action="acciones/carrito-agregar.php" method="post">
                    <input type="hidden" name="producto_id" value="<?=$productoSeleccionado->getProductoId() ?>">
                    <button type="submit" class="btn w-100">Añadir al carrito</button>
                </form>

                <div class="despacho d-flex flex-row mt-5">
                    <i class="fa-solid fa-truck-fast fs-3"></i>
                    <p class="ms-2"><b>Recíbelo mañana</b> <?=$productoSeleccionado->calcularEnvio()?></p>
                </div>
            </div>

            <article class="order-5 order-lg-5 mt-5 mt-lg-0">
                <h2 class="h4 fw-bold">Resumen de "<?=$productoSeleccionado->getNombre()?>"</h2>
                <p class="descripcion-corta mb-0"><?= $productoSeleccionado->descripcionCorta($_GET['id'])?>
                    <a class="" data-bs-toggle="collapse" href="#verMas" role="button" aria-expanded="false" aria-controls="verMas" onclick="document.querySelector('.descripcion-corta').hidden = true;">ver más</a>
                </p>
                <p class="collapse" id="verMas"><?=$productoSeleccionado->getDescripcion()?></p>
            </article>
        </div>

        <div class="info-precio container col-12 col-lg-4 order-3 d-none d-lg-block border-start border-secondary">
            <div class="d-flex flex-row align-items-center mb-3">
                <div class="precio me-3">
                    <span class=" h3text-decoration-line-through">$<?= $productoSeleccionado->getPrecio()?></span>
                </div>
                <div class="descuento rounded-3 px-2">
                    <p>-10% Exclusivo Web</p>
                </div>
            </div>
            <div class="oferta mb-4 d-flex flex-row align-items-center justify-content-between">
                <span class="h2 fw-bold">$<?= $productoSeleccionado->getOferta()?></span>
                <p class="fs-5 fw-bold">Envío gratis</p>
            </div>
<!--            <a href="#" class="btn w-100">Añadir al Carrito</a>-->
            <form action="acciones/carrito-agregar.php" method="post">
                <input type="hidden" name="producto_id" value="<?=$productoSeleccionado->getProductoId() ?>">
                <button type="submit" class="btn w-100">Añadir al carrito</button>
            </form>
        
            <div class="despacho d-flex flex-row mt-3">
                <i class="fa-solid fa-truck-fast fs-3"></i>
                <p class="ms-2"><b>Recíbelo mañana</b> <?=$productoSeleccionado->calcularEnvio()?></p>
            </div>
        </div>
    </div>

</section>
