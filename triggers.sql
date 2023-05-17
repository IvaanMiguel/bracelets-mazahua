DROP TRIGGER IF EXISTS before_producto_update;

DROP TRIGGER IF EXISTS before_producto_update;
delimiter $$
CREATE TRIGGER before_producto_update
BEFORE UPDATE ON producto FOR EACH ROW
BEGIN
    SET NEW.nombreProducto = IF (NEW.nombreProducto = '', OLD.nombreProducto, NEW.nombreProducto);
    SET NEW.precio = IF (NEW.precio = 0, OLD.precio, NEW.precio);
    SET NEW.existencias = IF (NEW.existencias = 0, OLD.existencias, NEW.existencias);
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
