<?php

namespace models;

use \classes\Dbh;

class Producto extends Dbh
{
  protected function obtenerCategoriasActivas()
  {
    $stmt = $this->conectar()->prepare(
        'SELECT DISTINCT p.idCategoriaProducto, nombreCategoria
        FROM producto p
        INNER JOIN categoriaproducto cp ON p.idCategoriaProducto = cp.idCategoriaProducto');
    $this->ejecutarSentencia($stmt);

    return $stmt->fetchAll();
  }

  protected function obtenerProductos()
  {
    $stmt = $this->conectar()->prepare('SELECT * FROM producto');
    $this->ejecutarSentencia($stmt);

    return $stmt->fetchAll();
  }

  protected function obtenerProducto(
      int $id
  ): array|false
  {
    $stmt = $this->conectar()->prepare('SELECT * FROM vwproductos WHERE idProducto = ?;');
    $this->ejecutarSentencia($stmt, array($id));

    return $stmt->fetchAll();
  }

  protected function crearProducto(
      string $nombre,
      string $idCategoria,
      string $precio,
      string $existencias
  ): string|false
  {
    $conexion = $this->conectar();
    $stmt = $conexion->prepare('INSERT INTO producto VALUES (0, ?, ?, ?, ?)');
    $this->ejecutarSentencia($stmt, array($nombre, $idCategoria, $precio, $existencias));

    return $conexion->lastInsertId();
  }

  protected function productoExistente(
      string $nombre
  ): bool
  {
    $stmt = $this->conectar()->prepare('SELECT nombreProducto FROM producto WHERE LOWER(nombreProducto) = LOWER(?);');
    $this->ejecutarSentencia($stmt, array($nombre));
    $tuplas = $stmt->fetchAll();

    return count($tuplas) > 0;
  }

  protected function actualizarProducto(
      int $idProducto,
      string $nombre,
      int $idCategoria,
      string $precio,
      string $existencias
  ): void
  {
    $stmt = $this->conectar()->prepare('UPDATE producto SET
        nombreProducto = ?,
        idCategoriaProducto = ?,
        precio = ?,
        existencias = ? WHERE idProducto = ?;');
    $this->ejecutarSentencia($stmt, array($nombre, $idCategoria, $precio, $existencias, $idProducto));
  }

  protected function eliminarProducto(
      int $id
  ): void
  {
    $stmt = $this->conectar()->prepare('DELETE FROM producto WHERE idProducto = ?;');
    $this->ejecutarSentencia($stmt, array($id));
  }
}
