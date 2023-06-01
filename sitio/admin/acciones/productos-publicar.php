<?php
use Intervention\Image\ImageManagerStatic as Image;
require_once __DIR__ . '/../../bootstrap/init.php';

$autenticacion = new \BookStore\Auth\Autenticacion();

if(!$autenticacion->estaAutenticado() && $autenticacion->esAdmin()) {
    $_SESSION['mensaje_error'] = "Necesitas estar autenticado como usuario administrador para realizar esta acción.";
    header("Location: ../index.php?s=iniciar-sesion");
    exit;
}

$nombre             = $_POST['nombre'];
$autorNombre        = $_POST['nombre_autor'];
$autorApellido      = $_POST['apellido_autor'];
$categoria_id_fk    = $_POST['categoria_id_fk'];
$precio             = $_POST['precio'];
$oferta             = intval($precio) * 0.9;
$imagen             = $_FILES['imagen'];
$imagen_preview     = $_FILES['imagen'];
$imagenAlt          = $_POST['imagen_alt'];
$descripcion        = $_POST['descripcion'];

$validador = new \BookStore\Validacion\ProductoValidar([
    'nombre' => $nombre,
    'nombre_autor' => $autorNombre,
    'apellido_autor' => $autorApellido,
    'categoria_id_fk' => $categoria_id_fk,
    'precio' => $precio,
    'imagen' => $imagen,
    'imagen_preview' => $imagen_preview,
    'imagen_alt'     => $imagenAlt,
    'descripcion' => $descripcion,
]);

if($validador->hayErrores()) {
    $_SESSION['errores'] = $validador->getErrores();
    $_SESSION['data_form'] = $_POST;

    header ("Location: ../index.php?s=nuevo-producto");
    exit;
}

 if(!empty($imagen['tmp_name'])){
     $nombreImagen = date( 'YmdHis_') . $imagen['name'];
     $nombreImagenPreview = date('YmdHis_') . 'preview_' . $imagen_preview['name'];

     echo $nombreImagen . ' | y preview: ' . $nombreImagenPreview;

     $imagenPreview = Image::make($imagen_preview['tmp_name']);

     $imagenPreview->fit(143, 219)
         ->save(PATH_IMAGES . '/img-preview/' . $nombreImagenPreview);

     move_uploaded_file($imagen['tmp_name'], __DIR__ . '/../../imgs/publicadas/' . $nombreImagen);
//     move_uploaded_file($imagen_preview['tmp_name'], __DIR__ . '/../../imgs/img-preview/nuevas-publicaciones/' . $nombreImagenPreview);


 }

//    'fecha_publicacion' => date('Y-m-d H:i:s'),

try{
(new \BookStore\Modelos\Producto())->crear([
    'usuario_id_fk' => $autenticacion->getId(),
    'nombre' => $nombre,
    'nombre_autor' => $autorNombre,
    'apellido_autor' => $autorApellido,
    'categoria_id_fk' => $categoria_id_fk,
    'precio' => $precio,
    'oferta' => $oferta,
    'imagen' => $nombreImagen ?? null,
    'imagen_preview' => $nombreImagenPreview,
    'imagen_alt'     => $imagenAlt,
    'descripcion' => $descripcion,
]);

$_SESSION['mensaje_exito'] = 'El producto ' ."<b>" . $nombre ."</b>" . ' fue cargado con éxito';

header("Location: ../index.php?s=productos");
exit;

} catch(Exception $e) {
    echo $e->getMessage();
    $_SESSION['mensaje_error'] = 'Ocurrió un error inesperado al intentar publicar el producto. Intentelo más tarde.';
    $_SESSION['data-form'] = $_POST;

    header ("Location: ../index.php?s=nuevo-producto");
    exit;
}
?>