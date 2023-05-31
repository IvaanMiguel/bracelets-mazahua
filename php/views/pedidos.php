<?php require_once COMPROBAR_SESION ?>

<!DOCTYPE html>
<html lang='es'>
<head>
  <?php require_once HEAD_TAGS ?>

  <link rel='stylesheet' href='css/principal.css'>
  <link rel='stylesheet' href='css/sections/pedidos.css'>

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
  <script type='module' src='components/info-detalles.js'></script>
  <script type='module' src='components/lista-desplegable.js'></script>
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
                data-etiqueta='Administrar pedidos'
                data-expandir>
            </boton-texto>
            <wc-tabs id='subtab' data-tab='2' data-no-cabecera>
              <?php require 'partials/orders/pedido-vista.php' ?>
              <?php require 'partials/orders/administrar-pedidos.php' ?>
            </wc-tabs>
            <boton-texto
                slot='tab'
                data-color-texto='var(--clr-fondo-10)'
                data-variante='texto-icono'
                data-icono='add'
                data-etiqueta='Agregar pedido nuevo'
                data-expandir>
            </boton-texto>
            <div id='agregar-pedido'>
              <?php require_once 'partials/orders/agregar-pedido.php' ?>
            </div>
          </wc-tabs>
        </contenedor-flex>
      </div>
    </div>
  </main>

  <?php require_once POPUPS_PEDIDOS . '/buscar-cliente.php' ?>
  <?php require_once POPUPS_PEDIDOS . '/buscar-producto.php' ?>
  <?php require_once POPUPS_PEDIDOS . '/eliminar-pedido.php' ?>
  <?php require_once POPUPS_PEDIDOS . '/completar-pedido.php' ?>
  <?php require_once POPUPS_PEDIDOS . '/editar-informacion-destinatario.php' ?>
  <?php require_once POPUPS_PEDIDOS . '/editar-informacion-entrega.php' ?>
  <?php require_once POPUPS_PEDIDOS . '/editar-productos.php' ?>

  <?php require_once PIE_PAGINA ?>

  <script type='module' src='js/pedido-local-storage.js'></script>
  <script type='module' src='js/orders/init.js'></script>
  <script type='module' src='js/orders/buscar-cliente.js'></script>
  <script type='module' src='js/orders/seleccionar-productos.js'></script>
  <script type='module' src='js/orders/eliminar-producto.js'></script>
  <script type='module' src='js/orders/agregar-pedido.js'></script>
  <script type='module' src='js/orders/controllers/tabs-controlador.js'></script>
  <script type='module' src='js/orders/mostrar-pedido-pendiente.js'></script>
  <script type='module' src='js/orders/eliminar-pedido.js'></script>
  <script type='module' src='js/orders/completar-pedido.js'></script>
  <script type='module' src='js/orders/mostrar-pedido-completado.js'></script>
  <script type='module' src='js/orders/editar-datos-destinatario.js'></script>
  <script type='module' src='js/orders/editar-informacion-entrega.js'></script>
  <script type='module' src='js/orders/actualizar-productos.js'></script>
  <script type='module' src='js/orders/agregar-productos.js'></script>
</body>
</html>
