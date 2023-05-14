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
