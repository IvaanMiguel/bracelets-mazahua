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
  <script type='module' src='components/lista-desplegable.js'></script>
  <script type='module' src='components/contenedor-colapsable.js'></script>
  <script type='module' src='components/info-detalles.js'></script>
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
            <wc-tabs id='subtab' data-tab='2' data-no-cabecera>
              <?php require 'partials/products/producto-vista.php' ?>
              <?php require 'partials/products/administrar-productos.php' ?>
            </wc-tabs>
            <boton-texto
                slot='tab'
                data-color-texto='var(--clr-fondo-10)'
                data-variante='texto-icono'
                data-icono='add'
                data-etiqueta='Agregar producto nuevo'
                data-expandir>
            </boton-texto>
            <?php include 'partials/products/agregar-producto.php' ?>
          </wc-tabs>
        </contenedor-flex>
      </div>
    </div>
  </main>

  <ventana-emergente id='editar-producto' data-cierre-explicito>
    <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
      Editando producto: <span class='nombre-producto'></span>
    </wc-texto>
    <boton-icono
        slot='cabecera-final'
        data-icono='close'
        data-color-texto='#ffffff'
        data-evento='verificarcierre'>
    </boton-icono>
    <form>
      <contenedor-flex flex-direction='column' gap='var(--espaciado-grande)'>
        <contenedor-flex gap='var(--espaciado-chico)'>
          <campo-texto>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
              Nombre
            </wc-texto>
            <input name='nombre'>
          </campo-texto>
        </contenedor-flex>
        <contenedor-flex gap='var(--espaciado-chico)'>
          <?php require 'partials/products/lista-categorias.php' ?>
        </contenedor-flex>
        <contenedor-flex class='producto-campos' flex-direction='row' gap='var(--espaciado-grande)'>
          <contenedor-flex flex-direction='column' gap='var(--espaciado-chico)'>
            <campo-texto>
              <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
                Precio
              </wc-texto>
              <input name='precio'>
            </campo-texto>
          </contenedor-flex>
          <contenedor-flex flex-direction='column' gap='var(--espaciado-chico)'>
            <campo-texto>
              <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
                Existencias iniciales
              </wc-texto>
              <input name='existenciasIniciales'>
            </campo-texto>
          </contenedor-flex>
        </contenedor-flex>
      </contenedor-flex>
    </form>
    <boton-rellenado
        slot='pie-inicio'
        data-evento='actualizarproducto'
        data-color-fondo='var(--clr-primario-40)'
        data-color-texto='#ffffff'
        data-etiqueta='Guardar cambios'
        data-variante='texto-icono'
        data-icono='save'>
    </boton-rellenado>
    <boton-delineado
        slot='pie-inicio'
        data-evento='verificarcierre'
        data-color-texto='var(--clr-primario-40)'
        data-color-fondo='#ffffff'
        data-etiqueta='Descartar cambios'
        data-variante='texto-icono'
        data-icono='close'>
    </boton-delineado>
  </ventana-emergente>

  <ventana-emergente id='confirmar-descarte'>
    <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
      ¿Descartar cambios?
    </wc-texto>
    <wc-texto data-tipo-fuente='cuerpo-m'>
      ¿Descartar los cambios realizados sin guardar?
    </wc-texto>
    <boton-rellenado
        slot='pie-final'
        data-color-fondo='var(--clr-primario-40)'
        data-color-texto='#ffffff'
        data-evento='cerrarventanas'
        data-etiqueta='Sí'>
    </boton-rellenado>
    <boton-delineado
        slot='pie-final'
        data-color-texto='var(--clr-primario-40)'
        data-color-fondo='#ffffff'
        data-evento='cancelarcierre'
        data-etiqueta='No'>
    </boton-delineado>
  </ventana-emergente>

  <ventana-emergente id='eliminar-producto'>
    <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
      ¿Eliminar el producto <span class='nombre-producto'></span>?
    </wc-texto>
    <boton-icono
        slot='cabecera-final'
        data-icono='close'
        data-color-texto='#ffffff'
        data-evento='cancelar'>
    </boton-icono>
    <wc-texto data-tipo-fuente='cuerpo-m'>
      El producto <strong class='nombre-producto'></strong> será eliminado de forma permanente, ¿deseas continuar?
    </wc-texto>
    <boton-rellenado
        slot='pie-final'
        data-color-fondo='var(--clr-primario-40)'
        data-color-texto='#ffffff'
        data-evento='confirmareliminarproducto'
        data-etiqueta='Sí'>
    </boton-rellenado>
    <boton-delineado
        slot='pie-final'
        data-color-texto='var(--clr-primario-40)'
        data-color-fondo='#ffffff'
        data-evento='cancelar'
        data-etiqueta='No'>
    </boton-delineado>
  </ventana-emergente>

  <?php require_once PIE_PAGINA ?>

  <script type='module' src='js/products/ordenar-productos.js'></script>
  <script type='module' src='js/products/agregar-producto.js'></script>
  <script type='module' src='js/products/editar-producto.js'></script>
  <script type='module' src='js/products/eliminar-producto.js'></script>
  <script src='js/products/mostrar-producto.js'></script>
</body>
</html>
