<?php

use \controllers\orders\EliminarPedido;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');

  $pedido = new EliminarPedido($id);
  $pedido->removerPedido();
}
