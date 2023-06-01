<?php
require_once __DIR__ . '/../../bootstrap/init.php';

$email = $_POST['email'];
$password = $_POST['password'];

$autenticacion = new \BookStore\Auth\Autenticacion();

if($autenticacion->iniciarSesion($email, $password)) {
    $_SESSION['mensaje_exito'] = "Sesión iniciada correctamente.";
    header("Location: ../index.php?s=dashboard");
    exit;
} else {
    $_SESSION['mensaje_error'] = "Las credenciales ingresadas no coinciden con ninguno de nuestros registros. Intentalo Nuevamente.";
    $_SESSION['data_form'] = $_POST;
    header("Location: ../index.php?s=iniciar-sesion");
    exit;
}