<?php
require_once __DIR__ . '/../includes/autoloader.inc.php';

$pedido = new PedidoVista();
$pedidosPendientes = json_decode($pedido->obtenerPedidosPendientesInfo(), true);

?>

<link rel='stylesheet' href='css/inicio.css'>
<div class='pedidos'>
    <h1 class='titulo-grande fondo-2-texto'>Pedidos pendientes</h1>
    <div class='pedidos-pendientes'>
    <?php switch ($pedidosPendientes['tipo']):
        case 'array': ?>
            <?php foreach ($pedidosPendientes['contenido'] as $pedido): ?>
                <div class='pedido-info' title='Clic para más información'>
                    <span class='pedido-info__cliente cuerpo-mediano'>
                        De: <?= $pedido['nombreCliente'] ?>
                    </span>
                    <span class='pedido-info__entrega cuerpo-mediano'>
                        <?php switch($pedido['tipoEntrega']):
                            case 'Domicilio': ?>
                                Entrega a domicilio
                                <?php break;

                            case 'Aplicación': ?>
                                Entrega por aplicación
                                <?php break;

                            default: ?>
                                <?= $pedido['tipoEntrega']?>
                        <?php endswitch ?>
                    </span>
                    <span class='pedido-info__pago cuerpo-mediano'>
                        <?php switch($pedido['tipoPago']):
                            case 'Depósito':
                            case 'Transferencia': ?>
                                <?= 'Pago por ' . strtolower($pedido['tipoPago']) ?>
                            <?php break;
                            case 'Efectivo': ?>
                                <?= 'Pago en efectivo'; ?>
                            <?php break;
                            default: ?>
                                <?= $pedido['tipoPago'] ?>
                        <?php endswitch ?>
                    </span>
                    <span class='pedido-info__estado cuerpo-mediano'>
                        <?= $pedido['estadoPedido'] ?>
                    </span>
                </div>
            <?php endforeach; ?>
            <?php break;
        case 'mensaje': ?>
        <?php default: ?>
            <h2 class='titulo-mediano sin-pedidos'>No hay pedidos pendientes</h2>
    <?php endswitch; ?>
    </div>
</div>
