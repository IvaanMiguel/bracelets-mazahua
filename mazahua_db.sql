CREATE DATABASE IF NOT EXISTS braceletsmazahua;
USE braceletsmazahua;

SET lc_time_names = 'es_MX';

CREATE TABLE IF NOT EXISTS usuario(
    idUsuario INT AUTO_INCREMENT PRIMARY KEY,
    nombreUsuario VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    clave CHAR(60) NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS cliente(
    id INT AUTO_INCREMENT PRIMARY KEY,    
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(80) NOT NULL,
    edad INT NOT NULL,
    celular VARCHAR(12) NOT NULL UNIQUE,
    email VARCHAR(255) UNIQUE,
    pedidosCreados INT UNSIGNED NOT NULL DEFAULT 0,
    pedidosCompletados INT UNSIGNED NOT NULL DEFAULT 0
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS ubicacioncliente(
    id INT AUTO_INCREMENT PRIMARY KEY,
    callePrincipal VARCHAR(30) NOT NULL,
    callesAdyacentes VARCHAR(60),
    colonia VARCHAR(60) NOT NULL,
    numeroExterior VARCHAR(6),
    numeroInterior VARCHAR(6),
    cp CHAR(6) NOT NULL,
    idCliente INT NOT NULL,
    FOREIGN KEY(idCliente) REFERENCES cliente(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS categoriaproducto(
    idCategoriaProducto INT AUTO_INCREMENT PRIMARY KEY,
    nombreCategoria VARCHAR(30) NOT NULL UNIQUE
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS producto(
    idProducto INT AUTO_INCREMENT PRIMARY KEY,
    nombreProducto VARCHAR(50) NOT NULL UNIQUE,
    idCategoriaProducto INT NOT NULL,
    precio DECIMAL(5, 2) UNSIGNED NOT NULL,
    existencias INT UNSIGNED NOT NULL,
    FOREIGN KEY(idCategoriaProducto) REFERENCES categoriaproducto(idCategoriaProducto)
        ON DELETE NO ACTION
        ON UPDATE CASCADE
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS entrega(
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipoEntrega ENUM('Domicilio', 'Aplicación', 'Pick up') NOT NULL,
    aplicacion ENUM('Uber', 'Didi'),
    nombreDestinatario VARCHAR(130) NOT NULL,
    telefonoDestinatario VARCHAR(12) NOT NULL,
    fechaEntrega DATE NOT NULL,
    horaEntrega TIME NOT NULL,
    idUbicacionCliente INT,
    FOREIGN KEY (idUbicacionCliente) REFERENCES ubicacioncliente(id)
        ON DELETE NO ACTION
        ON UPDATE CASCADE
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS pedido(
    id INT AUTO_INCREMENT PRIMARY KEY,
    idCliente INT NOT NULL,
    tipoPago ENUM('Depósito', 'Tarjeta', 'Efectivo') NOT NULL,
    detallesPago VARCHAR(40),
    total DECIMAL(11, 2) DEFAULT 0,
    anticipo DECIMAL(11, 2) DEFAULT 0 NOT NULL,
    estadoAnticipo BOOL DEFAULT 0 NOT NULL,
    totalProductos INT DEFAULT 0,
    idEntrega INT,
    fechaCreacion DATETIME NOT NULL,
    idUsuario INT NOT NULL,
    FOREIGN KEY(idEntrega) REFERENCES entrega(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE,
    FOREIGN KEY(idCliente) REFERENCES cliente(id)
        ON DELETE NO ACTION
        ON UPDATE CASCADE,
    FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario)
        ON DELETE NO ACTION
        ON UPDATE CASCADE
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS pedidoproducto(
    idPedido INT NOT NULL,
    idProducto INT NOT NULL,
    cantidad INT NOT NULL,
    subtotal DECIMAL(11, 2) NOT NULL,
    FOREIGN KEY(idPedido) REFERENCES pedido(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY(idProducto) REFERENCES producto(idProducto)
        ON DELETE NO ACTION
        ON UPDATE CASCADE
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS pedidocompletado(
    id INT PRIMARY KEY,
    nombreCliente VARCHAR(130) NOT NULL,
    nombreDestinatario VARCHAR(130) NOT NULL,
    celularDestinatario VARCHAR(12) NOT NULL,
    tipoEntrega ENUM('Domicilio', 'Aplicación', 'Pick up') NOT NULL,
    aplicacion ENUM('Uber', 'Didi'),
    tipoPago ENUM('Depósito', 'Tarjeta', 'Efectivo') NOT NULL,
    detallesPago VARCHAR(40),
    callePrincipal VARCHAR(30),
    callesAdyacentes VARCHAR(60),
    colonia VARCHAR(60),
    numeroExterior VARCHAR(6),
    numeroInterior VARCHAR(6),
    cp CHAR(6),
    fechaEntrega DATE NOT NULL,
    horaEntrega TIME NOT NULL,
    totalProductos INT NOT NULL,
    total DECIMAL(11, 2),
    anticipo DECIMAL(11, 2),
    fechaCompletado DATETIME NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS productocomprado(
    id INT AUTO_INCREMENT PRIMARY KEY,
    idPedidoCompletado INT NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    nombreCategoria VARCHAR(30) NOT NULL DEFAULT '',
    cantidad INT NOT NULL,
    subtotal DECIMAL(11, 2) NOT NULL,
    FOREIGN KEY (idPedidoCompletado) REFERENCES pedidocompletado(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS pedidosrelacion(
	id INT AUTO_INCREMENT PRIMARY KEY,
    pedidosCreados INT UNSIGNED NOT NULL DEFAULT 0,
    pedidosCompletados INT UNSIGNED NOT NULL DEFAULt 0
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS metodopagoutilizado(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nombre ENUM('Depósito', 'Tarjeta', 'Efectivo') NOT NULL,
    vecesUsado INT UNSIGNED NOT NULL DEFAULT 0
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
