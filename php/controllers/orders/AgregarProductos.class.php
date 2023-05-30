<?php

namespace controllers\orders;

use \classes\Respuesta;

class AgregarProductos extends \models\orders\CrearPedido
{
  private int $idPedido;
  private array $productos;

  public function __construct(
    int $idPedido,
    array $productos
  )
  {
    $this->idPedido = $idPedido;
    $this->productos = $productos;
  }

  public function agregarProductosNuevos()
  {
    $this->agregarProductos($this->idPedido, $this->productos);

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      array(Mensaje::PRODUCTOS_AGREGADOS)
    ))->Json();
  }
}
