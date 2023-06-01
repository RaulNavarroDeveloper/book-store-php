<?php
$errores = $_SESSION['errores'] ?? [];
$dataForm = $_SESSION['data_form'] ?? [];
unset($_SESSION['errores'], $_SESSION['data_form']);
$producto = (new \BookStore\Modelos\Producto())->buscarPorId($_GET['id']);
?>
<section class="container">
    <h1 class="mb-5 mt-5">Editar Productos</h1>

    <form action="acciones/productos-editar.php" method="POST" enctype="multipart/form-data" class="d-flex justify-content-around">
        <input type="hidden" name="id" value="<?= $producto->getProductoId() ;?>">
        <div class="w-50">
            <div class="form-fila mb-3">
                <label for="nombre">Nombre</label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    class="form-control"
                    value="<?= $dataForm['nombre'] ?? $producto->getNombre(); ?>"
                    <?php if(isset($errores['nombre'])): ?> aria-describedby="error-nombre" <?php endif;?>
                >
                <?php
                if(isset($errores['nombre'])):
                    ?>
                    <div class="text-danger" id="error-nombre"><span class="visually-hidden">Error: </span> <?=$errores['nombre']; ?></div>
                <?php
                endif;
                ?>
            </div>

            <div class="form-fila mb-3">
                <label for="nombre_autor">Nombre del autor</label>
                <input
                    type="text"
                    id="nombre_autor"
                    name="nombre_autor"
                    class="form-control"
                    value="<?= $dataForm['nombre_autor'] ?? $producto->getAutor(); ?>"
                >
                <?php
                if(isset($errores['nombre_autor'])):
                    ?>
                    <div class="text-danger" id="error-nombre_autor"><span class="visually-hidden">Error: </span> <?=$errores['nombre_autor']; ?></div>
                <?php
                endif;
                ?>
            </div>
            <div class="form-fila mb-3">
                <label for="apellido_autor">Apellido del autor</label>
                <input
                        type="text"
                        id="apellido_autor"
                        name="apellido_autor"
                        class="form-control"
                        value="<?= $dataForm['apellido_autor'] ?? null ?>"
                >
                <?php
                if(isset($errores['apellido_autor'])):
                    ?>
                    <div class="text-danger" id="error-apellido_autor"><span class="visually-hidden">Error: </span> <?=$errores['apellido_autor']; ?></div>
                <?php
                endif;
                ?>
            </div>
            <div class="form-fila mb-3">
                <label for="categoria_id_fk">Categoria</label>
                <select id="categoria_id_fk"
                        name="categoria_id_fk"
                        class="form-control"
                    <?php if(isset($errores['categoria_id_fk'])): ?> aria-describedby="error-categoria" <?php endif;?>
                >
                    <option value="1" selected>Economía y Finanzas</option>
                    <option value="2">Desarrollo Personal</option>
                    <option value="3">Tecnología e Informática</option>
                    <option value="4">Espiritualidad</option>
                    <option value="5">Ficción</option>
                </select>
                <?php
                if(isset($errores['categoria_id_fk'])):
                ?>
                <div class="text-danger" id="error-categoria"><span class="visually-hidden">Error: </span> <?=$errores['categoria_id_fk']; ?></div>
                <?php
                endif;
                ?>
            </div>
            <div class="form-fila mb-3">
                <label for="descripcion">Descripcion</label>
                <textarea
                    id="descripcion"
                    name="descripcion"
                    class="form-control"
                        <?php if(isset($errores['descripcion'])): ?> aria-describedby="error-descripcion" <?php endif; ?>
                ><?= $dataForm['descripcion'] ?? $producto->getDescripcion()?></textarea>
                <?php
                if(isset($errores['descripcion'])):
                    ?>
                    <div class="text-danger" id="error-descripcion"><span class="visually-hidden">Error: </span><?=$errores['descripcion']; ?></div>
                <?php
                endif;
                ?>
            </div>
            <div class="form-fila mb-3">
                <label for="precio">Precio</label>
                <input
                    type="text"
                    id="precio"
                    name="precio"
                    class="form-control"
                    value="<?= $dataForm['precio'] ?? $producto->getPrecio(); ?>"
                    <?php if(isset($errores['precio'])): ?> aria-describedby="error-precio" <?php endif;?>
                >
                <?php
                    if(isset($errores['precio'])):
                ?>
                    <div class="text-danger" id="error-precio"><span class="visually-hidden">Error: </span> <?=$errores['precio']; ?></div>
                <?php
                    endif;
                ?>

            </div>
        </div>

        <div class="w-50">
            <?php
            if(!empty($producto->getImagen()) && file_exists(__DIR__ . '/../../imgs/' . $producto->getImagen())){
            ?>
            <div class="form-fila d-flex flex-column align-items-center">
                <h2 class="fw-bold mb-3 h3">Imagen Actual</h2>
                <img src="<?= '../imgs/' . $producto->getImagen();?>" alt="<?= htmlspecialchars($producto->getImagenAlt(), ENT_QUOTES) ?>" class="">
            </div>
            <?php
            }else if(!empty($producto->getImagen()) && file_exists(__DIR__ . '/../../imgs/publicadas/' . $producto->getImagen())){
            ?>
            <div class="form-fila mt-5 ">
                <h2 class="fw-bold mb-3 h3">Imagen Actual</h2>
                <img src="<?= '../imgs/publicadas/' . $producto->getImagen();?>" alt="" class="">
            </div>
            <?php
            }
            ?>
            <div class="form-fila mb-5 mt-4 w-75 mx-auto">
                <label for="imagen">Imagen</label>
                <input
                    type="file"
                    id="imagen"
                    name="imagen"
                    class="form-control"
                >
            </div>

            <div class="form-fila">
                <label for="imagen_alt">Descripcion de la imagen</label>
                <input
                    type="text"
                    name="imagen_alt"
                    id="imagen_alt"
                    class="form-control"
                    value="<?= $dataForm['imagen_alt'] ?? $producto->getImagenAlt()?>">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary mb-5 mt-4 px-5 py-2">Actualizar</button>
            </div>
        </div>

    </form>
</section>
