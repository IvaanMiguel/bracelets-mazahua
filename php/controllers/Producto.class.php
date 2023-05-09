<?php

namespace controllers;

use \classes\Respuesta;

class Producto extends \models\Producto
{
  public const PRODUCTO_REGISTRADO = [
    'titulo' => 'Nuevo producto añadido',
    'mensaje' => 'El producto ha sido añadido con éxito.',
    'ambito' => 'notificacion'
  ];

  public const NOMBRE_INVALIDO = [
    'titulo' => 'Nombre de producto inválido',
    'mensaje' => 'El nombre del producto solo debe contener letras y espacios.',
    'ambito' => 'nombre'
  ];

  public const PRODUCTO_EXISTENTE = [
    'titulo' => 'Producto ya existente',
    'mensaje' => 'El nombre del producto ingresado ya existe.',
    'ambito' => 'nombre'
  ];

  public const NOMBRE_CORTO = [
    'titulo' => 'Nombre del producto muy corto',
    'mensaje' => 'El nombre del producto debe tener como mínimo ' . self::NOMBRE_MIN_LONGITUD . ' caracteres.',
    'ambito' => 'nombre'
  ];

  public const NOMBRE_LARGO = [
    'titulo' => 'Nombre del producto muy largo',
    'mensaje' => 'El nombre del producto debe tener como máximo ' . self::NOMBRE_MAX_LONGITUD . ' caracteres.',
    'ambito' => 'nombre'
  ];

  public const CATEGORIA_INVALIDA = [
    'titulo' => 'Categoría no válida',
    'mensaje' => 'Selecciona una categoría válida.',
    'ambito' => 'categoria'
  ];

  public const EXISTENCIAS_MENOR_CERO = [
    'titulo' => 'Existencias menores que cero',
    'mensaje' => 'Las existencias deben ser mayores a 0.',
    'ambito' => 'existenciasIniciales'
  ];

  public const PRODUCTO_ACTUALIZADO = [
    'titulo' => 'Producto actualizado',
    'mensaje' => 'El producto ha sido actualizado con éxito.',
    'ambito' => 'notificacion'
  ];

  public const PRODUCTO_ELIMINADO = [
    'titulo' => 'Producto eliminado',
    'mensaje' => 'El producto ha sido eliminado con éxito.',
    'ambito' => 'notificacion'
  ];

  public const PRECIO_INVALIDO = [
    'titulo' => 'Precio inválida',
    'mensaje' => 'El precio debe ser un valor numérico.',
    'ambito' => 'precio'
  ];

  public const EXISTENCIAS_INVALIDAS = [
    'titulo' => 'Existencias inválidas',
    'mensaje' => 'Las existencias deben ser un valor numérico.',
    'ambito' => 'existenciasIniciales'
  ];

  public const NOMBRE_VACIO = [
    'titulo' => 'Nombre vacío',
    'mensaje' => 'El nombre del producto no puede estar vacío.',
    'ambito' => 'nombre'
  ];

  public const EXISTENCIAS_EXCEDIDAS = [
    'titulo' => 'Cantidad de existencias muy grande',
    'mensaje' => 'Las existencias no pueden ser mayores a ' . self::EXISTENCIAS_MAX_CANTIDAD . ' unidades.',
    'ambito' => 'existenciasIniciales'
  ];

  public const PRECIO_MENOR_MIN = [
    'titulo' => 'Precio menor al mínimo',
    'mensaje' => 'El precio no puede ser menor a $' . self::PRECIO_MIN_CANTIDAD . ' MXN.',
    'ambito' => 'precio'
  ];

  public const PRECIO_MAYOR_MAX = [
    'titulo' => 'Precio mayor al máximo',
    'mensaje' => 'El precio no puede ser mayor a $' . self::PRECIO_MAX_CANTIDAD . ' MXN.',
    'ambito' => 'precio'
  ];

  public const NOMBRE_MIN_LONGITUD = 4;
  public const NOMBRE_MAX_LONGITUD = 20;
  public const PRECIO_MIN_CANTIDAD = 20;
  public const PRECIO_MAX_CANTIDAD = 999.99;
  public const EXISTENCIAS_MAX_CANTIDAD = 50;

  private array $errores = [];
  private ?string $idProducto;
  private ?string $nombre;
  private ?string $idCategoria;
  private ?string $precio;
  private ?string $existencias;

  private function __construct() { }

  public static function crearProductoConstructor(
      string $nombre,
      string $idCategoria,
      string $precio,
      string $existencias
  ): Producto
  {
    $producto = new Producto();
    $producto->nombre = $nombre;
    $producto->idCategoria = $idCategoria;
    $producto->precio = $precio;
    $producto->existencias = $existencias;

    return $producto;
  }

  public static function idProductoConstructor(
      int $id
  ): Producto
  {
    $producto = new Producto();
    $producto->idProducto = $id;

    return $producto;
  }

