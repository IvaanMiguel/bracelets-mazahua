<?php

use controllers\orders\CrearPedido;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idCliente = intval($_POST['idCliente']);
  $productos = json_decode($_POST['productos'], true);
  $tipoEntrega = htmlspecialchars($_POST['tipoEntrega'], ENT_QUOTES, 'UTF-8');
  $idUbicacion = $_POST['ubicacion'] ?? null;
  $nombreDestinatario = htmlspecialchars($_POST['nombreDestinatario'], ENT_QUOTES, 'UTF-8');
  $celularDestinatario = htmlspecialchars($_POST['celularDestinatario'], ENT_QUOTES, 'UTF-8');
  $fechaEntrega = htmlspecialchars($_POST['fechaEntrega'], ENT_QUOTES, 'UTF-8');
  $horaEntrega = htmlspecialchars($_POST['horaEntrega'], ENT_QUOTES, 'UTF-8');
  $aplicacion = $_POST['aplicacion'] ?? null;
  $tipoPago = htmlspecialchars($_POST['tipoPago'], ENT_QUOTES, 'UTF-8');
  $detallesPago = htmlspecialchars($_POST['detallesPago'] ?? null, ENT_QUOTES, 'UTF-8');
  $detallesPago = htmlspecialchars($_POST['detallesPago'] ?? null, ENT_QUOTES, 'UTF-8');
  $clabeCuenta = htmlspecialchars($_POST['clabeCuenta'] ?? null, ENT_QUOTES, 'UTF-8');
  $numeroTarjeta = htmlspecialchars($_POST['numeroTarjeta'] ?? null, ENT_QUOTES, 'UTF-8');
  $titular = htmlspecialchars($_POST['titular'] ?? null, ENT_QUOTES, 'UTF-8');

  $pedido = new CrearPedido(
    $idCliente,
    $tipoPago,
    $detallesPago,
    $productos,
    $tipoEntrega,
    $idUbicacion,
    $aplicacion,
    $nombreDestinatario,
    $celularDestinatario,
    $fechaEntrega,
    $horaEntrega,
    $clabeCuenta,
    $numeroTarjeta,
    $titular
  );

  $pedido->registrarPedido();
}