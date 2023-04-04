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

  <script defer type='module' src='components/md-icono/md-icono.js'></script>
  <script defer type='module' src='components/md-boton/md-boton.js'></script>
  <script defer type='module' src='components/campo-texto/campo-texto.js'></script>
  <script defer type='module' src='components/campo-clave/campo-clave.js'></script>
  <script defer type='module' src='components/menu-lateral/menu-lateral.js'></script>
  <script defer type='module' src='components/ventana-emergente/ventana-emergente.js'></script>
</head>

<body>
  <main class='contenedor'>
    <menu-lateral class='menu-lateral bg-primario' data-clase-reducido='menu-lateral--reducido'>
      <button class='boton boton--icono bg-primario txt-blanco boton-primario-rellenado' is='md-boton' data-evento='alternarmenu'>
        <md-icono class='icono-chico' data-icono='menu'></md-icono>
      </button>
      <div class='menu-lateral__secciones'>
        <button class='boton boton--icono-texto bg-primario txt-blanco boton-primario-rellenado' data-clase-reducido='boton--icono' is='md-boton' data-evento='cargarseccion' name='inicio'>
          <md-icono class='icono-chico' data-icono='home'></md-icono>
          <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>Inicio</span>
        </button>
        <button class='boton boton--icono-texto bg-primario txt-blanco boton-primario-rellenado' data-clase-reducido='boton--icono' is='md-boton' data-evento='cargarseccion' name='nuevoPedido'>
          <md-icono class='icono-chico' data-icono='shopping_basket'></md-icono>
          <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>Nuevo pedido</span>
        </button>
        <button class='boton boton--icono-texto bg-primario txt-blanco boton-primario-rellenado' data-clase-reducido='boton--icono' is='md-boton' data-evento='cargarseccion' name='clientes'>
          <md-icono class='icono-chico' data-icono='groups'></md-icono>
          <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>Clientes</span>
        </button>
        <button class='boton boton--icono-texto bg-primario txt-blanco boton-primario-rellenado' data-clase-reducido='boton--icono' is='md-boton' data-evento='cargarseccion' name='productos'>
          <md-icono class='icono-chico' data-icono='inventory_2'></md-icono>
          <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>Productos</span>
        </button>
        <button class='boton boton--icono-texto bg-primario txt-blanco boton-primario-rellenado' data-clase-reducido='boton--icono' is='md-boton' data-evento='cargarseccion' name='pedidos'>
          <md-icono class='icono-chico' data-icono='inventory'></md-icono>
          <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>Pedidos</span>
        </button>
      </div>
      <button class='boton boton--icono-texto bg-primario txt-blanco boton-primario-rellenado' data-clase-reducido='boton--icono' is='md-boton' data-evento='confirmarcierresesion'>
        <md-icono class='icono-chico' data-icono='logout'></md-icono>
        <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>Cerrar sesión</span>
      </button>
    </menu-lateral>
    <div class='contenido'>
      <div class='cabecera'>
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

  <ventana-emergente data-id='cerrar-sesion'>
    <div class='contenido'>
      <span class='titulo-grande'>Cerrar sesión</span>
      <span class='cuerpo-mediano'>¿Deseas salir y cerrar la sesión actual?</span>
      <div class='botones-contenedor botones-contenedor--flex-end'>
        <button class='boton bg-primario txt-blanco boton-primario-rellenado' is='md-boton' data-evento='cerrarsesion'>Sí</button>
        <button class='boton boton-delineado bg-transparente txt-primario boton-primario-delineado' is='md-boton' data-evento='cerrarventana'>No</button>
      </div>
    </div>
  </ventana-emergente>
</body>

</html>
