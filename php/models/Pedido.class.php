<?php

namespace models;

use \classes\Dbh;
use \classes\Respuesta;

class Pedido extends Dbh
{
  protected function seleccionarPedidosPendientes(): bool|string
  {
    $stmt = $this->conectar()->prepare('SELECT * FROM vwPedidosPendientes;');
    $this->ejecutarSentencia($stmt);
    $tuplas = $stmt->fetchAll();

    if (count($tuplas) <= 0) {
      return (new Respuesta(Respuesta::STATUS_EXITO, Respuesta::MENSAJE, 'Sin pedidos pendientes'))->Json();
    }

    return (new Respuesta(Respuesta::STATUS_EXITO, Respuesta::ARRAY, $tuplas))->Json();
  }
}
