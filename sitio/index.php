<?php

require_once __DIR__ . '/bootstrap/init.php';
$productos = (new BookStore\Modelos\Producto())->info();

 $routes = [
     'home' => [
         'title' => 'Inicio',
     ],
     'producto-detalle' => [
        'title' => `Producto`,
     ],
     'categorias' => [
         'title' => 'Categorías',
     ],
     'mas-leidos' => [
         'title' => 'Más leidos del mes',
     ],
     'contacto' => [
         'title' => 'Página de contacto',
     ],
     '404' => [
         'title' => 'Página no encontrada',
     ],
     'registro' => [
         'title' => 'Registro de usuarios',
     ],
     'iniciar-sesion' => [
         'title' => 'Iniciar Sesión en Bookstore',
     ],
     'perfil' => [
         'title' => 'Perfil de usuarios',
         'requiereAuth' => true,
     ],
     'ver-carrito' => [
             'title' => 'Tu carrito'
     ],
];

 $vista = $_GET['s'] ?? 'home';

 if(!isset($routes[$vista])){
     $vista = '404';
 }

 $rutaProp = $routes[$vista];

// PARTE DE AUTENTICACION

$autenticacion = new \Bookstore\Auth\Autenticacion();
$requiereAuth = $rutaProp['requiereAuth'] ?? null;
if($requiereAuth && !$autenticacion->estaAutenticado()){
    $_SESSION['mensaje_error'] = 'Debes iniciar sesión para ver esta pantalla';
    header("Location: index.php?s=iniciar-sesion");
    exit;
}

$mensajeExito = $_SESSION['mensaje_exito'] ?? null;
$mensajeError = $_SESSION['mensaje_error'] ?? null;
unset($_SESSION['mensaje_exito'], $_SESSION['mensaje_error']);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entre Libros :: <?= $rutaProp['title']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://kit.fontawesome.com/ed0c580b93.js" crossorigin="anonymous"></script>
</head>
<body>


    <nav class="navbar navbar-expand-lg d-md-flex justify-content-md-between align-items-md-center">
        <figure class="my-auto ms-1 ms-lg-3 me-auto">
            <img src="imgs/logo.png" alt="">
        </figure>

<!--        NAVEGACION  MOBILE-->
        <button class="btn btn-primary d-md-none me-3 order-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <i class="fa-solid fa-bars fs-5"></i>
        </button>

        <div class="offcanvas offcanvas-end d-md-none" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">Menú</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="p-0">
                    <li class="navbar-li"><a href="index.php?s=home" class="text-body">Inicio</a></li>
<!--                    <li class="navbar-li"><a href="index.php?s=categorias" class="text-body">Categorías</a></li>-->
<!--                    <li class="navbar-li"><a href="index.php?s=mas-leidos" class="text-body">Más leídos</a></li>-->
                    <li class="navbar-li"><a href="index.php?s=contacto" class="text-body">Contacto</a></li>
                    <!-- <li class="navbar-li"><a href="#"></a></li> -->
                </ul>
            </div>
        </div>

<!--        NAVEGACION DESKTOP-->
        <div class="d-flex">
            <ul class="navbar-ul m-0 d-none d-md-flex p-0">
                <li class="navbar-li"><a href="index.php?s=home">Inicio</a></li>
<!--                <li class="navbar-li"><a href="index.php?s=categorias">Categorías</a></li>-->
<!--                <li class="navbar-li"><a href="index.php?s=mas-leidos">Más leídos</a></li>-->
                <li class="navbar-li"><a href="index.php?s=contacto">Contacto</a></li>
                <?php
                if ($autenticacion->estaAutenticado() && $autenticacion->esAdmin()){
                ?>
                <li class="navbar-li"><a href="admin/index.php?s=dashboard">Dashboard</a></li>
                <?php
                }
                ?>
            </ul>
            <ul class="navbar-ul m-0 order-1 order-md-2 p-0">
                <li class="navbar-li d-flex">
                    <?php
                    if(!$autenticacion->estaAutenticado()){
                    ?>
                    <a href="index.php?s=iniciar-sesion">
                        <i class="uil uil-user h3"></i>
                        Ingresar
                    </a>
                </li>
                    <?php
                    } else {
                    ?>
                <li class="navbar-user">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="uil uil-user h3"></i>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item text-dark" href="index.php?s=perfil">Mi perfil</a></li>
<!--                            <li><a class="dropdown-item text-dark" href="#">Another action</a></li>-->
<!--                            <li><a class="dropdown-item text-dark" href="#">Something else here</a></li>-->
                        </ul>
                    </div>
                </li>

                <li class="navbar-li">
                    <form action="acciones/auth-cerrar-sesion.php" method="post">
                        <button type="submit" class="btn"><?=substr($autenticacion->getUsuario()->getEmail(), 0, 10) . '...'?> (Cerrar Sesión)</button>
                    </form>
                </li>
                <?php
                }
                ?>

                <li class="navbar-li">
                    <a href="index.php?s=ver-carrito"><i class="uil uil-shopping-cart h3"></i></a>
                </li>
            </ul>
        </div>
    </nav>

    <main>
    <?php
    if($mensajeExito):
    ?>
        <div class="msg-exito mt-1 mb-3 animate__animated animate__fadeInDown"><p class="ms-3 mb-0"><?= $mensajeExito?></p></div>
    <?php
    endif;
    ?>

    <?php
    if($mensajeError):
    ?>
        <div class="msg-error mt-1 mb-3 animate__animated animate__fadeInDown"><p class="ms-3 mb-0"><?= $mensajeError?></div>
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

    <footer class="footer d-flex flex-row justify-content-around">
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