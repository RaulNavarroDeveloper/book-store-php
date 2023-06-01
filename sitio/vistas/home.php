<?php
$productos = (new \BookStore\Modelos\Producto())->info();
$catEconomia = (new \BookStore\Modelos\Producto())->categoriaEconomia();
$catInformatica = (new \BookStore\Modelos\Producto())->categoriaInformatica();
$catEspiritualidad = (new \BookStore\Modelos\Producto())->categoriaEspiritualidad();
$catFiccion = (new \BookStore\Modelos\Producto())->categoriaFiccion();
$catDesarrolloPersonal = (new \BookStore\Modelos\Producto())->categoriaDesarrolloPersonal();

?>

<header class="sliders d-flex justify-content-center mw-100">
<div id="carouselExampleControls" class="carousel slide w-100" data-bs-ride="carousel">
  <div class="carousel-inner w-100">
    <div class="carousel-item active w-100">
        <picture>
            <source srcset="imgs/sliders/Slider-principal-mobile.jpg" media="(max-width: 768px)">
            <img src="imgs/sliders/Slider-principal.jpg" class="d-block w-100 img-principal" alt="slider sobre ofertas">
        </picture>
    </div>
    <div class="carousel-item w-100">
        <picture>
            <source srcset="imgs/sliders/hechizo-de-amor-slide-prueba.jpg" media="(max-width: 768px)">
            <img src="imgs/sliders/hechizo-de-amor-slide-big.jpg" class="d-block w-100 img-hechizo" alt="<?=htmlspecialchars('promocion del libro "Hechizo de Amor"', ENT_QUOTES)?>">
        </picture>
    </div>
    <div class="carousel-item w-100">
        <picture>

            <source srcset="imgs/sliders/roma-soy-yo-slide-mobile.jpg" media="(max-width: 768px)">
            <img src="imgs/sliders/roma_soy_yo-slide_big.jpg" class="d-block w-100 img-roma" alt="<?=htmlspecialchars('promocion del libro "Roma soy yo"', ENT_QUOTES)?>">
        </picture>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</header>

<section class="principal-mas-vendidos mt-5 container">
    <h1 class="h1-home">Página de Inicio Bookstore</h1>
    <h2 class="ms-md-5 mb-4 text-center text-md-start fw-500">Más vendidos de la Semana</h2>
    <div class="card-contain row">
        <?php
            foreach($productos as $producto){
                if($producto->getProductoId() <= 9){
        ?>
        <article class="producto-mas-vendidos card col-md-3 mb-5 mx-auto">
            <div class="card-figure mx-auto">
                <img src="imgs/img-preview/<?=$producto->getImagenPreview()?>" class="" alt="<?= $producto->getImagenAlt()?>">
            </div>
            <div class="card-body">
                <h3 class="card-title h5"><?=$producto->getNombre()?></h3>
                <div class="container-price d-flex flex-row justify-content-around">
                    <div class="container-precio d-flex align-items-center">
                        <p>$<?=$producto->getPrecio()?></p>
                    </div>

                    <div class="container-oferta d-flex align-items-center">
                        <p class="fw-bold">$<?=$producto->getOferta()?></p>
                    </div>
                </div>
                <div class="contenedor-boton d-flex justify-content-center">
                    <a href="index.php?s=producto-detalle&id=<?= $producto->getProductoId()?>" class="btn btn-primary">Ver Producto</a>
                </div>
            </div>
        </article>
        <?php
                }
            }
            ?>
    </div>
</section>

    <section class="principal-economia container mb-5">
        <div class="contenedor-h2 text-center mb-4">
            <h2 class="h2-seccion">Economía y Finanzas</h2>
            <a href="#" class="vinculo-h2 mw-100 mt-2 mt-lg-0">Mostrar todos (20)</a>
        </div>
    <div class="card-contain row">
        <?php
        foreach($catEconomia as $categoria){
            if($categoria->getProductoId() <= 3){

        ?>
        <article class="card col-md-3 mx-auto mb-3">
            <div class="card-figure mx-auto">
                <img src="imgs/img-preview/<?=$categoria->getImagenPreview()?>" class="" alt="<?= $categoria->getImagenAlt()?>">
            </div>
            <div class="card-body">
                <h3 class="card-title h5"><?=$categoria->getNombre()?></h3>
                <div class="container-price d-flex flex-row justify-content-around">
                    <div class="container-precio d-flex align-items-center">
                        <p>$<?=$categoria->getPrecio()?></p>
                    </div>

                    <div class="container-oferta d-flex align-items-center">
                        <p class="fw-bold">$<?=$categoria->getOferta()?></p>
                    </div>
                </div>
                <div class="contenedor-boton d-flex justify-content-center">
                    <a href="index.php?s=producto-detalle&id=<?=$categoria->getProductoId()?>" class="btn btn-primary">Ver Producto</a>
                </div>
            </div>
        </article>
        <?php
                }
            }
        ?>
    </div>
