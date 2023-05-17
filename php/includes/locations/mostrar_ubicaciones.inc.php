<?php

use \controllers\Ubicacion;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idCliente = htmlspecialchars($_POST['idCliente'], ENT_QUOTES, 'UTF-8');

  $ubicacion = Ubicacion::idClienteConstructor($idCliente);
  $ubicacion->mostrarUbicaciones();
}
