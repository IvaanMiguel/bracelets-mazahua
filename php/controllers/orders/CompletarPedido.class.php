<?php

namespace controllers\orders;

use \classes\Respuesta;
use \controllers\orders\EliminarPedido;

class CompletarPedido extends \models\orders\CompletarPedido
{
  private int $id;

  public function __construct(
    int $id
  )
  {
    $this->id = $id;
  }

  public function finalizarPedido()
  {

    $fechaCompletado = $this->completarPedido($this->id);

    $pedido = new EliminarPedido($this->id);
    $pedido->removerPedido(true);

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      array($fechaCompletado, Mensaje::PEDIDO_COMPLETADO)
    ))->Json();
  }
}
