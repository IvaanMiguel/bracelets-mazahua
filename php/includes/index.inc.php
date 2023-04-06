<?php
require_once dirname(__DIR__) . '/constantes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $ruta = DIR_SECCIONES . '/' . $_POST['paginaSolicitada'] . '.php';

  file_exists($ruta) ? include_once $ruta : include_once INICIO;
}
