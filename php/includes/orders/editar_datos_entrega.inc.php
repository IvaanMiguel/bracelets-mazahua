<?php

use \controllers\orders\EditarDatosEntrega;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
  $tipoEntrega = htmlspecialchars($_POST['tipoEntrega'], ENT_QUOTES, 'UTF-8');
  $fechaEntrega = htmlspecialchars($_POST['fechaEntrega'], ENT_QUOTES, 'UTF-8');
  $horaEntrega = htmlspecialchars($_POST['horaEntrega'], ENT_QUOTES, 'UTF-8');
  $idUbicacion = $_POST['idUbicacion'] ?? null;
  $aplicacion = $_POST['aplicacion'] ?? null;

  $editarPedido = new EditarDatosEntrega(
    $id,
    $tipoEntrega,
    $fechaEntrega,
    $horaEntrega,
    $idUbicacion,
    $aplicacion
  );
  $editarPedido->modificarDatosEntrega();
}