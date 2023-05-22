CREATE DATABASE IF NOT EXISTS braceletsmazahua;
USE braceletsmazahua;

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
    email VARCHAR(255) UNIQUE
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS ubicacionCliente(
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

CREATE TABLE IF NOT EXISTS categoriaProducto(
    idCategoriaProducto INT AUTO_INCREMENT PRIMARY KEY,
    nombreCategoria VARCHAR(30) NOT NULL UNIQUE
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS producto(
    idProducto INT AUTO_INCREMENT PRIMARY KEY,
    nombreProducto VARCHAR(20) NOT NULL UNIQUE,
    idCategoriaProducto INT NOT NULL,
    precio DECIMAL(5, 2) NOT NULL,
    existencias INT NOT NULL,
    FOREIGN KEY(idCategoriaProducto) REFERENCES categoriaProducto(idCategoriaProducto)
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
    anticipo DECIMAL(11, 2) NOT NULL,
    idEntrega INT,
    fechaCreacion DATETIME NOT NULL,
    idUsuario INT NOT NULL,
    FOREIGN KEY(idEntrega) REFERENCES entrega(id)
        ON DELETE RESTRICT
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
        ON DELETE CASCADE
        ON UPDATE CASCADE
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS pedidocompletado(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombreCliente VARCHAR(130) NOT NULL,
    nombreDestinatario VARCHAR(130) NOT NULL,
    celularDestinatario VARCHAR(12) NOT NULL,
    tipoEntrega ENUM('Domicilio', 'Aplicación', 'Pick up') NOT NULL,
    tipoPago ENUM('Depósito', 'Tarjeta', 'Efectivo') NOT NULL,
    callePrincipal VARCHAR(30) NOT NULL,
    callesAdyacentes VARCHAR(60),
    colonia VARCHAR(60) NOT NULL,
    numeroExterior VARCHAR(6),
    numeroInterior VARCHAR(6),
    cp CHAR(6) NOT NULL,
    fechaEntrega DATE NOT NULL,
    horaEntrega TIME NOT NULL,
    totalProductos INT NOT NULL,
    total DECIMAL(11, 2),
    fechaCompletado DATETIME NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS productocomprado(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL,
    cantidad INT NOT NULL,
    subtotal DECIMAL(11, 2) NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS productopedidocompletado(
    idPedidoCompletado INT NOT NULL,
    idProductoComprado INT NOT NULL,
    FOREIGN KEY (idPedidoCompletado) REFERENCES pedidocompletado(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (idProductoComprado) REFERENCES productocomprado(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
