<?php

require_once __DIR__ .'/../bootstrap/init.php';

(new \BookStore\Auth\Autenticacion())->cerrarSesion();

$_SESSION['mensaje_exito'] = 'Sesión cerrada exitosamente';
header("Location: ../index.php?s=iniciar-sesion");
exit;