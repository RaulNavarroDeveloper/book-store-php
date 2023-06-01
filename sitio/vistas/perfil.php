<?php
$usuario = (new \BookStore\Auth\Autenticacion())->getUsuario();
$pedidos = (new \BookStore\Modelos\Pedido());
?>
<h1 class="mt-3 ms-5">Tu perfil</h1>

<section class=" container d-flex justify-content-around contenedor-perfil mt-5 mb-5">
    <figure class="d-flex align-items-center mt-4">
    <img src="imgs/otros/user.png" alt="" class="">
    </figure>
    <div>
        <div class="d-flex justify-content-around mt-5">
            <h2 class="me-5">Nombre: <?=ucfirst( $usuario->getNombre())?></h2>
            <h2>Apellido: <?=ucfirst( $usuario->getApellido())?></h2>
        </div>
        <h4 class="mt-4">Email: <?= $usuario->getEmail()?></h4>
        <h4 class="mt-4">Cantidad de compras: <?= $pedidos->getPedidosByIdUsuario($usuario->getUsuarioId())?></h4>
    </div>

</section>