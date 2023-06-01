<?php
require_once __DIR__ . '/../bootstrap/init.php';
use BookStore\Modelos\Usuario;

$email = $_POST['email'];
$password = $_POST['password'];
$usuario = new Usuario();

$autenticacion = new \BookStore\Auth\Autenticacion();

if(!$autenticacion->iniciarSesion($email, $password)) {
    $_SESSION['mensaje_error'] = 'Los datos ingresados no coinciden';
    $_SESSION['data_form'] = $_POST;

    $validar = new BookStore\Validacion\DatosUsuarioValidar([
        'email' => $email,
        'password' => $password,
    ]);

    if($validar->HayErrores()){
        $_SESSION['errores'] = $validar->getErrores();
        $_SESSION['data_form'] = $_POST;
        header("Location: ../index.php?s=iniciar-sesion");
        exit;
    }

    header("Location: ../index.php?s=iniciar-sesion");
    exit;
}
$_SESSION['mensaje_exito'] = 'Iniciaste sesión correctamente, ahora navegas desde ' . "<b>" . $email . "</b>";
header($usuario->traerPorEmail($email)->getRolFkId() == 1 ? "Location: ../admin/index.php?s=dashboard" : "Location: ../index.php?s=home");
exit;




