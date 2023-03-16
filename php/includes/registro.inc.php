<?php
require_once 'autoloader.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreUsuario = htmlspecialchars($_POST['nombreUsuario'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $clave = htmlspecialchars($_POST['clave'], ENT_QUOTES, 'UTF-8');
    $claveVerificacion = htmlspecialchars($_POST['claveVerificacion'], ENT_QUOTES, 'UTF-8');

    $registro = new RegistroControlador($nombreUsuario, $email, $clave, $claveVerificacion);
    $registro->registrarUsuario();
}
