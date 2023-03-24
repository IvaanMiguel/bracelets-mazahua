<?php require_once 'php/includes/comprobarsesion.inc.php' ?>

<!DOCTYPE html>
<html lang='es'>

<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>

  <!-- Roboto Google Fonts -->
  <link rel='preconnect' href='https://fonts.googleapis.com'>
  <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
  <link href='https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap' rel='stylesheet'>

  <!-- Material Design Google Icons -->
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200' />

  <link rel='stylesheet' href='css/global.css'>
  <link rel='stylesheet' href='css/index.css'>

  <title>Bracelets Mazahua</title>

  <script src='components/md-icono/md-icono.js' type='module' defer></script>
  <script src='components/md-boton/md-boton.js' type='module' defer></script>
  <script src='components/campo-texto/campo-texto.js' type='module' defer></script>
  <script src='components/campo-clave/campo-clave.js' type='module' defer></script>
  <script src='components/menu-lateral/menu-lateral.js' type='module' defer></script>
</head>

<body>
  <main class='contenedor'>
    <menu-lateral class='menu-lateral primario' data-clase-reducido='menu-lateral--reducido'>
      <button class='boton boton--icono primario primario-2-texto boton--active-primario' is='md-boton' data-evento='alternarmenu'>
        <md-icono class='icono-chico' data-icono='menu'></md-icono>
      </button>
      <div class='menu-lateral__secciones'>
        <button class='boton boton--icono-texto primario primario-2-texto boton--active-primario' data-clase-reducido='boton--icono' is='md-boton' data-evento='cargarseccion' name='inicio'>
          <md-icono class='icono-chico' data-icono='home'></md-icono>
          <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>Inicio</span>
        </button>
        <button class='boton boton--icono-texto primario primario-2-texto boton--active-primario' data-clase-reducido='boton--icono' is='md-boton' data-evento='cargarseccion' name='nuevoPedido'>
          <md-icono class='icono-chico' data-icono='shopping_basket'></md-icono>
          <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>Nuevo pedido</span>
        </button>
        <button class='boton boton--icono-texto primario primario-2-texto boton--active-primario' data-clase-reducido='boton--icono' is='md-boton' data-evento='cargarseccion' name='clientes'>
          <md-icono class='icono-chico' data-icono='groups'></md-icono>
          <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>Clientes</span>
        </button>
        <button class='boton boton--icono-texto primario primario-2-texto boton--active-primario' data-clase-reducido='boton--icono' is='md-boton' data-evento='cargarseccion' name='productos'>
          <md-icono class='icono-chico' data-icono='inventory_2'></md-icono>
          <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>Productos</span>
        </button>
        <button class='boton boton--icono-texto primario primario-2-texto boton--active-primario' data-clase-reducido='boton--icono' is='md-boton' data-evento='cargarseccion' name='pedidos'>
          <md-icono class='icono-chico' data-icono='inventory'></md-icono>
          <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>Pedidos</span>
        </button>
      </div>
      <button class='boton boton--icono-texto primario primario-2-texto boton--active-primario' data-clase-reducido='boton--icono' is='md-boton' data-evento='cerrarsesion'>
        <md-icono class='icono-chico' data-icono='logout'></md-icono>
        <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>Cerrar sesión</span>
      </button>
    </menu-lateral>
    <div class='contenido'>
      <div class='cabecera fondo-2-texto'>
        <h1 class='cabecera__titulo titulo-grande'>Bracelets Mazahua</h1>
        <span class='cabecera__nombre titulo-mediano'>
          <?= isset($_SESSION['nombreUsuario']) ? $_SESSION['nombreUsuario'] : '' ?>
        </span>
      </div>
      <div class='seccion' data-rol='secciones'>
        <?php include_once 'php/pages/inicio.php' ?>
      </div>
    </div>
  </main>
</body>

</html>
