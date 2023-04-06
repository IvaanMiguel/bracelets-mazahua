<?php
namespace classes;

class Enrutador
{
  private array $rutas = [];

  public function agregarRuta($url, $destino) {
    $this->rutas[$url] = $destino;
  }

  public function enrutar($url) {
    if (array_key_exists($url, $this->rutas)) {
      $ruta = $this->rutas[$url];
      is_callable($ruta) ? $ruta() : require_once $ruta;
      return;
    }

    die('Url no encontrada.');
  }
}
