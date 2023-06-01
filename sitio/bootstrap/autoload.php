<?php
spl_autoload_register(function ($class) {
//     echo 'la clase es: ' . $class . "<br>";
    $class = substr($class, 9);
    $filename = __DIR__ . '/../classes/' . $class . '.php';

    if(file_exists($filename)){
        require_once $filename;
    }
//    echo 'tratando de incluir la ruta: ' . $filename;


    $filename = str_replace('\\', DIRECTORY_SEPARATOR, $filename);
    $filename = str_replace('/', DIRECTORY_SEPARATOR, $filename);
});
?>