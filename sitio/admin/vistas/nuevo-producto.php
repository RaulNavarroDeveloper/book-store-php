<?php
$errores = $_SESSION['errores'] ?? [];
$dataForm = $_SESSION['data_form'] ?? [];
unset($_SESSION['errores'], $_SESSION['data_form']);
?>
<section class="container">
    <h1 class="mb-5">Publicar un nuevo Producto</h1>

    <form action="acciones/productos-publicar.php" method="POST" enctype="multipart/form-data">
        <div class="form-fila mb-3">
            <label for="nombre">Nombre</label>
            <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    class="form-control"
                    placeholder="Ingresa 5 carácteres por lo menos"
                    value="<?= $dataForm['nombre'] ?? null; ?>"
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
            <label for="nombre_autor">Nombre del Autor</label>
            <input
                    type="text"
                    id="nombre_autor"
                    name="nombre_autor"
                    class="form-control"
                    value="<?= $dataForm['nombre_autor'] ?? null; ?>"
            >
            <?php
            if(isset($errores['nombre_autor'])):
                ?>
                <div class="text-danger" id="error-nombre-autor"><span class="visually-hidden">Error: </span> <?=$errores['nombre_autor']; ?></div>
            <?php
            endif;
            ?>
        </div>
        <div class="form-fila mb-3">
            <label for="apellido_autor">Apellido del Autor</label>
            <input
                    type="text"
                    id="apellido_autor"
                    name="apellido_autor"
                    class="form-control"
                    value="<?= $dataForm['apellido_autor'] ?? null; ?>"
            >
            <?php
            if(isset($errores['apellido_autor'])):
                ?>
                <div class="text-danger" id="error-apellido-autor"><span class="visually-hidden">Error: </span> <?=$errores['apellido_autor']; ?></div>
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
                    placeholder="Ingresa 25 carácteres como mínimo"
                    <?php if(isset($errores['descripcion'])): ?> aria-describedby="error-descripcion" <?php endif; ?>
            ><?= $dataForm['descripcion'] ?? null; ?></textarea>
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
                    value="<?= $dataForm['precio'] ?? null; ?>"
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
        <div class="form-fila mb-5">
            <label for="imagen">Imágen</label>
            <input
                    type="file"
                    id="imagen"
                    name="imagen"
                    class="form-control"
            >
        </div>

        <div class="form-fila">
            <label for="imagen_alt">Descripcion de la imagen:</label>
            <input
                    type="text"
                    name="imagen_alt"
                    id="imagen_alt"
                    class="form-control"
                    value="<?= $dataForm['imagen_alt'] ?? null ?>"
            >
        </div>

        <button type="submit" class="btn btn-primary mb-5">Publicar</button>
    </form>
</section>

