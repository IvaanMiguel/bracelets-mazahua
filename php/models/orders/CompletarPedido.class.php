<?php

namespace models\orders;

use \classes\Dbh;
use \PDO;

class CompletarPedido extends Dbh
{
  protected function completarPedido(
    int $id
  )
  {
    $stmt = $this->conectar()->prepare('INSERT INTO pedidocompletado (
      id,
      nombreCliente,
      nombreDestinatario,
      celularDestinatario,
      tipoEntrega,
      aplicacion,
      tipoPago,
      detallesPago,
      callePrincipal,
      callesAdyacentes,
      colonia,
      numeroExterior,
      numeroInterior,
      cp,
      fechaEntrega,
      horaEntrega,
      totalProductos,
      total,
      anticipo,
      fechaCompletado)
    SELECT
      id,
      nombreCliente,
      nombreDestinatario,
      telefonoDestinatario,
      tipoEntrega,
      aplicacion,
      tipoPago,
      detallesPago,
      callePrincipal,
      callesAdyacentes,
      colonia,
      numeroExterior,
      numeroInterior,
      cp,
      fechaEntrega,
      horaEntrega,
      totalProductos,
      total,
      anticipo,
      NOW()
    FROM vwpedidoinfo
    WHERE id = ?;');
    $this->ejecutarSentencia($stmt, array($id));

    $this->completarProductos($id);

    $stmtFechaCompletado = $this->conectar()->prepare('SELECT fechaCompletado FROM pedidocompletado WHERE id = ?;');
    $this->ejecutarSentencia($stmtFechaCompletado, array($id));

    return $stmtFechaCompletado->fetch(PDO::FETCH_COLUMN);
  }

  private function completarProductos(int $id)
  {
    $stmt = $this->conectar()->prepare('INSERT INTO productocomprado (
      idPedidoCompletado,
      nombre,
      cantidad,
      subtotal)
    SELECT
      idPedido,
      nombreProducto,
      cantidad,
      subtotal
    FROM vwpedidoproductoinfo
    WHERE idPedido = ?;');
    $this->ejecutarSentencia($stmt, array($id));
  }
}