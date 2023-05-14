CREATE OR REPLACE VIEW vwPedidosPendientes AS
SELECT CONCAT_WS(" ", nombre, apellidos) nombreCliente, tipoEntrega, tipoPago, estadoPedido
FROM pedido p
INNER JOIN cliente c ON p.idCliente = c.id
INNER JOIN pedidoEntrega pe ON p.idPedido = pe.idPedido
INNER JOIN entrega e ON pe.idEntrega = e.idEntrega
WHERE estadoPedido NOT LIKE 'Entregado';

CREATE OR REPLACE VIEW vwProductos AS
SELECT idProducto, nombreProducto, cp.idCategoriaProducto, nombreCategoria, precio, existencias
FROM producto p
INNER JOIN categoriaproducto cp ON p.idCategoriaProducto = cp.idCategoriaProducto;
