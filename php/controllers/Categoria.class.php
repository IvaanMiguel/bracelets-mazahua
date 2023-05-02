<?php

namespace controllers;

use \classes\Respuesta;

class Categoria extends \models\Categoria
{
  private array $errores = [];
  private ?int $idCategoria;
  private ?string $nombreCategoria;

  public function __construct(?string $nombreCategoria = null, ?int $idCategoria = null)
  {
    $this->idCategoria = $idCategoria;
    $this->nombreCategoria = $nombreCategoria;
  }

  public function registrarCategoria(): void
  {
    if ($this->camposVacios()) {
      array_push($this->errores, Respuesta::CAMPO_VACIO);
    } else {
      $this->validarCategoria();
    }


    if (count($this->errores) > 0) {
      $respuesta = new Respuesta(Respuesta::STATUS_ERROR, Respuesta::ARRAY, $this->errores);
      exit($respuesta->Json());
    }

    $categoriaId = $this->crearCategoria($this->nombreCategoria);

    echo (new Respuesta(Respuesta::STATUS_EXITO, Respuesta::ARRAY, array($this->nombreCategoria, $categoriaId)))->Json();
  }

  public function modificarCategoria(): void
  {
    if ($this->camposVacios()) {
      array_push($this->errores, Respuesta::CAMPO_VACIO);
    } else {
      $this->validarCategoria();
    }

    if (count($this->errores) > 0) {
      $respuesta = new Respuesta(Respuesta::STATUS_ERROR, Respuesta::ARRAY, $this->errores);
      exit($respuesta->Json());
    }

    $this->actualizarCategoria($this->idCategoria, $this->nombreCategoria);

    echo (new Respuesta(Respuesta::STATUS_EXITO, Respuesta::MENSAJE, 'Éxito'))->Json();
  }

  public function removerCategoria()
  {
    $this->eliminarCategoria($this->idCategoria);

    echo (new Respuesta(Respuesta::STATUS_EXITO, Respuesta::MENSAJE, 'Éxito'))->Json();
  }

  private function camposVacios(): bool
  {
    return (empty($this->nombreCategoria));
  }

  private function validarCategoria(): void
  {
    if (!ctype_alpha($this->nombreCategoria)) {
      array_push($this->errores, Respuesta::CATEGORIA_INVALIDA);
    }
  }
}
