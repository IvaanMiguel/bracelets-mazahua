INSERT INTO cliente (nombre, apellidos, edad, celular, email)
VALUES
    ('John Doe', 'Smith', 25, '1234567890', 'johndoe@example.com'),
    ('Jane Smith', 'Johnson', 30, '2345678901', NULL),
    ('Michael Johnson', 'Brown', 35, '3456789012', 'michaeljohnson@example.com'),
    ('Emily Davis', 'Miller', 40, '4567890123', 'emilydavis@example.com'),
    ('Daniel Wilson', 'Jones', 45, '5678901234', NULL),
    ('Olivia Taylor', 'Clark', 50, '6789012345', 'oliviataylor@example.com'),
    ('William Anderson', 'White', 55, '7890123456', NULL),
    ('Sophia Jackson', 'Smith', 60, '8901234567', 'sophiajackson@example.com'),
    ('James Harris', 'Thompson', 65, '9012345678', NULL),
    ('Mia Lee', 'Davis', 70, '0123456789', 'miale@example.com');

INSERT INTO ubicacionCliente (callePrincipal, callesAdyacentes, colonia, numeroExterior, numeroInterior, cp, idCliente)
VALUES
    ('Avenida del Sol', NULL, 'Colonia Primavera', '123', '100', '12345', 1),
    ('Calle de la Luna', 'Calle del Bosque, Calle de las Flores', 'Colonia Otoño', '456', '101', '23456', 1),
    ('Avenida de los Pinos', 'Calle del Arroyo', 'Colonia Verano', NULL, NULL, '34567', 1),
    ('Calle del Río', 'Calle del Puente, Calle del Camino', 'Colonia Invierno', '789', '102', '45678', 2),
    ('Calle del Mar', NULL, 'Colonia Montaña', '012', '103', '56789', 2),
    ('Avenida de las Estrellas', 'Calle del Mirador', 'Colonia Playa', '345', '104', '67890', 2),
    ('Calle del Parque', NULL, 'Colonia Jardín', '678', '105', '78901', 3),
    ('Avenida de las Flores', 'Calle del Lago, Calle de la Fuente', 'Colonia Villa', NULL, NULL, '89012', 3),
    ('Calle del Puente', 'Calle del Bosque', 'Colonia Cascada', '901', '106', '90123', 3),
    ('Avenida del Bosque', NULL, 'Colonia Residencial', '234', '107', '01234', 4),
    ('Calle del Arroyo', 'Calle del Lago, Calle del Puente', 'Colonia Bosque', '567', '108', '12345', 4),
    ('Avenida del Camino', 'Calle de las Flores', 'Colonia Río', '890', '109', '23456', 4),
    ('Calle del Mirador', NULL, 'Colonia Montaña', '123', '110', '34567', 5),
    ('Avenida del Lago', 'Calle de la Fuente, Calle del Parque', 'Colonia Playa', '456', '111', '45678', 5),
    ('Calle del Jardín', 'Calle del Bosque', 'Colonia Villa', '789', '112', '56789', 5),
    ('Avenida del Mar', NULL, 'Colonia Océano', NULL, NULL, '67890', 6),
    ('Calle del Río', 'Calle del Puente, Calle del Camino', 'Colonia Isla', '901', '113', '78901', 6),
    ('Avenida de la Playa', 'Calle del Mirador', 'Colonia Costa', '012', '114', '89012', 6),
    ('Calle del Lago', NULL, 'Colonia Puerto', '345', '115', '90123', 7),
    ('Avenida del Puente', 'Calle de la Fuente, Calle del Parque', 'Colonia Río', NULL, NULL, '01234', 7),
    ('Calle del Bosque', 'Calle del Arroyo', 'Colonia Sierra', '678', '116', '12345', 7),
    ('Avenida del Arroyo', NULL, 'Colonia Valle', '901', '117', '23456', 8),
    ('Calle del Camino', 'Calle del Puente, Calle del Río', 'Colonia Montaña', '234', NULL, '34567', 8),
    ('Avenida del Mirador', 'Calle de las Flores', 'Colonia Vista', '567', '118', '45678', 8),
    ('Calle de la Fuente', NULL, 'Colonia Jardín', '890', '119', '56789', 9),
    ('Avenida del Bosque', 'Calle del Arroyo, Calle del Puente', 'Colonia Naturaleza', '123', '120', '67890', 9),
    ('Calle del Lago', 'Calle del Mirador', 'Colonia Costa', NULL, NULL, '78901', 9),
    ('Avenida del Parque', NULL, 'Colonia Residencial', '456', '121', '89012', 10),
    ('Calle del Jardín', 'Calle del Bosque, Calle del Arroyo', 'Colonia Villa', '789', '122', '90123', 10),
    ('Avenida del Lago', 'Calle de la Fuente', 'Colonia Bosque', '012', '123', '01234', 10);

