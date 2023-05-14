CREATE DATABASE IF NOT EXISTS braceletsMazahua;
USE braceletsMazahua;

-- CREACIÓN DE TABLAS
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
    callesAdyacentes VARCHAR(60) DEFAULT '' NOT NULL,
    colonia VARCHAR(60) NOT NULL,
    numeroExterior VARCHAR(6) DEFAULT '' NOT NULL,
    numeroInterior VARCHAR(6) DEFAULT '' NOT NULL,
    cp CHAR(6) NOT NULL,
	/* estado VARCHAR(30) NOT NULL, */
    /* ciudad VARCHAR(30) NOT NULL, */
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

/* CREATE TABLE IF NOT EXISTS puntoEncuentro(
    idPuntoEncuentro INT AUTO_INCREMENT PRIMARY KEY,
    nombreUbicacion VARCHAR(40) NOT NULL UNIQUE
); */

CREATE TABLE IF NOT EXISTS entrega(
    idEntrega INT AUTO_INCREMENT PRIMARY KEY,
    tipoEntrega ENUM(/* 'Punto de encuentro', */'Domicilio', 'Aplicación', 'Pick up') NOT NULL,
    aplicacion ENUM( 'No aplica', 'Uber', 'Didi') DEFAULT 'No aplica' NOT NULL,
    -- idPuntoEncuentro INT DEFAULT 0 NOT NULL,
    nombreDestinatario VARCHAR(60) DEFAULT '' NOT NULL,
    telefonoDestinatario VARCHAR(14) DEFAULT '' NOT NULL,
    fechaEntrega DATE NOT NULL,
    horaEntrega TIME DEFAULT NULL/*,
    FOREIGN KEY(idPuntoEncuentro) REFERENCES puntoEncuentro(idPuntoEncuentro)
        ON DELETE RESTRICT
        ON UPDATE CASCADE */
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS ubicacionEntrega(
    idEntrega INT NOT NULL UNIQUE,
    idUbicacionCliente INT NOT NULL,
    FOREIGN KEY(idEntrega) REFERENCES entrega(idEntrega)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY(idUbicacionCliente) REFERENCES ubicacionCliente(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS pedido(
    idPedido INT AUTO_INCREMENT PRIMARY KEY,
    idCliente INT NOT NULL,
    tipoPago ENUM('Depósito','Transferencia','Efectivo') NOT NULL,
    totalPedido DECIMAL(11, 2) NOT NULL,
    anticipo DECIMAL(11, 2) NOT NULL,
    /* estadoPago  ENUM('Sin pagar', 'Anticipo', 'Pagado') DEFAULT 'Sin pagar' NOT NULL, */
    estadoPedido ENUM('Anticipo - sin entregar', 'Pagado - sin entregar', 'Entregado'),
    idUsuario INT NOT NULL,
    fechaCreacion DATETIME NOT NULL,
    FOREIGN KEY(idCliente) REFERENCES cliente(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS pedidoProducto(
    idPedido INT NOT NULL,
    idProducto INT NOT NULL,
    personalizado BOOLEAN DEFAULT 0,
    cantidadProducto INT NOT NULL,
    subtotalProducto DECIMAL(11, 2) NOT NULL,
    FOREIGN KEY(idPedido) REFERENCES pedido(idPedido)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY(idProducto) REFERENCES producto(idProducto)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS pedidoEntrega(
    idPedido INT NOT NULL UNIQUE,
    idEntrega INT NOT NULL,
    FOREIGN KEY(idPedido) REFERENCES pedido(idPedido)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY(idEntrega) REFERENCES entrega(idEntrega)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

/* CREATE TABLE IF NOT EXISTS envio(
    idEnvio INT AUTO_INCREMENT PRIMARY KEY,
    tipoEnvio ENUM('Básico','Estándar','Express') NOT NULL,
    fechaEnvio DATE NOT NULL,
    horaEnvio TIME NOT NULL,
    idUbicacionCliente INT NOT NULL,
    idPedido INT NOT NULL,
    FOREIGN KEY(idUbicacionCliente) REFERENCES ubicacionCliente(idUbicacionCliente)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY(idPedido) REFERENCES pedido(idPedido)
        ON DELETE CASCADE
        ON UPDATE CASCADE
); */
