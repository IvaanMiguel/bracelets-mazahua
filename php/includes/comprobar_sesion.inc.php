<?php

use \classes\Enrutador;

session_start();

if (isset($_SESSION['idUsuario']) && !Enrutador::requiereSesion($_SERVER['REQUEST_URI'])) {
  header('Location: ' . URL_INICIO);
  exit();
}

if (!isset($_SESSION['idUsuario']) && Enrutador::requiereSesion($_SERVER['REQUEST_URI'])) {
  header('Location: ' . URL_INICIAR_SESION);
  exit();
}
