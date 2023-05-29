<?php

namespace models\orders;

use \classes\Dbh;

class ActualizarProductos extends Dbh
{
  protected function actualizarProductos(
    int $idPedido,
    array $productosModificados
  )
  {
    $sentenciasWhen = "";
    $valores = [];

    foreach ($productosModificados as $productoModificado) {
      $id = $productoModificado['id'];
      $cantidad = $productoModificado['cantidad'];
      $sentenciasWhen .= "WHEN idProducto = ? THEN ? ";

      $valores[] = $id;
      $valores[] = $cantidad;
    }

    $valores[] = $idPedido;
    $valores = array_merge($valores, array_column($productosModificados, 'id'));
    $sentenciaIn = implode(', ', array_fill(0, count($productosModificados), '?'));

    $stmt = $this->conectar()->prepare(
      "UPDATE pedidoproducto SET cantidad =
        CASE
          {$sentenciasWhen}
        END
      WHERE idPedido = ?
      AND idProducto IN ({$sentenciaIn});
    ");
    $this->ejecutarSentencia($stmt, $valores);
  }
}
