<?php
use BookStore\Modelos\Usuario;

require_once __DIR__ . '/../bootstrap/init.php';

$nombre             = $_POST['nombre'];
$apellido           = $_POST['apellido'];
$email              = $_POST['email'];
$password           = $_POST['password'];
$password_confirmar = $_POST['password_confirmar'];

$validar = new BookStore\Validacion\DatosUsuarioValidar([
    'nombre' => $nombre,
    'apellido' => $apellido,
    'email' => $email,
    'password' => $password,
    'password_confirmar' => $password_confirmar,
]);

if($validar->HayErrores()){
    $_SESSION['errores'] = $validar->getErrores();
    $_SESSION['data_form'] = $_POST;
    header("Location: ../index.php?s=registro");
    exit;
}

try {
    (new Usuario())->crear([
        'nombre'    => $nombre,
        'apellido'  => $apellido,
        'email'     => $email,
        'password'  => password_hash($password, PASSWORD_DEFAULT),
        'rol_fk_id' => 2,
    ]);

    $_SESSION['mensaje_exito'] = "Tu cuenta se creó satisfactoriamente";
    header("Location: ../index.php?s=iniciar-sesion");
    exit;
} catch (Exception $e){
    $_SESSION['mensaje_error'] = "Un error ocurrió al crear tu cuenta. Intentalo nuevamente";
    header("Location: ../index.php?s=registro");
    exit;
}