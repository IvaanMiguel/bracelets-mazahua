<?php
require_once 'autoloader.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUsuario = htmlspecialchars($_POST['idUsuario'], ENT_QUOTES, 'UTF-8');
    $clave = htmlspecialchars($_POST['clave'], ENT_QUOTES, 'UTF-8');

    $inicioSesion = new InicioSesionControlador($idUsuario, $clave);
    $inicioSesion->iniciarSesion();
}
