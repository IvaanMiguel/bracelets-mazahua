<?php

namespace models;

use \classes\Dbh;

class Ubicacion extends Dbh
{
  protected function obtenerUbicaciones(
      int $idCliente
  ): array|false
  {
    $stmt = $this->conectar()->prepare('SELECT * FROM ubicacioncliente WHERE idCliente = ?;');
    $this->ejecutarSentencia($stmt, array($idCliente));

    return $stmt->fetchAll();
  }

  protected function crearUbicacion(
      string $callePrincipal,
      ?string $callesAdyacentes,
      string $colonia,
      ?string $numeroExterior,
      ?string $numeroInterior,
      string $cp,
      int $idCliente
  ): string|false
  {
    $conexion = $this->conectar();
    $stmt = $conexion->prepare('INSERT INTO ubicacioncliente VALUES (0, ?, ?, ?, ?, ?, ?, ?);');
    $this->ejecutarSentencia($stmt, array(
        $callePrincipal, $callesAdyacentes, $colonia, $numeroExterior, $numeroInterior, $cp, $idCliente
    ));

    return $conexion->lastInsertId();
  }

  protected function actualizarUbicacion(
    string $callePrincipal,
    string $callesAdyacentes,
    string $colonia,
    string $numeroExterior,
    string $numeroInterior,
    string $cp,
    int $id
  ): void
  {
    $stmt = $this->conectar()->prepare('UPDATE ubicacioncliente SET
      callePrincipal = ?,
      callesAdyacentes = ?,
      colonia = ?,
      numeroExterior = ?,
      numeroInterior = ?,
      cp = ?
      WHERE id = ?;');

    $this->ejecutarSentencia($stmt, array(
      $callePrincipal,
      $callesAdyacentes,
      $colonia,
      $numeroExterior,
      $numeroInterior,
      $cp,
      $id
    ));
  }

  protected function eliminarUbicacion(
      int $id
  ): void
  {
    $stmt = $this->conectar()->prepare('DELETE FROM ubicacioncliente WHERE id = ?;');
    $this->ejecutarSentencia($stmt, array($id));
  }
}
