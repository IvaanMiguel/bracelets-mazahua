<?php

use \classes\Enrutador;

require_once __DIR__ . '/php/constantes.php';
require_once AUTOLOADER;

$enrutador = new Enrutador();

$enrutador->agregarRuta(URL_INICIO, INICIO);
$enrutador->agregarRuta(URL_CLIENTES, CLIENTES);
$enrutador->agregarRuta(URL_PRODUCTOS, PRODUCTOS);
$enrutador->agregarRuta(URL_CATEGORIAS, CATEGORIAS);
$enrutador->agregarRuta(URL_PEDIDOS, PEDIDOS);
$enrutador->agregarRuta(URL_REGISTRARSE, REGISTRARSE);
$enrutador->agregarRuta(URL_INICIAR_SESION, INICIAR_SESION);

$enrutador->solicitarSesion(URL_INICIO);
$enrutador->solicitarSesion(URL_CLIENTES);
$enrutador->solicitarSesion(URL_PRODUCTOS);
$enrutador->solicitarSesion(URL_CATEGORIAS);
$enrutador->solicitarSesion(URL_PEDIDOS);

$url = parse_url($_SERVER['REQUEST_URI'])['path'];
$enrutador->enrutar($url);
