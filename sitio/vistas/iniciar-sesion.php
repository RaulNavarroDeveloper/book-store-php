<?php
$errores = $_SESSION['errores'] ?? [];
$dataForm = $_SESSION['data_form'] ?? [];
unset($_SESSION['errores'], $_SESSION['data_form']);
?>
<section class="container">
    <h1 class="mb-1 mt-4">Ingresar al Panel de Administración</h1>

    <p class="mb- mt-3">Para ingresar es necesario iniciar sesión. Por favor, ingresá tus credenciales de acceso en el formulario.</p>

    <form action="acciones/auth-iniciar-sesion.php" method="post">
        <div class="form-fila">
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control mt-1"
                value="<?= $dataForm['email'] ?? null;?>"
            >
            <?php
            if(isset($errores['email'])):
            ?>
                <div class="text-danger" id="error-email"><span class="visually-hidden">Error: </span> <?=$errores['email']; ?></div>
            <?php
            endif;
            ?>
        </div>
        <div class="form-fila mt-3">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control mt-1">
            <?php
            if(isset($errores['password'])):
                ?>
                <div class="text-danger" id="error-password"><span class="visually-hidden">Error: </span> <?=$errores['password']; ?></div>
            <?php
            endif;
            ?>
        </div>
        <button type="submit" class="btn btn-accion mt-4 mb-5">Ingresar</button>
    </form>

    <div class="m-auto">
        <p>¿Aún no creaste una cuenta? <a href="index.php?s=registro">Haz click aquí para registrarte</a></p>
    </div>
</section>