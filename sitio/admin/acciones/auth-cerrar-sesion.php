<?php
require_once __DIR__ . '/../../bootstrap/init.php';

$autenticacion = new \BookStore\Auth\Autenticacion();
$autenticacion->cerrarSesion();

$_SESSION['mensaje_exito'] = "La sesión se cerró correctamente.";
header("Location: ../index.php?s=iniciar-sesion");
