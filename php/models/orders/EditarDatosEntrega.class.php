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
    // $columnas = 'fechaEntrega = ?, horaEntrega = ?';
    // $valores = array($fechaEntrega, $horaEntrega);

    // switch ($tipoEntrega) {
    //   case 'Domicilio':
    //     $columnas .= ', idUbicacionCliente = ?';
    //     array_push($valores, $idUbicacion);
    //     break;

    //   case 'Aplicación':
    //     $columnas .= ', idUbicacionCliente = ?, aplicacion = ?';
    //     array_push($valores, $idUbicacion, $aplicacion);
    //     break;
    // }

    // array_push($valores, $id);

    $stmt = $this->conectar()->prepare(
      'UPDATE entrega SET
        tipoEntrega = ?,
        aplicacion = ?,
        fechaEntrega = ?,
        horaEntrega = ?,
        idUbicacion = ?
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
