<?php
session_start();

if (!isset($_SESSION['idUsuario'])) {
    header('Location: inicio-sesion.php');
    exit();
}
