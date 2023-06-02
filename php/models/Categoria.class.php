<?php

namespace models;

use \classes\Dbh;

class Categoria extends Dbh
{
  protected function obtenerCategorias(): array|false
  {
    $stmt = $this->conectar()->prepare('SELECT * FROM categoriaproducto;');
    $this->ejecutarSentencia($stmt);

    return $stmt->fetchAll();
  }

  protected function categoriaExistente(string $nombreCategoria): bool
  {
    $stmt = $this->conectar()->prepare('SELECT nombreCategoria FROM categoriaproducto WHERE LOWER(nombreCategoria) = LOWER(?);');
    $this->ejecutarSentencia($stmt, array($nombreCategoria));
    $tuplas = $stmt->fetchAll();

    return count($tuplas) > 0;
  }

  protected function actualizarCategoria(int $idCategoria, string $nombreCategoria)
  {
    $stmt = $this->conectar()->prepare('UPDATE categoriaproducto SET nombreCategoria = ? WHERE idCategoriaProducto = ?');
    $this->ejecutarSentencia($stmt, array($nombreCategoria, $idCategoria));
  }

  protected function crearCategoria(string $nombreCategoria): string|false
  {
    $conexion = $this->conectar();
    $stmt = $conexion->prepare('INSERT INTO categoriaproducto VALUES (0, ?);');
    $this->ejecutarSentencia($stmt, array($nombreCategoria));

    return $conexion->lastInsertId();
  }

  protected function eliminarCategoria(int $idCategoria)
  {
    $stmt = $this->conectar()->prepare('DELETE FROM categoriaproducto WHERE idCategoriaProducto = ?;');
    $this->ejecutarSentencia($stmt, array($idCategoria));
  }

  protected function categoriaEnUso(int $idCategoria): bool
  {
    $stmt = $this->conectar()->prepare('SELECT idCategoriaProducto FROM producto WHERE idCategoriaProducto = ?;');
    $this->ejecutarSentencia($stmt, array($idCategoria));

    return count($stmt->fetchAll()) > 0;
  }
}
