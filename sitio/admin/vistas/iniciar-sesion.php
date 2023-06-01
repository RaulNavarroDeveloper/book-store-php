<?php
$dataForm = $_SESSION['data_form'] ?? [];
unset($_SESSION['data_form']);
?>
<section class="container">
    <h1 class="mb-1 mt-4">Ingresar al Panel de Administración</h1>

    <p class="mb- mt-3">Para ingresar es necesario iniciar sesión. Por favor, ingresá tus credenciales de acceso en el formulario.</p>

    <form action="../acciones/auth-iniciar-sesion.php" method="post">
        <div class="form-fila">
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control mt-1"
                value="<?= $dataForm['email'] ?? null;?>"
            >
        </div>
        <div class="form-fila mt-3">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control mt-1">
        </div>
        <button type="submit" class="btn btn-primary mt-4 mb-5">Ingresar</button>
    </form>
</section>
