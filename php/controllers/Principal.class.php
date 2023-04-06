<?php

namespace controllers;

require_once dirname(__DIR__) . '/constantes.php';

class Principal
{
  public static array $menuBotones;

  public static function inicio() {
    self::agregarBoton('Inicio', 'home', 'inicio');
    self::agregarBoton('Clientes', 'groups', 'clientes');
    self::agregarBoton('Productos', 'inventory_2', 'productos');
    self::agregarBoton('Categorías', 'category', 'categorias');
    self::agregarBoton('Pedidos', 'inventory', 'pedidos');

    require_once PRINCIPAL;
  }

  private static function agregarBoton(string $etiqueta, string $icono, string $nombreBoton): void {
    self::$menuBotones[] = compact('nombreBoton', 'etiqueta', 'icono');
  }
}
