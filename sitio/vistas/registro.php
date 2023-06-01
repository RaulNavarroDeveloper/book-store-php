<?php
$errores = $_SESSION['errores'] ?? [];
$dataForm = $_SESSION['data_form'] ?? [];

unset($_SESSION['errores'], $_SESSION['data_form']);

$autenticacion = new \BookStore\Auth\Autenticacion();
?>
<section class="container">
    <?php
    if(!$autenticacion->estaAutenticado()){
    ?>
    <h1 class="mt-4">Registrarse</h1>

    <form action="acciones/auth-registro.php" method="post">
        <div class="form-fila">
            <label for="nombre">Nombre</label>
            <input
                    type="nombre"
                    id="nombre"
                    name="nombre"
                    class="form-control"
                    value="<?= $dataForm['nombre'] ?? '';?>"
            >
            <?php
            if(isset($errores['nombre'])):
                ?>
                <div class="text-danger" id="error-nombre"><span class="visually-hidden">Error: </span> <?=$errores['nombre']; ?></div>
            <?php
            endif;
            ?>
        </div>
        <div class="form-fila mt-2">
            <label for="apellido">Apellido</label>
            <input
                    type="apellido"
                    id="apellido"
                    name="apellido"
                    class="form-control"
                    value="<?= $dataForm['apellido'] ?? '';?>"
            >
            <?php
            if(isset($errores['apellido'])):
                ?>
                <div class="text-danger" id="error-apellido"><span class="visually-hidden">Error: </span> <?=$errores['apellido']; ?></div>
            <?php
            endif;
            ?>
        </div>
        <div class="form-fila mt-2">
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                value="<?= $dataForm['email'] ?? '';?>"
            >
            <?php
            if(isset($errores['email'])):
                ?>
                <div class="text-danger" id="error-email"><span class="visually-hidden">Error: </span> <?=$errores['email']; ?></div>
            <?php
            endif;
            ?>
        </div>
        <div class="form-fila mt-2">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Debe tener al menos 8 caracteres">
            <?php
            if(isset($errores['password'])):
                ?>
                <div class="text-danger" id="error-password"><span class="visually-hidden">Error: </span> <?=$errores['password']; ?></div>
            <?php
            endif;
            ?>
        </div>
        <div class="form-fila mt-2">
            <label for="password_confirmar">Confirmar Password</label>
            <input type="password" id="password_confirmar" name="password_confirmar" class="form-control">
            <?php
            if(isset($errores['password_confirmar'])):
                ?>
                <div class="text-danger" id="error-password-confirmar"><span class="visually-hidden">Error: </span> <?=$errores['password_confirmar']; ?></div>
            <?php
            endif;
            ?>
        </div>
        <button type="submit" class="btn btn-primary mb-5 mt-4">Crear cuenta</button>
    </form>
    <?php
    } else {
        $_SESSION['mensaje_error'] = 'Actualmente tienes unas sesión iniciada. Cierra esta sesión para crear una nueva cuenta.';
        header("Location: index.php?s=home");
        exit;
    }
    ?>
</section>