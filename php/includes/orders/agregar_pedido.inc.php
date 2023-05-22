<?php

use   controllers\orders\CrearPedido;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idCliente = htmlspecialchars($_POST['idCliente'], ENT_QUOTES, 'UTF-8');
  $productos = json_decode($_POST['productos'], true);
  $tipoEntrega = htmlspecialchars($_POST['tipoEntrega'], ENT_QUOTES, 'UTF-8');
  $idUbicacion = htmlspecialchars($_POST['ubicacion'], ENT_QUOTES, 'UTF-8');
  $nombreDestinatario = htmlspecialchars($_POST['nombreDestinatario'], ENT_QUOTES, 'UTF-8');
  $celularDestinatario = htmlspecialchars($_POST['celularDestinatario'], ENT_QUOTES, 'UTF-8');
  $fechaEntrega = htmlspecialchars($_POST['fechaEntrega'], ENT_QUOTES, 'UTF-8');
  $horaEntrega = htmlspecialchars($_POST['horaEntrega'], ENT_QUOTES, 'UTF-8');
  $aplicacion = htmlspecialchars($_POST['aplicacion'] ?? '', ENT_QUOTES, 'UTF-8');
  $tipoPago = htmlspecialchars($_POST['tipoPago'] ?? '', ENT_QUOTES, 'UTF-8');
  $detallesPago = 'Detalles placeholder';

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
    $horaEntrega
  );

  $pedido->registrarPedido();
}