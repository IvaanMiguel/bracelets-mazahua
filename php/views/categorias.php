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
              <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Nueva categoría</wc-texto>
              <input name='nuevaCategoria'>
            </campo-texto>
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
            <wc-texto slot='titulo' data-tipo-fuente='titulo-l'>
              <?= count($resultado['contenido']) ?> categorías
            </wc-texto>
            <lista-controlador slot='lista'>

              <?php
                $i = 0;
                foreach($resultado['contenido'] as $categoria): ?>
                  <item-divisor <?= ++$i === count($resultado['contenido']) ? 'data-no-divisor' : '' ?>>
                    <lista-item>
                      <wc-texto data-tipo-fuente='titulo-m'>
                        <?= $categoria['nombreCategoria'] ?>
                      </wc-texto>
                    </lista-item>
                    <input type='hidden' value=<?= $categoria['idCategoriaProducto'] ?>>
                  </item-divisor>
              <?php endforeach; ?>

            </lista-controlador>
          </lista-encabezada>
        </contenedor-flex>
      </div>
    </div>
  </main>

  <ventana-emergente id='editar-categoria'>
    <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>Editando categoría: </wc-texto>
    <boton-icono slot='cabecera-final' data-icono='close' data-color-texto='#ffffff'></boton-icono>
    <campo-texto>
      <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
        Nuevo nombre de categoría
      </wc-texto>
      <input name='nuevoNombreCategoria'>
    </campo-texto>
    <boton-rellenado
        slot='pie-final'
        data-evento=''
        data-color-fondo='var(--clr-primario-40)'
        data-color-texto='#ffffff'
        data-etiqueta='Guardar cambios'
        data-variante='texto-icono'
        data-icono='save'>
    </boton-rellenado>
    <boton-delineado
        slot='pie-final'
        data-evento=''
        data-color-texto='var(--clr-primario-40)'
        data-color-fondo='#ffffff'
        data-etiqueta='Descartar cambios'
        data-variante='texto-icono'
        data-icono='close'>
    </boton-delineado>
    <boton-texto
        slot='pie-final'
        data-color-texto='var(--clr-error-40)'
        data-etiqueta='Eliminar categoría'
        data-variante='texto-icono'
        data-icono='delete_forever'>
    </boton-texto>
  </ventana-emergente>



  <?php require_once PIE_PAGINA ?>

  <script type='module' src='js/categorias/agregar-categoria.js'></script>
  <script src='js/categorias/mostrar-categoria.js'></script>
</body>
</html>
