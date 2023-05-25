<?php

namespace controllers\orders;

use \classes\Respuesta;
use \controllers\orders\Mensaje;

class EliminarPedido extends \models\orders\EliminarPedido
{
  private int $id;

  public function __construct(
    int $id
  )
  {
    $this->id = $id;
  }

  public function removerPedido(bool $noRespuesta = false)
  {
    $this->eliminarPedido($this->id);

    if ($noRespuesta) return;

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      array(Mensaje::PEDIDO_ELIMINADO)
    ))->Json();
  }
}
