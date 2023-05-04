<?php

use \controllers\Categoria;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idCategoria = htmlspecialchars($_POST['idCategoria'], ENT_QUOTES, 'UTF-8');

  $categoria = new Categoria(idCategoria: $idCategoria);
  $categoria->removerCategoria();
}
