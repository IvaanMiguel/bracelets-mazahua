<?php

namespace controllers\orders;

use classes\Respuesta;
use \controllers\orders\Mensaje;
use \controllers\orders\PedidoAutenticacion;

class RemoverProducto extends \models\orders\RemoverProducto
{
  private int $idPedido;
  private int $idProducto;

  public function __construct(
    int $idPedido,
    int $idProducto
  )
  {
    $this->idPedido = $idPedido;
    $this->idProducto = $idProducto;
  }

  public function removerProductoPedido():void
  {
    if ($this->productoUnico($this->idPedido)) {
      array_push(PedidoAutenticacion::$errores, Mensaje::PRODUCTO_UNICO);
    }

    if (count(PedidoAutenticacion::$errores) > 0) {
      $respuesta = new Respuesta(
        Respuesta::STATUS_ERROR,
        Respuesta::ARRAY,
        PedidoAutenticacion::$errores
      );
      exit($respuesta->Json());
    }

    $this->eliminarProductoPedido($this->idPedido, $this->idProducto);

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      array(Mensaje::PRODUCTO_ELIMINADO)
    ))->Json();
  }
}
