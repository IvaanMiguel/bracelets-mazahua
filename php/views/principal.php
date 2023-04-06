<?php
use \controllers\Principal;

require_once 'php/includes/comprobar_sesion.inc.php';
?>

<!DOCTYPE html>
<html lang='es'>

<head>
  <?php require_once META_LINKS ?>

  <link rel='stylesheet' href='css/index.css'>

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
        <md-icono class='icono-chico' data-icono='menu' data-opsz='20'></md-icono>
      </button>
      <div class='menu-lateral__secciones'>

        <?php foreach (Principal::$menuBotones as $boton) : ?>
          <button class='boton boton--icono-texto bg-primario txt-blanco boton-primario-rellenado'
              data-clase-reducido='boton--icono'
              is='md-boton'
              data-evento='cargarseccion'
              name=<?= $boton['nombreBoton']; ?>>
            <md-icono class='icono-chico' data-icono=<?= $boton['icono']; ?> data-opsz='20'></md-icono>
            <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>
              <?= $boton['etiqueta']; ?>
            </span>
          </button>
        <?php endforeach; ?>

      </div>
      <button class='boton boton--icono-texto bg-primario txt-blanco boton-primario-rellenado'
          data-clase-reducido='boton--icono'
          is='md-boton'
          data-evento='confirmarcierresesion'>
        <md-icono class='icono-chico' data-icono='logout' data-opsz='20'></md-icono>
        <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>
          Cerrar sesión
        </span>
      </button>
    </menu-lateral>
    <div class='contenido'>
      <div class='cabecera'>
        <h1 class='cabecera__titulo titulo-grande'>Bracelets Mazahua</h1>
        <span class='cabecera__nombre titulo-mediano'>
          <?= isset($_SESSION['nombreUsuario']) ? $_SESSION['nombreUsuario'] : ''; ?>
        </span>
      </div>
      <div class='seccion' data-rol='secciones'>
        <?php include_once INICIO; ?>
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
