<?php require_once COMPROBAR_SESION ?>

<!DOCTYPE html>
<html lang='es'>
<head>
  <?php require_once HEAD_TAGS ?>

  <link rel='stylesheet' href='css/principal.css'>
  <link rel='stylesheet' href='css/sections/clientes.css'>

  <script type='module' src='components/wc-divisor.js'></script>
  <script type='module' src='components/boton-delineado.js'></script>
  <script type='module' src='components/boton-texto.js'></script>
  <script type='module' src='components/boton-elevado.js'></script>
  <script type='module' src='components/wc-colapsable.js'></script>
  <script type='module' src='components/lista-encabezada.js'></script>
  <script type='module' src='components/lista-controlador.js'></script>
  <script type='module' src='components/item-detalles.js'></script>
  <script type='module' src='components/item-divisor.js'></script>
  <script type='module' src='components/lista-item.js'></script>
  <script type='module' src='components/campo-texto.js'></script>
  <script type='module' src='components/boton-icono.js'></script>
  <script type='module' src='components/ventana-emergente.js'></script>
  <script type='module' src='components/wc-tabs.js'></script>
  <script type='module' src='components/lista-desplegable.js'></script>
  <script type='module' src='components/info-detalles.js'></script>
</head>
<body>
  <main class='contenedor'>
    <?php require_once MENU ?>

    <div class='contenido'>
      <?php require_once CABECERA ?>

      <div class='seccion'>
        <contenedor-flex padding='var(--espaciado-chico) var(--espaciado-jumbo) 0'>
          <wc-tabs>
            <boton-texto
                slot='tab'
                data-color-texto='var(--clr-fondo-10)'
                data-variante='texto-icono'
                data-icono='settings'
                data-etiqueta='Administrar clientes'
                data-expandir>
            </boton-texto>
            <wc-tabs id='subtab' data-tab='2' data-no-cabecera>
              <?php require 'partials/customers/cliente-vista.php' ?>
              <?php require 'partials/customers/administrar-clientes.php' ?>
            </wc-tabs>
            <boton-texto
                slot='tab'
                data-color-texto='var(--clr-fondo-10)'
                data-variante='texto-icono'
                data-icono='add'
                data-etiqueta='Agregar cliente nuevo'
                data-expandir>
            </boton-texto>
            <?php require 'partials/customers/agregar-cliente.php' ?>
          </wc-tabs>
        </contenedor-flex>
      </div>
    </div>
  </main>

  <?php require_once POPUPS_CLIENTES . '/editar-cliente.php' ?>
  <?php require_once POPUPS_CLIENTES . '/eliminar-cliente.php' ?>
  <?php require_once POPUPS_CLIENTES . '/agregar-ubicacion.php' ?>
  <?php require_once POPUPS_CLIENTES . '/eliminar-ubicacion.php' ?>
  <?php require_once POPUPS_CLIENTES . '/remover-ubicacion.php' ?>
  <?php require_once POPUPS_CLIENTES . '/editar-ubicacion.php' ?>

  <?php require_once PIE_PAGINA ?>

  <script type='module' src='js/customers/ordenar-clientes.js'></script>
  <script type='module' src='js/customers/agregar-cliente.js'></script>
  <script type='module' src='js/customers/mostrar-cliente.js'></script>
  <script type='module' src='js/customers/editar-cliente.js'></script>
  <script type='module' src='js/customers/eliminar-cliente.js'></script>
  <script type='module' src='js/customers/validar-campos-ubicacion.js'></script>
  <script type='module' src='js/customers/confirmar-remover-ubicacion.js'></script>
  <script type='module' src='js/customers/locations/agregar-ubicacion.js'></script>
  <script type='module' src='js/customers/locations/eliminar-ubicacion.js'></script>
  <script type='module' src='js/customers/locations/editar-ubicacion.js'></script>
</body>
</html>
