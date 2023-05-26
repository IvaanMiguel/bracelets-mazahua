<?php

use \controllers\orders\EditarDatosDestinatario;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
  $nombrDestinatario = htmlspecialchars($_POST['nombreDestinatario'], ENT_QUOTES, 'UTF-8');
  $celularDestinatario = htmlspecialchars($_POST['celularDestinatario'], ENT_QUOTES, 'UTF-8');

  $pedido = new EditarDatosDestinatario($id, $nombrDestinatario, $celularDestinatario);
  $pedido->modificarDatosDestinatario();
}
