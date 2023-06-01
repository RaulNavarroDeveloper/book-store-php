<?php
require_once __DIR__ . '/../../bootstrap/init.php';
$id = $_POST['id'];

$autenticacion = new \BookStore\Auth\Autenticacion();

if(!$autenticacion->estaAutenticado() && $autenticacion->esAdmin()) {
    $_SESSION['mensaje_error'] = "Necesitas estar autenticado como usuario administrador para realizar esta acción.";
    header("Location: ../index.php?s=iniciar-sesion");
    exit;
}

$producto = (new \BookStore\Modelos\Producto())->buscarPorId($id);

echo "<pre>";
print_r($producto);
echo "</pre>";

if(!$producto){
    $_SESSION['mensaje_error'] = 'Oops! Al parecer el producto que estas intentando eliminar no existe.';
    header("Location: ../index.php?s=productos");
    exit;
}

try {
    $producto->eliminar();

    if(!empty($producto->getImagen()) && file_exists(__DIR__ . '/../../imgs/publicadas/' . $producto->getImagen())) {
        unlink(__DIR__ . '/../../imgs/publicadas/' . $producto->getImagen());
    } else if (!empty($producto->getImagenPreview()) && file_exists(__DIR__ . '/../../imgs/img-preview/' . $producto->getImagenPreview())) {
        unlink(__DIR__ . '/../../imgs/img-preview/' . $producto->getImagenPreview());
    }


    $_SESSION['mensaje_exito'] = "El producto <b>" . $producto->getNombre() . "</b> fue eliminado con éxito.";
    header("Location: ../index.php?s=productos");
    exit;
} catch (Exception $e){
    $_SESSION['mensaje_error'] = "Ocurrió un error inesperado al tratar de eliminar la noticia.";
    header("Location: ../index.php?s=productos");
    exit;
}