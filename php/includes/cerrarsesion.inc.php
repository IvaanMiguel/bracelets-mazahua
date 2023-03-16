<?php
require_once 'autoloader.inc.php';

session_start();
session_unset();
session_destroy();

echo (new Respuesta(Respuesta::URL, 'inicio-sesion.php'))->Json();
