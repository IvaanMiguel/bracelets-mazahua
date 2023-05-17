<?php

use \controllers\Ubicacion;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $callePrincipal = htmlspecialchars($_POST['callePrincipal'], ENT_QUOTES, 'UTF-8');
  $callesAdyacentes = htmlspecialchars($_POST['callesAdyacentes'], ENT_QUOTES, 'UTF-8');
  $colonia = htmlspecialchars($_POST['colonia'], ENT_QUOTES, 'UTF-8');
  $numeroExterior = htmlspecialchars($_POST['numeroExterior'], ENT_QUOTES, 'UTF-8');
  $numeroInterior = htmlspecialchars($_POST['numeroInterior'], ENT_QUOTES, 'UTF-8');
  $cp = htmlspecialchars($_POST['cp'], ENT_QUOTES, 'UTF-8');
  $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');

  $ubicacion = Ubicacion::editarUbicacionConstructor(
    $callePrincipal,
    $callesAdyacentes,
    $colonia,
    $numeroExterior,
    $numeroInterior,
    $cp,
    $id
  );
  $ubicacion->modificarUbicacion();
}
