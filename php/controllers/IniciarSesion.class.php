<?php

namespace controllers;

use \classes\Respuesta;

require_once dirname(__DIR__) . '/constantes.php';

class IniciarSesion extends \models\IniciarSesion
{
  private string $idUsuario;
  private string $clave;
  private array $errores = [];

  public function __construct(string $idUsuario, string $clave)
  {
    $this->idUsuario = $idUsuario;
    $this->clave = $clave;
  }

  public function iniciarSesion(): void
  {
    if ($this->camposVacios()) {
      array_push($this->errores, Respuesta::CAMPO_VACIO);
    }

    if (count($this->errores) > 0) {
      $respuesta = new Respuesta(Respuesta::STATUS_ERROR, Respuesta::ARRAY, $this->errores);
      exit($respuesta->Json());
    }

    $this->obtenerUsuario($this->idUsuario, $this->clave);

    echo (new Respuesta(Respuesta::STATUS_EXITO, Respuesta::URL, URL_INICIO))->Json();
  }

  private function camposVacios(): bool
  {
    return (empty($this->idUsuario) || empty($this->clave));
  }
}
