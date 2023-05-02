<?php

namespace models;

use \classes\Dbh;
use \classes\Respuesta;

class IniciarSesion extends Dbh
{
  protected function obtenerUsuario(string $idUsuario, string $clave): void
  {
    $bd = $this->conectar();
    $stmt = $bd->prepare('SELECT clave FROM usuario WHERE nombreUsuario = ? OR email = ?;');
    $this->ejecutarSentencia($stmt, array($idUsuario, $idUsuario));
    $tuplas = $stmt->fetchAll();

    if (count($tuplas) <= 0 || !password_verify(hash('sha512', $clave), $tuplas[0]['clave'])) {
      $respuesta = new Respuesta(Respuesta::STATUS_ERROR, Respuesta::ARRAY, array(Respuesta::INICIO_SESION_FALLIDO));
      exit($respuesta->Json());
    }

    $stmt = $bd->prepare('SELECT * FROM usuario WHERE (nombreUsuario = ? OR email = ?) AND clave = ?;');
    $this->ejecutarSentencia($stmt, array($idUsuario, $idUsuario, $tuplas[0]['clave']));
    $usuario = $stmt->fetchAll();

    session_start();
    $_SESSION['idUsuario'] = $usuario[0]['idUsuario'];
    $_SESSION['nombreUsuario'] = $usuario[0]['nombreUsuario'];
    $_SESSION['email'] = $usuario[0]['email'];
  }
}
