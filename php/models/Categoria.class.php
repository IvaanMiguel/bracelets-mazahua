<?php

namespace models;

use \classes\Dbh;

class Categoria extends Dbh
{
  protected function obtenerCategorias(): array|false
  {
    $stmt = $this->conectar()->prepare('SELECT * FROM categoriaproducto ORDER BY LOWER(nombreCategoria) ASC;');
    $this->ejecutarSentencia($stmt);

    return $stmt->fetchAll();
  }

  protected function actualizarCategoria(int $idCategoria, string $nombreCategoria)
  {
    $stmt = $this->conectar()->prepare('UPDATE categoriaproducto SET nombreCategoria = ? WHERE idCategoriaProducto = ?');
    $this->ejecutarSentencia($stmt, array($nombreCategoria, $idCategoria));
  }

  protected function crearCategoria(string $nombreCategoria): string|false
  {
    $conexion = $this->conectar();
    $stmt = $conexion->prepare('INSERT INTO categoriaproducto VALUES(0, ?);');
    $this->ejecutarSentencia($stmt, array($nombreCategoria));

    return $conexion->lastInsertId();
  }

  protected function eliminarCategoria(int $idCategoria)
  {
    $stmt = $this->conectar()->prepare('DELETE FROM categoriaproducto WHERE idCategoriaProducto = ?;');
    $this->ejecutarSentencia($stmt, array($idCategoria));
  }
}
