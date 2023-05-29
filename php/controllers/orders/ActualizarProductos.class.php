<?php

namespace controllers\orders;

use \classes\Respuesta;
use \controllers\orders\Mensaje;

class ActualizarProductos extends \models\orders\ActualizarProductos
{
  private int $idPedido;
  private array $productosModificados;

  public function __construct(
    int $idPedido,
    array $productosModificados
  )
  {
    $this->idPedido = $idPedido;
    $this->productosModificados = $productosModificados;
  }

  public function modificarProductos()
  {
    $this->actualizarProductos($this->idPedido, $this->productosModificados);

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      array(Mensaje::PRODUCTOS_ACTUALIZADOS)
    ))->Json();
  }
}
