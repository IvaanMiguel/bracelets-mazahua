<?php

namespace models\orders;

use \classes\Dbh;
use \classes\Respuesta;

class MostrarPedido extends Dbh
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

  protected function obtenerPedidosPendientesLista(): array|false
  {
    $stmt = $this->conectar()->prepare('SELECT * FROM vwpedidospendienteslista;');
    $this->ejecutarSentencia($stmt);

    return $stmt->fetchAll();
  }

  protected function obtnerPedidoPendiente(int $id)
  {
    $stmt = $this->conectar()->prepare('SELECT * FROM vwpedidoinfo WHERE id = ?;');
    $this->ejecutarSentencia($stmt, array($id));

    return $stmt->fetchAll();
  }
}
