CREATE OR REPLACE VIEW vwpedidospendientes AS
SELECT p.id, CONCAT_WS(" ", nombre, apellidos) nombreCliente, tipoEntrega, tipoPago
FROM pedido p
INNER JOIN cliente c ON p.idCliente = c.id
INNER JOIN entrega e ON p.idEntrega = e.id;

CREATE OR REPLACE VIEW vwProductos AS
SELECT idProducto, nombreProducto, cp.idCategoriaProducto, nombreCategoria, precio, existencias
FROM producto p
INNER JOIN categoriaproducto cp ON p.idCategoriaProducto = cp.idCategoriaProducto;

CREATE OR REPLACE VIEW vwpedidospendienteslista AS
SELECT p.id,
    CONCAT_WS(' ', apellidos, nombre) nombreCliente,
    SUM(cantidad) totalProductos,
    fechaEntrega
FROM pedido p
INNER JOIN cliente c ON p.idCliente = c.id
INNER JOIN pedidoproducto pp ON pp.idPedido = p.id
INNER JOIN entrega e ON e.id = p.idEntrega
GROUP BY p.id;

CREATE OR REPLACE VIEW vwpedidoinfo AS
SELECT p.id,
    p.idCliente,
    CONCAT_WS(' ', apellidos, nombre) nombreCliente,
    nombreDestinatario,
    telefonoDestinatario,
    tipoEntrega,
    aplicacion,
    uc.id idUbicacion,
    callePrincipal,
    callesAdyacentes,
    colonia,
    numeroExterior,
    numeroInterior,
    cp,
    e.id idEntrega,
    fechaEntrega,
    horaEntrega,
    total,
    anticipo,
    estadoAnticipo,
    totalProductos,
    tipoPago,
    detallesPago
FROM pedido p
INNER JOIN entrega e ON e.id = p.idEntrega
LEFT JOIN ubicacioncliente uc ON e.idUbicacionCliente = uc.id
INNER JOIN cliente c ON p.idCliente = c.id;

CREATE OR REPLACE VIEW vwpedidoproductoinfo AS
SELECT
    idPedido,
    p.idProducto,
    precio,
    nombreProducto,
    cantidad,
    subtotal,
    existencias
FROM pedidoproducto pp
INNER JOIN
    producto p ON pp.idProducto = p.idProducto;
