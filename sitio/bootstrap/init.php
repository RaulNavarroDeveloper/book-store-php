<?php
require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/../vendor/autoload.php';

//SESIONES

session_start();

//ZONA HORARIA
date_default_timezone_set('America/Argentina/Buenos_Aires');

//CONSTANTES

const PATH_IMAGES = __DIR__ . '/../imgs';