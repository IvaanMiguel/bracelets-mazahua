<?php
session_start();

if (isset($_SESSION['idUsuario']) && $_SERVER['REQUEST_URI'] !== URL_PRINCIPAL) {
  header('Location: ' . URL_PRINCIPAL);
  exit();
}

if (!isset($_SESSION['idUsuario']) &&
    $_SERVER['REQUEST_URI'] !== URL_INICIAR_SESION && $_SERVER['REQUEST_URI'] !== URL_REGISTRARSE) {
  header('Location: ' . URL_INICIAR_SESION);
  exit();
}
