<?php

namespace controllers\orders;

use \classes\Respuesta;
use \controllers\orders\Mensaje;

class EditarDatosEntrega extends \models\orders\EditarDatosEntrega
{
  private int $id;
  private string $tipoEntrega;
  private string $fechaEntrega;
  private string $horaEntrega;
  private ?int $idUbicacion;
  private ?string $aplicacion;

  public function __construct(
    int $id,
    string $tipoEntrega,
    string $fechaEntrega,
    string $horaEntrega,
    ?int $idUbicacion = null,
    ?string $aplicacion = null
  )
  {
    $this->id = $id;
    $this->tipoEntrega = $tipoEntrega;
    $this->fechaEntrega = $fechaEntrega;
    $this->horaEntrega = $horaEntrega;
    $this->idUbicacion = $idUbicacion;
    $this->aplicacion = $aplicacion;
  }

  public function modificarDatosEntrega()
  {
    $this->actualizarDatosEntrega(
      $this->id,
      $this->tipoEntrega,
      $this->fechaEntrega,
      $this->horaEntrega,
      $this->idUbicacion,
      $this->aplicacion
    );

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      array(Mensaje::DATOS_ENTREGA_ACTUALIZADOS)
    ))->Json();
  }
}
