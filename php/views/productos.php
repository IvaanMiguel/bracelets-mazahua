<!DOCTYPE html>
<html lang='es'>
<head>
  <?php require_once HEAD_TAGS ?>

  <link rel='stylesheet' href='css/principal.css'>
  <script type='module' src='components/menu-lateral.js'></script>
  <script type='module' src='components/md-icono/md-icono.js'></script>
  <script type='module' src='components/md-boton/md-boton.js'></script>
</head>
<body>
  <main class='contenedor'>
    <menu-lateral-2>
      <button
          class='boton boton--icono bg-primario txt-blanco boton-primario-rellenado'
          is='md-boton'
          data-evento='alternarmenu'
          slot='boton-menu'>
        <md-icono class='icono-chico' data-icono='menu' data-opsz='20'></md-icono>
      </button>
      <a class='boton boton--icono-texto bg-primario txt-blanco boton-primario-rellenado'
          data-clase-reducido='boton--icono'
          is='md-boton'
          href=''>
        <md-icono class='icono-chico' data-icono='home' data-opsz='20'></md-icono>
        <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>
          Inicio
        </span>
      </a>
      <a class='boton boton--icono-texto bg-primario txt-blanco boton-primario-rellenado'
          data-clase-reducido='boton--icono'
          is='md-boton'
          href=''>
        <md-icono class='icono-chico' data-icono='home' data-opsz='20'></md-icono>
        <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>
          Inicio
        </span>
      </a>
      <a class='boton boton--icono-texto bg-primario txt-blanco boton-primario-rellenado'
          data-clase-reducido='boton--icono'
          is='md-boton'
          href=''>
        <md-icono class='icono-chico' data-icono='home' data-opsz='20'></md-icono>
        <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>
          Inicio
        </span>
      </a>
      <a class='boton boton--icono-texto bg-primario txt-blanco boton-primario-rellenado'
          data-clase-reducido='boton--icono'
          is='md-boton'
          href=''>
        <md-icono class='icono-chico' data-icono='home' data-opsz='20'></md-icono>
        <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>
          Inicio
        </span>
      </a>
      <a class='boton boton--icono-texto bg-primario txt-blanco boton-primario-rellenado'
          data-clase-reducido='boton--icono'
          is='md-boton'
          href=''>
        <md-icono class='icono-chico' data-icono='home' data-opsz='20'></md-icono>
        <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>
          Inicio
        </span>
      </a>
      <button
          class='boton boton--icono-texto bg-primario txt-blanco boton-primario-rellenado'
          data-clase-reducido='boton--icono'
          is='md-boton'
          data-evento='confirmarcierresesion'
          slot='boton-cerrar-sesion'>
        <md-icono class='icono-chico' data-icono='logout' data-opsz='20'></md-icono>
        <span class='etiqueta etiqueta-grande' data-clase-reducido='etiqueta--oculto' data-rol='etiqueta'>
          Cerrar sesión
        </span>
      </button>
    </menu-lateral-2>
  </main>
</body>
</html>