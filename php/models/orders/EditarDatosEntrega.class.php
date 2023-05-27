<?php

namespace models\orders;

use \classes\Dbh;

class EditarDatosEntrega extends Dbh
{
  protected function actualizarDatosEntrega(
    int $id,
    string $tipoEntrega,
    string $fechaEntrega,
    string $horaEntrega,
    ?int $idUbicacion,
    ?string $aplicacion
  )
  {
    $stmt = $this->conectar()->prepare(
      'UPDATE entrega SET
        tipoEntrega = ?,
        aplicacion = ?,
        fechaEntrega = ?,
        horaEntrega = ?,
        idUbicacionCliente = ?
      WHERE id = ?;
    ');
    $this->ejecutarSentencia($stmt, array(
      $tipoEntrega,
      $aplicacion,
      $fechaEntrega,
      $horaEntrega,
      $idUbicacion,
      $id
    ));
  }
}