</section>

    <section class="principal-tecnologia container mb-5">
        <div class="contenedor-h2 text-center mb-4">
            <h2 class="h2-seccion">Tecnologia e Informática</h2>
            <a href="#" class="vinculo-h2 mw-100 mt-2 mt-lg-0">Mostrar todos (20)</a>
        </div>
    <div class="card-contain row">
        <?php
        foreach($catInformatica as $categoria){
            if($categoria->getProductoId() <= 13){

        ?>
        <article class="card col-md-3 mx-auto mb-3">
            <div class="card-figure mx-auto">
                <img src="imgs/img-preview/<?=$categoria->getImagenPreview()?>" class="" alt="<?= $categoria->getImagenAlt()?>">
            </div>
            <div class="card-body">
                <h3 class="card-title h5"><?=$categoria->getNombre()?></h3>
                <div class="container-price d-flex flex-row justify-content-around">
                    <div class="container-precio d-flex align-items-center">
                        <p>$<?=$categoria->getPrecio()?></p>
                    </div>

                    <div class="container-oferta d-flex align-items-center">
                        <p class=" fw-bold">$<?=$categoria->getOferta()?></p>
                    </div>
                </div>
                <div class="contenedor-boton d-flex justify-content-center">
                    <a href="index.php?s=producto-detalle&id=<?=$categoria->getProductoId()?>" class="btn btn-primary">Ver Producto</a>
                </div>
            </div>
        </article>
        <?php
                }
            }
        ?>
    </div>
    </section>

    <section class="principal-tecnologia mb-5 container">
        <div class="contenedor-h2 text-center mb-4">
            <h2 class="h2-seccion">Espiritualidad</h2>
            <a href="#" class="vinculo-h2 mw-100 mt-2 mt-lg-0">Mostrar todos (20)</a>
        </div>
    <div class="card-contain row">
        <?php
        foreach($catEspiritualidad as $categoria){
            if($categoria->getProductoId() <= 18){

        ?>
        <article class="card col-md-3 mx-auto mb-3">
            <div class="card-figure mx-auto">
                <img src="imgs/img-preview/<?=$categoria->getImagenPreview()?>" class="" alt="<?= $categoria->getImagenAlt()?>">
            </div>
            <div class="card-body">
                <h3 class="card-title h5"><?=$categoria->getNombre()?></h3>
                <div class="container-price d-flex flex-row justify-content-around">
                    <div class="container-precio d-flex align-items-center">
                        <p>$<?=$categoria->getPrecio()?></p>
                    </div>

                    <div class="container-oferta d-flex align-items-center">
                        <p class=" fw-bold">$<?=$categoria->getOferta()?></p>
                    </div>
                </div>
                <div class="contenedor-boton d-flex justify-content-center">
                    <a href="index.php?s=producto-detalle&id=<?=$categoria->getProductoId()?>" class="btn btn-primary">Ver Producto</a>
                </div>
            </div>
        </article>
        <?php
                }
            }
        ?>
    </div>
    </section>

    <section class="principal-tecnologia mb-5 container">
        <div class="contenedor-h2 text-center mb-4">
            <h2 class="h2-seccion">Ficción</h2>
            <a href="#" class="vinculo-h2 mw-100 mt-2 mt-lg-0">Mostrar todos (20)</a>
        </div>
    <div class="card-contain row">
        <?php
        foreach($catFiccion as $categoria){
            if($categoria->getProductoId() <= 23){

        ?>
        <article class="card col-md-3 mx-auto mb-3">
            <div class="card-figure mx-auto">
                <img src="imgs/img-preview/<?=$categoria->getImagenPreview()?>" class="" alt="<?= $categoria->getImagenAlt()?>">
            </div>
            <div class="card-body">
                <h3 class="card-title h5"><?=$categoria->getNombre()?></h3>
                <div class="container-price d-flex flex-row justify-content-around">
                    <div class="container-precio d-flex align-items-center">
                        <p>$<?=$categoria->getPrecio()?></p>
                    </div>

                    <div class="container-oferta d-flex align-items-center">
                        <p class=" fw-bold">$<?=$categoria->getOferta()?></p>
                    </div>
                </div>
                <div class="contenedor-boton d-flex justify-content-center">
                    <a href="index.php?s=producto-detalle&id=<?=$categoria->getProductoId()?>" class="btn btn-primary">Ver Producto</a>
                </div>
            </div>
        </article>
        <?php
                }
            }
        ?>
    </div>
    </section>

    <section class="principal-tecnologia mb-5 container">
        <div class="contenedor-h2 text-center mb-4">
            <h2 class="h2-seccion">Desarrollo Personal</h2>
            <a href="#" class="vinculo-h2 mw-100 mt-2 mt-lg-0">Mostrar todos (20)</a>
        </div>
    <div class="card-contain row">
        <?php
        foreach($catDesarrolloPersonal as $categoria){
            if($categoria->getProductoId() <= 8){

        ?>
        <article class="card col-md-3 mx-auto mb-3">
            <div class="card-figure mx-auto">
                <img src="imgs/img-preview/<?=$categoria->getImagenPreview()?>" class="" alt="<?= $categoria->getImagenAlt()?>">
            </div>
            <div class="card-body">
                <h3 class="card-title h5"><?=$categoria->getNombre()?></h3>
                <div class="container-price d-flex flex-row justify-content-around">
                    <div class="container-precio d-flex align-items-center">
                        <p>$<?=$categoria->getPrecio()?></p>
                    </div>

                    <div class="container-oferta d-flex align-items-center">
                        <p class=" fw-bold">$<?=$categoria->getOferta()?></p>
                    </div>
                </div>
                <div class="contenedor-boton d-flex justify-content-center">
                    <a href="index.php?s=producto-detalle&id=<?=$categoria->getProductoId()?>" class="btn btn-primary">Ver Producto</a>
                </div>
            </div>
        </article>
        <?php
                }
            }
        ?>
    </div>
    </section>