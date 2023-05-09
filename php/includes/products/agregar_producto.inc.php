<?php

use \controllers\Producto;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
  $categoria = htmlspecialchars($_POST['categoria'], ENT_QUOTES, 'UTF-8');
  $precio = htmlspecialchars($_POST['precio'], ENT_QUOTES, 'UTF-8');
  $existencias = htmlspecialchars($_POST['existenciasIniciales'], ENT_QUOTES, 'UTF-8');

  $producto = Producto::crearProductoConstructor($nombre, $categoria, $precio, $existencias);
  $producto->registrarProducto();
}
