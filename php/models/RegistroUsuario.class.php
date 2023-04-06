<?php

namespace models;

use \classes\Dbh;

class RegistroUsuario extends Dbh
{
  protected function crearUsuario(string $nombreUsuario, string $email, string $clave): void
  {
    $stmt = $this->conectar()->prepare('INSERT INTO usuario VALUES (0, ?, ?, ?);');
    $claveEncriptada = password_hash(hash('sha512', $clave), PASSWORD_DEFAULT);

    $this->ejecutarSentencia($stmt, array($nombreUsuario, $email, $claveEncriptada));
  }

  protected function nombreUsuarioExistente(string $nombreUsuario): bool
  {
    $stmt = $this->conectar()->prepare('SELECT nombreUsuario FROM usuario WHERE nombreUsuario = ?;');
    $this->ejecutarSentencia($stmt, array($nombreUsuario));
    $tuplas = $stmt->fetchAll();

    return count($tuplas) > 0;
  }

  protected function emailExistente(string $email): bool
  {
    $stmt = $this->conectar()->prepare('SELECT email FROM usuario WHERE email = ?;');
    $this->ejecutarSentencia($stmt, array($email));
    $tuplas = $stmt->fetchAll();

    return count($tuplas) > 0;
  }
}
