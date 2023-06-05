<?php

namespace controllers;

use \classes\Respuesta;

class Dashboard extends \models\Dashboard
{
  public function mostrarProductosCategorias()
  {
    $productosCategorias = $this->obtenerProductosCategorias();

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      $productosCategorias
    ))->Json();
  }

  public function mostrarPedidosRelacion()
  {
    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      $this->obtenerPedidosRelacion()
    ))->Json();
  }

  public function mostrarClienteEstrella()
  {
    return $this->obtenerClienteEstrella();
  }

  public function mostrarPedidosClientes()
  {
    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      $this->obtenerPedidosClientes()
    ))->Json();
  }

  public function mostrarVentasMeses()
  {
    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      $this->obtenerVentasMeses()
    ))->Json();
  }

  public function mostrarIngresosTotales()
  {
    return $this->obtenerIngresosTotales();
  }

  public function mostrarProductoMasVendido()
  {
    return $this->obtenerProductoMasVendido();
  }

  public function mostrarTipoPagoFrecuente()
  {
    return $this->obtenerTIpoPagoFrecuente();
  }
}
