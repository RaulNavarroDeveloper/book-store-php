<?php
use Intervention\Image\ImageManagerStatic as Image;
require_once __DIR__ . '/../../bootstrap/init.php';

$autenticacion = new \BookStore\Auth\Autenticacion();

if(!$autenticacion->estaAutenticado() && $autenticacion->esAdmin()) {
    $_SESSION['mensaje_error'] = "Necesitas estar autenticado como usuario administrador para realizar esta acción.";
    header("Location: ../index.php?s=iniciar-sesion");
    exit;
}

$id                 = $_POST['id'];
$nombre             = $_POST['nombre'];
$autorNombre        = $_POST['nombre_autor'];
$autorApellido      = $_POST['apellido_autor'];
$categoria_id_fk    = $_POST['categoria_id_fk'];
$precio             = $_POST['precio'];
$oferta             = intval($precio) * 0.9;
$imagen             = $_FILES['imagen'];
$imagen_preview     = $_FILES['imagen'];
$imagen_alt         = $_POST['imagen_alt'];
$descripcion        = $_POST['descripcion'];

$producto = (new \BookStore\Modelos\Producto())->buscarPorId($id);

if(!$producto) {
    $_SESSION['mensaje_error'] = "Oops! El producto que estas tratando de editar no parece existir.";
    header("Location: ../index.php?s=producto-editar&id=" . $id);
    exit;
}


$validador = new \BookStore\Validacion\ProductoValidar([
    'nombre' => $nombre,
    'nombre_autor' => $autorNombre,
    'apellido_autor' => $autorApellido,
    'categoria_id_fk' => $categoria_id_fk,
    'precio' => $precio,
    'imagen' => $imagen,
    'imagen_preview' => $imagen_preview,
    'imagen_alt'     => $imagen_alt,
    'descripcion' => $descripcion,
]);

if($validador->hayErrores()) {
    $_SESSION['errores'] = $validador->getErrores();
    $_SESSION['data_form'] = $_POST;

    header ("Location: ../index.php?s=producto-editar&id=" . $id);
    exit;
}

if(!empty($imagen['tmp_name'])){
    $nombreImagen = date( 'YmdHis_') . $imagen['name'];
    $nombreImagenPreview = date('YmdHis_') . 'preview_' . $imagen_preview['name'];


    $imagenPreview = Image::make($imagen_preview['tmp_name']);

    $imagenPreview->fit(143, 219)
        ->save(PATH_IMAGES . '/img-preview/' . $nombreImagenPreview);

    move_uploaded_file($imagen['tmp_name'], __DIR__ . '/../../imgs/publicadas/' . $nombreImagen);
//     move_uploaded_file($imagen_preview['tmp_name'], __DIR__ . '/../../imgs/img-preview/nuevas-publicaciones/' . $nombreImagenPreview);


}

//    'fecha_publicacion' => date('Y-m-d H:i:s'),

try{
    $producto->editar([
        'usuario_id_fk' => 1,  //TODO: Reemplazar al tener el login
        'nombre' => $nombre,
        'nombre_autor' => $autorNombre,
        'apellido_autor' => $autorApellido,
        'categoria_id_fk' => $categoria_id_fk,
        'precio' => $precio,
        'oferta' => $oferta,
        'imagen' => $nombreImagen ?? $producto->getImagen(),
        'imagen_preview' => $nombreImagenPreview ?? $producto->getImagenPreview(),
        'imagen_alt'     => $imagen_alt,
        'descripcion' => $descripcion,
    ]);

    if(
        !empty($nombreImagen) &&
        !empty($producto->getImagen()) &&
        file_exists(__DIR__ . '/../../imgs/publicadas/' . $producto->getImagen())
    ) {
        unlink(__DIR__ . '/../../imgs/publicadas/' . $producto->getImagen());
    }

    $_SESSION['mensaje_exito'] = 'El producto ' ."<b>" . $nombre ."</b>" . ' se editó exitosamente';

    header("Location: ../index.php?s=productos");
    exit;

} catch(Exception $e) {
    echo $e->getMessage();
    $_SESSION['mensaje_error'] = 'Ocurrió un error inesperado al intentar editar el producto. Intentelo más tarde.';
    $_SESSION['data-form'] = $_POST;


    header ("Location: ../index.php?s=producto-editar&id=" .$id);
    exit;
}
?>