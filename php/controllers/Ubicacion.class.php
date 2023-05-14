<?php

namespace controllers;
use classes\Respuesta;

class Ubicacion extends \models\Ubicacion
{
  private string $callePrincipal;
  private string $callesAdyacentes;
  private string $colonia;
  private string $numeroExterior;
  private string $numeroInterior;
  private string $cp;
  private int $idCliente;

  private function __construct() { }

  public static function idClienteConstructor(
    int $idCliente
  ): Ubicacion
  {
    $ubicacion = new self();
    $ubicacion->idCliente = $idCliente;

    return $ubicacion;
  }

  public static function crearUbicacionConstructor(
      string $callePrincipal,
      string $callesAdyacentes,
      string $colonia,
      string $numeroExterior,
      string $numeroInterior,
      string $cp,
      int $idCliente
  ): Ubicacion
  {
    $ubicacion = new self();
    $ubicacion->callePrincipal = $callePrincipal;
    $ubicacion->callesAdyacentes = $callesAdyacentes;
    $ubicacion->colonia = $colonia;
    $ubicacion->numeroExterior = $numeroExterior;
    $ubicacion->numeroInterior = $numeroInterior;
    $ubicacion->cp = $cp;
    $ubicacion->idCliente = $idCliente;

    return $ubicacion;
  }

  public function mostrarUbicaciones(): void
  {
    $ubicaciones = $this->obtenerUbicaciones($this->idCliente);

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      $ubicaciones
    ))->Json();
  }
}
