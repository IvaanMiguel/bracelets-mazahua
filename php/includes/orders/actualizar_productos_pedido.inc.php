<?php

use \controllers\orders\ActualizarProductos;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idPedido = htmlspecialchars($_POST['idPedido'], ENT_QUOTES, 'UTF-8');
  $productosModificados = json_decode($_POST['productosModificados'], true);

  $pedido = new ActualizarProductos($idPedido, $productosModificados);
  $pedido->modificarProductos();
}
