<?php

use \classes\Respuesta;

require_once dirname(__DIR__) . '/constantes.php';
require_once AUTOLOADER;

session_start();
session_unset();
session_destroy();

echo (new Respuesta(Respuesta::STATUS_EXITO, Respuesta::URL, URL_INICIAR_SESION))->Json();
