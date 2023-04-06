<?php
require_once dirname(dirname(__DIR__)) . '/../constantes.php';
require_once AUTOLOADER;

use \controllers\Pedido;

$pedido = new Pedido();
$resultado = $pedido->obtenerPedidosPendientes();
?>

<link rel='stylesheet' href='css/inicio.css'>
<div class='pedidos'>
  <h1 class='titulo-grande txt-fondo-alternativo'>Pedidos pendientes</h1>
  <div class='pedidos-pendientes'>
    <?php switch ($resultado['tipo']):
      case 1:
        foreach ($resultado['contenido'] as $pedidoPendiente): ?>
          <div class='pedido-info' title='Clic para más información'>
            <span class='cuerpo-mediano'>
              <?= $pedidoPendiente['nombreCliente'] ?>
            </span>
            <span class='cuerpo-mediano'>
              <?= $pedidoPendiente['tipoEntrega']; ?>
            </span>
            <span class='cuerpo-mediano'>
              <?= $pedidoPendiente['tipoPago']; ?>
            </span>
            <span class='cuerpo-mediano'>
              <?= $pedidoPendiente['estadoPedido'] ?>
            </span>
          </div>
        <?php endforeach;
        break;

      case 2: ?>
        <span class='titulo-mediano sin-pedidos'>
          <?= $resultado['contenido'] ?>
        </span>
        <?php break;

      default: ?>
        <span class='titulo-mediano sin-pedidos'>
          Ha habido un problema para recuperar los pedidos pendientes.
        </span>
    <?php endswitch; ?>
  </div>
</div>
