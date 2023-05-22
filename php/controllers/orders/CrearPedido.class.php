<?php

namespace controllers\orders;

use \classes\Respuesta;
use \controllers\orders\Mensaje;

require_once dirname(__DIR__) . '/../constantes.php';
require_once UTILS;

class CrearPedido extends \models\orders\CrearPedido
{
  private int $idCliente;
  private string $tipoPago;
  private ?string $detallesPago;
  // private float $total;
  private array $productos;
  private string $tipoEntrega;
  private ?int $idUbicacion;
  private ?string $aplicacion;
  private ?string $nombreDestinatario;
  private ?string $celularDestinatario;
  private string $fechaEntrega;
  private string $horaEntrega;

  public function __construct(
    int $idCliente,
    string $tipoPago,
    string $detallesPago,
    // float $total,
    array $productos,
    string $tipoEntrega,
    int $idUbicacion,
    string $aplicacion,
    string $nombreDestinatario,
    string $celularDestinatario,
    string $fechaEntrega,
    string $horaEntrega
  )
  {
    $this->idCliente = $idCliente;
    $this->tipoPago = $tipoPago;
    $this->detallesPago = $detallesPago;
    // $this->total = $total;
    $this->productos = $productos;
    $this->tipoEntrega = $tipoEntrega;
    $this->idUbicacion = $idUbicacion;
    $this->aplicacion = $aplicacion;
    $this->nombreDestinatario = reemplazarEspacios($nombreDestinatario);
    $this->celularDestinatario = reemplazarEspacios($celularDestinatario);
    $this->fechaEntrega = $fechaEntrega;
    $this->horaEntrega = $horaEntrega;
  }

  public function registrarPedido(): void
  {
    $idPedido = $this->crearPedido(
      $this->idCliente,
      $this->tipoPago,
      $this->detallesPago,
      // $this->total,
      $this->productos,
      $this->tipoEntrega,
      $this->idUbicacion,
      $this->aplicacion,
      $this->nombreDestinatario,
      $this->celularDestinatario,
      $this->fechaEntrega,
      $this->horaEntrega
    );

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      array($idPedido, Mensaje::PEDIDO_REGISTRADO)
    ))->Json();
  }
}
