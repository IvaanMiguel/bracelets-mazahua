<?php require_once COMPROBAR_SESION ?>

<!DOCTYPE html>
<html lang='es'>
<head>
  <?php require_once HEAD_TAGS ?>

  <link rel='stylesheet' href='css/principal.css'>
  <link rel='stylesheet' href='css/sections/categorias.css'>

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
        <contenedor-flex flex-direction='column' gap='var(--espaciado-jumbo)' padding='var(--espaciado-jumbo) var(--espaciado-jumbo) 0'>

          <form>
            <campo-texto>
              <span slot='etiqueta'>Nueva categoría</span>
              <input slot='campo' type='text' name='nuevaCategoria'>
            </campo-texto>
            <boton-rellenado
                data-color-fondo='var(--clr-primario-40)'
                data-color-texto='#ffffff'
                type='button'
                data-variante='texto-icono'
                data-icono='save'
                data-etiqueta='Guardar categoría'>
            </boton-rellenado>
          </form>
          <lista-encabezada>
            <h1 class='titulo-grande' slot='titulo'>6 categorías</h1>
            <lista-controlador slot='lista'>
              <item-divisor>
                <lista-item>
                  <span slot='info-principal'>Item 1</span>
                  <span slot='info-extra'>Elemento 1</span>
                </lista-item>
              </item-divisor>
              <item-divisor>
                <lista-item>
                  <span slot='info-principal'>Item 1</span>
                  <span slot='info-extra'>Elemento 1</span>
                </lista-item>
              </item-divisor>
              <item-divisor>
                <lista-item>
                  <span slot='info-principal'>Item 1</span>
                  <span slot='info-extra'>Elemento 1</span>
                </lista-item>
              </item-divisor>
              <item-divisor>
                <lista-item>
                  <span slot='info-principal'>Item 1</span>
                </lista-item>
              </item-divisor>
              <item-divisor>
                <lista-item>
                  <span slot='info-principal'>Item 1</span>
                </lista-item>
              </item-divisor>
              <item-divisor data-no-divisor>
                <lista-item>
                  <span slot='info-principal'>Item 1</span>
                </lista-item>
              </item-divisor>
            </lista-controlador>
          </lista-encabezada>
        </contenedor-flex>
      </div>
    </div>
  </main>

  <ventana-emergente id='remover-ubicacion'>
    <span slot='cabecera-inicio'>Remover ubicación</span>
    <boton-icono slot='cabecera-final' data-icono='close' data-color-texto='#ffffff'></boton-icono>
    <span>
      La información de dicha ubicación ya no se guardará junto con el cliente si es removida, ¿deseas continuar?
    </span>
    <boton-rellenado
        slot='pie-final'
        data-evento='removerubicacion'
        data-color-fondo='var(--clr-primario-40)'
        data-color-texto='#ffffff'>
      <span slot='etiqueta'>Sí</span>
    </boton-rellenado>
    <boton-delineado
        slot='pie-final'
        data-evento='cerrarventana'
        data-color-texto='var(--clr-primario-40)'
        data-color-fondo="#ffffff">
      <span slot='etiqueta'>No</span>
    </boton-delineado>
  </ventana-emergente>

  <?php require_once PIE_PAGINA ?>

  <script src='js/clientes/confirmar-remover-ubicacion.js'></script>
</body>
</html>
