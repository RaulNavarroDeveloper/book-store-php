<header class="text-center mb-5 mt-3 fw-bold">
    <h1 class="fw-bold">Comencémos una Conversación</h1>
</header>

<div class="container mb-5">
    <div class="row">
    <h2 class="mb-4">¿De qué Manera podemos ayudarte?</h2>
        <div class="col-md-6">
            <div>
                <h3>¿Conóces libros que no tenemos?</h3>
                <p>Es posible que hayan libros que no estemos distribuyendo o que se queden sin stock. En este caso, haznoslo saber para poder llevar hacía ti esos libros que tanto disfrutas.</p>
            </div>

            <div>
                <h3>¿Te llego el producto con una falla?</h3>
                <p>Nosotros somos 100% cautelosos con nuestros productos y hacemos un embalaje resistente. Pero lamentablemente, no controlamos el proceso de envío ni lo que ocurre allí, por lo que si te llego un producto con falla, contactanos para cambiarlo.</p>
            </div>

            <div>
                <h3>¿Demora en el envío?</h3>
                <p>Si el envío esta demorando más de lo establecido, contáctanos para hacer un siguimiento y conocer la razón.</p>
            </div>

            <div>
                <h3>¿Fallo al realizar el pago de un producto?</h3>
                <p>En caso de tener fallas con un método de pago, escríbenos para poder resolverlo o encontrar una mejor opción.</p>
            </div>
        </div>

        <div class=" contenedor-form col-md-6">
            <form action="#" method="get" class="container">
                <div class="row">
                    <div class="d-flex flex-column col-md-6">
                        <label class="mb-2" for="nombre">Nombre:</label>
                        <input class="rounded-3" type="text" name="nombre" id="nombre" required>
                    </div>

                    <div class="d-flex flex-column col-md-6">
                        <label class="mb-2" for="apellido">Apellido:</label>
                        <input class="rounded-3" type="text" name="apellido" id="apellido" required>
                    </div>

                    <div class="d-flex flex-column col-md-6 mt-3">
                        <label class="mb-2" for="telefono">Telefono:</label>
                        <input class="rounded-3" type="number" name="telefono" id="telefono" required>
                    </div>

                    <div class="d-flex flex-column col-md-6 mt-3">
                        <label class="mb-2" for="asunto">Asunto:</label>
                        <select class="rounded-3" name="asunto" id="asunto">
                        <?php
                        for($num = 1; $num <= 5; $num++){
                            if ($num == 1){
                                $asunto = 'Libro no disponible';
                            } else if($num == 2){
                                $asunto = 'Producto con falla';
                                $verFalla = true;
                            } else if ($num == 3) {
                                $asunto = 'Demora en el envío';
                            } else if($num == 4){
                                $asunto = 'Falla con método de pago';
                            } else if($num == 5) {
                                $asunto = 'Otro';
                            }
                        ?>
                        <option value="<?=$num?>"><?=$asunto?></option>
                        <?php
                        }
                        ?>
                        </select>
                    </div>

                    <div class="d-flex flex-column col-md-12 align-items-center mt-5">
                        <label class="mb-2" for="consulta">Consulta:</label>
                        <textarea class="w-75 rounded-3"  name="consulta" id="consulta" cols="20" rows="7"></textarea>
                    </div>


                    <div class="d-flex justify-content-center mt-5">
                        <button class="px-3 py-1 rounded-3" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>