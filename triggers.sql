DROP TRIGGER IF EXISTS before_producto_update;
delimiter $$
CREATE TRIGGER before_producto_update
BEFORE UPDATE ON producto FOR EACH ROW
BEGIN
    SET NEW.nombreProducto = IF (NEW.nombreProducto = '', OLD.nombreProducto, NEW.nombreProducto);
    SET NEW.precio = IF (NEW.precio = 0, OLD.precio, NEW.precio);
    SET NEW.existencias = IF (NEW.existencias IS NULL, OLD.existencias, NEW.existencias);
END$$
delimiter ;

DROP TRIGGER IF EXISTS before_cliente_update;
delimiter $$
CREATE TRIGGER before_cliente_update
BEFORE UPDATE ON cliente FOR EACH ROW
BEGIN
    SET NEW.nombre = IF (NEW.nombre = '', OLD.nombre, NEW.nombre);
    SET NEW.apellidos = IF (NEW.apellidos = '', OLD.apellidos, NEW.apellidos);
    SET NEW.edad = IF (NEW.edad = 0, OLD.edad, NEW.edad);
    SET NEW.celular = IF (NEW.celular = '', OLD.celular, NEW.celular);
    SET NEW.email= IF (NEW.email = '', OLD.email, NEW.email);
END$$
delimiter ;

DROP TRIGGER IF EXISTS before_ubicacioncliente_update;
delimiter $$
CREATE TRIGGER before_ubicacioncliente_update
BEFORE UPDATE ON ubicacioncliente FOR EACH ROW
BEGIN
    SET NEW.callePrincipal = IF (NEW.callePrincipal = '', OLD.callePrincipal, NEW.callePrincipal);
    SET NEW.callesAdyacentes = IF (NEW.callesAdyacentes = '', OLD.callesAdyacentes, NEW.callesAdyacentes);
    SET NEW.colonia = IF (NEW.colonia = '', OLD.colonia, NEW.colonia);
    SET NEW.numeroExterior = IF (NEW.numeroExterior = '', OLD.numeroExterior, NEW.numeroExterior);
    SET NEW.numeroInterior = IF (NEW.numeroInterior = '', OLD.numeroInterior, NEW.numeroInterior);
    SET NEW.cp = IF (NEW.cp = '', OLD.cp, NEW.cp);
END$$
delimiter ;

DROP TRIGGER IF EXISTS before_pedidoproducto_insert;
delimiter $$
CREATE TRIGGER before_pedidoproducto_insert
BEFORE INSERT ON pedidoproducto FOR EACH ROW
BEGIN
    SET NEW.subtotal = (SELECT precio * NEW.cantidad FROM producto WHERE idProducto = NEW.idProducto);
    UPDATE producto SET existencias = existencias - NEW.cantidad WHERE idProducto = NEW.idProducto;
END$$
delimiter ;

DROP TRIGGER IF EXISTS after_pedidoproducto_insert;
delimiter $$
CREATE TRIGGER after_pedidoproducto_insert
AFTER INSERT ON pedidoproducto FOR EACH ROW
BEGIN
    UPDATE pedido SET
        total = total + NEW.subtotal,
        anticipo = total / 2,
        totalProductos = totalProductos + NEW.cantidad
    WHERE id =  NEW.idPedido;
END$$
delimiter ;

DROP TRIGGER IF EXISTS before_pedidoproducto_delete;
delimiter $$
CREATE TRIGGER before_pedidoproducto_delete
BEFORE DELETE ON pedidoproducto FOR EACH ROW
BEGIN
    UPDATE pedido
    SET
	    total = total - OLD.subtotal,
        anticipo = total / 2,
        totalProductos = totalProductos - OLD.cantidad
	WHERE id = OLD.idPedido;
    
    UPDATE producto
    SET
        existencias = existencias + OLD.cantidad
	WHERE idProducto = OLD.idProducto;
END$$
delimiter ;

DROP TRIGGER IF EXISTS before_pedidoproducto_update;
delimiter $$
CREATE TRIGGER before_pedidoproducto_update
BEFORE UPDATE ON pedidoproducto FOR EACH ROW
BEGIN
    DECLARE precioProducto DECIMAL(11, 2);
    DECLARE cantidadActualizada INT;

    SELECT precio INTO precioProducto FROM producto WHERE idProducto = NEW.idProducto;
	SET cantidadActualizada = NEW.cantidad - OLD.cantidad;
    SET NEW.subtotal = NEW.cantidad * precioProducto;

    UPDATE producto
    SET
        existencias = existencias - cantidadActualizada
	WHERE idProducto = NEW.idProducto;
    
    UPDATE pedido 
    SET
        total = total + (NEW.subtotal - OLD.subtotal),
        anticipo = total / 2,
        totalProductos = totalProductos + cantidadActualizada
	WHERE id = NEW.idPedido;
END$$
delimiter ;

DROP TRIGGER IF EXISTS before_pedido_delete;
delimiter $$
CREATE TRIGGER before_pedido_delete
BEFORE DELETE ON pedido FOR EACH ROW
BEGIN
    DECLARE idEntregaPedido INT;
    SELECT idEntrega INTO idEntregaPedido FROM pedido WHERE id = OLD.id;
    DELETE FROM entrega WHERE id = idEntregaPedido;
    
    UPDATE producto p
    INNER JOIN pedidoproducto pp ON p.idProducto = pp.idProducto
    SET
        p.existencias = p.existencias + pp.cantidad
	WHERE pp.idPedido = OLD.id;
END$$
delimiter ;

DROP TRIGGER IF EXISTS before_entrega_update;
delimiter $$
CREATE TRIGGER before_entrega_update
BEFORE UPDATE ON entrega FOR EACH ROW
BEGIN
    SET NEW.nombreDestinatario = IF (NEW.nombreDestinatario = '', OLD.nombreDestinatario, NEW.nombreDestinatario);
    SET NEW.telefonoDestinatario = IF (NEW.telefonoDestinatario = '', OLD.telefonoDestinatario, NEW.telefonoDestinatario);
END$$
delimiter ;
