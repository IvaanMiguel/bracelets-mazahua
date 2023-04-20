<?php require_once COMPROBAR_SESION ?>

<!DOCTYPE html>
<html lang='es'>
<head>
  <?php require_once HEAD_TAGS ?>

  <link rel='stylesheet' href='css/principal.css'>
  <link rel='stylesheet' href='css/sections/clientes.css'>

  <script type='module' src='components/md-boton/md-boton.js'></script>
  <script type='module' src='components/tab-secciones/tab-secciones.js'></script>
  <script type='module' src='components/campo-texto/campo-texto.js'></script>
  <script type='module' src='components/ventana-emergente/ventana-emergente.js'></script>
  <script type='module' src='components/wc-colapsable/wc-colapsable.js'></script>
  <script type='module' src='components/item-removible/item-removible.js'></script>
  <script type='module' src='components/wc-divisor/wc-divisor.js'></script>
  <script type='module' src='components/item-divisor/item-divisor.js'></script>
  <script type='module' src='components/item-detalles/item-detalles.js'></script>
  <script type='module' src='components/lista-controlador/lista-controlador.js'></script>
  <script type='module' src='components/lista-encabezada/lista-encabezada.js'></script>
  <script type='module' src='components/boton-delineado.js'></script>
  <script type='module' src='components/boton-texto.js'></script>
  <script type='module' src='components/boton-elevado.js'></script>
</head>
<body>
  <main class='contenedor'>
    <?php require_once MENU ?>

    <div class='contenido'>
      <?php require_once CABECERA ?>

      <div class='seccion' data-rol='secciones'>
        <div class='clientes'>
          <tab-secciones>
            <button class='boton boton-fondo-texto txt-fondo-alternativo' is='md-boton' slot='boton-administrar' data-evento='cargarclientes'>
              <md-icono data-icono='settings' data-opsz='24'></md-icono>
              <span class='titulo-mediano'>Administrar clientes</span>
            </button>
            <button class='boton boton-fondo-texto txt-fondo-alternativo' is='md-boton' slot='boton-agregar' data-evento='agregarcliente'>
              <md-icono data-icono='add' data-opsz='24'></md-icono>
              <span class='titulo-mediano'>Agregar cliente nuevo</span>
            </button>

            <div data-id='contenido-administrar'>
              <?php require_once 'partials/customers/administrar-clientes.php' ?>
            </div>
            <div data-id='contenido-agregar'>
              <?php require_once 'partials/customers/agregar-cliente.php' ?>
            </div>
          </tab-secciones>
        </div>
      </div>
    </div>
  </main>

  <ventana-emergente data-id='remover-ubicacion'>
    <div class='contenido'>
      <span class='titulo-grande'>Remover ubicación</span>
      <span class='cuerpo-mediano'>La información de dicha ubicación ya no se guardará junto con el cliente si es removida, ¿deseas continuar?</span>
      <div class='botones-contenedor botones-contenedor--flex-end'>
        <button
          class='boton bg-primario txt-blanco boton-primario-rellenado'
          is='md-boton'
          data-evento='removerubicacion'>Sí
        </button>
        <button
          class='boton boton-delineado bg-transparente txt-primario boton-primario-delineado'
          is='md-boton'
          data-evento='cerrarventana'>No
        </button>
      </div>
    </div>
  </ventana-emergente>
</body>
</html>
