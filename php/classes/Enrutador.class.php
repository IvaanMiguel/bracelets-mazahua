<?php
namespace classes;

class Enrutador
{
  private array $rutas = [];
  public static array $sesionRequerida = [];

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

  public function solicitarSesion($url) {
    self::$sesionRequerida[] = $url;
  }

  public static function requiereSesion($url) {
    return in_array($url, self::$sesionRequerida);
  }
}
