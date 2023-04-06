<?php

define('DIR_RAIZ', str_replace('\\', '/', dirname(__DIR__)));
define('DIR_PHP', DIR_RAIZ . '/php');
define('DIR_VISTAS', DIR_PHP . '/views');
define('DIR_PARCIALES', DIR_VISTAS . '/partials');
define('DIR_SECCIONES', DIR_PARCIALES . '/sections');

define('CONFIG_INI', DIR_PHP . '/config.ini');
define('AUTOLOADER', DIR_PHP . '/includes/autoloader.inc.php');

define('PRINCIPAL', DIR_VISTAS . '/principal.php');
define('REGISTRARSE', DIR_VISTAS . '/registrarse.php');
define('INICIAR_SESION', DIR_VISTAS . '/iniciar-sesion.php');

define('INICIO', DIR_SECCIONES . '/inicio.php');
// define('PARCIAL_CLIENTES', DIR_PARCIALES . '/clientes.php');
// define('PARCIAL_NUEVO_PEDIDO', DIR_PARCIALES . '/nuevo-pedido.php');
// define('PARCIAL_PEDIDOS', DIR_PARCIALES . '/pedidos.php');
// define('PARCIAL_PRODUCTOS', DIR_PARCIALES . '/productos.php');
define('META_LINKS', DIR_PARCIALES . '/meta-links.php');

define('URL_RAIZ', '/braceletsmazahua');
define('URL_PRINCIPAL', URL_RAIZ . '/');
define('URL_REGISTRARSE', URL_RAIZ . '/registrarse');
define('URL_INICIAR_SESION', URL_RAIZ . '/iniciar-sesion');
define('URL_CLIENTES', URL_RAIZ . '/clientes');
