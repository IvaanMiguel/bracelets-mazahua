<?php

use \controllers\IniciarSesion;

require_once dirname(__DIR__) . '/constantes.php';
require_once AUTOLOADER;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idUsuario = htmlspecialchars($_POST['idUsuario'], ENT_QUOTES, 'UTF-8');
  $clave = htmlspecialchars($_POST['clave'], ENT_QUOTES, 'UTF-8');

  $inicioSesion = new IniciarSesion($idUsuario, $clave);
  $inicioSesion->iniciarSesion();
}
