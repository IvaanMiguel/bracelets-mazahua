<?php

namespace controllers\orders;

use \classes\Respuesta;

class MostrarPedido extends \models\orders\MostrarPedido
{
  private ?int $id;

  public function __construct(?int $id = null)
  {
    $this->id  = $id;
  }

  public function obtenerPedidosPendientes(): array
  {
    $respuesta = json_decode($this->seleccionarPedidosPendientes(), true);

    if ($respuesta['tipo'] !== 1) return $respuesta;

    $pedidosPendientes = array_map(function(array $pedidoPendiente): array {
      return [
        'id' => $pedidoPendiente['id'],
        'nombreCliente' => 'De: ' . $pedidoPendiente['nombreCliente'],
        'tipoEntrega' => $this->obtenerTipoEntrega($pedidoPendiente['tipoEntrega']),
        'tipoPago' => $this->obtenerTipoPago($pedidoPendiente['tipoPago'])
      ];
    }, $respuesta['contenido']);

    return [
      'tipo' => $respuesta['tipo'],
      'contenido' => $pedidosPendientes
    ];
  }

  public function mostrarPedidosPendientes(): array
  {
    return $this->obtenerPedidosPendientesLista();
  }

  public function mostrarPedidoPendiente()
  {
    $pedido = $this->obtenerPedidoPendiente($this->id);

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      $pedido
    ))->Json();
  }

  public function mostrarProductosPedidoPendiente()
  {
    $productos = $this->obtenerProductosPedidoPendiente($this->id);

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      $productos
    ))->Json();
  }

  public function mostrarPedidosCompletados()
  {
    return $this->obtenerPedidosCompletados();
  }

  public function mostrarPedidoCompletado()
  {
    $pedido = $this->obtenerPedidoCompletado($this->id);

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      $pedido
    ))->Json();
  }

  public function mostrarProductosPedidoCompletado()
  {
    $productos = $this->obtenerProductosPedidoCompletado($this->id);

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      $productos
    ))->Json();
  }

  private function obtenerTipoEntrega(
    string $tipoEntrega
  ): string
  {
    switch($tipoEntrega) {
      case 'Domicilio':
        $entrega = 'Entrega a domicilio';
        break;

      case 'Aplicación':
        $entrega = 'Entrega por aplicación';
        break;
    }

    return $entrega ?? $tipoEntrega;
  }

  private function obtenerTipoPago(
    string $tipoPago
  ): string
  {
    switch($tipoPago) {
      case 'Depósito':
      case 'Transferencia':
        $pago = 'Pago por ' . strtolower($tipoPago);
        break;

      case 'Efectivo':
        $pago = 'Pago en efectivo';
        break;
    }

    return $pago ?? $tipoPago;
  }
}
