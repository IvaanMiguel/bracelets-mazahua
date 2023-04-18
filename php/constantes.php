<?php

define('DIR_RAIZ', str_replace('\\', '/', dirname(__DIR__)));
define('DIR_PHP', DIR_RAIZ . '/php');
define('DIR_VISTAS', DIR_PHP . '/views');
define('DIR_PARCIALES', DIR_VISTAS . '/partials');

define('CONFIG_INI', DIR_PHP . '/config.ini');
define('AUTOLOADER', DIR_PHP . '/includes/autoloader.inc.php');
define('COMPROBAR_SESION', DIR_PHP . '/includes/comprobar_sesion.inc.php');

define('INICIO', DIR_VISTAS . '/inicio.php');
define('CLIENTES', DIR_VISTAS . '/clientes.php');
define('PRODUCTOS', DIR_VISTAS . '/productos.php');
define('CATEGORIAS', DIR_VISTAS . '/categorias.php');
define('PEDIDOS', DIR_VISTAS . '/pedidos.php');
define('REGISTRARSE', DIR_VISTAS . '/registrarse.php');
define('INICIAR_SESION', DIR_VISTAS . '/iniciar-sesion.php');

define('HEAD_TAGS', DIR_PARCIALES . '/head-tags.php');
define('MENU', DIR_PARCIALES . '/menu.php');
define('CABECERA', DIR_PARCIALES . '/cabecera.php');

define('URL_RAIZ', '/braceletsmazahua');
define('URL_INICIO', URL_RAIZ . '/');
define('URL_CLIENTES', URL_RAIZ . '/clientes');
define('URL_PRODUCTOS', URL_RAIZ . '/productos');
define('URL_CATEGORIAS', URL_RAIZ . '/categorias');
define('URL_PEDIDOS', URL_RAIZ . '/pedidos');
define('URL_REGISTRARSE', URL_RAIZ . '/registrarse');
define('URL_INICIAR_SESION', URL_RAIZ . '/iniciar-sesion');
