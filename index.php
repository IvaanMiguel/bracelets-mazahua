<?php

use \controllers\Principal;
use \classes\Enrutador;

require_once __DIR__ . '/php/constantes.php';
require_once AUTOLOADER;

$enrutador = new Enrutador();

$enrutador->agregarRuta(URL_PRINCIPAL, function() { Principal::inicio(); });
$enrutador->agregarRuta(URL_REGISTRARSE, REGISTRARSE);
$enrutador->agregarRuta(URL_INICIAR_SESION, INICIAR_SESION);

$url = parse_url($_SERVER['REQUEST_URI'])['path'];
$enrutador->enrutar($url);
