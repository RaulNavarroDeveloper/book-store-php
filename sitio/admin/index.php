<?php

require_once __DIR__ . '/../bootstrap/init.php';
$productos = (new \BookStore\Modelos\Producto())->info();

 $routes = [
     'dashboard' => [
         'title' => 'Dashboard',
         'requiereAuth' => true,
     ],
     'productos' => [
        'title' => 'Administración de Productos',
         'requiereAuth' => true,
     ],
     'producto-editar' => [
         'title' => 'Editar Productos',
         'requiereAuth' => true,
     ],
     '404' => [
         'title' => 'Página no encontrada',
     ],
     'nuevo-producto' => [
         'title' => 'Cargar Productos',
         'requiereAuth' => true,
     ],
];

 $vista = $_GET['s'] ?? 'dashboard';

 if(!isset($routes[$vista])){
     $vista = '404';
 }

 $rutaProp = $routes[$vista];

 $autenticacion = new \BookStore\Auth\Autenticacion();

$requiereAuth = $rutaProp['requiereAuth'] ?? false;

if($requiereAuth &&
    (!$autenticacion->estaAutenticado() || !$autenticacion->esAdmin())
){
    $_SESSION['mensaje_error'] = "Para acceder a esta pantalla se requiere estar autenticado.";
    header("Location: index.php?s=iniciar-sesion");
    exit;
}

 $mensajeExito = $_SESSION['mensaje_exito'] ?? null;
 $mensajeError = $_SESSION['mensaje_error'] ?? null;
// $datos = $_SESSION['data-form'] ?? null;

unset($_SESSION['mensaje_exito'], $_SESSION['mensaje_error']);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$rutaProp['title'];?> :: Panel de administracion de Entre Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://kit.fontawesome.com/ed0c580b93.js" crossorigin="anonymous"></script>
</head>
<body>


    <nav class="navbar navbar-expand-lg">

        <button class="btn btn-primary d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <i class="fa-solid fa-bars fs-5"></i>
        </button>

        <div class="offcanvas offcanvas-end d-md-none" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">Menú</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <?php
                if($autenticacion->estaAutenticado() && $autenticacion->esAdmin()){
                ?>
                <ul class="">
                    <li class="navbar-li"><a href="index.php?s=dashboard" class="text-body">Inicio</a></li>
                    <li class="navbar-li"><a href="index.php?s=productos" class="text-body">Productos</a></li>
                    <li class="navbar-li"><a href="../index.php?s=home" class="text-body">Sitio</a></li>
                    <li class="cerrar-sesion mt-3">
                        <form action="../acciones/auth-cerrar-sesion.php" method="post">
                            <button type="submit" class="btn"><?= $autenticacion->getUsuario()->getEmail()?> (Cerrar Sesión)</button>
                        </form>
                    </li>
                </ul>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="d-none d-md-flex">
            <?php
            if($autenticacion->estaAutenticado() && $autenticacion->esAdmin()){
            ?>
            <ul class="navbar-ul m-0">
                <li class="navbar-li"><a href="index.php?s=dashboard" class="">Inicio</a></li>
                <li class="navbar-li"><a href="index.php?s=productos" class="">Productos</a></li>
                <li class="navbar-li"><a href="../index.php?s=home" class="">Sitio</a></li>
                <li class="cerrar-sesion">
                    <form action="../acciones/auth-cerrar-sesion.php" method="post">
                        <button type="submit" class="btn"><?= $autenticacion->getUsuario()->getEmail()?> (Cerrar Sesión)</button>
                    </form>
                </li>
            </ul>
            <ul class="navbar-ul m-0">
                <li class="navbar-li"><i class="uil uil-user h3"></i></li>
<!--                <li class="navbar-li"><i class="uil uil-shopping-cart h3"></i></li>-->
            </ul>
            <?php
            }
            ?>
        </div>
    </nav>
    <main>
    <?php
    if($mensajeExito):
    ?>
    <div class="msg-exito mt-1 mb-3 animate__animated animate__fadeInDown"><p class="ms-3 mb-0"><?= $mensajeExito;?></p></div>
    <?php
    endif;
    ?>
    <?php
    if($mensajeError):
    ?>
        <div class="msg-error mt-1 mb-3 animate__animated animate__fadeInDown"><p class="ms-3 mb-0"><?= $mensajeError;?></div>
    <?php
    endif;
    ?>
    <?php
    $filename = __DIR__ . '/vistas/' . $vista . '.php';
    if(file_exists($filename)){
        require $filename;
    } else {
        require __DIR__ . '/vistas/404.php';
    }
    ?>
    </main>
    <footer class="footer d-flex flex-row justify-content-around <?php if($vista === 'dashboard'):?> fixed-bottom<?php endif;?>">
        <div class="mt-4 d-none d-md-block">
            <ul class="list-unstyled">
                <li><a class="text-decoration-none text-light" href="#">Inicio</a></li>
                <li><a class="text-decoration-none text-light" href="#">Categorias</a></li>
                <li><a class="text-decoration-none text-light" href="#">Más leídos</a></li>
                <li><a class="text-decoration-none text-light" href="index.php?s=contacto">Contacto</a></li>
            </ul>
        </div>
        <div class="mt-4">
            <h2 class="h4 text-light text-center">¡Siguenos en redes sociales!</h2>
            <ul class="ul-redes list-unstyled d-flex flex-row justify-content-center">
                <li class="me-3"><i class="fa-brands fa-instagram"><a href="" class="text-secondary"></a></i></li>
                <li class="me-3"><i class="fa-brands fa-twitter"><a href=""></a></i></li>
                <li class="me-3"><i class="fa-brands fa-facebook-f"><a href=""></a></i></li>
                <li class="me-3"><i class="fa-brands fa-pinterest-p"></i><a href=""></a></li>
            </ul>
        </div>
        <div class="mt-4">
            <ul class="list-unstyled">
                <li class="text-light">Raul Alfredo Navarro</li>
                <li class="text-light">Programacion II</li>
                <li class="text-light">Tercer Cuatrimestre</li>
                <li class="text-light">DWTB3</li>
            </ul>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
</html>
