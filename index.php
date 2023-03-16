<?php require_once 'php/includes/comprobarsesion.inc.php' ?>

<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <!-- Roboto Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Material Design Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel='stylesheet' href='css/global.css'>
    <link rel='stylesheet' href='css/index.css'>

    <title>Bracelets Mazahua</title>

    <script src='components/md-icono/md-icono.js' type='module' defer></script>
    <!-- <script src='components/icono-emergente/icono-emergente.js' type='module' defer></script> -->
    <script src='components/md-boton/md-boton.js' type='module' defer></script>
    <script src='components/menu-lateral/menu-lateral.js' type='module' defer></script>
    <script src='components/campo-texto/campo-texto.js' type='module' defer></script>
</head>

<body>
    <main class='contenedor'>
        <menu-lateral class='primario'>
            <button is='md-boton' class='boton-menu primario primario-2-texto boton--active-primario'>
                <md-icono class='icono-chico' data-icono='menu' data-cursor='pointer'></md-icono>
            </button>
            <div class='menu-lateral__secciones'>
                <button is='md-boton' class='secciones__boton primario primario-2-texto boton--active-primario' name='inicio'>
                    <md-icono role='' class='icono-chico' data-icono='home' data-cursor='pointer'></md-icono>
                    <span class='etiqueta etiqueta-grande'>Inicio</span>
                </button>
                <button is='md-boton' class='secciones__boton primario primario-2-texto boton--active-primario' name='nuevoPedido'>
                    <md-icono class='icono-chico' data-icono='shopping_basket' data-cursor='pointer'></md-icono>
                    <span class='etiqueta etiqueta-grande'>Nuevo pedido</span>
                </button>
                <button is='md-boton' class='secciones__boton primario primario-2-texto boton--active-primario' name='clientes'>
                    <md-icono class='icono-chico' data-icono='groups' data-cursor='pointer'></md-icono>
                    <span class='etiqueta etiqueta-grande'>Clientes</span>
                </button>
                <button is='md-boton' class='secciones__boton primario primario-2-texto boton--active-primario' name='productos'>
                    <md-icono class='icono-chico' data-icono='inventory_2' data-cursor='pointer'></md-icono>
                    <span class='etiqueta etiqueta-grande'>Productos</span>
                </button>
                <button is='md-boton' class='secciones__boton primario primario-2-texto boton--active-primario' name='pedidos'>
                    <md-icono class='icono-chico' data-icono='inventory' data-cursor='pointer'></md-icono>
                    <span class='etiqueta etiqueta-grande'>Pedidos</span>
                </button>
            </div>
            <button is='md-boton' class='primario primario-2-texto boton--active-primario' name='cerrarSesion'>
                <md-icono class='icono-chico' data-icono='logout' data-cursor='pointer'></md-icono>
                <span class='etiqueta etiqueta-grande'>Cerrar sesión</span>
            </button>
        </menu-lateral>
        <div class='contenido'>
            <div class='cabecera fondo-2-texto'>
                <h1 class='cabecera__titulo titulo-grande'>Bracelets Mazahua</h1>
                <span class='cabecera__nombre titulo-mediano'>
                    <?= isset($_SESSION['nombreUsuario']) ? $_SESSION['nombreUsuario'] : '' ?>
                </span>
            </div>
            <div class='seccion'>
                <?php include_once 'php/pages/inicio.php' ?>
            </div>
            <!-- <md-icono data-icono='visibility'></md-icono> -->
            <campo-texto>
                <!-- <span class='cuerpo-mediano' slot='etiqueta-texto'>Hola</span> -->
                <!-- <icono-emergente slot='etiqueta-icono' data-icono='help'>
                    Hola
                </icono-emergente> -->
                <md-icono class='icono-chico' slot='etiqueta-icono' data-icono='error'></md-icono>
                <input class='fondo fondo-2-texto' slot='campo' type='text' name='' id=''>
            </campo-texto>
        </div>
    </main>
    <script src='js/cerrar-sesion.js'></script>
</body>

</html>