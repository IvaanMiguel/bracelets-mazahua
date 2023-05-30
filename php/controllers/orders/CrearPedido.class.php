<?php

namespace controllers\orders;

use \classes\Respuesta;
use \controllers\orders\Mensaje;
use \controllers\orders\PedidoAutenticacion;

require_once dirname(__DIR__) . '/../constantes.php';
require_once UTILS;

class CrearPedido extends \models\orders\CrearPedido
{
  private int $idCliente;
  private string $tipoPago;
  private ?string $detallesPago;
  private array $productos;
  private string $tipoEntrega;
  private ?int $idUbicacion;
  private ?string $aplicacion;
  private ?string $nombreDestinatario;
  private ?string $celularDestinatario;
  private string $fechaEntrega;
  private string $horaEntrega;
  private string $clabeCuenta;
  private string $numeroTarjeta;
  private string $titular;

  public function __construct(
    int $idCliente,
    string $tipoPago,
    string $detallesPago,
    array $productos,
    string $tipoEntrega,
    ?int $idUbicacion,
    ?string $aplicacion,
    string $nombreDestinatario,
    string $celularDestinatario,
    string $fechaEntrega,
    string $horaEntrega,
    ?string $clabeCuenta,
    ?string $numeroTarjeta,
    ?string $titular
  )
  {
    $this->idCliente = $idCliente;
    $this->tipoPago = $tipoPago;
    $this->detallesPago = $detallesPago;
    $this->productos = $productos;
    $this->tipoEntrega = $tipoEntrega;
    $this->idUbicacion = $idUbicacion;
    $this->aplicacion = $aplicacion;
    $this->nombreDestinatario = reemplazarEspacios($nombreDestinatario);
    $this->celularDestinatario = reemplazarEspacios($celularDestinatario);
    $this->fechaEntrega = $fechaEntrega;
    $this->horaEntrega = $horaEntrega;
    $this->clabeCuenta = preg_replace('/\s+/', '', trim($clabeCuenta));
    $this->numeroTarjeta = preg_replace('/\s+/', '', trim($numeroTarjeta));
    $this->titular = reemplazarEspacios($titular);
  }

  public function registrarPedido(): void
  {
    PedidoAutenticacion::validarCliente($this->idCliente);
    PedidoAutenticacion::validarProductos($this->productos);
    PedidoAutenticacion::validarNombreDestinatario($this->nombreDestinatario, $this->idCliente);
    PedidoAutenticacion::validarCelularDestinatario($this->celularDestinatario, $this->idCliente);

    switch ($this->tipoPago) {
      case 'Efectivo':
        $this->detallesPago = null;
        break;

      case 'Depósito':
        PedidoAutenticacion::validarClabeCuenta($this->clabeCuenta);
        break;

      case 'Tarjeta':
        PedidoAutenticacion::validarNombreTitular($this->titular);
        PedidoAutenticacion::validarNumeroTarjeta($this->numeroTarjeta);
        break;
    }

    if (count(PedidoAutenticacion::$errores) > 0) {
      $respuesta = new Respuesta(
        Respuesta::STATUS_ERROR,
        Respuesta::ARRAY,
        PedidoAutenticacion::$errores
      );
      exit($respuesta->Json());
    }

    $idPedido = $this->crearPedido(
      $this->idCliente,
      $this->tipoPago,
      $this->detallesPago,
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
