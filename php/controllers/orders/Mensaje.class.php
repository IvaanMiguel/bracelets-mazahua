<?php

namespace controllers\orders;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

class Mensaje
{
  const PEDIDO_REGISTRADO = [
    'titulo' => 'Nuevo pedido registrado',
    'mensaje' => 'El pedido ha sido registrado con éxito.',
    'ambito' => 'notificacion'
  ];
}
