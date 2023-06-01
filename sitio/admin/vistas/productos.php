<?php
$productos = (new \BookStore\Modelos\Producto())->info();
?>
<section class="container">
    <h1 class="mb-1 mt-3">Administrar productos</h1>
    
    <div class="mb-1">
        <a class="btn btn-primary mt-2 mb-3" href="index.php?s=nuevo-producto">Añadir nuevo producto</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <!--<th>Fecha de publicacion</th>-->
                <th>Nombre</th>
                <th>Autor</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($productos as $producto){
        ?>
            <tr>
                <td><?=$producto->getProductoId()?></td>
                <td><?=$producto->getNombre()?></td>
                <td><?=$producto->getAutor()?></td>
                <td><?=$producto->getCategoriaNombre()?></td>
                <td><?=$producto->getPrecio()?></td>
                <td><?=$producto->DescripcionAdministracion($producto->getProductoId())?></td>
                <td><img src="<?= '../imgs/img-preview/' . $producto->getImagenPreview()?>" alt="<?=htmlspecialchars($producto->getImagenAlt(), ENT_QUOTES)?>"></td>
                <td>
                    <a href="index.php?s=producto-editar&id=<?= $producto->getProductoId();?>" class="btn btn-primary mb-4 mt-2">Editar</a>
                    <form action="acciones/productos-eliminar.php" method="post" class="eliminar-productos">
                        <input type="hidden" name="id" value="<?= $producto->getProductoId()?>">
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                </td>


            </tr>
        </tbody>
        <?php
        }
        ?>
    </table>
</section>

<script>
    let eliminar = document.querySelectorAll('.eliminar-productos');
    	eliminar.forEach(form => {
    		form.addEventListener('submit', function(e) {
    			const confirmacion = confirm('¿Realmente querés eliminar este producto? Es una acción irreversible.');
    			if(!confirmacion) {
    				e.preventDefault();
    			}
    		});
    	});
</script>

