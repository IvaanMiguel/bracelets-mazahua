<?php

namespace controllers;

use \classes\Respuesta;

class Categoria extends \models\Categoria
{
  private array $errores = [];
  private string $nombreCategoria;

  public function __construct(string $nombreCategoria)
  {
    $this->nombreCategoria = $nombreCategoria;
  }

  public function registrarCategoria(): void
  {
    if ($this->camposVacios()) {
      array_push($this->errores, Respuesta::CAMPO_VACIO);
    }

    if (count($this->errores) > 0) {
      $respuesta = new Respuesta(Respuesta::ARRAY, $this->errores);
      exit($respuesta->Json());
    }

    $this->crearCategoria($this->nombreCategoria);

    echo (new Respuesta(Respuesta::MENSAJE, 'Éxito padrino.'))->Json();
  }

  private function camposVacios(): bool
  {
    return (empty($this->nombreCategoria));
  }
}