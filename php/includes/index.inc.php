<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_POST['pagina']) {
        case 'nuevoPedido':
            include_once '../pages/nuevo-pedido.php';
            break;
    
        case 'clientes':
            include_once '../pages/clientes.php';
            break;
    
        case 'productos':
            include_once '../pages/productos.php';
            break;
    
        case 'pedidos':
            include_once '../pages/pedidos.php';
            break;
            
        case 'inicio':
        default:
            include_once '../pages/inicio.php';
    }
}