  public static function editarProductoConstructor(
      int $idProducto,
      string $nombre,
      int $idCategoria,
      string $precio,
      string $existencias
  ): Producto
  {
    $producto = new Producto();
    $producto->idProducto = $idProducto;
    $producto->nombre = $nombre;
    $producto->idCategoria = $idCategoria;
    $producto->precio = $precio;
    $producto->existencias = $existencias;

    return $producto;
  }

  public function registrarProducto(): void
  {
    if (!empty($this->nombre)) {
      $this->validarNombreProducto();
      $this->buscarProductoExistente();
      $this->validarLongitud();
    } else {
      array_push($this->errores, self::NOMBRE_VACIO);
    }

    $this->validarCategoria();
    $this->validarCantidadPrecio();
    $this->validarCantidadExistencias();

    if (count($this->errores) > 0) {
      $respuesta = new Respuesta(Respuesta::STATUS_ERROR, Respuesta::ARRAY, $this->errores);
      exit($respuesta->Json());
    }

    $idProducto = $this->crearProducto($this->nombre, $this->idCategoria, $this->precio, $this->existencias);

    echo (new Respuesta(Respuesta::STATUS_EXITO, Respuesta::ARRAY, array($idProducto, self::PRODUCTO_REGISTRADO)))->Json();
  }

  public function mostrarProducto(): void
  {
    $producto = $this->obtenerProducto($this->idProducto);

    echo (new Respuesta(Respuesta::STATUS_EXITO, Respuesta::ARRAY, $producto))->Json();
  }

  public function modificarProducto(): void
  {
    if (!empty($this->nombre)) {
      $this->buscarProductoExistente();
      $this->validarNombreProducto();
      $this->validarLongitud();
    }
    if ($this->precio == 0 || !empty($this->precio)) {
      $this->validarCantidadPrecio();
    }
    if ($this->existencias == 0 || !empty($this->existencias)) {
      $this->validarCantidadExistencias();
    }

    if (count($this->errores) > 0) {
      $respuesta = new Respuesta(Respuesta::STATUS_ERROR, Respuesta::ARRAY, $this->errores);
      exit($respuesta->Json());
    }

    $this->actualizarProducto($this->idProducto, $this->nombre, $this->idCategoria, $this->precio, $this->existencias);

    echo (new Respuesta(Respuesta::STATUS_EXITO, Respuesta::ARRAY, array(self::PRODUCTO_ACTUALIZADO)))->Json();
  }

  
  public function removerProducto()
  {
    $this->eliminarProducto($this->idProducto);

    echo (new Respuesta(Respuesta::STATUS_EXITO, Respuesta::ARRAY, array(self::PRODUCTO_ELIMINADO)))->Json();
  }


  private function validarNombreProducto(): void
  {
    $caracteresEspeciales = array('á', 'é', 'í', 'ó', 'ú', 'ñ', 'ü', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'Ü', ' ');
    $caracteresNormalizados = array('a', 'e', 'i', 'o', 'u', 'n', 'u', 'A', 'E', 'I', 'O', 'U', 'N', 'U', '');
    $nombreProducto = str_replace($caracteresEspeciales, $caracteresNormalizados, $this->nombre);

    if (!ctype_alpha($nombreProducto)) {
      array_push($this->errores, self::NOMBRE_INVALIDO);
    }
  }

  private function buscarProductoExistente(): void
  {
    if ($this->productoExistente($this->nombre)) {
      array_push($this->errores, self::PRODUCTO_EXISTENTE);
    }
  }

  private function validarLongitud(): void
  {
    if (strlen($this->nombre) < self::NOMBRE_MIN_LONGITUD) {
      array_push($this->errores, self::NOMBRE_CORTO);
    } else if (strlen($this->nombre) > self::NOMBRE_MAX_LONGITUD) {
      array_push($this->errores, self::NOMBRE_LARGO);
    }
  }

  private function validarCategoria(): void
  {
    if (empty($this->idCategoria)) {
      array_push($this->errores, self::CATEGORIA_INVALIDA);
    }
  }

  private function validarCantidadPrecio(): void
  {
    if (!is_numeric($this->precio)) {
      array_push($this->errores, self::PRECIO_INVALIDO);
    } else if ($this->precio < self::PRECIO_MIN_CANTIDAD) {
      array_push($this->errores, self::PRECIO_MENOR_MIN);
    } else if ($this->precio > self::PRECIO_MAX_CANTIDAD) {
      array_push($this->errores, self::PRECIO_MAYOR_MAX);
    }
  }

  private function validarCantidadExistencias(): void
  {
    if (!is_numeric($this->existencias)) {
      array_push($this->errores, self::EXISTENCIAS_INVALIDAS);
    } else if ($this->existencias <= 0) {
      array_push($this->errores, self::EXISTENCIAS_MENOR_CERO);
    } else if ($this->existencias > self::EXISTENCIAS_MAX_CANTIDAD) {
      array_push($this->errores, self::EXISTENCIAS_EXCEDIDAS);
    }
  }
}
