<?php

namespace models;

use \classes\Dbh;

class Dashboard extends Dbh
{
  protected function obtenerProductosCategorias(): array|false
  {
    $stmt = $this->conectar()->prepare('SELECT * FROM vwproductoscategorias;');
    $this->ejecutarSentencia($stmt);

    return $stmt->fetchAll();
  }

  protected function obtenerPedidosRelacion(): array|false
  {
    $stmt = $this->conectar()->prepare('SELECT * FROM pedidosrelacion;');
    $this->ejecutarSentencia($stmt);

    return $stmt->fetchAll();
  }

  protected function obtenerClienteEstrella()
  {
    $stmt = $this->conectar()->prepare('SELECT nombreCliente, MAX(total) total FROM (
      SELECT nombreCliente, SUM(total) total
      FROM pedidocompletado
      GROUP BY nombreCliente
      ORDER BY total DESC
    ) __;');
    $this->ejecutarSentencia($stmt);

    return $stmt->fetchAll();
  }

  protected function obtenerPedidosClientes()
  {
    $stmt = $this->conectar()->prepare('SELECT CONCAT_WS(" ", nombre, apellidos) nombre, pedidosCreados, pedidosCompletados
      FROM cliente;
    ');
    $this->ejecutarSentencia($stmt);

    return $stmt->fetchAll();
  }

  protected function obtenerVentasMeses()
  {
    $stmt = $this->conectar()->prepare('SELECT
      SUM(totalProductos) totalProductos,
      SUM(total) totalVentas,
      MONTH(fechaCompletado) mes,
      YEAR(fechaCompletado) anho
    FROM pedidocompletado
    GROUP BY mes
    ORDER BY fechaCompletado ASC; ');
    $this->ejecutarSentencia($stmt);

    return $stmt->fetchAll();
  }

  protected function obtenerIngresosTotales()
  {
    $stmt = $this->conectar()->prepare('SELECT SUM(total) FROM pedidocompletado;');
    $this->ejecutarSentencia($stmt);

    return $stmt->fetchColumn();
  }

  protected function obtenerProductoMasVendido()
  {
    $stmt = $this->conectar()->prepare('SELECT nombre, MAX(cantidad) cantidad, total FROM(
      SELECT nombre, SUM(cantidad) cantidad, SUM(subtotal) total
      FROM productocomprado
      GROUP BY nombre
      ORDER BY cantidad DESC
    ) __;');
    $this->ejecutarSentencia($stmt);

    return $stmt->fetchAll();
  }

  protected function obtenerTIpoPagoFrecuente()
  {
    $stmt = $this->conectar()->prepare('SELECT nombre FROM metodopagoutilizado WHERE vecesUsado = (
      SELECT MAX(vecesUsado) FROM metodopagoutilizado
    );');
    $this->ejecutarSentencia($stmt);

    return $stmt->fetchColumn();
  }
}
