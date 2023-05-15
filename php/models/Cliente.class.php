<?php

namespace models;

use \classes\Dbh;
use \models\Ubicacion;

class Cliente extends Dbh
{
  protected function obtenerClientes()
  {
    $stmt = $this->conectar()->prepare(
        'SELECT id, CONCAT_WS(" ", apellidos, nombre) nombre FROM cliente;'
    );
    $this->ejecutarSentencia($stmt);

    return $stmt->fetchAll();
  }

  protected function obtenerCliente(
    int $id
  ): array|false
  {
    $stmt = $this->conectar()->prepare('SELECT * FROM cliente WHERE id = ?;');
    $this->ejecutarSentencia($stmt, array($id));

    return $stmt->fetchAll();
  }

  protected function crearCliente(
      string $nombre,
      string $apellidos,
      ?string $email,
      string $celular,
      string $edad,
      array $ubicaciones
  ): string|false
  {
    $conexion = $this->conectar();
    $clienteStmt = $conexion->prepare('INSERT INTO cliente VALUES (0, ?, ?, ?, ?, ?);');
    $this->ejecutarSentencia($clienteStmt, array(
        $nombre,
        $apellidos,
        $edad,
        $celular,
        $email
    ));

    $id = $conexion->lastInsertId();

    $this->insertarUbicaciones($id, $ubicaciones);

    return $id;
  }

  protected function actualizarCliente(
      int $id,
      string $nombre,
      string $apellidos,
      string $edad,
      string $celular,
      string $email
  ): void
  {
    $stmt = $this->conectar()->prepare('UPDATE cliente SET
      nombre = ?, apellidos = ?, edad = ?, celular = ?, email = ? WHERE id = ?;');
    $this->ejecutarSentencia($stmt, array($nombre, $apellidos, $edad, $celular, $email, $id));
  }

  protected function emailExistente(
      string $email
  ): bool
  {
    $stmt = $this->conectar()->prepare('SELECT email FROM cliente WHERE email = ?;');
    $this->ejecutarSentencia($stmt, array($email));

    return count($stmt->fetchAll()) > 0;
  }

  private function insertarUbicaciones(
      string $id,
      array $ubicaciones
  ): void
  {
    $valores = $this->obtenerValoresUbicaciones($id, $ubicaciones);

    // Creación del statement para insertar todas las ubicaciones.
    $placeholders = implode(', ', array_fill(0, count($ubicaciones), '(0, ?, ?, ?, ?, ?, ?, ?)'));
    $ubicacionesQuery = 'INSERT INTO ubicacioncliente VALUES ' . $placeholders . ';';

    $stmt = $this->conectar()->prepare($ubicacionesQuery);
    $this->ejecutarSentencia($stmt, $valores);
  }

  private function obtenerValoresUbicaciones(
      string $id,
      array $ubicaciones
  ): array
  {
    // Adición a cada ubicación del cliente el id de dicho cliente.
    foreach ($ubicaciones as &$ubicacion) { $ubicacion['idCliente'] = $id; }

    // Creación de un arreglo con los valores de todas las ubicaciones dentro de cada objeto.
    $ubicacionesValores = [];
    array_walk_recursive($ubicaciones, function($valor) use (&$ubicacionesValores) {
      $ubicacionesValores[] = $valor;
    });

    return $ubicacionesValores;
  }
}
