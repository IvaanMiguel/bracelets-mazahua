<?php

namespace controllers\orders;

use \controllers\Cliente;
use \classes\Respuesta;
use \controllers\orders\Mensaje;
use \controllers\orders\PedidoAutenticacion;

require_once dirname(__DIR__) . '/../constantes.php';
require_once UTILS;


class EditarDatosDestinatario extends \models\orders\EditarDatosDestinatario
{
  private int $id;
  private string $nombreDestinatario;
  private string $celularDestinatario;

  public function __construct(
    int $id,
    string $nombreDestinatario,
    string $celularDestinatario
  )
  {
    $this->id = $id;
    $this->nombreDestinatario = $nombreDestinatario;
    $this->celularDestinatario = $celularDestinatario;
  }

  public function modificarDatosDestinatario()
  {
    if (!empty($this->nombreDestinatario)) {
      $this->validarNombreDestinatario();
    }
    if (!empty($this->celularDestinatario)) {
      $this->validarCelularDestinatario();
    }

    if (count(PedidoAutenticacion::$errores) > 0) {
      $respuesta = new Respuesta(
        Respuesta::STATUS_ERROR,
        Respuesta::ARRAY,
        PedidoAutenticacion::$errores
      );
      exit($respuesta->Json());
    }

    $this->actualizarDatosDestinatario(
      $this->id, $this->nombreDestinatario, $this->celularDestinatario
    );

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      array(Mensaje::DATOS_DESTINATARIO_ACTUALIZADOS)
    ))->Json();
  }

  private function validarNombreDestinatario(): void
  {
    validarLongitud(
      $this->nombreDestinatario,
      PedidoAutenticacion::NOMBRE_DESTINATARIO_MIN_LONGITUD,
      PedidoAutenticacion::NOMBRE_DESTINATARIO_MAX_LONGITUD,
      Mensaje::NOMBRE_DESTINATARIO_CORTO,
      Mensaje::NOMBRE_DESTINATARIO_LARGO,
      PedidoAutenticacion::$errores
    );

    if (!PedidoAutenticacion::caracteresValidos($this->nombreDestinatario)) {
      array_push(PedidoAutenticacion::$errores, Mensaje::NOMBRE_DESTINATARIO_INVALIDO);
    }
  }

  private function validarCelularDestinatario()
  {
    if (!is_numeric($this->celularDestinatario)){ 
      array_push(PedidoAutenticacion::$errores, Mensaje::CELULAR_INVALIDO);
    } else if (strlen($this->celularDestinatario) !== Cliente::CELULAR_LONGITUD) {
      array_push(PedidoAutenticacion::$errores, Mensaje::CELULAR_LONGITUD_INVALIDA);
    }
  }
}
