<?php

use \controllers\Cliente;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
  $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
  $apellidos = htmlspecialchars($_POST['apellidos'], ENT_QUOTES, 'UTF-8');
  $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
  $celular = htmlspecialchars($_POST['celular'], ENT_QUOTES, 'UTF-8');
  $edad = htmlspecialchars($_POST['edad'], ENT_QUOTES, 'UTF-8');

  $cliente = Cliente::editarClienteConstructor($id, $nombre, $apellidos, $email, $celular, $edad);
  $cliente->modificarCliente();
}
