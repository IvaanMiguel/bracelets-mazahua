<?php

use \controllers\Dashboard;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $dashboard = new Dashboard();
  $dashboard->mostrarVentasCategorias();
}
