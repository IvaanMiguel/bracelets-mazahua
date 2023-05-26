<?php

namespace models\orders;

use \PDO;
use \classes\Dbh;

class EditarDatosDestinatario extends Dbh
{
  protected function actualizarDatosDestinatario(
    int $id,
    string $nombreDestinatario,
    string $celularDestinatario
  )
  {
    $idEntrega = $this->obtenerIdEntrega($id);

    $stmt = $this->conectar()->prepare(
      'UPDATE entrega SET
        nombreDestinatario = ?,
        telefonoDestinatario = ?
      WHERE id = ?;'
    );
    $this->ejecutarSentencia($stmt, array($nombreDestinatario, $celularDestinatario, $idEntrega));

    return $stmt->fetchAll();
  }

  private function obtenerIdEntrega(
    int $id
  )
  {
    $stmt = $this->conectar()->prepare('SELECT idEntrega FROM pedido WHERE id = ?;');
    $this->ejecutarSentencia($stmt, array($id));

    return $stmt->fetch(PDO::FETCH_COLUMN);
  }
}
