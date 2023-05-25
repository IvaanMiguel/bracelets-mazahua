<?php

namespace models\orders;

session_start();

use \classes\Dbh;

class CrearPedido extends Dbh
{
  protected function crearPedido(
    int $idCliente,
    string $tipoPago,
    ?string $detallesPago,
    // float $total,
    array $productos,
    string $tipoEntrega,
    ?int $idUbicacion,
    ?string $aplicacion,
    ?string $nombreDestinatario,
    ?string $celularDestinatario,
    string $fechaEntrega,
    string $horaEntrega
  ): string|false
  {
    $idEntega = $this->crearEntrega(
      $tipoEntrega,
      $aplicacion,
      $nombreDestinatario,
      $celularDestinatario,
      $fechaEntrega,
      $horaEntrega,
      $idUbicacion
    );

    $conexion = $this->conectar();
    $stmt = $conexion->prepare(
      'INSERT INTO pedido (id, idCliente, tipoPago, detallesPago, idEntrega, fechaCreacion, idUsuario) VALUES
        (0, ?, ?, ?, ?, NOW(), ?);');
    $this->ejecutarSentencia($stmt, array(
      $idCliente,
      $tipoPago,
      $detallesPago,
      $idEntega,
      $_SESSION['idUsuario']
    ));

    $idPedido = $conexion->lastInsertId();

    $this->agregarProductos($idPedido, $productos);

    return $conexion->lastInsertId();
  }

  private function crearEntrega(
    string $tipoEntrega,
    ?string $aplicacion,
    ?string $nombreDestinatario,
    ?string $celularDestinatario,
    string $fechaEntrega,
    string $horaEntrega,
    ?int $idUbicacion
  ): string|false
  {
    $conexion = $this->conectar();
    $stmt = $conexion->prepare('INSERT INTO entrega VALUES(0, ?, ?, ?, ?, ?, ?, ?);');
    $this->ejecutarSentencia($stmt, array(
      $tipoEntrega,
      $aplicacion,
      $nombreDestinatario,
      $celularDestinatario,
      $fechaEntrega,
      $horaEntrega,
      $idUbicacion
    ));

    return $conexion->lastInsertId();
  }

  private function agregarProductos(
    int $idPedido,
    array $productos,
  ): void
  {
    $tuplas = $this->obtenerProductos($idPedido, $productos);

    $placeholders = implode(', ', array_fill(0, count($productos), '(?, ?, ?)'));

    $stmt = $this->conectar()->prepare(
      "INSERT INTO pedidoproducto (idPedido, idProducto, cantidad) VALUES{$placeholders};"
    );
    $this->ejecutarSentencia($stmt, $tuplas);
  }

  private function obtenerProductos(
    int $idPedido,
    array $productos
  ): array
  {
    foreach ($productos as &$producto) {
      $producto = array_merge(array('idPedido' => $idPedido), $producto);
    }

    $valores = [];
    array_walk_recursive($productos, function($valor) use (&$valores) {
      $valores[] = $valor;
    });
    return $valores;
  }
}
