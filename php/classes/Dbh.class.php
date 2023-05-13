<?php

namespace classes;

use \PDO;
use \PDOException;
use \PDOStatement;

require_once dirname(__DIR__) . '/constantes.php';

class Dbh
{
  protected function conectar(): PDO
  {
    try {
      $config = parse_ini_file(CONFIG_INI);
      $nombreBd = $config['bd_nombre'];
      $usuario = $config['usuario'];
      $clave = $config['clave'];
      $host = $config['host'];
      $puerto = $config['puerto'];

      $dbh = new PDO("mysql:host={$host}:{$puerto};dbname={$nombreBd}", $usuario, $clave);
      $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

      return $dbh;
    } catch (PDOException $e) {
      $mensajeRespuesta = Respuesta::BD_ERROR;
      $mensajeRespuesta['mensaje'] = vsprintf($mensajeRespuesta['mensaje'], array($e->getMessage()));
      $respuesta = new Respuesta(Respuesta::STATUS_ERROR, Respuesta::ARRAY, array($mensajeRespuesta));
      exit($respuesta->Json());
    }
  }

  protected function ejecutarSentencia(PDOStatement $stmt, ?array $valores = null, ?Respuesta $respuesta = null): void
  {
    try {
      $stmt->execute($valores);
    } catch (PDOException $e) {
      $mensajeRespuesta = Respuesta::BD_ERROR;
      $mensajeRespuesta['mensaje'] = vsprintf($mensajeRespuesta['mensaje'], array($e->getMessage()));
      $bd_error = new Respuesta(Respuesta::STATUS_ERROR, Respuesta::ARRAY, array($mensajeRespuesta));
      exit($bd_error->Json());
    }
  }
}
