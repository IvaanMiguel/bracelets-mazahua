<?php
class PedidoVista extends Pedido
{
    public function obtenerPedidosPendientesInfo(): bool|string
    {
        return $this->obtenerPedidosPendientes()->Json();
    }
}
