<?php
$filename = __DIR__ . '../data/items.json';
$jsonContent = file_get_contents($filename);
$content = json_decode($jsonContent, true);

        foreach($content as $item){
            echo "(" . $item['producto_id'] . ", " . "'" . $item['nombre'] . "'"  . ", " . "'" . $item['autor'] . "'"  . ", " . $item['oferta'] . ", " . $item['precio'] . ", " . "'" . $item['imagen'] . "'"  . ", "  . "'"  . $item['imagen_preview'] . "'"  . ", "  . "'" . $item['imagen_alt'] . "'"  . ", " . $item['calificacion'] . ", "  . "'"  . $item['descripcion'] . "'"  . ")" . "," ."<br>";
        }

?>