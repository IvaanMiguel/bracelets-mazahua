<?php

namespace models\orders;

use \classes\Dbh;

class RemoverProducto extends Dbh
{
  protected function eliminarProductoPedido(
    int $idPedido,
    int $idProducto
  )
  {
    $stmt = $this->conectar()->prepare('DELETE FROM pedidoproducto WHERE idPedido = ? AND idProducto = ?;');
    $this->ejecutarSentencia($stmt, array($idPedido, $idProducto));
  }

  protected function productoUnico(
    int $idPedido
  )
  {
    $stmt = $this->conectar()->prepare('SELECT * FROM pedidoproducto WHERE idPedido = ?;');
    $this->ejecutarSentencia($stmt, array($idPedido));

    return count($stmt->fetchAll()) <= 1;
  }
}
