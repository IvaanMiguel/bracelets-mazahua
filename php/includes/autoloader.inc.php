<?php
spl_autoload_register(function(string $clase) {
    $carpeta = 'classes';
    $extension = '.class.php';
    $directorio = dirname(__DIR__) . "/{$carpeta}/{$clase}{$extension}";

    if (!file_exists($directorio)) {
        echo "El directorio {$directorio} no ha podido encontrarse.";
        return;
    }

    include_once $directorio;
});
