<?php

use \controllers\Ubicacion;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
  $idCliente = htmlspecialchars($_POST['idCliente'], ENT_QUOTES, 'UTF-8');

  $ubicacion = Ubicacion::eliminarUbicacionConstructor($id, $idCliente);
  $ubicacion->removerUbicacion();
}
