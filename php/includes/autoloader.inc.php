<?php
require_once dirname(__DIR__) . '/constantes.php';

spl_autoload_register(function (string $clase) {
  $clase = str_replace('\\', '/', $clase);
  $extension = '.class.php';

  $directorio = DIR_PHP . "/{$clase}{$extension}";

  if (file_exists($directorio)) {
    require_once $directorio;
    return;
  }

  die("La clase \"{$clase}\" no ha podido encontrarse.");
});
