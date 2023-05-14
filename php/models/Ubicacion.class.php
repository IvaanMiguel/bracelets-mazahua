<?php

namespace models;

use \classes\Dbh;

class Ubicacion extends Dbh
{
  protected function obtenerUbicaciones(
      int $id
  ): array|false
  {
    $stmt = $this->conectar()->prepare('SELECT * FROM ubicacioncliente WHERE idCliente = ?;');
    $this->ejecutarSentencia($stmt, array($id));

    return $stmt->fetchAll();
  }

  protected function agregarUbicacion(
      string $callePrincipal,
      string $callesAdyacentes,
      string $numeroExterior,
      string $numeroInterior,
      string $cp,
      string $colonia,
      int $idCliente
  ): string|false
  {
    $conexion = $this->conectar();
    $stmt = $conexion->prepare('INSERT INTO ubicacioncliente VALUES (0, ?, ?, ?, ?, ?, ?, ?);');
    $this->ejecutarSentencia($stmt, array(
        $callePrincipal, $callesAdyacentes, $numeroExterior, $numeroInterior, $cp, $colonia, $idCliente
    ));

    return $conexion->lastInsertId();
  }
}