INSERT INTO categoriaProducto (nombreCategoria) VALUES ('Pulseras');

INSERT INTO producto (nombreProducto, idCategoriaProducto, precio, existencias)
VALUES
    ('Pulsera de Cuero', 1, 29.99, 23),
    ('Pulsera de Perlas', 1, 39.99, 8),
    ('Pulsera de Plata', 1, 49.99, 42);

INSERT INTO categoriaProducto (nombreCategoria) VALUES ('Collares');

INSERT INTO producto (nombreProducto, idCategoriaProducto, precio, existencias)
VALUES
    ('Collar de Plata', 2, 79.99, 36),
    ('Collar de Cuentas', 2, 59.99, 14),
    ('Collar de Piedras Naturales', 2, 89.99, 21),
    ('Collar de Oro', 2, 99.99, 3);

INSERT INTO categoriaProducto (nombreCategoria) VALUES ('Anillos');

INSERT INTO producto (nombreProducto, idCategoriaProducto, precio, existencias)
VALUES
    ('Anillo de Plata', 3, 69.99, 17),
    ('Anillo de Oro', 3, 99.99, 50),
    ('Anillo con Diamante', 3, 199.99, 1),
    ('Anillo de Compromiso', 3, 149.99, 9),
    ('Anillo de Acero', 3, 49.99, 27);

INSERT INTO categoriaProducto (nombreCategoria) VALUES ('Pendientes');

INSERT INTO producto (nombreProducto, idCategoriaProducto, precio, existencias)
VALUES
    ('Pendientes de Plata', 4, 39.99, 19),
    ('Pendientes de Perlas', 4, 49.99, 5),
    ('Pendientes de Diamantes', 4, 299.99, 2);

INSERT INTO categoriaProducto (nombreCategoria) VALUES ('Relojes');

INSERT INTO producto (nombreProducto, idCategoriaProducto, precio, existencias)
VALUES
    ('Reloj Analógico', 5, 89.99, 11),
    ('Reloj Digital', 5, 49.99, 28),
    ('Reloj Deportivo', 5, 99.99, 5),
    ('Reloj de Lujo', 5, 199.99, 50),
    ('Reloj Inteligente', 5, 149.99, 33);

INSERT INTO categoriaProducto (nombreCategoria) VALUES ('Broches');

INSERT INTO producto (nombreProducto, idCategoriaProducto, precio, existencias)
VALUES
    ('Broche de Mariposa', 6, 19.99, 50),
    ('Broche de Flor', 6, 14.99, 37),
    ('Broche de Hoja', 6, 12.99, 15),
    ('Broche de Corazón', 6, 24.99, 2),
    ('Broche de Perla', 6, 17.99, 6);

INSERT INTO categoriaProducto (nombreCategoria) VALUES ('Gargantillas');

INSERT INTO producto (nombreProducto, idCategoriaProducto, precio, existencias)
VALUES
    ('Gargantilla de Plata', 7, 69.99, 4),
    ('Gargantilla de Oro', 7, 99.99, 2),
    ('Gargantilla con Colgante', 7, 79.99, 6),
    ('Gargantilla de Cuentas', 7, 49.99, 5);

INSERT INTO categoriaProducto (nombreCategoria) VALUES ('Tobilleras');

INSERT INTO producto (nombreProducto, idCategoriaProducto, precio, existencias)
VALUES
    ('Tobillera de Plata', 8, 29.99, 7),
    ('Tobillera de Cuentas', 8, 24.99, 5),
    ('Tobillera de Perlas', 8, 34.99, 3),
    ('Tobillera de Acero', 8, 19.99, 4),
    ('Tobillera de Oro', 8, 39.99, 2);

INSERT INTO categoriaProducto (nombreCategoria) VALUES ('Broches para el Cabello');

INSERT INTO producto (nombreProducto, idCategoriaProducto, precio, existencias)
VALUES
    ('Broche de Fresa', 9, 9.99, 10),
    ('Broche de Margarita', 9, 7.99, 8),
    ('Broche de Lazo', 9, 6.99, 5),
    ('Broche de Estrella', 9, 12.99, 3),
    ('Broche de Diamante', 9, 11.99, 6);

INSERT INTO categoriaProducto (nombreCategoria) VALUES ('Brazaletes');

INSERT INTO producto (nombreProducto, idCategoriaProducto, precio, existencias)
VALUES
    ('Brazalete de Plata', 10, 49.99, 6),
    ('Brazalete de Oro', 10, 79.99, 3),
    ('Brazalete de Piedras Naturales', 10, 59.99, 5),
    ('Brazalete de Acero', 10, 34.99, 4),
    ('Brazalete de Diamantes', 10, 199.99, 2);