<?php

namespace controllers;

use \classes\Respuesta;

class VistaCategoria extends \models\Categoria
{
  public function mostrarCategorias(): bool|string
  {
    $categorias = $this->obtenerCategorias();

    return (new Respuesta(Respuesta::ARRAY, $categorias))->Json();
  }
}
