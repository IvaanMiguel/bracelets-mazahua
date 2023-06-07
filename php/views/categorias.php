<?php require_once COMPROBAR_SESION ?>

<?php
  require_once AUTOLOADER;

  $vistaCategoria = new \controllers\VistaCategoria();
  
  $resultado = json_decode($vistaCategoria->mostrarCategorias(), true);
?>

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
  <script type='module' src='components/notificacion-flotante.js'></script>
  <script type='module' src='components/grupo-notificaciones.js'></script>
</head>
<body>
  <main class='contenedor'>
    <?php require_once MENU ?>

    <div class='contenido'>
      <?php require_once CABECERA ?>

      <div class='seccion'>
        <contenedor-flex flex-direction='column' gap='var(--espaciado-jumbo)' padding='var(--espaciado-jumbo) var(--espaciado-jumbo) 0'>
          <form>
            <contenedor-flex gap='var(--espaciado-chico)'>
              <campo-texto>
                <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Nueva categoría (nombre)</wc-texto>
                <input name='nuevaCategoria'>
              </campo-texto>
            </contenedor-flex>
            <boton-rellenado
                data-color-fondo='var(--clr-primario-40)'
                data-color-texto='#ffffff'
                type='button'
                data-variante='texto-icono'
                data-icono='save'
                data-etiqueta='Guardar categoría'
                data-evento='agregarcategoria'>
            </boton-rellenado>
          </form>
          <lista-encabezada>
            <wc-texto id='categorias-titulo' slot='titulo' data-tipo-fuente='titulo-l'>
              <?php
                $totalCategorias = count($resultado['contenido']);
                echo $totalCategorias === 1
                  ? '1 categoría'
                  : $totalCategorias . ' categorías';
              ?>
            </wc-texto>
            <lista-controlador>

              <?php
                $i = 0;
                foreach($resultado['contenido'] as $categoria): ?>
                  <item-divisor <?= ++$i === $totalCategorias ? 'data-no-divisor' : '' ?>>
                    <lista-item data-no-cursor>
                      <wc-texto data-tipo-fuente='titulo-m'>
                        <?= $categoria['nombreCategoria'] ?>
                      </wc-texto>
                      <boton-icono
                          slot='final'
                          class='editar-categoria'
                          data-evento='editarcategoria'
                          data-icono='edit'
                          data-color-texto='var(--clr-secundario-40)'>
                      </boton-icono>
                      <boton-icono
                          slot='final'
                          class='eliminar-categoria'
                          data-evento='eliminarcategoria'
                          data-icono='delete_forever'
                          data-color-texto='var(--clr-error-40)'>
                      </boton-icono>
                      <input class='id-categoria' type='hidden' value=<?= $categoria['idCategoriaProducto'] ?>>
                    </lista-item>
                  </item-divisor>
              <?php endforeach; ?>

            </lista-controlador>
          </lista-encabezada>
        </contenedor-flex>
      </div>
    </div>
  </main>

  <ventana-emergente id='editar-categoria' data-cierre-explicito>
    <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
      Editando categoría: <span class='nombre-categoria'></span>
    </wc-texto>
    <boton-icono
        slot='cabecera-final'
        data-icono='close'
        data-color-texto='#ffffff'
        data-evento='verificarcierre'>
    </boton-icono>
    <contenedor-flex flex-direction='column' gap='var(--espaciado-chico)'>
      <campo-texto>
        <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
          Nuevo nombre de categoría
        </wc-texto>
        <input name='nuevoNombreCategoria'>
      </campo-texto>
    </contenedor-flex>
    <boton-rellenado
        slot='pie-inicio'
        data-evento='actualizarcategoria'
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
        data-color-fondo='#ffd9e5'
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

  <ventana-emergente id='eliminar-categoria'>
    <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
      ¿Eliminar categoría <span class='nombre-categoria'></span>?
    </wc-texto>
    <boton-icono
        slot='cabecera-final'
        data-icono='close'
        data-color-texto='#ffffff'
        data-evento='cancelar'>
    </boton-icono>
    <wc-texto data-tipo-fuente='cuerpo-m'>
      La categoría <strong class='nombre-categoria'></strong> será eliminada de forma permanente, ¿deseas continuar?
    </wc-texto>
    <boton-rellenado
        slot='pie-final'
        data-color-fondo='var(--clr-primario-40)'
        data-color-texto='#ffffff'
        data-evento='confirmareliminarcategoria'
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

  <script type='module' src='js/categories/agregar-categoria.js'></script>
  <script type='module' src='js/categories/editar-categoria.js'></script>
  <script type='module' src='js/categories/eliminar-categoria.js'></script>
  <script type='module' src='js/categories/ordenar-categorias.js'></script>
</body>
</html>
