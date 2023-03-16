<?php
class Pedido extends Dbh
{
    protected function obtenerPedidosPendientes(): Respuesta
    {
        $stmt = $this->conectar()->prepare('SELECT * FROM vwPedidosPendientes;');
        $this->ejecutarSentencia($stmt);
        $tuplas = $stmt->fetchAll();

        if (count($tuplas) <= 0) {
            $respuesta = new Respuesta(Respuesta::MENSAJE, 'Sin pedidos pendientes.');
            return $respuesta;
        }

        $respuesta = new Respuesta(Respuesta::ARRAY, $tuplas);
        return $respuesta;
    }
}
