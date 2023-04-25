<?php require_once COMPROBAR_SESION ?>

<!DOCTYPE html>
<html lang='es'>
<head>
  <?php require_once HEAD_TAGS ?>

  <link rel='stylesheet' href='css/principal.css'>
  <link rel='stylesheet' href='css/sections/productos.css'>

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
</head>
<body>
  <main class='contenedor'>
    <?php require_once MENU ?>

    <div class='contenido'>
      <?php require_once CABECERA ?>

      <div class='seccion' data-rol='secciones'>
        <contenedor-flex padding='var(--espaciado-chico) var(--espaciado-jumbo) 0'>
          <wc-tabs>
            <boton-texto
                slot='tab'
                data-color-texto='var(--clr-fondo-10)'
                data-variante='texto-icono'
                data-icono='settings'
                data-etiqueta='Administrar productos'
                data-expandir>
            </boton-texto>
            <div>
              <?php require_once 'partials/products/administrar-productos.php' ?>
            </div>
            <boton-texto
                slot='tab'
                data-color-texto='var(--clr-fondo-10)'
                data-variante='texto-icono'
                data-icono='add'
                data-etiqueta='Agregar producto nuevo'
                data-expandir>
            </boton-texto>
            <div>
              <?php include 'partials/products/agregar-producto.php' ?>
            </div>
          </wc-tabs>
        </contenedor-flex>
      </div>
    </div>
  </main>

  <?php require_once PIE_PAGINA ?>
</body>
</html>
