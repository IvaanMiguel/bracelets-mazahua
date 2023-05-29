<?php

use controllers\orders\AgregarProductos;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idPedido = htmlspecialchars($_POST['idPedido'], ENT_QUOTES, 'UTF-8');
  $productos = json_decode($_POST['productos'], true);

  $pedido = new AgregarProductos($idPedido, $productos);
  $pedido->agregarProductosNuevos();
}
