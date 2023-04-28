<?php

namespace models;

use \classes\Dbh;

class Categoria extends Dbh
{
  protected function obtenerCategorias(): array|false
  {
    $stmt = $this->conectar()->prepare('SELECT * FROM categoriaproducto ORDER BY LOWER(nombreCategoria)  ASC;');
    $this->ejecutarSentencia($stmt);

    return $stmt->fetchAll();
  }

  protected function crearCategoria(string $nombreCategoria): void
  {
    $stmt = $this->conectar()->prepare('INSERT INTO categoriaproducto VALUES(0, ?);');
    $this->ejecutarSentencia($stmt, array($nombreCategoria));
  }
}
