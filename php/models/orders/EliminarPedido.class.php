<?php

namespace models\orders;

use \classes\Dbh;

class EliminarPedido extends Dbh
{
  protected function eliminarPedido(
    int $id
  )
  {
    $stmt = $this->conectar()->prepare('DELETE FROM pedido WHERE id = ?;');
    $this->ejecutarSentencia($stmt, array($id));
  }
}
