<?php

use \controllers\Categoria;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nuevaCategoria = htmlspecialchars($_POST['nuevaCategoria'], ENT_QUOTES, 'UTF-8');

  $categoria = new Categoria($nuevaCategoria);
  $categoria->registrarCategoria();
}
