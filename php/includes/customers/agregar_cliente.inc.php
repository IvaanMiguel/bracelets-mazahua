<?php

use \controllers\Cliente;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
  $primerApellido = htmlspecialchars($_POST['primerApellido'], ENT_QUOTES, 'UTF-8');
  $segundoApellido = htmlspecialchars($_POST['segundoApellido'], ENT_QUOTES, 'UTF-8');
  $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
  $celular = htmlspecialchars($_POST['celular'], ENT_QUOTES, 'UTF-8');
  $edad = htmlspecialchars($_POST['edad'], ENT_QUOTES, 'UTF-8');
  $ubicaciones = json_decode($_POST['ubicaciones'], true);

  $cliente = Cliente::crearClienteConstructor(
      $nombre,
      $primerApellido,
      $segundoApellido,
      $edad,
      $celular,
      $email,
      $ubicaciones
  );

  $cliente->registrarCliente();
}
