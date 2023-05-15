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

  <ventana-emergente id='remover-ubicacion'>
    <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>Remover ubicación</wc-texto>
    <boton-icono slot='cabecera-final' data-icono='close' data-color-texto='#ffffff'></boton-icono>
    <wc-texto>
      La información de dicha ubicación ya no se guardará junto con el cliente si es removida, ¿deseas continuar?
    </wc-texto>
    <boton-rellenado
        slot='pie-final'
        data-evento='removerubicacion'
        data-color-fondo='var(--clr-primario-40)'
        data-color-texto='#ffffff'
        data-etiqueta='Sí'>
    </boton-rellenado>
    <boton-delineado
        slot='pie-final'
        data-evento='cerrarventana'
        data-color-texto='var(--clr-primario-40)'
        data-color-fondo='#ffffff',
        data-etiqueta='No'>
    </boton-delineado>
  </ventana-emergente>

  <ventana-emergente id='editar-cliente' data-cierre-explicito>
    <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
      Editando cliente: <span class='nombre-cliente'>Cargando...</span>
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
            <input name='nombre' placeholder='Cargando...'>
          </campo-texto>
        </contenedor-flex>
        <contenedor-flex gap='var(--espaciado-chico)'>
          <campo-texto>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
              Apellidos
            </wc-texto>
            <input name='apellidos'>
          </campo-texto>
        </contenedor-flex>
        <contenedor-flex class='cliente-campos' flex-direction='row' gap='var(--espaciado-grande)'>
          <contenedor-flex flex-direction='column' gap='var(--espaciado-chico)'>
            <campo-texto>
              <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
                Edad
              </wc-texto>
              <input name='edad'>
            </campo-texto>
          </contenedor-flex>
          <contenedor-flex flex-direction='column' gap='var(--espaciado-chico)'>
            <campo-texto>
              <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
                Número de celular
              </wc-texto>
              <input name='celular'>
            </campo-texto>
          </contenedor-flex>
        </contenedor-flex>
        <contenedor-flex gap='var(--espaciado-chico)'>
          <campo-texto>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
              Email
            </wc-texto>
            <input name='email'>
          </campo-texto>
        </contenedor-flex>
      </contenedor-flex>
    </form>
    <boton-rellenado
        slot='pie-inicio'
        data-evento='actualizarcliente'
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

  <ventana-emergente id='eliminar-cliente'>
    <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
      ¿Eliminar la información de <span class='nombre-cliente'></span>?
    </wc-texto>
    <boton-icono
        slot='cabecera-final'
        data-icono='close'
        data-color-texto='#ffffff'
        data-evento='cancelar'>
    </boton-icono>
    <wc-texto data-tipo-fuente='cuerpo-m'>
      La información de <strong class='nombre-cliente'></strong> será eliminada de forma permanente, ¿deseas continuar?
    </wc-texto>
    <boton-rellenado
        slot='pie-final'
        data-color-fondo='var(--clr-primario-40)'
        data-color-texto='#ffffff'
        data-evento='confirmareliminarcliente'
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

  <script type='module' src='js/customers/ordenar-clientes.js'></script>
  <script type='module' src='js/customers/agregar-cliente.js'></script>
  <script type='module' src='js/customers/mostrar-cliente.js'></script>
  <script type='module' src='js/customers/editar-cliente.js'></script>
  <script type='module' src='js/customers/eliminar-cliente.js'></script>
  <script type='module' src='js/customers/validar-campos-ubicacion.js'></script>
  <script type='module' src='js/customers/confirmar-remover-ubicacion.js'></script>
</body>
</html>
