<?php

use \controllers\orders\RemoverProducto;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idPedido = htmlspecialchars($_POST['idPedido'], ENT_QUOTES, 'UTF-8');
  $idProducto = htmlspecialchars($_POST['idProducto'], ENT_QUOTES, 'UTF-8');

  $pedido = new RemoverProducto($idPedido, $idProducto);
  $pedido->removerProductoPedido();
}
